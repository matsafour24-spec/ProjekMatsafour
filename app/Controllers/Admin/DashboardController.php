<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // GET /admin/dashboard
        return view('admin/dashboard/index', [
            'title' => 'Dashboard Admin'
        ]);
    }
}
