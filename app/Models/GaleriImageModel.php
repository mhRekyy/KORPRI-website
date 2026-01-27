<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriImageModel extends Model
{
    protected $table = 'galeri_images';
    protected $allowedFields = [
        'galeri_id',
        'image',
        'urutan'
    ];
}
