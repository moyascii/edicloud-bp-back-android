<?php

namespace App\Models;

use CodeIgniter\Model;

class AlarmaModel extends Model
{
    protected $table = 'alarma';
    protected $primaryKey = 'ALARMA_ID';
    protected $allowedFields = [
        'ALARMA_NOMBRE',
        'ALARMA_CODIGO',
        'TIPO_ZONA_ID'
    ];

    // Hash the ALARMA_CODIGO before saving it
    protected $beforeInsert = ['hashAlarmaCodigo'];
    protected $beforeUpdate = ['hashAlarmaCodigo'];

    protected function hashAlarmaCodigo(array $data)
    {
        if (isset($data['data']['ALARMA_CODIGO'])) {
            $data['data']['ALARMA_CODIGO'] = password_hash($data['data']['ALARMA_CODIGO'], PASSWORD_DEFAULT);
        }

        return $data;
    }
}
