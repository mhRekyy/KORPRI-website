<?php

namespace App\Models;

use CodeIgniter\Model;

class KetuaUmumModel extends Model
{
    protected $table            = 'korpri_ketua_umum';
    protected $primaryKey       = 'id';

    protected $useAutoIncrement = true;

    protected $returnType       = 'array';

    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'nama',
        'foto',
        'masa_jabat_mulai',
        'masa_jabat_selesai',
        'urutan',
        'is_active',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * ==========================
     * QUERY UNTUK FRONTEND
     * ==========================
     * - Hanya data aktif
     * - Urut terbaru ke lama
     * - Siap dikonsumsi view TANPA diubah
     */
    public function getAktifUntukFrontend()
    {
        $data = $this->where('is_active', 1)
            ->orderBy('urutan', 'ASC')
            ->orderBy('masa_jabat_mulai', 'DESC')
            ->findAll();

        // Bentuk field "periode" agar cocok dengan view
        foreach ($data as &$row) {
            if (empty($row['masa_jabat_selesai'])) {
                $row['periode'] = $row['masa_jabat_mulai'] . '–Sekarang';
            } else {
                $row['periode'] = $row['masa_jabat_mulai'] . '–' . $row['masa_jabat_selesai'];
            }
        }

        return $data;
    }
}
