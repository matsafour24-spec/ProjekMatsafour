<?php

namespace App\Services;

use App\Models\GuruModel;

class GuruService
{
    protected GuruModel $guruModel;

    public function __construct()
    {
        $this->guruModel = new GuruModel();
    }

    /**
     * Create guru baru
     */
    public function create(array $data): int
    {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $data['aktif']    = 1;

        return (int) $this->guruModel->insert($data);
    }

    /**
     * Update data guru
     */
    public function update(int $idGuru, array $data): bool
    {
        if (isset($data['password']) && $data['password'] !== '') {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        } else {
            unset($data['password']);
        }

        return $this->guruModel->update($idGuru, $data);
    }

    /**
     * Nonaktifkan guru (soft-state)
     */
    public function deactivate(int $idGuru): bool
    {
        return $this->guruModel->update($idGuru, [
            'aktif' => 0
        ]);
    }

    /**
     * Ambil detail guru (by id)
     */
    public function find(int $idGuru): ?array
    {
        return $this->guruModel->find($idGuru);
    }
}
