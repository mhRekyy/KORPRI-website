<?php

namespace App\Models;

use CodeIgniter\Model;

class PageModel extends Model
{
    protected $table = 'pages';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'slug',
        'title',
        'content',
        'is_active',
    ];

    protected $useTimestamps = true;

    public function getPageBySlug(string $slug)
    {
        return $this->where([
            'slug'      => $slug,
            'is_active' => 1,
        ])->first();
    }
}
