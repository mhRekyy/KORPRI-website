<?php

namespace App\Models;

use CodeIgniter\Model;

class StrukturDPKModel extends Model
{
    protected $table = 'struktur_dpk';

    protected $allowedFields = [
        'jabatan',
        'nama',
        'level',
        'urutan',
        'is_active'
    ];

    public function getByLevel(int $level)
    {
        return $this->where('level', $level)
                    ->where('is_active', 1)
                    ->orderBy('urutan', 'ASC')
                    ->findAll();
    }
}
