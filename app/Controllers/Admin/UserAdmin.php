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

    private function mustBeSuperAdmin()
    {
        if (session()->get('admin_role') !== 'super_admin') {
            return redirect()->to('/admin/dashboard')
                ->with('error', 'Anda tidak memiliki akses.');
        }
        return null;
    }

    public function index()
    {
        $data['admins'] = $this->adminModel->findAll();
        return view('admin/user_admin/index', $data);
    }

    public function create()
    {
        if ($redirect = $this->mustBeSuperAdmin()) {
            return $redirect;
        }
        return view('admin/user_admin/create');
    }

    public function store()
    {
        if ($redirect = $this->mustBeSuperAdmin()) {
            return $redirect;
        }

        if ($this->adminModel->where('email', $this->request->getPost('email'))->first()) {
            return redirect()->back()->with('error', 'Email sudah digunakan.');
        }

        $this->adminModel->insert([
            'name'      => $this->request->getPost('name'),
            'email'     => $this->request->getPost('email'),
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'is_active' => 1,
            'role'      => $this->request->getPost('role') ?? 'admin',
        ]);

        $newAdminId = $this->adminModel->getInsertID();

        // ✅ LOG CREATE ADMIN
        admin_log(
            session()->get('admin_id'),
            'CREATE_ADMIN',
            $newAdminId,
            'Menambahkan admin baru'
        );

        return redirect()->to('/admin/user-admin');
    }

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
            'role'      => $this->request->getPost('role'),
        ];

        if ($id == session()->get('admin_id')) {
            unset($data['is_active']);
        }

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            );
        }

        $this->adminModel->update($id, $data);

        // ✅ LOG UPDATE ADMIN
        admin_log(
            session()->get('admin_id'),
            'UPDATE_ADMIN',
            $id,
            'Mengubah data admin'
        );

        return redirect()->to('/admin/user-admin');
    }
}
