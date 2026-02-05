<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KeputusanModel;

class Keputusan extends BaseController
{
    protected $keputusanModel;

    protected $uploadPath = 'uploads/keputusan';
    protected $allowedExt = ['pdf', 'doc', 'docx'];
    protected $maxFileSize = 2048; // KB (2MB)

    public function __construct()
    {
        $this->keputusanModel = new KeputusanModel();
    }

    /**
     * INDEX
     */
    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        $builder = $this->keputusanModel;
        if ($keyword) {
            $builder = $builder->like('judul', $keyword);
        }

        $data = [
            'title'     => 'Data Keputusan',
            'keputusan' => $builder->orderBy('created_at', 'DESC')->paginate(10),
            'pager'     => $this->keputusanModel->pager,
            'keyword'   => $keyword
        ];

        return view('admin/keputusan/index', $data);
    }

    /**
     * CREATE
     */
    public function create()
    {
        return view('admin/keputusan/create', [
            'title' => 'Tambah Keputusan'
        ]);
    }

    /**
     * STORE
     */
    public function store()
    {
        $file = $this->request->getFile('file_pdf');
        $fileName = null;

        if ($file && $file->isValid()) {

            if ($file->getSizeByUnit('kb') > $this->maxFileSize) {
                return redirect()->back()->withInput()
                    ->with('error', 'Ukuran file maksimal 2MB');
            }

            if (!in_array($file->getClientExtension(), $this->allowedExt)) {
                return redirect()->back()->withInput()
                    ->with('error', 'File harus PDF atau DOCX');
            }

            $fileName = $file->getRandomName();
            $file->move($this->uploadPath, $fileName);
        }

        $this->keputusanModel->save([
            'judul'             => $this->request->getPost('judul'),
            'instansi'          => $this->request->getPost('instansi'),
            'jenis_keputusan'   => $this->request->getPost('jenis_keputusan'),
            'masa_bakti'        => $this->request->getPost('masa_bakti'),
            'tanggal_keputusan' => $this->request->getPost('tanggal_keputusan'),
            'file_pdf'          => $fileName,
            'is_active'         => $this->request->getPost('is_active') ?? 0,
        ]);

        return redirect()->to('/admin/keputusan')
            ->with('success', 'Data keputusan berhasil ditambahkan');
    }

    /**
     * EDIT
     */
    public function edit($id)
    {
        $keputusan = $this->keputusanModel->find($id);
        if (!$keputusan) {
            return redirect()->to('/admin/keputusan');
        }

        return view('admin/keputusan/edit', [
            'title'     => 'Edit Keputusan',
            'keputusan' => $keputusan
        ]);
    }

    /**
     * UPDATE
     */
    public function update($id)
    {
        $keputusan = $this->keputusanModel->find($id);
        if (!$keputusan) {
            return redirect()->to('/admin/keputusan');
        }

        $file = $this->request->getFile('file_pdf');
        $fileName = $keputusan['file_pdf'];

        if ($file && $file->isValid() && !$file->hasMoved()) {

            if ($file->getSizeByUnit('kb') > $this->maxFileSize) {
                return redirect()->back()->withInput()
                    ->with('error', 'Ukuran file maksimal 2MB');
            }

            if (!in_array($file->getClientExtension(), $this->allowedExt)) {
                return redirect()->back()->withInput()
                    ->with('error', 'File harus PDF atau DOCX');
            }

            if ($fileName && file_exists($this->uploadPath . '/' . $fileName)) {
                unlink($this->uploadPath . '/' . $fileName);
            }

            $fileName = $file->getRandomName();
            $file->move($this->uploadPath, $fileName);
        }

        $this->keputusanModel->update($id, [
            'judul'             => $this->request->getPost('judul'),
            'instansi'          => $this->request->getPost('instansi'),
            'jenis_keputusan'   => $this->request->getPost('jenis_keputusan'),
            'masa_bakti'        => $this->request->getPost('masa_bakti'),
            'tanggal_keputusan' => $this->request->getPost('tanggal_keputusan'),
            'file_pdf'          => $fileName,
            'is_active'         => $this->request->getPost('is_active') ?? 0,
        ]);

        return redirect()->to('/admin/keputusan')
            ->with('success', 'Data keputusan berhasil diperbarui');
    }

    /**
     * DELETE
     */
    public function delete($id)
    {
        $keputusan = $this->keputusanModel->find($id);

        if ($keputusan) {
            if ($keputusan['file_pdf'] && file_exists($this->uploadPath . '/' . $keputusan['file_pdf'])) {
                unlink($this->uploadPath . '/' . $keputusan['file_pdf']);
            }

            $this->keputusanModel->delete($id);
        }

        return redirect()->to('/admin/keputusan')
            ->with('success', 'Data keputusan berhasil dihapus');
    }

    /**
     * TOGGLE
     */
    public function toggle($id)
    {
        $keputusan = $this->keputusanModel->find($id);

        if ($keputusan) {
            $this->keputusanModel->update($id, [
                'is_active' => $keputusan['is_active'] ? 0 : 1
            ]);
        }

        return redirect()->to('/admin/keputusan');
    }
}
