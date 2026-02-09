<?php

namespace App\Models;

use CodeIgniter\Model;

class SekretarisJenderalModel extends Model
{
    protected $table            = 'korpri_sekretaris_jenderal';
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
     * ===============================
     * ADMIN AREA
     * ===============================
     */

    public function getAllAdmin()
    {
        return $this->orderBy('urutan', 'ASC')
                    ->findAll();
    }

    /**
     * ===============================
     * FRONTEND AREA
     * ===============================
     */

    public function getAktifUntukFrontend()
    {
        $data = $this->where('is_active', 1)
                     ->orderBy('urutan', 'ASC')
                     ->findAll();

        foreach ($data as &$item) {
            $item['periode'] = $this->formatPeriode(
                $item['masa_jabat_mulai'],
                $item['masa_jabat_selesai']
            );
        }

        return $data;
    }

    /**
     * ===============================
     * HELPER
     * ===============================
     */

    protected function formatPeriode($mulai, $selesai)
    {
        if ($mulai && $selesai) {
            return $mulai . ' – ' . $selesai;
        }

        return '';
    }
}
