<?php

use App\Models\AdminLogModel;

if (! function_exists('admin_log')) {

    /**
     * Catat log aktivitas admin (audit-ready)
     *
     * @param string   $action      Jenis aksi (create, update, delete, upload, dll)
     * @param string   $description Keterangan detail aksi
     * @param int|null $targetId    ID data yang terlibat (opsional)
     */
    function admin_log(
        string $action,
        string $description,
        ?int $targetId = null
    ) {
        $adminId = session('admin_id');

        // Safety: hanya log jika admin login
        if (! $adminId) {
            return;
        }

        $request = service('request');

        $logModel = new AdminLogModel();
        $logModel->insert([
            'admin_id'    => $adminId,
            'action'      => $action,
            'target_id'   => $targetId,
            'description' => $description,
            'ip_address'  => $request->getIPAddress(),
            'user_agent'  => $request->getUserAgent()->getAgentString(),
            'created_at'  => date('Y-m-d H:i:s'),
        ]);
    }
}
