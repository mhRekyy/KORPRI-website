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

    $berita = $model->orderBy('created_at', 'DESC')
                ->paginate(10, 'berita');

// 🔑 KUNCI: pertahankan query filter saat pagination
$model->pager->setPath(
    current_url() . '?' . http_build_query($this->request->getGet())
);

$data = [
    'berita'   => $berita,
    'pager'    => $model->pager,
    'q'        => $q,
    'kategori' => $kategori,
    'status'   => $status,
];

return view('admin/berita/index', $data);

}




    public function create()
    {
        return view('admin/berita/create', [
            'pageTitle' => 'Tambah Berita'
        ]);
    }

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
            'is_active' => $this->request->getPost('is_active') ?? 0,
        ]);

        return redirect()->to('/admin/berita')
            ->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('admin/berita/edit', [
            'pageTitle' => 'Edit Berita',
            'berita' => $this->beritaModel->find($id)
        ]);
    }

    public function update($id)
    {
        $berita = $this->beritaModel->find($id);
        $file = $this->request->getFile('gambar');
        $namaGambar = $berita['gambar'];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            if ($namaGambar && file_exists('uploads/berita/'.$namaGambar)) {
                unlink('uploads/berita/'.$namaGambar);
            }
            $namaGambar = $file->getRandomName();
            $file->move('uploads/berita', $namaGambar);
        }

        $this->beritaModel->update($id, [
            'judul'     => $this->request->getPost('judul'),
            'kategori'  => $this->request->getPost('kategori'),
            'konten'    => $this->request->getPost('konten'),
            'gambar'    => $namaGambar,
            'is_active' => $this->request->getPost('is_active') ?? 0,
        ]);

        return redirect()->to('/admin/berita')
            ->with('success', 'Berita berhasil diperbarui');
    }

    public function delete($id)
{
    $berita = $this->beritaModel->find($id);

    if (!$berita) {
        return redirect()->to('/admin/berita')
            ->with('error', 'Data berita tidak ditemukan');
    }

    // Hapus file gambar jika ada
    if (!empty($berita['gambar'])) {
        $path = 'uploads/berita/' . $berita['gambar'];
        if (file_exists($path)) {
            unlink($path);
        }
    }

    // Hapus data berita
    $this->beritaModel->delete($id);

    return redirect()->to('/admin/berita')
        ->with('success', 'Berita berhasil dihapus');
}

public function toggle($id)
{
    $berita = $this->beritaModel->find($id);

    if (!$berita) {
        return redirect()->to('/admin/berita')
            ->with('error', 'Data berita tidak ditemukan');
    }

    // Toggle status: 1 ↔ 0
    $statusBaru = $berita['is_active'] ? 0 : 1;

    $this->beritaModel->update($id, [
        'is_active' => $statusBaru
    ]);

    return redirect()->to('/admin/berita')
        ->with('success', 'Status berita berhasil diperbarui');
}


}


