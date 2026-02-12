<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisSuratEdaranModel extends Model
{
    protected $table = 'jenis_surat_edaran';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama',
        'is_active'
    ];

    protected $useTimestamps = true;
}
