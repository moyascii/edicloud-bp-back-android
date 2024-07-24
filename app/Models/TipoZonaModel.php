<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoZonaModel extends Model
{
    protected $table = 'tipo_zona';
    protected $primaryKey = 'TIPO_ZONA_ID';
    protected $allowedFields = [
        'TIPO_ZONA_NOMBRE',
        'ZONA_ID',
        'COMUNA_ID'
    ];

    public function getTipoZonasWithZonaYComuna()
    {
        return $this->select('tipo_zona.*, zona.ZONA_NOMBRE, comuna.COMUNA_NOMBRE')
                    ->join('zona', 'tipo_zona.ZONA_ID = zona.ZONA_ID')
                    ->join('comuna', 'tipo_zona.COMUNA_ID = comuna.COMUNA_ID')
                    ->orderBy('comuna.COMUNA_NOMBRE', 'ASC')
                    ->findAll();
    }
    public function getTiposZonaWithZona()
    {
        return $this->select('tipo_zona.*, zona.ZONA_NOMBRE')
                    ->join('zona', 'tipo_zona.ZONA_ID = zona.ZONA_ID')
                    ->findAll();
    }
}
