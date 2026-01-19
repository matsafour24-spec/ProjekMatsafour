<?php

namespace App\Controllers\Guru;

use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // GET /guru/dashboard
        return view('guru/dashboard/index', [
            'title' => 'Dashboard Guru'
        ]);
    }
}
