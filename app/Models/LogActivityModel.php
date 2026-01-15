<?php

namespace App\Models;

use CodeIgniter\Model;

class LogActivityModel extends Model
{
    protected $table      = 'log_activity';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'user_id',
        'user_role',
        'updated_by_role',
        'aksi',
        'modul',
        'target_domain',
        'target_id',
        'deskripsi',
        'ip_address',
        'user_agent',
        'created_at'
    ];

    protected $useTimestamps = false;
}
