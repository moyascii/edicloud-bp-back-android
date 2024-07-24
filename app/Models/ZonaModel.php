<?php

namespace App\Models;

use CodeIgniter\Model;

class ZonaModel extends Model
{
    protected $table = 'zona';
    protected $primaryKey = 'ZONA_ID';
    protected $allowedFields = [
        'ZONA_NOMBRE'
    ];
}
