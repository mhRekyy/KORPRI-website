<?php

namespace App\Models;

use CodeIgniter\Model;

class PeraturanModel extends Model
{
    protected $table      = 'peraturan';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'judul',
        'kategori',
        'instansi',
        'tanggal_penetapan',
        'masa_bakti',
        'file_pdf',
        'is_active',
        'created_at',
        'updated_at',
    ];

    // ==============================
    // TIMESTAMPS
    // ==============================
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // ==============================
    // HELPER QUERY (OPSIONAL)
    // ==============================
    public function getAdminPeraturan($keyword = null)
    {
        $builder = $this->orderBy('created_at', 'DESC');

        if ($keyword) {
            $builder->like('judul', $keyword);
        }

        return $builder;
    }
}
