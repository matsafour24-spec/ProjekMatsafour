<?php

namespace App\Controllers\Operator;

use CodeIgniter\Controller;

class GuruController extends Controller
{
    public function index()
    {
        // GET /operator/guru
        return view('operator/guru/index', [
            'title' => 'Manajemen Guru'
        ]);
    }

    public function search()
    {
        // GET /operator/guru/search
        // Implementasi query akan dilakukan di PHASE service
        return $this->response->setJSON([
            'status'  => 'ok',
            'message' => 'Search endpoint siap'
        ]);
    }

    public function create()
    {
        // GET /operator/guru/create
        return view('operator/guru/form', [
            'title' => 'Tambah Guru'
        ]);
    }

    public function store()
    {
        // POST /operator/guru/store
        // delegasi ke service (PHASE berikutnya)
        return redirect()->to('/operator/guru')->with('success', 'Guru berhasil ditambahkan');
    }

    public function show($id)
    {
        // GET /operator/guru/{id}
        return view('operator/guru/form', [
            'title' => 'Detail Guru',
            'id'    => $id
        ]);
    }

    public function update($id)
    {
        // POST /operator/guru/{id}/update
        // delegasi ke service (PHASE berikutnya)
        return redirect()->to('/operator/guru')->with('success', 'Guru berhasil diperbarui');
    }

    public function deactivate($id)
    {
        // POST /operator/guru/{id}/deactivate
        // delegasi ke service (PHASE berikutnya)
        return redirect()->to('/operator/guru')->with('success', 'Guru dinonaktifkan');
    }
}
