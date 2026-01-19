<?php

namespace App\Controllers\Operator;

use CodeIgniter\Controller;

class ExportController extends Controller
{
    public function guru()
    {
        // POST /operator/guru/export
        // Implementasi export (Excel) di service PHASE berikutnya
        return $this->response->setJSON([
            'status'  => 'ok',
            'message' => 'Endpoint export guru siap'
        ]);
    }
}
