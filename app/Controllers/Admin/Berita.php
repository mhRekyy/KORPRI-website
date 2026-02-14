<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

class Berita extends BaseController
{
    protected $beritaModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
    }

    /* =======================
     * INDEX (LIST + FILTER)
     * ======================= */
    public function index()
    {
        $q        = $this->request->getGet('q');
        $kategori = $this->request->getGet('kategori');
        $status   = $this->request->getGet('status');

        $model = $this->beritaModel;

        if ($q) {
            $model->like('judul', $q);
        }

        if ($kategori) {
            $model->where('kategori', $kategori);
        }

        if ($status !== null && $status !== '') {
            $model->where('is_active', $status);
        }

        $berita = $model
            ->orderBy('created_at', 'DESC')
            ->paginate(10, 'berita');

    
        $model->pager->setPath(
            current_url() . '?' . http_build_query($this->request->getGet())
        );

        return view('admin/berita/index', [
            'berita'   => $berita,
            'pager'    => $model->pager,
            'q'        => $q,
            'kategori' => $kategori,
            'status'   => $status,
        ]);
    }

    /* =======================
     * CREATE
     * ======================= */
    public function create()
    {
        return view('admin/berita/create', [
            'pageTitle' => 'Tambah Berita'
        ]);
    }

    /* =======================
     * STORE
     * ======================= */
    public function store()
    {
        $file = $this->request->getFile('gambar');
        $namaGambar = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $namaGambar = $file->getRandomName();
            $file->move('uploads/berita', $namaGambar);
        }

        $this->beritaModel->insert([
            'judul'     => $this->request->getPost('judul'),
            'kategori'  => $this->request->getPost('kategori'),
            'konten'    => $this->request->getPost('konten'),
            'gambar'    => $namaGambar,
            'is_active' => $this->request->getPost('is_active') ? 1 : 0,
        ]);

        return redirect()->to('/admin/berita')
            ->with('success', 'Berita berhasil ditambahkan');
    }

    /* =======================
     * EDIT
     * ======================= */
    public function edit($id)
    {
        return view('admin/berita/edit', [
            'pageTitle' => 'Edit Berita',
            'berita'    => $this->beritaModel->find($id)
        ]);
    }

    /* =======================
     * UPDATE
     * ======================= */
    public function update($id)
    {
        $berita = $this->beritaModel->find($id);

        if (!$berita) {
            return redirect()->to('/admin/berita')
                ->with('error', 'Data berita tidak ditemukan');
        }

        $file = $this->request->getFile('gambar');
        $namaGambar = $berita['gambar'];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            if ($namaGambar && file_exists('uploads/berita/' . $namaGambar)) {
                unlink('uploads/berita/' . $namaGambar);
            }
            $namaGambar = $file->getRandomName();
            $file->move('uploads/berita', $namaGambar);
        }

        $this->beritaModel->update($id, [
            'judul'     => $this->request->getPost('judul'),
            'kategori'  => $this->request->getPost('kategori'),
            'konten'    => $this->request->getPost('konten'),
            'gambar'    => $namaGambar,
            'is_active' => $this->request->getPost('is_active') ? 1 : 0,
        ]);

        return redirect()->to('/admin/berita')
            ->with('success', 'Berita berhasil diperbarui');
    }

    /* =======================
     * DELETE (POPUP)
     * ======================= */
    public function delete($id)
    {
        $berita = $this->beritaModel->find($id);

        if (!$berita) {
            return redirect()->to('/admin/berita')
                ->with('error', 'Data berita tidak ditemukan');
        }

        if (!empty($berita['gambar'])) {
            $path = 'uploads/berita/' . $berita['gambar'];
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $this->beritaModel->delete($id);

        return redirect()->to('/admin/berita')
            ->with('success', 'Berita berhasil dihapus');
    }

    /* =======================
     * TOGGLE PUBLISH (POPUP)
     * ======================= */
    public function toggle($id)
    {
        $berita = $this->beritaModel->find($id);

        if (!$berita) {
            return redirect()->to('/admin/berita')
                ->with('error', 'Data berita tidak ditemukan');
        }

        $this->beritaModel->update($id, [
            'is_active' => $berita['is_active'] ? 0 : 1,
        ]);

        return redirect()->to('/admin/berita')
            ->with('success', 'Status berita berhasil diperbarui');
    }
}