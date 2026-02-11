<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriPeraturanModel;
use App\Models\PeraturanModel;

class Peraturan extends BaseController
{
    protected $peraturanModel;
    protected $kategoriModel;
    protected $masaBaktiModel;

    public function __construct()
    {
        $this->peraturanModel = new PeraturanModel(); // 🔥 WAJIB
        $this->kategoriModel  = new KategoriPeraturanModel();
    }


    // ==============================
    // INDEX
    // ==============================
 public function index()
{
    $keyword   = $this->request->getGet('keyword');
    $kategori  = $this->request->getGet('kategori_id'); // ✅ ambil dari dropdown

    $builder = $this->peraturanModel
        ->select('peraturan.*, 
                  masa_bakti.nama as masa_bakti,
                  kategori_peraturan.nama as kategori')
        ->join('masa_bakti', 'masa_bakti.id = peraturan.masa_bakti_id', 'left')
        ->join('kategori_peraturan', 'kategori_peraturan.id = peraturan.kategori_id', 'left')
        ->orderBy('peraturan.created_at', 'DESC');

    if (!empty($keyword)) {
        $builder->like('peraturan.judul', $keyword);
    }

    // ✅ FILTER DROPDOWN (AMAN)
    if (!empty($kategori)) {
        $builder->where('peraturan.kategori_id', $kategori);
    }

    $peraturan = $builder->paginate(10, 'peraturan');

    return view('admin/peraturan/index', [
        'title'     => 'Manajemen Peraturan',
        'peraturan' => $peraturan,
        'pager'     => $this->peraturanModel->pager,
        'keyword'   => $keyword,
        'kategori'  => $kategori,
        'kategoriList' => $this->kategoriModel
                                ->where('is_active', 1)
                                ->orderBy('nama', 'ASC')
                                ->findAll()
    ]);
}



    // ==============================
    // CREATE
    // ==============================
public function create()
{
    $masaBakti = (new \App\Models\MasaBaktiModel())
        ->where('is_active', 1)
        ->orderBy('nama', 'DESC')
        ->findAll();

    return view('admin/peraturan/create', [
        'title' => 'Tambah Peraturan',
        'masaBaktiOptions' => $masaBakti,
        'kategoriList' => $this->kategoriModel
                                ->where('is_active', 1)
                                ->orderBy('nama', 'ASC')
                                ->findAll()
    ]);
}


    // ==============================
    // STORE
    // ==============================
    public function store()
    {
        $file = $this->request->getFile('file');

        if (!$file || !$file->isValid()) {
            return redirect()->back()->withInput()->with('error', 'File peraturan wajib diupload.');
        }

        $fileName = $file->getRandomName();
        $file->move('uploads/peraturan', $fileName);

        dd($this->request->getPost());

        $this->peraturanModel->save([
            'judul'              => $this->request->getPost('judul'),
            'kategori_id'           => $this->request->getPost('kategori_id'),
            'instansi'           => $this->request->getPost('instansi'),
            'tanggal_penetapan'  => $this->request->getPost('tanggal_penetapan'),
            'masa_bakti_id'      => $this->request->getPost('masa_bakti_id'), // 🔥
            'file_pdf'           => $fileName,
            'is_active'          => $this->request->getPost('is_active') ?? 0,
        ]);

        return redirect()->to('/admin/peraturan')->with('success', 'Peraturan berhasil ditambahkan.');
    }

    // ==============================
    // EDIT
    // ==============================
public function edit($id)
{
    $peraturan = $this->peraturanModel->find($id);

    if (!$peraturan) {
        return redirect()->to('/admin/peraturan')->with('error', 'Data tidak ditemukan.');
    }

    $masaBakti = (new \App\Models\MasaBaktiModel())
        ->where('is_active', 1)
        ->orderBy('nama', 'DESC')
        ->findAll();

    return view('admin/peraturan/edit', [
    'title'     => 'Edit Peraturan',
    'peraturan' => $peraturan,
    'masaBaktiOptions' => $masaBakti,
    'kategoriList' => $this->kategoriModel
                            ->where('is_active', 1)
                            ->orderBy('nama', 'ASC')
                            ->findAll()
]);

}


    // ==============================
    // UPDATE
    // ==============================
    public function update($id)
    {
        $peraturan = $this->peraturanModel->find($id);

        if (!$peraturan) {
            return redirect()->to('/admin/peraturan')->with('error', 'Data tidak ditemukan.');
        }

        $file = $this->request->getFile('file');
        $fileName = $peraturan['file_pdf'];

        if ($file && $file->isValid()) {
            if ($fileName && file_exists('uploads/peraturan/' . $fileName)) {
                unlink('uploads/peraturan/' . $fileName);
            }

            $fileName = $file->getRandomName();
            $file->move('uploads/peraturan', $fileName);
        }

        $this->peraturanModel->update($id, [
            'judul'             => $this->request->getPost('judul'),
            'kategori_id'          => $this->request->getPost('kategori_id'),
            'instansi'          => $this->request->getPost('instansi'),
            'tanggal_penetapan' => $this->request->getPost('tanggal_penetapan'),
            'masa_bakti_id'     => $this->request->getPost('masa_bakti_id'), // 🔥
            'file_pdf'          => $fileName,
            'is_active'         => $this->request->getPost('is_active') ?? 0,
        ]);



        return redirect()->to('/admin/peraturan')->with('success', 'Peraturan berhasil diperbarui.');
    }

    // ==============================
    // DELETE
    // ==============================
    public function delete($id)
    {
        $peraturan = $this->peraturanModel->find($id);

        if ($peraturan) {
                    if ($peraturan['file_pdf'] && file_exists('uploads/peraturan/' . $peraturan['file_pdf'])) {
            unlink('uploads/peraturan/' . $peraturan['file_pdf']);
        }

            $this->peraturanModel->delete($id);
        }

        return redirect()->to('/admin/peraturan')->with('success', 'Peraturan berhasil dihapus.');
    }

    // ==============================
    // TOGGLE STATUS (OPSIONAL)
    // ==============================
    public function toggle($id)
    {
        $peraturan = $this->peraturanModel->find($id);

        if (!$peraturan) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $newStatus = ($peraturan['is_active'] == 1) ? 0 : 1;

        $this->peraturanModel->update($id, [
            'is_active' => $newStatus
        ]);

        return redirect()->back()->with('success', 'Status peraturan berhasil diubah.');
    }

}
