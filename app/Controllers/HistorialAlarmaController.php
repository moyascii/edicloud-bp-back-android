<?php
namespace App\Controllers;

use App\Models\HistorialAlarmaModel;
use CodeIgniter\RESTful\ResourceController;

class HistorialAlarmaController extends ResourceController
{
    public function getAllHistorial()
    {
        $model = new HistorialAlarmaModel();
        $historial = $model->getAllHistorial();
        
        return $this->respond($historial);
    }
}
