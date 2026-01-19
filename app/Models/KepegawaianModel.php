<?php

namespace App\Models;

use CodeIgniter\Model;

class KepegawaianModel extends Model
{
    protected $table      = 'kepegawaian';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id_guru',
        'status_kepegawaian',
        'nip',
        'jenis_asn',
        'tmt_asn',
        'no_sk_asn',
        'tgl_sk_asn',
        'file_sk_asn',
        'tmt_guru',
        'tmt_pegawai'
    ];

    protected $useTimestamps = false;
}
