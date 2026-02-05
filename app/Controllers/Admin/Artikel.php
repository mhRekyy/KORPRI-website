<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    protected $artikelModel;

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }

    public function index()
    {
        $q      = $this->request->getGet('q');
        $status = $this->request->getGet('status');

        $model = $this->artikelModel;

        if ($q) {
            $model->like('title', $q);
        }

        if ($status !== null && $status !== '') {
            $model->where('is_active', $status);
        }

        $data = [
            'title'   => 'Manajemen Artikel',
            'artikel' => $model->paginate(10),
            'pager'   => $model->pager,
            'filter'  => [
                'q'      => $q,
                'status' => $status,
            ],
        ];

        return view('admin/artikel/index', $data);
    }

    public function create()
    {
        return view('admin/artikel/create', [
            'title' => 'Tambah Artikel'
        ]);
    }

    public function store()
    {
        $thumbnail = $this->_uploadThumbnail();

        $isActive = $this->request->getPost('is_active') ? 1 : 0;

        $this->artikelModel->insert([
            'title'        => $this->request->getPost('title'),
            'slug'         => url_title($this->request->getPost('title'), '-', true),
            'excerpt'      => $this->request->getPost('excerpt'),
            'content'      => $this->request->getPost('content'),
            'thumbnail'    => $thumbnail,
            'is_active'    => $isActive,
            'published_at' => $isActive ? date('Y-m-d H:i:s') : null,
        ]);

        return redirect()->to('/admin/artikel')
            ->with('success', 'Artikel berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('admin/artikel/edit', [
            'title'   => 'Edit Artikel',
            'artikel' => $this->artikelModel->find($id),
        ]);
    }

    public function update($id)
    {
        $artikel   = $this->artikelModel->find($id);
        $thumbnail = $this->_uploadThumbnail($artikel['thumbnail']);

        $isActive = $this->request->getPost('is_active') ? 1 : 0;

        $this->artikelModel->update($id, [
            'title'        => $this->request->getPost('title'),
            'slug'         => url_title($this->request->getPost('title'), '-', true),
            'excerpt'      => $this->request->getPost('excerpt'),
            'content'      => $this->request->getPost('content'),
            'thumbnail'    => $thumbnail,
            'is_active'    => $isActive,
            'published_at' => $isActive
                ? ($artikel['published_at'] ?? date('Y-m-d H:i:s'))
                : null,
        ]);

        return redirect()->to('/admin/artikel')
            ->with('success', 'Artikel berhasil diperbarui');
    }

    public function delete($id)
    {
        $artikel = $this->artikelModel->find($id);

        if ($artikel && $artikel['thumbnail']) {
            $path = 'uploads/artikel/' . $artikel['thumbnail'];
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $this->artikelModel->delete($id);

        return redirect()->to('/admin/artikel')
            ->with('success', 'Artikel berhasil dihapus');
    }

    public function toggle($id)
{
    $row = $this->artikelModel->find($id);

    if (!$row) {
        return redirect()->to(base_url('admin/artikel'));
    }

    $this->artikelModel->update($id, [
        'is_active' => $row['is_active'] ? 0 : 1,
    ]);

    return redirect()->to(base_url('admin/artikel'));
}


    // ===============================
    // PRIVATE HELPER
    // ===============================
    private function _uploadThumbnail($old = null)
    {
        $file = $this->request->getFile('thumbnail');

        if (!$file || !$file->isValid()) {
            return $old;
        }

        if ($old && file_exists('uploads/artikel/' . $old)) {
            unlink('uploads/artikel/' . $old);
        }

        $name = $file->getRandomName();
        $file->move('uploads/artikel', $name);

        return $name;
    }
}
