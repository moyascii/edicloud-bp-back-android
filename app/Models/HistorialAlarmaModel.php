<?php

namespace App\Models;

use CodeIgniter\Model;

class HistorialAlarmaModel extends Model
{
    protected $table = 'historial_alarma';
    protected $primaryKey = 'HISTORIAL_ALARMA_ID';
    protected $allowedFields = [
        'ALARMA_ID', 
        'USUARIO_ID', 
        'HISTORIAL_ALARMA_CREATE_AT', 
        'HISTORIAL_ALARMA_UPDATE_AT', 
        'HISTORIAL_ALARMA_LOCALIZACION', 
        'MOTIVO_ALARMA_ID'
    ];
}
