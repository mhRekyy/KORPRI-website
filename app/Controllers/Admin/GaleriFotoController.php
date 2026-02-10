<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GaleriKegiatanModel;
use App\Models\GaleriFotoModel;

class GaleriFotoController extends BaseController
{
    protected $kegiatanModel;
    protected $fotoModel;

    public function __construct()
    {
        $this->kegiatanModel = new GaleriKegiatanModel();
        $this->fotoModel     = new GaleriFotoModel();

        helper('admin_log');
    }

    /**
     * ===============================
     * INDEX - DAFTAR KEGIATAN
     * ===============================
     */
    public function index()
    {
        return view('admin/galeri/foto/index', [
            'pageTitle' => 'Galeri Foto Kegiatan',
            'kegiatan'  => $this->kegiatanModel->getWithFotoCount(),
        ]);
    }

    /**
     * ===============================
     * CREATE - FORM TAMBAH KEGIATAN
     * ===============================
     */
    public function create()
    {
        return view('admin/galeri/foto/create', [
            'pageTitle' => 'Tambah Kegiatan',
        ]);
    }

    /**
     * ===============================
     * STORE - SIMPAN KEGIATAN
     * ===============================
     */
    public function store()
    {
        $rules = [
            'judul_kegiatan'   => 'required|max_length[255]',
            'tanggal_kegiatan' => 'required|valid_date',
            'lokasi'           => 'permit_empty|max_length[255]',
            'deskripsi'        => 'permit_empty',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->kegiatanModel->insert([
            'judul_kegiatan'   => $this->request->getPost('judul_kegiatan'),
            'tanggal_kegiatan' => $this->request->getPost('tanggal_kegiatan'),
            'lokasi'           => $this->request->getPost('lokasi'),
            'deskripsi'        => $this->request->getPost('deskripsi'),
            'created_at'       => date('Y-m-d H:i:s'),
        ]);

        $id = $this->kegiatanModel->getInsertID();

        admin_log(
            'create',
            '[GALERI FOTO] Tambah kegiatan: ' . $this->request->getPost('judul_kegiatan'),
            $id
        );

        return redirect()->to('/admin/galeri/foto')->with('success', 'Kegiatan berhasil ditambahkan');
    }

    /**
     * ===============================
     * EDIT - FORM EDIT KEGIATAN
     * ===============================
     */
    public function edit($id)
    {
        $kegiatan = $this->kegiatanModel->find($id);

        if (! $kegiatan) {
            return redirect()->to('/admin/galeri/foto')->with('error', 'Data tidak ditemukan');
        }

        return view('admin/galeri/foto/edit', [
            'pageTitle' => 'Edit Kegiatan',
            'kegiatan'  => $kegiatan,
            'foto'      => $this->fotoModel->getByKegiatan($id),
        ]);
    }

    /**
     * ===============================
     * UPDATE - SIMPAN PERUBAHAN
     * ===============================
     */
    public function update($id)
    {
        $kegiatan = $this->kegiatanModel->find($id);

        if (! $kegiatan) {
            return redirect()->to('/admin/galeri/foto')->with('error', 'Data tidak ditemukan');
        }

        $rules = [
            'judul_kegiatan'   => 'required|max_length[255]',
            'tanggal_kegiatan' => 'required|valid_date',
            'lokasi'           => 'permit_empty|max_length[255]',
            'deskripsi'        => 'permit_empty',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->kegiatanModel->update($id, [
            'judul_kegiatan'   => $this->request->getPost('judul_kegiatan'),
            'tanggal_kegiatan' => $this->request->getPost('tanggal_kegiatan'),
            'lokasi'           => $this->request->getPost('lokasi'),
            'deskripsi'        => $this->request->getPost('deskripsi'),
            'updated_at'       => date('Y-m-d H:i:s'),
        ]);

        admin_log(
            'update',
            '[GALERI FOTO] Edit kegiatan: ' . $this->request->getPost('judul_kegiatan'),
            $id
        );

        return redirect()->to('/admin/galeri/foto')->with('success', 'Kegiatan berhasil diperbarui');
    }

    /**
     * ===============================
     * DELETE - HAPUS KEGIATAN
     * ===============================
     */
    public function delete($id)
    {
        $kegiatan = $this->kegiatanModel->find($id);

        if (! $kegiatan) {
            return redirect()->to('/admin/galeri/foto')->with('error', 'Data tidak ditemukan');
        }

        $this->kegiatanModel->delete($id);

        admin_log(
            'delete',
            '[GALERI FOTO] Hapus kegiatan: ' . $kegiatan['judul_kegiatan'],
            $id
        );

        return redirect()->to('/admin/galeri/foto')->with('success', 'Kegiatan berhasil dihapus');
    }

    /**
     * ===============================
     * KELOLA FOTO PER KEGIATAN
     * ===============================
     */
    public function kelolaFoto($kegiatanId)
    {
        $kegiatan = $this->kegiatanModel->find($kegiatanId);

        if (! $kegiatan) {
            return redirect()->to('/admin/galeri/foto')->with('error', 'Data tidak ditemukan');
        }

        return view('admin/galeri/foto/kelola_foto', [
            'pageTitle' => 'Kelola Foto Kegiatan',
            'kegiatan'  => $kegiatan,
            'foto'      => $this->fotoModel->getByKegiatan($kegiatanId),
        ]);
    }

    /**
     * ===============================
     * UPLOAD FOTO (MAX 6)
     * ===============================
     */
    public function uploadFoto($kegiatanId)
    {
        $kegiatan   = $this->kegiatanModel->find($kegiatanId);
        $jumlahFoto = $this->fotoModel->countByKegiatan($kegiatanId);
        $files      = $this->request->getFiles()['foto'] ?? [];

        if (! $kegiatan) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        if (($jumlahFoto + count($files)) > 6) {
            return redirect()->back()->with('error', 'Maksimal 6 foto per kegiatan');
        }

        $uploaded = 0;

        foreach ($files as $file) {
            if (! $file->isValid()) continue;

            if (! in_array($file->getMimeType(), ['image/jpeg', 'image/png'])) {
                return redirect()->back()->with('error', 'Format foto harus JPG atau PNG');
            }

            if ($file->getSize() > 2 * 1024 * 1024) {
                return redirect()->back()->with('error', 'Ukuran foto maksimal 2MB');
            }

            $namaFile = 'kegiatan_' . $kegiatanId . '_' . uniqid() . '.' . $file->getExtension();
            $file->move(ROOTPATH . 'public/uploads/galeri/foto', $namaFile);

            $this->fotoModel->insert([
                'galeri_kegiatan_id' => $kegiatanId,
                'file_name'          => $namaFile,
                'created_at'         => date('Y-m-d H:i:s'),
            ]);

            $uploaded++;
        }

        if ($uploaded > 0) {
            admin_log(
                'upload',
                '[GALERI FOTO] Upload ' . $uploaded . ' foto ke kegiatan: ' . $kegiatan['judul_kegiatan'],
                $kegiatanId
            );
        }

        return redirect()->back()->with('success', 'Foto berhasil diupload');
    }

    /**
     * ===============================
     * HAPUS FOTO SATUAN
     * ===============================
     */
    public function hapusFoto($fotoId)
    {
        $foto = $this->fotoModel->find($fotoId);

        if (! $foto) {
            return redirect()->back()->with('error', 'Foto tidak ditemukan');
        }

        $path = ROOTPATH . 'public/uploads/galeri/foto/' . $foto['file_name'];

        if (is_file($path)) {
            unlink($path);
        }

        $this->fotoModel->delete($fotoId);

        admin_log(
            'delete',
            '[GALERI FOTO] Hapus foto: ' . $foto['file_name'],
            $fotoId
        );

        return redirect()->back()->with('success', 'Foto berhasil dihapus');
    }
}
