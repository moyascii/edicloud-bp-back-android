<?php namespace App\Controllers;

use App\Models\MotivoAlarmaModel;
use CodeIgniter\RESTful\ResourceController;

class MotivoAlarmaController extends ResourceController
{
    protected $modelName = 'App\Models\MotivoAlarmaModel';
    protected $format    = 'json';

    public function index()
    {
        // Obtener todos los motivos de alarma
        $motivoAlarmaModel = new MotivoAlarmaModel();
        $motivos = $motivoAlarmaModel->findAll();

        return $this->respond($motivos);
    }
}
