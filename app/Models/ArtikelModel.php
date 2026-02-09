<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table      = 'articles';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'title',
        'slug',
        'excerpt',
        'content',
        'thumbnail',
        'published_at',
        'is_active',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;

    // ⬇️ WAJIB ADA
    public function getArtikelTerkini(int $limit = 5, int $exceptId = null): array
    {
        $builder = $this->where('is_active', 1)
                        ->where('published_at <=', date('Y-m-d H:i:s'))
                        ->orderBy('published_at', 'DESC')
                        ->limit($limit);

        if ($exceptId !== null) {
            $builder->where('id !=', $exceptId);
        }

        return $builder->findAll();
    }
}
