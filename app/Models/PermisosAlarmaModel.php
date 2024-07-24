<?php

namespace App\Models;

use CodeIgniter\Model;

class PermisosAlarmaModel extends Model
{
    protected $table = 'permisos_alarma';
    protected $primaryKey = 'ALARMA_ID';
    protected $allowedFields = [
        'ALARMA_ID',
        'USUARIO_ID'
    ];

    protected $returnType = 'array';
    protected $useAutoIncrement = false;
    protected $useSoftDeletes = false;
    protected $useTimestamps = false;

    protected function _getCompositeKey($data)
    {
        return [
            'ALARMA_ID' => $data['ALARMA_ID'],
            'USUARIO_ID' => $data['USUARIO_ID']
        ];
    }

    public function insertOrUpdate($data)
    {
        $compositeKey = $this->_getCompositeKey($data);

        $exists = $this->where($compositeKey)->first();

        if ($exists) {
            return $this->update($compositeKey, $data);
        }

        return $this->insert($data);
    }
}
