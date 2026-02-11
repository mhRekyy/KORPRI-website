<?php

namespace App\Models;

use CodeIgniter\Model;

class HeroModel extends Model
{
    protected $table      = 'hero_slides';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'title',
        'description',
        'image',
        'sort_order',
        'is_active'
    ];

    protected $useTimestamps = true;

    public function getActiveSlides()
    {
        return $this->where('is_active', 1)
                    ->orderBy('sort_order', 'ASC')
                    ->limit(5)
                    ->findAll();
    }

    public function countSlides()
    {
        return $this->countAllResults();
    }
}
