<?php

namespace App\Controllers;

use App\Models\AlarmaModel;
use App\Models\TipoZonaModel;
use CodeIgniter\Controller;
use App\Models\HistorialAlarmaModel;
use CodeIgniter\RESTful\ResourceController;


class AlarmaController extends ResourceController
{
    public function index()
    {
        $model = new AlarmaModel();
        $data = [
            'headerData' => ['title' => 'Gestión de Alarmas'],
            'user' => ['user_nombre' => session()->get('user_nombre')],
            'alarmas' => $model->select('alarma.*, tipo_zona.TIPO_ZONA_NOMBRE')
                                ->join('tipo_zona', 'alarma.TIPO_ZONA_ID = tipo_zona.TIPO_ZONA_ID')
                                ->findAll()
        ];

        return view('alarma/index', $data);
    }

    public function create()
    {
        $tipoZonaModel = new TipoZonaModel();
        $data = [
            'headerData' => ['title' => 'Crear Alarma'],
            'user' => ['user_nombre' => session()->get('user_nombre')],
            'tipos_zona' => $tipoZonaModel->getTiposZonaWithZona()
        ];

        return view('alarma/create', $data);
    }

    public function store()
    {
        $model = new AlarmaModel();

        $data = [
            'ALARMA_NOMBRE' => $this->request->getPost('ALARMA_NOMBRE'),
            'ALARMA_CODIGO' => $this->request->getPost('ALARMA_CODIGO'),
            'TIPO_ZONA_ID' => $this->request->getPost('TIPO_ZONA_ID')
        ];

        $model->save($data);

        return redirect()->to('/alarma');
    }

    // public function edit($id)
    // {
    //     $model = new AlarmaModel();
    //     $tipoZonaModel = new TipoZonaModel();
    //     $data = [
    //         'headerData' => ['title' => 'Editar Alarma'],
    //         'user' => ['user_nombre' => session()->get('user_nombre')],
    //         'alarma' => $model->find($id),
    //         'tipos_zona' => $tipoZonaModel->getTiposZonaWithZona()
    //     ];

    //     return view('alarma/edit', $data);
    // }

    // public function update($id)
    // {
    //     $model = new AlarmaModel();

    //     $data = [
    //         'ALARMA_NOMBRE' => $this->request->getPost('ALARMA_NOMBRE'),
    //         'ALARMA_CODIGO' => $this->request->getPost('ALARMA_CODIGO'),
    //         'TIPO_ZONA_ID' => $this->request->getPost('TIPO_ZONA_ID')
    //     ];

    //     $model->update($id, $data);

    //     return redirect()->to('/alarma');
    // }

    // public function delete($id)
    // {
    //     $model = new AlarmaModel();
    //     $model->delete($id);

    //     return redirect()->to('/alarma');
    // }

    // -----------------------------
    public function createHistorial()
    {
        $model = new HistorialAlarmaModel();
        
        $data = [
            'ALARMA_ID' => $this->request->getVar('alarma_id'),
            'USUARIO_ID' => $this->request->getVar('usuario_id'),
            'MOTIVO_ALARMA_ID' => $this->request->getVar('motivo_alarma_id'),
            'HISTORIAL_ALARMA_LOCALIZACION' => $this->request->getVar('localizacion'),
        ];
        
        if ($model->insert($data)) {
            return $this->respondCreated(['status' => 'success']);
        } else {
            return $this->fail($model->errors());
        }
    }
}
