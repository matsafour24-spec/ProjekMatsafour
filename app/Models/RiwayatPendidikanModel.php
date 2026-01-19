<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatPendidikanModel extends Model
{
    protected $table      = 'riwayat_pendidikan';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id_guru',
        'jenjang',
        'institusi',
        'fakultas',
        'jurusan',
        'tahun_masuk',
        'tahun_lulus',
        'gelar',
        'no_ijazah',
        'file_ijazah'
    ];

    protected $useTimestamps = false;
}
