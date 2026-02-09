<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class UserAdmin extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    // ===============================
    // HELPER: WAJIB SUPER ADMIN
    // ===============================
    private function mustBeSuperAdmin()
    {
        if (session()->get('admin_role') !== 'super_admin') {
            return redirect()->to('/admin/dashboard')
                ->with('error', 'Anda tidak memiliki akses.');
        }

        return null;
    }

    // ===============================
    // LIST ADMIN (SEMUA BOLEH LIHAT)
    // ===============================
    public function index()
    {
        $data['admins'] = $this->adminModel->findAll();
        return view('admin/user_admin/index', $data);
    }

    // ===============================
    // FORM TAMBAH ADMIN (SUPER ADMIN)
    // ===============================
    public function create()
    {
        if ($redirect = $this->mustBeSuperAdmin()) {
            return $redirect;
        }

        return view('admin/user_admin/create');
    }

    // ===============================
    // SIMPAN ADMIN (SUPER ADMIN)
    // ===============================
    public function store()
    {
        if ($redirect = $this->mustBeSuperAdmin()) {
            return $redirect;
        }

        // Cek email unik
        if ($this->adminModel->where('email', $this->request->getPost('email'))->first()) {
            return redirect()->back()->with('error', 'Email sudah digunakan.');
        }

        $this->adminModel->insert([
            'name'      => $this->request->getPost('name'),
            'email'     => $this->request->getPost('email'),
            'password'  => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'is_active' => 1,
            'role'      => 'admin', // default admin biasa
        ]);

        return redirect()->to('/admin/user-admin');
    }

    // ===============================
    // FORM EDIT ADMIN (SUPER ADMIN)
    // ===============================
    public function edit($id)
    {
        if ($redirect = $this->mustBeSuperAdmin()) {
            return $redirect;
        }

        $data['admin'] = $this->adminModel->find($id);

        if (! $data['admin']) {
            return redirect()->to('/admin/user-admin');
        }

        return view('admin/user_admin/edit', $data);
    }

    // ===============================
    // UPDATE ADMIN (SUPER ADMIN)
    // ===============================
    public function update($id)
    {
        if ($redirect = $this->mustBeSuperAdmin()) {
            return $redirect;
        }

        $adminTarget = $this->adminModel->find($id);
        if (! $adminTarget) {
            return redirect()->to('/admin/user-admin');
        }

        $data = [
            'name'      => $this->request->getPost('name'),
            'email'     => $this->request->getPost('email'),
            'is_active' => $this->request->getPost('is_active'),
        ];

        // Super admin tidak boleh menonaktifkan dirinya sendiri
        if ($id == session()->get('admin_id')) {
            unset($data['is_active']);
        }

        // Update password jika diisi
        if ($this->request->getPost('password')) {
            $data['password'] = password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            );
        }

        $this->adminModel->update($id, $data);

        return redirect()->to('/admin/user-admin');
    }
}
