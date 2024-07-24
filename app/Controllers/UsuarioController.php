<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use App\Models\TipoUsuarioModel;

class UsuarioController extends BaseController
{
    public function index()
    {
        $usuarioModel = new UsuarioModel();

        $usuarios = $usuarioModel->getUsuarioWithTipo();


        $data = [
            'headerData' => ['title' => 'Usuarios'],
            'sidebarData' => ['active' => 'usuarios'],
            'user' => session()->get(),
            'usuarios' => $usuarios,
        ];

        return view('usuario/index', $data);
    }

    public function create()
    {
        $tipoUsuarioModel = new TipoUsuarioModel();

        $data = [
            'headerData' => ['title' => 'Crear Usuario'],
            'sidebarData' => ['active' => 'usuarios'],
            'user' => session()->get(),
            'tipos_usuario' => $tipoUsuarioModel->findAll()
        ];
        return view('usuario/create', $data);
    }

    public function store()
    {
        $rut = $this->request->getVar('USUARIO_RUT');

        if (!$this->validaRut($rut)) {
            return redirect()->back()->with('error', 'RUT no válido. El RUT debe ser 11222333-4');
        }

        $usuarioModel = new UsuarioModel();
        $usuarioData = [
            'USUARIO_RUT' => $rut,
            'USUARIO_NOMBRE' => $this->request->getVar('USUARIO_NOMBRE'),
            'USUARIO_PATERNO' => $this->request->getVar('USUARIO_PATERNO'),
            'USUARIO_MATERNO' => $this->request->getVar('USUARIO_MATERNO'),
            'USUARIO_CORREO' => $this->request->getVar('USUARIO_CORREO'),
            'USUARIO_FONO' => $this->request->getVar('USUARIO_FONO'),
            'USUARIO_CLAVE' => substr($rut, 0, 4),  // Los primeros 4 dígitos del RUT como clave
            'TIPO_USUARIO_ID' => $this->request->getVar('TIPO_USUARIO_ID')
        ];

        if (empty($usuarioData['TIPO_USUARIO_ID'])) {
            return redirect()->back()->with('error', 'Debe seleccionar un tipo de usuario.');
        }

        $usuarioModel->insert($usuarioData);

        return redirect()->to('/usuario')->with('success', 'Usuario creado correctamente');
    }

    public function edit($id)
    {
        $usuarioModel = new UsuarioModel();
        $tipoUsuarioModel = new TipoUsuarioModel();
        $data = [
            'headerData' => ['title' => 'Editar Usuario'],
            'sidebarData' => ['active' => 'usuarios'],
            'user' => session()->get(),
            'usuario' => $usuarioModel->find($id),
            'tipos_usuario' => $tipoUsuarioModel->findAll()
        ];

        return view('usuario/edit', $data);
    }

    public function update($id)
    {
        $usuarioModel = new UsuarioModel();
        $usuarioData = [
            'USUARIO_NOMBRE' => $this->request->getVar('USUARIO_NOMBRE'),
            'USUARIO_RUT' => $this->request->getVar('USUARIO_RUT'),
            'USUARIO_ALIAS' => $this->request->getVar('USUARIO_ALIAS'),
            'USUARIO_PATERNO' => $this->request->getVar('USUARIO_PATERNO'),
            'USUARIO_MATERNO' => $this->request->getVar('USUARIO_MATERNO'),
            'USUARIO_CLAVE' => $this->request->getVar('USUARIO_CLAVE'),
            'USUARIO_CORREO' => $this->request->getVar('USUARIO_CORREO'),
            'USUARIO_FONO' => $this->request->getVar('USUARIO_FONO'),
            'TIPO_USUARIO_ID' => $this->request->getVar('TIPO_USUARIO_ID')
        ];

        if (empty($usuarioData['TIPO_USUARIO_ID'])) {
            return redirect()->back()->with('error', 'Debe seleccionar un tipo de usuario.');
        }

        $usuarioModel->update($id, $usuarioData);

        return redirect()->to('/usuario')->with('success', 'Usuario actualizado correctamente');
    }

    public function delete($id)
    {
        $usuarioModel = new UsuarioModel();

        $usuarioModel->delete($id);

        return redirect()->to('/usuario')->with('success', 'Usuario eliminado correctamente');
    }

    public function validaRut($rut)
    {
        $rut = preg_replace('/[^k0-9]/i', '', $rut);
        $dv  = substr($rut, -1);
        $numero = substr($rut, 0, strlen($rut) - 1);
        $i = 2;
        $suma = 0;
        foreach (array_reverse(str_split($numero)) as $v) {
            if (!is_numeric($v)) {
                return false;
            }
            if ($i == 8)
                $i = 2;
            $suma += $v * $i;
            ++$i;
        }
        $dvr = 11 - ($suma % 11);

        if ($dvr == 11)
            $dvr = 0;
        if ($dvr == 10)
            $dvr = 'K';
        if ($dvr == strtoupper($dv))
            return true;
        else
            return false;
    }

    public function changePassword()
    {
        $usuarioModel = new UsuarioModel();
        $tipoUsuarioModel = new TipoUsuarioModel();

        $usuario_tipos = $usuarioModel->findAll();

        foreach ($usuario_tipos as &$usuario) {
            $usuario['tipos'] = $usuarioModel->getUsuarioConTipos($usuario['USUARIO_ID']);
        }

        $data = [
            'headerData' => ['title' => 'Usuarios'],
            'sidebarData' => ['active' => 'usuarios'],
            'usuarios' => $usuarioModel->findAll(),
            'user' => ['user_nombre' => session()->get('user_nombre')],
            'usuario_tipos' => $usuario_tipos,
        ];

        return view('usuario/change_password', $data);
    }

    public function updatePassword()
    {
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find(session()->get('user_id'));

        if (!$usuario) {
            return redirect()->to('/usuario')->with('error', 'Usuario no encontrado');
        }

        $newPassword = $this->request->getVar('new_password');
        $confirmPassword = $this->request->getVar('confirm_password');

        if ($newPassword !== $confirmPassword) {
            return redirect()->back()->with('error', 'Las contraseñas no coinciden');
        }

        $usuarioData = [
            'USUARIO_CLAVE' => $newPassword
        ];

        $usuarioModel->update(session()->get('user_id'), $usuarioData);

        return redirect()->to('/')->with('success', 'Contraseña cambiada correctamente');
    }
}
