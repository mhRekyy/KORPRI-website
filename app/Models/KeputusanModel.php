<?php

namespace App\Models;

use CodeIgniter\Model;

class KeputusanModel extends Model
{
    protected $table            = 'keputusan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'judul',
        'instansi',
        'jenis_keputusan',
        'masa_bakti_id',
        'tanggal_keputusan',
        'file_pdf',
        'is_active'
    ];

    // ============================
    // TIMESTAMPS (WAJIB LENGKAP)
    // ============================
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // ============================
    // VALIDATION (AMAN, OPTIONAL)
    // ============================
    protected $validationRules = [
        'judul' => 'required',
    ];

    protected $validationMessages = [
        'judul' => [
            'required' => 'Judul keputusan wajib diisi',
        ],
    ];
}
