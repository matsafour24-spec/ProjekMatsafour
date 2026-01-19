<?php

namespace App\Services;

use App\Models\KepegawaianModel;

class KepegawaianService
{
    protected KepegawaianModel $model;

    public function __construct()
    {
        $this->model = new KepegawaianModel();
    }

    /**
     * Ambil data kepegawaian aktif guru
     */
    public function findByGuru(int $idGuru): ?array
    {
        return $this->model
            ->where('id_guru', $idGuru)
            ->first();
    }

    /**
     * Simpan / update data kepegawaian
     */
    public function save(int $idGuru, array $data): bool
    {
        $existing = $this->findByGuru($idGuru);

        $data['id_guru'] = $idGuru;

        if ($existing) {
            return $this->model->update($existing['id'], $data);
        }

        return (bool) $this->model->insert($data);
    }
}
