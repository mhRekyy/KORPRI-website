<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriKegiatanModel extends Model
{
    protected $table            = 'galeri_kegiatan';
    protected $primaryKey       = 'id';

    protected $allowedFields    = [
        'judul_kegiatan',
        'tanggal_kegiatan',
        'lokasi',
        'deskripsi',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps    = false;

    /**
     * Ambil semua kegiatan + jumlah foto
     */
    public function getWithFotoCount()
    {
        return $this->select('galeri_kegiatan.*, COUNT(galeri_foto.id) AS total_foto')
            ->join('galeri_foto', 'galeri_foto.galeri_kegiatan_id = galeri_kegiatan.id', 'left')
            ->groupBy('galeri_kegiatan.id')
            ->orderBy('tanggal_kegiatan', 'DESC')
            ->findAll();
    }
}
