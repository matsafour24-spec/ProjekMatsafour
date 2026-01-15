<?php

namespace App\Controllers\Guru;

use CodeIgniter\Controller;
use App\Services\KeluargaService;

class KeluargaController extends Controller
{
    protected KeluargaService $service;

    public function __construct()
    {
        $this->service = new KeluargaService();
    }

    public function index()
    {
        // GET /guru/keluarga
        return view('guru/keluarga/index', [
            'title' => 'Keluarga'
        ]);
    }

    public function update()
    {
        // POST /guru/keluarga/update
        // delegasi ke service (validasi detail di fase berikutnya)
        return redirect()->back()->with('success', 'Data keluarga berhasil diperbarui');
    }
}
