<?php

namespace App\Controllers\Guru;

use CodeIgniter\Controller;
use App\Services\KepegawaianService;

class KepegawaianController extends Controller
{
    protected KepegawaianService $service;

    public function __construct()
    {
        $this->service = new KepegawaianService();
    }

    public function index()
    {
        // GET /guru/kepegawaian
        return view('guru/kepegawaian/index', [
            'title' => 'Kepegawaian'
        ]);
    }

    public function update()
    {
        // POST /guru/kepegawaian/update
        // delegasi ke service (validasi detail di fase berikutnya)
        return redirect()->back()->with('success', 'Data kepegawaian berhasil diperbarui');
    }

    public function uploadSK()
    {
        // POST /guru/kepegawaian/upload-sk
        // delegasi ke UploadService (fase berikutnya)
        return redirect()->back()->with('success', 'File SK berhasil diunggah');
    }
}
