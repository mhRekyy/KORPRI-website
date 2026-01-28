<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilKorpriModel extends Model
{
    protected $table = 'profil_korpri';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'masa_bakti',
        'struktur',
        'nama',
        'jabatan',
        'urutan',
        'is_active'
    ];

    protected $useTimestamps = true;

public function getFiltered($masaBakti = null, $struktur = null, $keyword = null)
{
    $builder = $this->where('is_active', 1);

    if ($masaBakti) {
        $builder->where('masa_bakti', $masaBakti);
    }

    if ($struktur) {
        $builder->where('struktur', $struktur);
    }

    if ($keyword) {
        $builder->groupStart()
            ->like('nama', $keyword)
            ->orLike('jabatan', $keyword)
            ->groupEnd();
    }

    return $builder->orderBy('urutan', 'ASC')->findAll();
}

}
