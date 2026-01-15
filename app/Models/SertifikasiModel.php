<?php

namespace App\Models;

use CodeIgniter\Model;

class SertifikasiModel extends Model
{
    protected $table      = 'sertifikasi';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id_guru',
        'sertifikasi',
        'jenjang',
        'nrg',
        'mapel',
        'no_peserta',
        'lptk',
        'no_sertifikat',
        'tanggal_lulus',
        'tahun',
        'file_sertifikat'
    ];

    protected $useTimestamps = false;
}
