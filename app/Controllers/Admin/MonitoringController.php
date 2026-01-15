<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class MonitoringController extends Controller
{
    public function index()
    {
        // GET /admin/monitoring
        return view('admin/monitoring/index', [
            'title' => 'Monitoring Aktivitas'
        ]);
    }
}
