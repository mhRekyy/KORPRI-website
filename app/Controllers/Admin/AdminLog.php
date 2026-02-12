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

        $keyword = $this->request->getGet('q');

        $builder = $this->logModel
            ->select('admin_logs.*, admins.name AS admin_name')
            ->join('admins', 'admins.id = admin_logs.admin_id', 'left');

        if (!empty($keyword)) {
            $builder->groupStart()
                ->like('admins.name', $keyword)
                ->orLike('admin_logs.action', $keyword)
                ->orLike('admin_logs.description', $keyword)
                ->orLike('admin_logs.ip_address', $keyword)
                ->groupEnd();
        }

        $logs = $builder
            ->orderBy('admin_logs.created_at', 'DESC')
            ->paginate(10, 'logs');

        return view('admin/logs/index', [
            'logs'   => $logs,
            'pager'  => $this->logModel->pager,
            'keyword'=> $keyword
        ]);
    }
}
