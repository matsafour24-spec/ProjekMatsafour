<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatKepegawaianModel extends Model
{
    protected $table      = 'riwayat_kepegawaian';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id_guru',
        'tanggal_efektif',
        'jabatan',
        'golongan',
        'status_penugasan',
        'status_keaktifan',
        'jenis_sk',
        'penerbit_sk',
        'file_sk',
        'created_at'
    ];

    protected $useTimestamps = false;
}
