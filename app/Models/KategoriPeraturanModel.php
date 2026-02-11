<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriPeraturanModel extends Model
{
    protected $table            = 'kategori_peraturan';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama', 'is_active'];
    protected $useTimestamps    = true;

    public function getActive()
    {
        return $this->where('is_active', 1)
                    ->orderBy('nama', 'ASC')
                    ->findAll();
    }
}
