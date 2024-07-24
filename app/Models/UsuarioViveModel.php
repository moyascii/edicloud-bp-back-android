<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioViveModel extends Model
{
    protected $table = 'usuario_vive';
    protected $primaryKey = 'UNIDAD_ID';
    protected $allowedFields = [
        'USUARIO_ID'
    ];
}
