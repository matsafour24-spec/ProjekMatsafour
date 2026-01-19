<?php

namespace App\Models;

use CodeIgniter\Model;

class KeluargaModel extends Model
{
    protected $table      = 'keluarga';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id_guru',
        'ibu_kandung',
        'status_perkawinan',
        'nama_pasangan',
        'jumlah_anak'
    ];

    protected $useTimestamps = false;
}
