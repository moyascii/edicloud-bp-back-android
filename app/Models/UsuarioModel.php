<?php
namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'USUARIO_ID';
    protected $allowedFields = [
        'USUARIO_NOMBRE', 
        'USUARIO_RUT', 
        'USUARIO_ALIAS', 
        'USUARIO_PATERNO', 
        'USUARIO_MATERNO', 
        'USUARIO_CLAVE', 
        'USUARIO_CORREO', 
        'USUARIO_FONO', 
        'USUARIO_CREATE_AT', 
        'USUARIO_UPDATE_AT', 
        'TIPO_USUARIO_ID'
    ];

    public function getUserWithTipoUsuario($credential)
    {
        return $this->select('usuario.*, tipo_usuario.TIPO_USUARIO_NOMBRE')
                    ->join('tipo_usuario', 'usuario.TIPO_USUARIO_ID = tipo_usuario.TIPO_USUARIO_ID')
                    ->where('USUARIO_RUT', $credential)
                    ->orWhere('USUARIO_CORREO', $credential)
                    ->first();
    }
}
