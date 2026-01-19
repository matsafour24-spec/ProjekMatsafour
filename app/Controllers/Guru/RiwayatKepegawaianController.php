<?php

namespace App\Controllers\Guru;

use CodeIgniter\Controller;
use App\Services\RiwayatKepegawaianService;

class RiwayatKepegawaianController extends Controller
{
    protected RiwayatKepegawaianService $service;

    public function __construct()
    {
        $this->service = new RiwayatKepegawaianService();
    }

    public function index()
    {
        // GET /guru/riwayat-kepegawaian
        return view('guru/riwayat_kepegawaian/index', [
            'title' => 'Riwayat Kepegawaian'
        ]);
    }

    public function store()
    {
        // POST /guru/riwayat-kepegawaian/store
        // delegasi ke service (append-only)
        return redirect()->back()->with('success', 'Riwayat kepegawaian berhasil ditambahkan');
    }

    public function upload()
    {
        // POST /guru/riwayat-kepegawaian/upload
        // delegasi ke UploadService (fase berikutnya)
        return redirect()->back()->with('success', 'File SK berhasil diunggah');
    }
}
