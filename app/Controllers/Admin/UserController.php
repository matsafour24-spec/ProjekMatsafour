<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class UserController extends Controller
{
    public function index()
    {
        // GET /admin/operators
        return view('admin/operator/index', [
            'title' => 'Manajemen Operator'
        ]);
    }

    public function create()
    {
        // GET /admin/operators/create
        return view('admin/operator/form', [
            'title' => 'Tambah Operator'
        ]);
    }

    public function store()
    {
        // POST /admin/operators/store
        // delegasi ke service (akan diisi di PHASE berikutnya)
        return redirect()->to('/admin/operators')->with('success', 'Operator berhasil ditambahkan');
    }

    public function edit($id)
    {
        // GET /admin/operators/{id}/edit
        return view('admin/operator/form', [
            'title' => 'Edit Operator',
            'id'    => $id
        ]);
    }

    public function update($id)
    {
        // POST /admin/operators/{id}/update
        // delegasi ke service (akan diisi di PHASE berikutnya)
        return redirect()->to('/admin/operators')->with('success', 'Operator berhasil diperbarui');
    }

    public function deactivate($id)
    {
        // POST /admin/operators/{id}/deactivate
        // delegasi ke service (akan diisi di PHASE berikutnya)
        return redirect()->to('/admin/operators')->with('success', 'Operator dinonaktifkan');
    }
}
