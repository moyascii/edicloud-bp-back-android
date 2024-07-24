<?php

namespace App\Models;

use CodeIgniter\Model;

class ComunaModel extends Model
{
    protected $table = 'comuna';
    protected $primaryKey = 'COMUNA_ID';
    protected $allowedFields = [
        'COMUNA_NOMBRE'
    ];
}
