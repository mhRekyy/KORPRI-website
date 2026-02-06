<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SuratEdaranModel;

class SuratEdaran extends BaseController
{
    protected $suratEdaranModel;

    public function __construct()
    {
        $this->suratEdaranModel = new SuratEdaranModel();
    }

    // =========================
    // INDEX
    // =========================
    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        $query = $this->suratEdaranModel;

        if ($keyword) {
            $query->like('judul', $keyword);
        }

        $data = [
            'title'       => 'Surat Edaran',
            'keyword'     => $keyword,
            'suratEdaran' => $query->orderBy('created_at', 'DESC')
                                   ->paginate(10, 'surat_edaran'),
            'pager'       => $this->suratEdaranModel->pager
        ];

        return view('admin/surat_edaran/index', $data);
    }

    // =========================
    // CREATE
    // =========================
    public function create()
    {
        return view('admin/surat_edaran/create', [
            'title' => 'Tambah Surat Edaran'
        ]);
    }

    // =========================
    // STORE
    // =========================
    public function store()
    {
        $file = $this->request->getFile('file_pdf');
        $fileName = null;

        if ($file && $file->isValid()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/surat-edaran', $fileName);
        }

        $this->suratEdaranModel->save([
            'judul'         => $this->request->getPost('judul'),
            'instansi'      => $this->request->getPost('instansi'),
            'jenis_surat'   => $this->request->getPost('jenis_surat'),
            'masa_bakti'    => $this->request->getPost('masa_bakti'),
            'tanggal_surat' => $this->request->getPost('tanggal_surat'),
            'file_pdf'      => $fileName,
            'is_active'     => $this->request->getPost('is_active') ? 1 : 0
        ]);

        return redirect()->to('/admin/surat-edaran')
            ->with('success', 'Surat Edaran berhasil ditambahkan.');
    }

    // =========================
    // EDIT
    // =========================
    public function edit($id)
    {
        $data = $this->suratEdaranModel->find($id);

        if (!$data) {
            return redirect()->to('/admin/surat-edaran');
        }

        return view('admin/surat_edaran/edit', [
            'title' => 'Edit Surat Edaran',
            'data'  => $data
        ]);
    }

    // =========================
    // UPDATE
    // =========================
    public function update($id)
    {
        $dataLama = $this->suratEdaranModel->find($id);

        if (!$dataLama) {
            return redirect()->to('/admin/surat-edaran');
        }

        $file = $this->request->getFile('file_pdf');
        $fileName = $dataLama['file_pdf'];

        if ($file && $file->isValid()) {
            if ($fileName && file_exists('uploads/surat-edaran/' . $fileName)) {
                unlink('uploads/surat-edaran/' . $fileName);
            }

            $fileName = $file->getRandomName();
            $file->move('uploads/surat-edaran', $fileName);
        }

        $this->suratEdaranModel->update($id, [
            'judul'         => $this->request->getPost('judul'),
            'instansi'      => $this->request->getPost('instansi'),
            'jenis_surat'   => $this->request->getPost('jenis_surat'),
            'masa_bakti'    => $this->request->getPost('masa_bakti'),
            'tanggal_surat' => $this->request->getPost('tanggal_surat'),
            'file_pdf'      => $fileName,
            'is_active'     => $this->request->getPost('is_active') ? 1 : 0
        ]);

        return redirect()->to('/admin/surat-edaran')
            ->with('success', 'Surat Edaran berhasil diperbarui.');
    }

    // =========================
    // DELETE
    // =========================
    public function delete($id)
    {
        $data = $this->suratEdaranModel->find($id);

        if ($data) {
            if ($data['file_pdf'] && file_exists('uploads/surat-edaran/' . $data['file_pdf'])) {
                unlink('uploads/surat-edaran/' . $data['file_pdf']);
            }

            $this->suratEdaranModel->delete($id);
        }

        return redirect()->to('/admin/surat-edaran')
            ->with('success', 'Surat Edaran berhasil dihapus.');
    }

    // =========================
    // TOGGLE AKTIF
    // =========================
    public function toggle($id)
    {
        $data = $this->suratEdaranModel->find($id);

        if ($data) {
            $this->suratEdaranModel->update($id, [
                'is_active' => $data['is_active'] ? 0 : 1
            ]);
        }

        return redirect()->to('/admin/surat-edaran');
    }
}
