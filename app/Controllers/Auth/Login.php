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

    // GET /login
    public function index()
    {
        return view('auth/login');
    }

    // POST /login
    public function process()
    {
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Email atau password tidak valid.');
        }

        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $admin = $this->adminModel
            ->where('email', $email)
            ->where('is_active', 1)
            ->first();

        if (! $admin) {
            return redirect()->back()->withInput()->with('error', 'Email tidak terdaftar sebagai admin.');
        }

        if (! password_verify($password, $admin['password'])) {
            return redirect()->back()->withInput()->with('error', 'Password salah.');
        }

        // SET SESSION
        session()->set([
            'admin_logged_in' => true,
            'admin_id'        => $admin['id'],
            'admin_name'      => $admin['name'],
            'admin_email'     => $admin['email'],
        ]);

        return redirect()->to('/admin/dashboard');
    }

    // GET /logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
