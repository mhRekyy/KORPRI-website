<?php

namespace App\Models;

use CodeIgniter\Model;

class PeraturanModel extends Model
{
    protected $table      = 'peraturan';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'judul',
        'kategori',
        'instansi',
        'tanggal_penetapan',
        'masa_bakti',
        'file_pdf',
        'is_active'
    ];

    protected $useTimestamps = false;
}
