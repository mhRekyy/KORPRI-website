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
        'kategori_id',
        'instansi',
        'tanggal_penetapan',
        'masa_bakti_id', // 🔥 ganti ke ini
        'file_pdf',
        'is_active'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    // ==============================
    // ADMIN LIST (JOIN MASA BAKTI)
    // ==============================
    public function getAdminPeraturan($keyword = null)
    {
        $builder = $this
            ->select('peraturan.*, masa_bakti.nama as masa_bakti')
            ->join('masa_bakti', 'masa_bakti.id = peraturan.masa_bakti_id', 'left')
            ->orderBy('peraturan.created_at', 'DESC');

        if ($keyword) {
            $builder->like('peraturan.judul', $keyword);
        }

        return $builder;
    }
}
