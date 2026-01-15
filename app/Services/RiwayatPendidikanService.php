<?php

namespace App\Services;

use App\Models\RiwayatPendidikanModel;

class RiwayatPendidikanService
{
    protected RiwayatPendidikanModel $model;

    public function __construct()
    {
        $this->model = new RiwayatPendidikanModel();
    }

    /**
     * Ambil riwayat pendidikan guru
     */
    public function listByGuru(int $idGuru): array
    {
        return $this->model
            ->where('id_guru', $idGuru)
            ->orderBy('tahun_lulus', 'DESC')
            ->findAll();
    }

    /**
     * Tambah riwayat pendidikan (append-only)
     */
    public function store(int $idGuru, array $data): bool
    {
        $data['id_guru'] = $idGuru;

        return (bool) $this->model->insert($data);
    }
}
