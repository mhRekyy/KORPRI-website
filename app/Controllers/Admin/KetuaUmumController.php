<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KetuaUmumModel;

class KetuaUmumController extends BaseController
{
    protected $ketuaModel;

    public function __construct()
    {
        $this->ketuaModel = new KetuaUmumModel();
    }

    public function index()
    {
        $data['title'] = 'Profil Ketua Umum';
        $data['list']  = $this->ketuaModel
            ->orderBy('urutan', 'ASC')
            ->orderBy('masa_jabat_mulai', 'DESC')
            ->findAll();

        return view('admin/ketua_umum/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Ketua Umum';
        return view('admin/ketua_umum/create', $data);
    }

    public function store()
    {
        $file = $this->request->getFile('foto');
        $fotoName = null;

        if ($file && $file->isValid()) {
            $fotoName = $file->getRandomName();
            $file->move('assets/img/ketua', $fotoName);
        }

        $this->ketuaModel->insert([
            'nama'               => $this->request->getPost('nama'),
            'foto'               => $fotoName,
            'masa_jabat_mulai'   => $this->request->getPost('masa_jabat_mulai'),
            'masa_jabat_selesai' => $this->request->getPost('masa_jabat_selesai') ?: null,
            'urutan'             => $this->request->getPost('urutan') ?? 0,
            'is_active'          => $this->request->getPost('is_active') ?? 1,
        ]);

        return redirect()->to('/admin/ketua-umum')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Ketua Umum';
        $data['row']   = $this->ketuaModel->find($id);

        return view('admin/ketua_umum/edit', $data);
    }



   public function update($id)
{
    $row  = $this->ketuaModel->find($id);

    if (!$row) {
        return redirect()->back()->with('error', 'Data tidak ditemukan');
    }

    $file = $this->request->getFile('foto');
    $fotoName = $row['foto'];

    if ($file && $file->isValid() && !$file->hasMoved()) {

        // 🔑 PATH FOTO YANG BENAR
        $oldPath = FCPATH . 'assets/img/ketua/' . $fotoName;

        // hapus foto lama jika ada
        if ($fotoName && file_exists($oldPath)) {
            unlink($oldPath);
        }

        // upload foto baru
        $fotoName = $file->getRandomName();
        $file->move(FCPATH . 'assets/img/ketua', $fotoName);
    }

    $this->ketuaModel->update($id, [
        'nama'               => $this->request->getPost('nama'),
        'foto'               => $fotoName,
        'masa_jabat_mulai'   => $this->request->getPost('masa_jabat_mulai'),
        'masa_jabat_selesai' => $this->request->getPost('masa_jabat_selesai') ?: null,
        'urutan'             => $this->request->getPost('urutan') ?? 0,
        'is_active'          => $this->request->getPost('is_active') ?? 1,
    ]);

    return redirect()->to('/admin/ketua-umum')
        ->with('success', 'Data berhasil diupdate');
}



    public function delete($id)
    {
        $row = $this->ketuaModel->find($id);

        if (!$row) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        // 🔑 PATH FOTO YANG BENAR
        if (!empty($row['foto'])) {
            $fotoPath = FCPATH . 'assets/img/ketua/' . $row['foto'];

            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }

        $this->ketuaModel->delete($id);

        return redirect()->to('/admin/ketua-umum')
            ->with('success', 'Data berhasil dihapus');
    }




    public function toggle($id)
{
    $row = $this->ketuaModel->find($id);

    if (!$row) {
        return redirect()->back()->with('error', 'Data tidak ditemukan');
    }

    // Kalau mau AKTIFKAN → nonaktifkan semua dulu
    if ($row['is_active'] == 0) {
        $this->ketuaModel
            ->where('is_active', 1)
            ->set(['is_active' => 0])
            ->update();
    }

    $this->ketuaModel->update($id, [
        'is_active' => $row['is_active'] ? 0 : 1
    ]);

    return redirect()->back()->with('success', 'Status berhasil diubah');
}


}
