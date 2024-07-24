<?php

namespace App\Models;

use CodeIgniter\Model;

class UnidadModel extends Model
{
    protected $table = 'unidad';
    protected $primaryKey = 'UNIDAD_ID';
    protected $allowedFields = [
        'UNIDAD_DIRECCION',
        'UNIDAD_NUMERO',
        'UNIDAD_CREATE_AT',
        'UNIDAD_UPDATE_AT'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'UNIDAD_CREATE_AT';
    protected $updatedField  = 'UNIDAD_UPDATE_AT';
}
