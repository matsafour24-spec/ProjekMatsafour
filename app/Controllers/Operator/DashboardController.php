<?php

namespace App\Controllers\Operator;

use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // GET /operator/dashboard
        return view('operator/dashboard/index', [
            'title' => 'Dashboard Operator'
        ]);
    }
}
