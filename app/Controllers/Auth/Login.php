<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Login extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        if (session()->get('admin_logged_in')) {
            return redirect()->to('/admin/dashboard');
        }

        return view('auth/login');
    }

    public function process()
    {
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Email atau password tidak valid.');
        }

        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $admin = $this->adminModel
            ->where('email', $email)
            ->where('is_active', 1)
            ->first();

        if (! $admin || ! password_verify($password, $admin['password'])) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Email atau password salah.');
        }

        session()->regenerate();

        session()->set([
            'admin_logged_in' => true,
            'admin_id'        => $admin['id'],
            'admin_name'      => $admin['name'],
            'admin_email'     => $admin['email'],
            'admin_role'      => $admin['role'], // super_admin / admin
        ]);

        return redirect()->to('/admin/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
