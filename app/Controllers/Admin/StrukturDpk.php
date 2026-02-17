<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StrukturDPKModel;

class StrukturDpk extends BaseController
{
    protected $strukturModel;

    public function __construct()
    {
        $this->strukturModel = new StrukturDPKModel();
    }

    // ===============================
    // INDEX (TREE VIEW)
    // ===============================
   public function index()
{   
    return view('admin/struktur_dpk/index', [
        'title' => 'Struktur DPK',
        'rows'  => $this->strukturModel->getAllWithParent(),
    ]);
}



    // ===============================
    // CREATE
    // ===============================
    public function create()
{
    return redirect()->to('/admin/struktur-dpk');
}

    // ===============================
    // STORE
    // ===============================
    public function store()
{
    return redirect()->to('/admin/struktur-dpk');
}




    // ===============================
    // EDIT
    // ===============================
    public function edit($id)
    {
        $data = $this->strukturModel->find($id);

        if (!$data) {
            return redirect()->to('/admin/struktur-dpk');
        }

        return view('admin/struktur_dpk/edit', [
            'title'   => 'Edit Struktur DPK',
            'data'    => $data,
            'parents' => $this->strukturModel
                                ->where('id !=', $id)
                                ->orderBy('level', 'ASC')
                                ->orderBy('urutan', 'ASC')
                                ->findAll(),
        ]);
    }

    // ===============================
    // UPDATE
    // ===============================
    public function update($id)
{
    $parentId = $this->request->getPost('parent_id');
    $jabatan  = trim($this->request->getPost('jabatan'));
    $urutan   = (int) $this->request->getPost('urutan');
    $nama     = trim($this->request->getPost('nama'));

    $old = $this->strukturModel->find($id);
    if (!$old) {
        return redirect()->back()->with('error', 'Data tidak ditemukan');
    }

    // hitung level otomatis
    $level = 1;
    if ($parentId) {
        $parent = $this->strukturModel->find($parentId);
        $level = $parent ? $parent['level'] + 1 : 1;
    }

    // UPDATE LANGSUNG (TANPA DELETE)
    $this->strukturModel->update($id, [
        'parent_id' => $parentId ?: null,
        'jabatan'   => $jabatan,
        'nama'      => $nama, 
        'level'     => $level,
        'urutan'    => $urutan,
    ]);

    return redirect()
        ->to('/admin/struktur-dpk')
        ->with('success', 'Struktur berhasil diperbarui');
}




    // ===============================
    // DELETE
    // ===============================
    public function delete($id)
{
    if ($this->strukturModel->hasChildren($id)) {
        return redirect()
            ->back()
            ->with('error', 'Tidak bisa menghapus. Struktur ini masih memiliki turunan.');
    }

    $this->strukturModel->delete($id);

    return redirect()
        ->back()
        ->with('success', 'Struktur berhasil dihapus');
}



    public function getAllWithParent()
{
    return $this->select('struktur_dpk.*, p.jabatan AS parent_jabatan, p.nama AS parent_nama')
                ->join('struktur_dpk p', 'p.id = struktur_dpk.parent_id', 'left')
                ->orderBy('level', 'ASC')
                ->orderBy('urutan', 'ASC')
                ->findAll();
}

}
