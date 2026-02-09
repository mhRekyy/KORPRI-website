<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminLogModel extends Model
{
    protected $table = 'admin_logs';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'admin_id',
        'action',
        'target_id',
        'description',
        'ip_address',
        'user_agent',
        'created_at'
    ];

    protected $useTimestamps = false;
}
