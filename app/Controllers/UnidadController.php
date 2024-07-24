<?php

namespace App\Controllers;

use App\Models\UnidadModel;
use CodeIgniter\Controller;

class UnidadController extends Controller
{
    public function index()
    {
        $model = new UnidadModel();
        $data = [
            'headerData' => ['title' => 'Gestión de Unidades'],
            'user' => ['user_nombre' => session()->get('user_nombre')],
            'unidades' => $model->findAll()
        ];

        return view('unidad/index', $data);
    }

    public function create()
    {
        $data = [
            'headerData' => ['title' => 'Crear Unidad'],
            'user' => ['user_nombre' => session()->get('user_nombre')]
        ];

        return view('unidad/create', $data);
    }

    public function store()
    {
        $model = new UnidadModel();

        $data = [
            'UNIDAD_DIRECCION' => $this->request->getPost('UNIDAD_DIRECCION'),
            'UNIDAD_NUMERO' => $this->request->getPost('UNIDAD_NUMERO')
        ];

        $model->save($data);

        return redirect()->to('/unidad');
    }

    public function edit($id)
    {
        $model = new UnidadModel();
        $data = [
            'headerData' => ['title' => 'Editar Unidad'],
            'user' => ['user_nombre' => session()->get('user_nombre')],
            'unidad' => $model->find($id)
        ];

        return view('unidad/edit', $data);
    }

    public function update($id)
    {
        $model = new UnidadModel();

        $data = [
            'UNIDAD_DIRECCION' => $this->request->getPost('UNIDAD_DIRECCION'),
            'UNIDAD_NUMERO' => $this->request->getPost('UNIDAD_NUMERO')
        ];

        $model->update($id, $data);

        return redirect()->to('/unidad');
    }

    public function delete($id)
    {
        $model = new UnidadModel();
        $model->delete($id);

        return redirect()->to('/unidad');
    }
}
