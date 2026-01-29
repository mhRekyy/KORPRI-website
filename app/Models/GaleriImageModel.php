<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriImageModel extends Model
{
    protected $table      = 'galeri_images';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'galeri_id',
        'image',
        'is_active'
    ];

    // tabel ini cuma pakai created_at
    protected $useTimestamps = false;
}
