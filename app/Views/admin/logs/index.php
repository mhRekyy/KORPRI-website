<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<h2>Log Aktivitas Admin</h2>

<table border="1" cellpadding="8" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Waktu</th>
            <th>Admin</th>
            <th>Aksi</th>
            <th>Target ID</th>
            <th>IP Address</th>
            <th>Device</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($logs)): ?>
            <tr>
                <td colspan="7" align="center">Belum ada log aktivitas</td>
            </tr>
        <?php else: ?>
            <?php foreach ($logs as $i => $log): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= date('d-m-Y H:i:s', strtotime($log['created_at'])) ?></td>
                    <td><?= esc($log['admin_name'] ?? '-') ?></td>
                    <td><?= esc($log['action']) ?></td>
                    <td><?= esc($log['target_id'] ?? '-') ?></td>
                    <td><?= esc($log['ip_address']) ?></td>
                    <td><?= esc(substr($log['user_agent'], 0, 40)) ?>...</td>
                </tr>
            <?php endforeach ?>
        <?php endif ?>
    </tbody>
</table>

<?= $this->endSection() ?>
