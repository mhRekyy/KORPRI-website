<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProfilKorpriModel;

class ProfilKorpri extends BaseController
{
    protected $profilModel;

    public function __construct()
    {
        $this->profilModel = new ProfilKorpriModel();
    }

   public function index()
{
    $kategori = $this->request->getGet('kategori');
    $keyword  = $this->request->getGet('q');

    $model = $this->profilModel;
    $model->orderBy('urutan', 'ASC');

    // SEARCH
    if (!empty($keyword)) {
        $model->groupStart()
              ->like('nama', $keyword)
              ->orLike('jabatan', $keyword)
              ->groupEnd();
    }

    // FILTER KATEGORI (BERDASARKAN JABATAN, BUKAN STATUS)
    if ($kategori === 'anggota') {
        $model->like('jabatan', 'anggota');
    } elseif ($kategori === 'pimpinan') {
        $model->groupStart()
              ->like('jabatan', 'ketua')
              ->orLike('jabatan', 'wakil')
              ->groupEnd();
    }

    $data = [
        'title'    => 'Profil KORPRI',
        'profil'   => $model->findAll(), // ⬅️ AMBIL SEMUA (AKTIF + NONAKTIF)
        'kategori' => $kategori,
        'q'        => $keyword,
    ];

    return view('admin/profil_korpri/index', $data);
}

public function activate($id)
{
    $this->profilModel->update($id, [
        'is_active' => 1
    ]);

    return redirect()->to('/admin/profil-korpri')
        ->with('success', 'Data berhasil diaktifkan');
}


    public function create()
    {
        return view('admin/profil_korpri/create', [
            'title' => 'Tambah Profil KORPRI'
        ]);
    }

    public function store()
    {
        $this->profilModel->insert([
            'masa_bakti' => $this->request->getPost('masa_bakti'),
            'struktur'   => $this->request->getPost('struktur'),
            'nama'       => $this->request->getPost('nama'),
            'jabatan'    => $this->request->getPost('jabatan'),
            'urutan'     => $this->request->getPost('urutan'),
            'is_active'  => 1,
        ]);

        return redirect()->to('/admin/profil-korpri')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('admin/profil_korpri/edit', [
            'title' => 'Edit Profil KORPRI',
            'item'  => $this->profilModel->find($id)
        ]);
    }

    public function update($id)
    {
        $this->profilModel->update($id, [
            'masa_bakti' => $this->request->getPost('masa_bakti'),
            'struktur'   => $this->request->getPost('struktur'),
            'nama'       => $this->request->getPost('nama'),
            'jabatan'    => $this->request->getPost('jabatan'),
            'urutan'     => $this->request->getPost('urutan'),
        ]);

        return redirect()->to('/admin/profil-korpri')
            ->with('success', 'Data berhasil diperbarui');
    }

    public function deactivate($id)
{
    $this->profilModel->update($id, [
        'is_active' => 0
    ]);

    return redirect()->to('/admin/profil-korpri')
        ->with('success', 'Data berhasil dinonaktifkan');
}

}
