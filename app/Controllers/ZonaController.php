<?php

namespace App\Controllers;

use App\Models\ZonaModel;
use CodeIgniter\Controller;

class ZonaController extends Controller
{
    public function index()
    {
        $model = new ZonaModel();
        $data = [
            'headerData' => ['title' => 'Gestión de Zonas'],
            'user' => ['user_nombre' => session()->get('user_nombre')],
            'zonas' => $model->findAll()
        ];

        return view('zona/index', $data);
    }

    public function create()
    {
        $data = [
            'headerData' => ['title' => 'Crear Zona'],
            'user' => ['user_nombre' => session()->get('user_nombre')]
        ];

        return view('zona/create', $data);
    }

    public function store()
    {
        $model = new ZonaModel();

        $data = [
            'ZONA_NOMBRE' => $this->request->getPost('ZONA_NOMBRE')
        ];

        $model->save($data);

        return redirect()->to('/zona');
    }

    public function edit($id)
    {
        $model = new ZonaModel();
        $data = [
            'headerData' => ['title' => 'Editar Zona'],
            'user' => ['user_nombre' => session()->get('user_nombre')],
            'zona' => $model->find($id)
        ];

        return view('zona/edit', $data);
    }

    public function update($id)
    {
        $model = new ZonaModel();

        $data = [
            'ZONA_NOMBRE' => $this->request->getPost('ZONA_NOMBRE')
        ];

        $model->update($id, $data);

        return redirect()->to('/zona');
    }

    public function delete($id)
    {
        $model = new ZonaModel();
        $model->delete($id);

        return redirect()->to('/zona');
    }
}
