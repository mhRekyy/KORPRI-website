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
        'jenis_id',          // 🔥 pakai ini
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

    public function getWithRelations()
{
    return $this->select('
            keputusan.*,
            jenis_keputusan.nama as jenis_nama,
            masa_bakti.nama as masa_bakti_nama
        ')
        ->join('jenis_keputusan', 'jenis_keputusan.id = keputusan.jenis_id', 'left')
        ->join('masa_bakti', 'masa_bakti.id = keputusan.masa_bakti_id', 'left')
        ->orderBy('tanggal_keputusan', 'DESC');
}

}
