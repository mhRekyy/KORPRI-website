<?php

use App\Models\AdminLogModel;

function admin_log(
    int $adminId,
    string $action,
    ?int $targetId = null,
    ?string $description = null
) {
    $request = service('request');

    $logModel = new AdminLogModel();
    $logModel->insert([
        'admin_id'   => $adminId,
        'action'     => $action,
        'target_id'  => $targetId,
        'description'=> $description,
        'ip_address' => $request->getIPAddress(),
        'user_agent' => $request->getUserAgent()->getAgentString(),
        'created_at' => date('Y-m-d H:i:s')
    ]);
}
