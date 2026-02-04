<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratEdaranModel extends Model
{
    protected $table = 'surat_edaran';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'judul',
        'instansi',
        'jenis_surat',
        'masa_bakti',
        'tanggal_surat',
        'file_pdf',
        'is_active'
    ];

    protected $useTimestamps = true;
}
