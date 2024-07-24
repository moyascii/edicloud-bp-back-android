<?php

namespace App\Controllers;

use App\Models\PermisosAlarmaModel;
use App\Models\AlarmaModel;
use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class PermisosAlarmaController extends Controller
{
    public function index()
    {
        $model = new PermisosAlarmaModel();
        $data = [
            'headerData' => ['title' => 'Gestión de Permisos de Alarma'],
            'user' => ['user_nombre' => session()->get('user_nombre')],
            'permisos' => $model->select('permisos_alarma.*, alarma.ALARMA_NOMBRE, usuario.USUARIO_NOMBRE')
                                ->join('alarma', 'permisos_alarma.ALARMA_ID = alarma.ALARMA_ID')
                                ->join('usuario', 'permisos_alarma.USUARIO_ID = usuario.USUARIO_ID')
                                ->findAll()
        ];

        return view('permisos_alarma/index', $data);
    }

    public function create()
    {
        $alarmaModel = new AlarmaModel();
        $usuarioModel = new UsuarioModel();
        $data = [
            'headerData' => ['title' => 'Crear Permiso de Alarma'],
            'user' => ['user_nombre' => session()->get('user_nombre')],
            'alarmas' => $alarmaModel->findAll(),
            'usuarios' => $usuarioModel->findAll()
        ];

        return view('permisos_alarma/create', $data);
    }

    public function store()
    {
        $model = new PermisosAlarmaModel();

        $data = [
            'ALARMA_ID' => $this->request->getPost('ALARMA_ID'),
            'USUARIO_ID' => $this->request->getPost('USUARIO_ID')
        ];

        $model->insertOrUpdate($data);

        return redirect()->to('/permisos_alarma');
    }

    public function delete($alarma_id, $usuario_id)
    {
        $model = new PermisosAlarmaModel();
        $model->where(['ALARMA_ID' => $alarma_id, 'USUARIO_ID' => $usuario_id])->delete();

        return redirect()->to('/permisos_alarma');
    }
}
