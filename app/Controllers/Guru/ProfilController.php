<?php

namespace App\Controllers\Guru;

use CodeIgniter\Controller;
use App\Services\GuruService;

class ProfilController extends Controller
{
    protected GuruService $service;

    public function __construct()
    {
        $this->service = new GuruService();
    }

    public function index()
    {
        // GET /guru/biodata
        return view('guru/profil/index', [
            'title' => 'Biodata'
        ]);
    }

    public function update()
    {
        // POST /guru/biodata/update
        // delegasi ke service (implementasi validasi di fase berikutnya)
        return redirect()->back()->with('success', 'Biodata berhasil diperbarui');
    }

    public function uploadFoto()
    {
        // POST /guru/biodata/upload-foto
        // delegasi ke UploadService (fase berikutnya)
        return redirect()->back()->with('success', 'Foto berhasil diunggah');
    }
}
