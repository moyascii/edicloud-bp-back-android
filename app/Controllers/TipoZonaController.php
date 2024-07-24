<?php

namespace App\Controllers;

use App\Models\TipoZonaModel;
use App\Models\ZonaModel;
use App\Models\ComunaModel;
use CodeIgniter\Controller;

class TipoZonaController extends Controller
{
    public function index()
    {
        $model = new TipoZonaModel();
        $data = [
            'headerData' => ['title' => 'Gestión de Tipos de Zona'],
            'user' => ['user_nombre' => session()->get('user_nombre')],
            'tipos_zona' => $model->getTipoZonasWithZonaYComuna()
        ];

        return view('tipo_zona/index', $data);
    }

    public function create()
    {
        $zonaModel = new ZonaModel();
        $comunaModel = new ComunaModel();

        $data = [
            'headerData' => ['title' => 'Crear Tipo de Zona'],
            'user' => ['user_nombre' => session()->get('user_nombre')],
            'zonas' => $zonaModel->findAll(),
            'comunas' => $comunaModel->findAll()
        ];

        return view('tipo_zona/create', $data);
    }

    public function store()
    {
        $model = new TipoZonaModel();

        $data = [
            'TIPO_ZONA_NOMBRE' => $this->request->getPost('TIPO_ZONA_NOMBRE'),
            'ZONA_ID' => $this->request->getPost('ZONA_ID'),
            'COMUNA_ID' => $this->request->getPost('COMUNA_ID')
        ];

        $model->save($data);

        return redirect()->to('/tipo_zona');
    }

    public function edit($id)
    {
        $model = new TipoZonaModel();
        $zonaModel = new ZonaModel();
        $comunaModel = new ComunaModel();

        $data = [
            'headerData' => ['title' => 'Editar Tipo de Zona'],
            'user' => ['user_nombre' => session()->get('user_nombre')],
            'tipo_zona' => $model->find($id),
            'zonas' => $zonaModel->findAll(),
            'comunas' => $comunaModel->findAll()
        ];

        return view('tipo_zona/edit', $data);
    }

    public function update($id)
    {
        $model = new TipoZonaModel();

        $data = [
            'TIPO_ZONA_NOMBRE' => $this->request->getPost('TIPO_ZONA_NOMBRE'),
            'ZONA_ID' => $this->request->getPost('ZONA_ID'),
            'COMUNA_ID' => $this->request->getPost('COMUNA_ID')
        ];

        $model->update($id, $data);

        return redirect()->to('/tipo_zona');
    }

    public function delete($id)
    {
        $model = new TipoZonaModel();
        $model->delete($id);

        return redirect()->to('/tipo_zona');
    }
}
