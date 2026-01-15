<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table      = 'guru';
    protected $primaryKey = 'id_guru';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'gelar_depan',
        'nama_lengkap',
        'gelar_belakang',
        'nik',
        'nuptk',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'no_wa',
        'jenis_ptk',
        'email',
        'jarak_tempat_tinggal',
        'alamat',
        'foto',
        'username',
        'password',
        'aktif'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
