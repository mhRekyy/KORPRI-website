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
}
