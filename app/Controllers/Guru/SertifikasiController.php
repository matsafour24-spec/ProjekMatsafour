<?php

namespace App\Controllers\Guru;

use CodeIgniter\Controller;
use App\Services\SertifikasiService;

class SertifikasiController extends Controller
{
    protected SertifikasiService $service;

    public function __construct()
    {
        $this->service = new SertifikasiService();
    }

    public function index()
    {
        // GET /guru/sertifikasi
        return view('guru/sertifikasi/index', [
            'title' => 'Sertifikasi'
        ]);
    }

    public function update()
    {
        // POST /guru/sertifikasi/update
        // delegasi ke service (validasi detail di fase berikutnya)
        return redirect()->back()->with('success', 'Data sertifikasi berhasil diperbarui');
    }

    public function upload()
    {
        // POST /guru/sertifikasi/upload
        // delegasi ke UploadService (fase berikutnya)
        return redirect()->back()->with('success', 'File sertifikat berhasil diunggah');
    }
}
