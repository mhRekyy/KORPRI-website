<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SekretarisJenderalModel;

class SekretarisJenderalController extends BaseController
{
    protected $sekjenModel;

    public function __construct()
    {
        $this->sekjenModel = new SekretarisJenderalModel();
    }

    /**
     * ===============================
     * LIST DATA
     * ===============================
     */
    public function index()
    {
        $data = [
            'title' => 'Profil Sekretaris Jenderal',
            'sekjen' => $this->sekjenModel->getAllAdmin(),
        ];

        return view('admin/sekretaris_jenderal/index', $data);
    }

    /**
     * ===============================
     * FORM CREATE
     * ===============================
     */
    public function create()
    {
        return view('admin/sekretaris_jenderal/create', [
            'title' => 'Tambah Sekretaris Jenderal',
        ]);
    }

    /**
     * ===============================
     * STORE DATA
     * ===============================
     */

//     public function store()
// {
//     dd('STORE TERPANGGIL');

    public function store()
{
    $file = $this->request->getFile('foto');
    $fotoName = null;

    if ($file && $file->isValid() && !$file->hasMoved()) {
        $fotoName = $file->getRandomName();
        $file->move(FCPATH . 'assets/img/sekjen', $fotoName);
    }

    $this->sekjenModel->insert([
        'nama'               => $this->request->getPost('nama'),
        'foto'               => $fotoName,
        'masa_jabat_mulai'   => $this->request->getPost('masa_jabat_mulai'),
        'masa_jabat_selesai' => $this->request->getPost('masa_jabat_selesai') ?: null,
        'urutan'             => $this->request->getPost('urutan') ?? 0,
        'is_active'          => $this->request->getPost('is_active') ?? 1,
    ]);

    return redirect()
        ->to('/admin/sekretaris-jenderal')
        ->with('success', 'Data berhasil ditambahkan');
}


    /**
     * ===============================
     * FORM EDIT
     * ===============================
     */
    public function edit($id)
    {
        $sekjen = $this->sekjenModel->find($id);

        if (!$sekjen) {
            return redirect()->to('/admin/sekretaris-jenderal')->with('error', 'Data tidak ditemukan');
        }

        return view('admin/sekretaris_jenderal/edit', [
            'title' => 'Edit Sekretaris Jenderal',
            'sekjen' => $sekjen,
        ]);
    }

    /**
     * ===============================
     * UPDATE DATA
     * ===============================
     */
    public function update($id)
    {
        $sekjen = $this->sekjenModel->find($id);

        if (!$sekjen) {
            return redirect()->to('/admin/sekretaris-jenderal')->with('error', 'Data tidak ditemukan');
        }

        $rules = [
            'nama' => 'required|min_length[3]',
            'masa_jabat_mulai' => 'required|numeric|exact_length[4]',
            'masa_jabat_selesai' => 'required|numeric|exact_length[4]',
            'foto' => 'if_exist|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,2048]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $dataUpdate = [
            'nama' => $this->request->getPost('nama'),
            'masa_jabat_mulai' => $this->request->getPost('masa_jabat_mulai'),
            'masa_jabat_selesai' => $this->request->getPost('masa_jabat_selesai'),
            'urutan' => $this->request->getPost('urutan') ?? 0,
            'is_active' => $this->request->getPost('is_active') ?? 1,
        ];

        $file = $this->request->getFile('foto');
        if ($file && $file->isValid()) {
            $namaFoto = $file->getRandomName();
            $file->move(FCPATH . 'assets/img/sekjen/', $namaFoto);

            if (!empty($sekjen['foto']) && file_exists(FCPATH . 'assets/img/sekjen/' . $sekjen['foto'])) {
                unlink(FCPATH . 'assets/img/sekjen/' . $sekjen['foto']);
            }

            $dataUpdate['foto'] = $namaFoto;
        }

        $this->sekjenModel->update($id, $dataUpdate);

        return redirect()->to('/admin/sekretaris-jenderal')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * ===============================
     * DELETE DATA
     * ===============================
     */
    public function delete($id)
    {
        $sekjen = $this->sekjenModel->find($id);

        if ($sekjen) {
            if (!empty($sekjen['foto']) && file_exists(FCPATH . 'assets/img/sekjen/' . $sekjen['foto'])) {
                unlink(FCPATH . 'assets/img/sekjen/' . $sekjen['foto']);
            }

            $this->sekjenModel->delete($id);
        }

        return redirect()->to('/admin/sekretaris-jenderal')->with('success', 'Data berhasil dihapus');
    }

    /**
     * ===============================
     * TOGGLE AKTIF
     * ===============================
     */
    public function toggle($id)
    {
        $sekjen = $this->sekjenModel->find($id);

        if ($sekjen) {
            $this->sekjenModel->update($id, [
                'is_active' => $sekjen['is_active'] ? 0 : 1,
            ]);
        }

        return redirect()->to('/admin/sekretaris-jenderal');
    }
}
