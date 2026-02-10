<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriFotoModel extends Model
{
    protected $table            = 'galeri_foto';
    protected $primaryKey       = 'id';

    protected $allowedFields    = [
        'galeri_kegiatan_id',
        'file_name',
        'created_at',
    ];

    protected $useTimestamps    = false;

    /**
     * Ambil foto berdasarkan kegiatan
     */
    public function getByKegiatan($kegiatanId)
    {
        return $this->where('galeri_kegiatan_id', $kegiatanId)
            ->orderBy('id', 'ASC')
            ->findAll();
    }

    /**
     * Hitung jumlah foto per kegiatan
     */
    public function countByKegiatan($kegiatanId)
    {
        return $this->where('galeri_kegiatan_id', $kegiatanId)->countAllResults();
    }
}
