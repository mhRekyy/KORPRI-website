<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PengumumanModel;

class Pengumuman extends BaseController
{
    protected $pengumumanModel;

    public function __construct()
    {
        $this->pengumumanModel = new PengumumanModel();
    }

    public function index()
    {
        $keyword     = $this->request->getGet('q');
        $kategori    = $this->request->getGet('kategori');
        $masa_bakti  = $this->request->getGet('masa_bakti');
        $status      = $this->request->getGet('status');

        $builder = $this->pengumumanModel;

        if ($keyword) {
            $builder->like('judul', $keyword);
        }

        if ($kategori) {
            $builder->where('kategori', $kategori);
        }

        if ($masa_bakti) {
            $builder->where('masa_bakti', $masa_bakti);
        }

        if ($status !== null && $status !== '') {
            $builder->where('is_active', $status);
        }

        $data = [
            'title'       => 'Pengumuman',
            'pengumuman'  => $builder->orderBy('tanggal_pengumuman', 'DESC')->paginate(10),
            'pager'       => $builder->pager,
        ];

        return view('admin/pengumuman/index', $data);
    }

    public function create()
    {
        return view('admin/pengumuman/create', [
            'title' => 'Tambah Pengumuman'
        ]);
    }

    public function store()
    {
        $file = $this->request->getFile('file_pdf');
        $fileName = null;

        if ($file && $file->isValid()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/pengumuman', $fileName);
        }

        $this->pengumumanModel->save([
            'judul'               => $this->request->getPost('judul'),
            'kategori'            => $this->request->getPost('kategori'),
            'masa_bakti'          => $this->request->getPost('masa_bakti'),
            'instansi'            => $this->request->getPost('instansi'),
            'tanggal_pengumuman'  => $this->request->getPost('tanggal_pengumuman'),
            'file_pdf'            => $fileName,
            'is_active'           => 1,
        ]);

        return redirect()->to('/admin/pengumuman')->with('success', 'Pengumuman berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('admin/pengumuman/edit', [
            'title' => 'Edit Pengumuman',
            'row'   => $this->pengumumanModel->find($id)
        ]);
    }

    public function update($id)
    {
        $row = $this->pengumumanModel->find($id);
        $file = $this->request->getFile('file_pdf');
        $fileName = $row['file_pdf'];

        if ($file && $file->isValid()) {
            if ($fileName && file_exists('uploads/pengumuman/' . $fileName)) {
                unlink('uploads/pengumuman/' . $fileName);
            }

            $fileName = $file->getRandomName();
            $file->move('uploads/pengumuman', $fileName);
        }

        $this->pengumumanModel->update($id, [
            'judul'               => $this->request->getPost('judul'),
            'kategori'            => $this->request->getPost('kategori'),
            'masa_bakti'          => $this->request->getPost('masa_bakti'),
            'instansi'            => $this->request->getPost('instansi'),
            'tanggal_pengumuman'  => $this->request->getPost('tanggal_pengumuman'),
            'file_pdf'            => $fileName,
        ]);

        return redirect()->to('/admin/pengumuman')->with('success', 'Pengumuman berhasil diperbarui');
    }

    public function delete($id)
    {
        $row = $this->pengumumanModel->find($id);

        if ($row['file_pdf'] && file_exists('uploads/pengumuman/' . $row['file_pdf'])) {
            unlink('uploads/pengumuman/' . $row['file_pdf']);
        }

        $this->pengumumanModel->delete($id);
        return redirect()->to('/admin/pengumuman');
    }

    public function toggle($id)
    {
        $row = $this->pengumumanModel->find($id);

        $this->pengumumanModel->update($id, [
            'is_active' => $row['is_active'] ? 0 : 1
        ]);

        return redirect()->to('/admin/pengumuman');
    }
}
