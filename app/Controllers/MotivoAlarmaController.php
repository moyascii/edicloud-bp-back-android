<?php

namespace App\Controllers;

use App\Models\MotivoAlarmaModel;
use CodeIgniter\Controller;

class MotivoAlarmaController extends Controller
{
    public function index()
    {
        $model = new MotivoAlarmaModel();
        $data = [
            'headerData' => ['title' => 'Gestión de Motivos de Alarma'],
            'user' => ['user_nombre' => session()->get('user_nombre')],
            'motivos_alarma' => $model->findAll()
        ];

        return view('motivo_alarma/index', $data);
    }

    public function create()
    {
        $data = [
            'headerData' => ['title' => 'Crear Motivo de Alarma'],
            'user' => ['user_nombre' => session()->get('user_nombre')]
        ];

        return view('motivo_alarma/create', $data);
    }

    public function store()
    {
        $model = new MotivoAlarmaModel();

        $data = [
            'MOTIVO_ALARMA_NOMBRE' => $this->request->getPost('MOTIVO_ALARMA_NOMBRE'),
            'MOTIVO_ALARMA_DESCRIPCION' => $this->request->getPost('MOTIVO_ALARMA_DESCRIPCION')
        ];

        $model->save($data);

        return redirect()->to('/motivo_alarma');
    }

    public function edit($id)
    {
        $model = new MotivoAlarmaModel();
        $data = [
            'headerData' => ['title' => 'Editar Motivo de Alarma'],
            'user' => ['user_nombre' => session()->get('user_nombre')],
            'motivo_alarma' => $model->find($id)
        ];

        return view('motivo_alarma/edit', $data);
    }

    public function update($id)
    {
        $model = new MotivoAlarmaModel();

        $data = [
            'MOTIVO_ALARMA_NOMBRE' => $this->request->getPost('MOTIVO_ALARMA_NOMBRE'),
            'MOTIVO_ALARMA_DESCRIPCION' => $this->request->getPost('MOTIVO_ALARMA_DESCRIPCION')
        ];

        $model->update($id, $data);

        return redirect()->to('/motivo_alarma');
    }

    public function delete($id)
    {
        $model = new MotivoAlarmaModel();
        $model->delete($id);

        return redirect()->to('/motivo_alarma');
    }
}
