<?php

namespace App\Models;

use CodeIgniter\Model;

class PengumumanModel extends Model
{
    protected $table      = 'pengumuman';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'judul',
        'kategori_id',
        'masa_bakti_id',
        'instansi',
        'tanggal_pengumuman',
        'file_pdf',
        'is_active'
    ];

    protected $useTimestamps = true;
}
