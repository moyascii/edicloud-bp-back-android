<?php

namespace App\Models;

use CodeIgniter\Model;

class MotivoAlarmaModel extends Model
{
    protected $table = 'motivo_alarma';
    protected $primaryKey = 'MOTIVO_ALARMA_ID';
    protected $allowedFields = [
        'MOTIVO_ALARMA_NOMBRE', 
        'MOTIVO_ALARMA_DESCRIPCION'
    ];
}
