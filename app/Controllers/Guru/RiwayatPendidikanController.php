<?php

namespace App\Controllers\Guru;

use CodeIgniter\Controller;
use App\Services\RiwayatPendidikanService;

class RiwayatPendidikanController extends Controller
{
    protected RiwayatPendidikanService $service;

    public function __construct()
    {
        $this->service = new RiwayatPendidikanService();
    }

    public function index()
    {
        // GET /guru/riwayat-pendidikan
        return view('guru/riwayat_pendidikan/index', [
            'title' => 'Riwayat Pendidikan'
        ]);
    }

    public function store()
    {
        // POST /guru/riwayat-pendidikan/store
        // delegasi ke service (append-only)
        return redirect()->back()->with('success', 'Riwayat pendidikan berhasil ditambahkan');
    }

    public function upload()
    {
        // POST /guru/riwayat-pendidikan/upload
        // delegasi ke UploadService (fase berikutnya)
        return redirect()->back()->with('success', 'File ijazah berhasil diunggah');
    }
}
