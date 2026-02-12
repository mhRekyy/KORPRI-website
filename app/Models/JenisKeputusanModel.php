<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisKeputusanModel extends Model
{
    protected $table      = 'jenis_keputusan';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'nama',
        'is_active'
    ];

    protected $useTimestamps = false;
}
