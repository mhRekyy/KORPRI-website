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
    $model = new \App\Models\SuratEdaranModel();

    $keyword = $this->request->getGet('keyword');

    $builder = $model
        ->select('surat_edaran.*, 
                  masa_bakti.nama as masa_bakti, 
                  jenis_surat_edaran.nama as jenis')
        ->join('masa_bakti', 'masa_bakti.id = surat_edaran.masa_bakti_id', 'left')
        ->join('jenis_surat_edaran', 'jenis_surat_edaran.id = surat_edaran.jenis_id', 'left')
        ->orderBy('tanggal_surat', 'DESC');

    if ($keyword) {
        $builder->like('surat_edaran.judul', $keyword);
    }

    $data['suratEdaran'] = $builder->paginate(10, 'surat_edaran');
    $data['pager']       = $model->pager;
    $data['keyword']     = $keyword;

    return view('admin/surat_edaran/index', $data);
}

    // =========================
    // CREATE
    // =========================
    public function create()
    {
        return view('admin/surat_edaran/create', [
            'title' => 'Tambah Surat Edaran',
            'masaBaktiList' => (new \App\Models\MasaBaktiModel())
                                    ->where('is_active', 1)
                                    ->orderBy('nama', 'DESC')
                                    ->findAll(),
            'jenisList' => (new \App\Models\JenisSuratEdaranModel())
                                    ->where('is_active', 1)
                                    ->orderBy('nama', 'ASC')
                                    ->findAll()
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
            'jenis_id'      => $this->request->getPost('jenis_id'),
            'masa_bakti_id' => $this->request->getPost('masa_bakti_id'),
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
        'data'  => $data,
        'masaBaktiList' => (new \App\Models\MasaBaktiModel())
                                ->where('is_active', 1)
                                ->orderBy('nama', 'DESC')
                                ->findAll(),
        'jenisList' => (new \App\Models\JenisSuratEdaranModel())
                                ->where('is_active', 1)
                                ->orderBy('nama', 'ASC')
                                ->findAll()
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
            'jenis_id'      => $this->request->getPost('jenis_id'),
            'masa_bakti_id' => $this->request->getPost('masa_bakti_id'),
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
