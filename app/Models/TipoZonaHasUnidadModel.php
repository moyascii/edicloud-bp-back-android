<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoZonaHasUnidadModel extends Model
{
    protected $table = 'tipo_zona_has_unidad';
    protected $primaryKey = ['TIPO_ZONA_ID', 'UNIDAD_ID'];
    protected $allowedFields = [
        'TIPO_ZONA_ID',
        'UNIDAD_ID'
    ];

    protected $returnType = 'array';
    protected $useAutoIncrement = false;
    protected $useSoftDeletes = false;
    protected $useTimestamps = false;

    public function insertOrUpdate($data)
    {
        $compositeKey = [
            'TIPO_ZONA_ID' => $data['TIPO_ZONA_ID'],
            'UNIDAD_ID' => $data['UNIDAD_ID']
        ];

        $exists = $this->where($compositeKey)->first();

        if ($exists) {
            return $this->db->table($this->table)
                            ->where($compositeKey)
                            ->update($data);
        } else {
            return $this->db->table($this->table)
                            ->insert($data);
        }
    }
}
