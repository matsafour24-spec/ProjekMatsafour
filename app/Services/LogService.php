<?php

namespace App\Services;

use App\Models\LogActivityModel;

class LogService
{
    protected LogActivityModel $model;

    public function __construct()
    {
        $this->model = new LogActivityModel();
    }

    /**
     * Catat aktivitas sistem (audit trail)
     */
    public function log(array $data): bool
    {
        $payload = [
            'user_id'          => $data['user_id'] ?? null,
            'user_role'        => $data['user_role'] ?? null,
            'updated_by_role'  => $data['updated_by_role'] ?? null,
            'aksi'             => $data['aksi'] ?? null,
            'modul'            => $data['modul'] ?? null,
            'target_domain'    => $data['target_domain'] ?? null,
            'target_id'        => $data['target_id'] ?? null,
            'deskripsi'        => $data['deskripsi'] ?? null,
            'ip_address'       => $data['ip_address'] ?? service('request')->getIPAddress(),
            'user_agent'       => $data['user_agent'] ?? service('request')->getUserAgent(),
            'created_at'       => date('Y-m-d H:i:s'),
        ];

        return (bool) $this->model->insert($payload);
    }
}
