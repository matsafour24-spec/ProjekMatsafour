<?php

namespace App\Services;

use App\Models\RiwayatKepegawaianModel;

class RiwayatKepegawaianService
{
    protected RiwayatKepegawaianModel $model;

    public function __construct()
    {
        $this->model = new RiwayatKepegawaianModel();
    }

    /**
     * Ambil riwayat kepegawaian guru
     */
    public function listByGuru(int $idGuru): array
    {
        return $this->model
            ->where('id_guru', $idGuru)
            ->orderBy('tanggal_efektif', 'DESC')
            ->findAll();
    }

    /**
     * Tambah riwayat kepegawaian (append-only)
     */
    public function store(int $idGuru, array $data): bool
    {
        $data['id_guru']    = $idGuru;
        $data['created_at'] = date('Y-m-d H:i:s');

        return (bool) $this->model->insert($data);
    }
}
