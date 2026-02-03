<?php

namespace App\Models;

use CodeIgniter\Model;

class PengumumanModel extends Model
{
    protected $table      = 'pengumuman';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'judul',
        'kategori',
        'masa_bakti',
        'instansi',
        'tanggal_pengumuman',
        'file_pdf',
        'is_active'
    ];

    protected $useTimestamps = true;
}
