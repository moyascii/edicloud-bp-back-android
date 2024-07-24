<?php

namespace App\Models;

use CodeIgniter\Model;

class PagoModel extends Model
{
    protected $table = 'pago';
    protected $primaryKey = 'PAGO_ID';
    protected $allowedFields = [
        'USUARIO_ID', 
        'PAGO_FECHA_FINAL', 
        'PAGO_CREATE_AT', 
        'PAGO_DESCRIPCION'
    ];
}
