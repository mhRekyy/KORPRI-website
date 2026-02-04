<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table      = 'berita';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'judul',
        'kategori',
        'konten',
        'gambar',
        'is_active',
    ];

    protected $useTimestamps = true;
}
