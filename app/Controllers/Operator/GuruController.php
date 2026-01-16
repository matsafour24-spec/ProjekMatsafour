<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;
use App\Services\GuruService;

class GuruController extends BaseController
{
    protected GuruService $guruService;

    public function __construct()
    {
        $this->guruService = new GuruService();
    }

    /**
     * Endpoint pencarian guru (AJAX)
     * URL: /operator/guru/search
     * Sub-Phase 9.4 — Data Binding (READ-ONLY)
     */
    public function search()
    {
        // Pastikan hanya AJAX (opsional, aman)
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(400)
                ->setJSON([
                    'status'  => 'error',
                    'message' => 'Invalid request',
                    'data'    => [],
                ]);
        }

        $keyword = $this->request->getGet('keyword');

        // Panggil service (INILAH YANG SEBELUMNYA TIDAK ADA)
        $data = $this->guruService->search($keyword);

        return $this->response->setJSON([
            'status' => 'ok',
            'data'   => $data,
        ]);
    }
}
