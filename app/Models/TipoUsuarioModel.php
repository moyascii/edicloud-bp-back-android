<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoUsuarioModel extends Model
{
    protected $table = 'tipo_usuario';
    protected $primaryKey = 'TIPO_USUARIO_ID';
    protected $allowedFields = [
        'TIPO_USUARIO_NOMBRE'
    ];
}
