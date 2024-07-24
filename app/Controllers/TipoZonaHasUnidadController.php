<?php

namespace App\Controllers;

use App\Models\TipoZonaHasUnidadModel;
use App\Models\TipoZonaModel;
use App\Models\UnidadModel;
use CodeIgniter\Controller;

class TipoZonaHasUnidadController extends Controller
{
    public function index()
    {
        $model = new TipoZonaHasUnidadModel();
        $data = [
            'headerData' => ['title' => 'Gestión de Tipo Zona - Unidad'],
            'user' => ['user_nombre' => session()->get('user_nombre')],
            'relaciones' => $model->select('tipo_zona_has_unidad.*, tipo_zona.TIPO_ZONA_NOMBRE, unidad.UNIDAD_DIRECCION')
                                  ->join('tipo_zona', 'tipo_zona_has_unidad.TIPO_ZONA_ID = tipo_zona.TIPO_ZONA_ID')
                                  ->join('unidad', 'tipo_zona_has_unidad.UNIDAD_ID = unidad.UNIDAD_ID')
                                  ->findAll()
        ];

        return view('tipo_zona_has_unidad/index', $data);
    }

    public function create()
    {
        $tipoZonaModel = new TipoZonaModel();
        $unidadModel = new UnidadModel();
        $data = [
            'headerData' => ['title' => 'Asignar Unidad a Tipo Zona'],
            'user' => ['user_nombre' => session()->get('user_nombre')],
            'tipos_zona' => $tipoZonaModel->findAll(),
            'unidades' => $unidadModel->findAll()
        ];

        return view('tipo_zona_has_unidad/create', $data);
    }

    public function store()
    {
        $model = new TipoZonaHasUnidadModel();

        $data = [
            'TIPO_ZONA_ID' => $this->request->getPost('TIPO_ZONA_ID'),
            'UNIDAD_ID' => $this->request->getPost('UNIDAD_ID')
        ];

        $model->insertOrUpdate($data);

        return redirect()->to('/tipo_zona_has_unidad');
    }

    public function delete($tipo_zona_id, $unidad_id)
    {
        $model = new TipoZonaHasUnidadModel();
        $model->where(['TIPO_ZONA_ID' => $tipo_zona_id, 'UNIDAD_ID' => $unidad_id])->delete();

        return redirect()->to('/tipo_zona_has_unidad');
    }
}
