<?php

namespace App\Models;

use CodeIgniter\Model;

class KeputusanModel extends Model
{
    protected $table = 'keputusan';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'judul',
        'instansi',
        'jenis_keputusan',
        'masa_bakti',
        'tanggal_keputusan',
        'file_pdf',
        'is_active'
    ];

    protected $useTimestamps = true;
}
