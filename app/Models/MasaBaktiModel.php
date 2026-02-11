<?php

namespace App\Models;

use CodeIgniter\Model;

class MasaBaktiModel extends Model
{
    protected $table      = 'masa_bakti';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'nama',
        'is_active'
    ];
}
