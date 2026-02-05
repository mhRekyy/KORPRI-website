<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PeraturanModel;

class Peraturan extends BaseController
{
    protected $peraturanModel;

    public function __construct()
    {
        $this->peraturanModel = new PeraturanModel();
    }

    // ==============================
    // INDEX
    // ==============================
    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $peraturan = $this->peraturanModel
                ->like('judul', $keyword)
                ->orderBy('created_at', 'DESC')
                ->paginate(10, 'peraturan');
        } else {
            $peraturan = $this->peraturanModel
                ->orderBy('created_at', 'DESC')
                ->paginate(10, 'peraturan');
        }

        $data = [
            'title'      => 'Manajemen Peraturan',
            'peraturan'  => $peraturan,
            'pager'      => $this->peraturanModel->pager,
            'keyword'    => $keyword,
        ];

        return view('admin/peraturan/index', $data);
    }

    // ==============================
    // CREATE
    // ==============================
    public function create()
    {
        return view('admin/peraturan/create', [
            'title' => 'Tambah Peraturan'
        ]);
    }

    // ==============================
    // STORE
    // ==============================
    public function store()
    {
        $file = $this->request->getFile('file');

        if (!$file || !$file->isValid()) {
            return redirect()->back()->withInput()->with('error', 'File peraturan wajib diupload.');
        }

        $fileName = $file->getRandomName();
        $file->move('uploads/peraturan', $fileName);

        $this->peraturanModel->save([
            'judul'              => $this->request->getPost('judul'),
            'kategori'           => $this->request->getPost('kategori'),
            'instansi'           => $this->request->getPost('instansi'),
            'tanggal_penetapan'  => $this->request->getPost('tanggal_penetapan'),
            'masa_bakti'         => $this->request->getPost('masa_bakti'),
            'file_pdf'           => $fileName,
            'is_active'          => $this->request->getPost('is_active') ?? 0,
        ]);


        return redirect()->to('/admin/peraturan')->with('success', 'Peraturan berhasil ditambahkan.');
    }

    // ==============================
    // EDIT
    // ==============================
    public function edit($id)
    {
        $peraturan = $this->peraturanModel->find($id);

        if (!$peraturan) {
            return redirect()->to('/admin/peraturan')->with('error', 'Data tidak ditemukan.');
        }

        return view('admin/peraturan/edit', [
            'title'     => 'Edit Peraturan',
            'peraturan' => $peraturan,
        ]);
    }

    // ==============================
    // UPDATE
    // ==============================
    public function update($id)
    {
        $peraturan = $this->peraturanModel->find($id);

        if (!$peraturan) {
            return redirect()->to('/admin/peraturan')->with('error', 'Data tidak ditemukan.');
        }

        $file = $this->request->getFile('file');
        $fileName = $peraturan['file_pdf'];

        if ($file && $file->isValid()) {
            if ($fileName && file_exists('uploads/peraturan/' . $fileName)) {
                unlink('uploads/peraturan/' . $fileName);
            }

            $fileName = $file->getRandomName();
            $file->move('uploads/peraturan', $fileName);
        }

        $this->peraturanModel->update($id, [
            'judul'             => $this->request->getPost('judul'),
            'kategori'          => $this->request->getPost('kategori'),
            'instansi'          => $this->request->getPost('instansi'),
            'tanggal_penetapan' => $this->request->getPost('tanggal_penetapan'),
            'masa_bakti'        => $this->request->getPost('masa_bakti'),
            'file_pdf'          => $fileName,
            'is_active'         => $this->request->getPost('is_active') ?? 0,
        ]);


        return redirect()->to('/admin/peraturan')->with('success', 'Peraturan berhasil diperbarui.');
    }

    // ==============================
    // DELETE
    // ==============================
    public function delete($id)
    {
        $peraturan = $this->peraturanModel->find($id);

        if ($peraturan) {
            if ($peraturan['file'] && file_exists('uploads/peraturan/' . $peraturan['file'])) {
                unlink('uploads/peraturan/' . $peraturan['file']);
            }

            $this->peraturanModel->delete($id);
        }

        return redirect()->to('/admin/peraturan')->with('success', 'Peraturan berhasil dihapus.');
    }

    // ==============================
    // TOGGLE STATUS (OPSIONAL)
    // ==============================
    public function toggle($id)
    {
        $peraturan = $this->peraturanModel->find($id);

        if (!$peraturan) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $newStatus = ($peraturan['is_active'] == 1) ? 0 : 1;

        $this->peraturanModel->update($id, [
            'is_active' => $newStatus
        ]);

        return redirect()->back()->with('success', 'Status peraturan berhasil diubah.');
    }

}
