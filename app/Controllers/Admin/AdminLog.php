<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminLogModel;
use App\Models\AdminModel;

class AdminLog extends BaseController
{
    protected $logModel;
    protected $adminModel;

    public function __construct()
    {
        $this->logModel   = new AdminLogModel();
        $this->adminModel = new AdminModel();
    }

    /**
     * Semua admin yang sudah login boleh akses (read-only)
     */
    private function mustLogin()
    {
        if (! session()->get('admin_logged_in')) {
            return redirect()->to('/login');
        }
        return null;
    }

    public function index()
    {
        if ($redirect = $this->mustLogin()) {
            return $redirect;
        }

        $logs = $this->logModel
            ->select('admin_logs.*, admins.name AS admin_name')
            ->join('admins', 'admins.id = admin_logs.admin_id', 'left')
            ->orderBy('admin_logs.created_at', 'DESC')
            ->findAll(100); // batasi 100 log terakhir

        return view('admin/logs/index', [
            'logs' => $logs
        ]);
    }
}
