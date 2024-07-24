<?php

namespace App\Controllers;

use App\Models\TipoUsuarioModel;
use CodeIgniter\Controller;

class TipoUsuarioController extends Controller
{
    public function index()
    {
        $model = new TipoUsuarioModel();
        $data = [
            'headerData' => ['title' => 'Gestión de Tipos de Usuario'],
            'user' => ['user_nombre' => session()->get('user_nombre')],
            'tipos_usuario' => $model->findAll()
        ];

        return view('tipo_usuario/index', $data);
    }

    public function create()
    {
        $data = [
            'headerData' => ['title' => 'Crear Tipo de Usuario'],
            'user' => ['user_nombre' => session()->get('user_nombre')]
        ];

        return view('tipo_usuario/create', $data);
    }

    public function store()
    {
        $model = new TipoUsuarioModel();

        $data = [
            'TIPO_USUARIO_NOMBRE' => $this->request->getPost('TIPO_USUARIO_NOMBRE')
        ];

        $model->save($data);

        return redirect()->to('/tipo_usuario');
    }

    public function edit($id)
    {
        $model = new TipoUsuarioModel();
        $data = [
            'headerData' => ['title' => 'Editar Tipo de Usuario'],
            'user' => ['user_nombre' => session()->get('user_nombre')],
            'tipo_usuario' => $model->find($id)
        ];

        return view('tipo_usuario/edit', $data);
    }

    public function update($id)
    {
        $model = new TipoUsuarioModel();

        $data = [
            'TIPO_USUARIO_NOMBRE' => $this->request->getPost('TIPO_USUARIO_NOMBRE')
        ];

        $model->update($id, $data);

        return redirect()->to('/tipo_usuario');
    }

    public function delete($id)
    {
        $model = new TipoUsuarioModel();
        $model->delete($id);

        return redirect()->to('/tipo_usuario');
    }
}
