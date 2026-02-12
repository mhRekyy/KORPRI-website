<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/admin/logs.css') ?>">

<div class="log-container">

    <div class="log-title">
        Log Aktivitas Admin
    </div>

    <!-- SEARCH FORM -->
    <div class="log-search">
        <form method="get" action="<?= base_url('admin/logs') ?>">
            <input 
                type="text" 
                name="q" 
                placeholder="Cari admin, aksi, keterangan, IP..." 
                value="<?= esc($keyword ?? '') ?>"
            >
            <button type="submit">Cari</button>

            <?php if (!empty($keyword)): ?>
                <a href="<?= base_url('admin/logs') ?>" class="reset-btn">Reset</a>
            <?php endif; ?>
        </form>
    </div>

    <table class="log-table">
        <thead>
            <tr>
                <th style="width:60px;">No</th>
                <th style="width:160px;">Waktu</th>
                <th style="width:140px;">Admin</th>
                <th style="width:130px;">Aksi</th>
                <th>Keterangan</th>
                <th style="width:90px;">Target ID</th>
                <th style="width:130px;">IP Address</th>
                <th style="width:200px;">Device</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($logs)): ?>
                <tr>
                    <td colspan="8" style="text-align:center; padding:20px;">
                        Tidak ditemukan data log
                    </td>
                </tr>
            <?php else: ?>

                <?php 
                    $currentPage = $pager->getCurrentPage('logs');
                    $perPage = 10;
                    $startNumber = ($currentPage - 1) * $perPage;
                ?>

                <?php foreach ($logs as $i => $log): ?>
                    <tr>
                        <td><?= $startNumber + $i + 1 ?></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($log['created_at'])) ?></td>
                        <td><?= esc($log['admin_name'] ?? '-') ?></td>
                        <td><?= esc($log['action']) ?></td>

                        <td class="log-keterangan">
                            <?= esc($log['description'] ?? '-') ?>
                        </td>

                        <td><?= esc($log['target_id'] ?? '-') ?></td>
                        <td><?= esc($log['ip_address']) ?></td>
                        <td title="<?= esc($log['user_agent']) ?>">
                            <?= esc(substr($log['user_agent'], 0, 35)) ?>…
                        </td>
                    </tr>
                <?php endforeach ?>

            <?php endif ?>
        </tbody>
    </table>

    <div class="log-pagination">
        <?php $queryString = $_GET ? '?' . http_build_query($_GET) : '';?>
        <?= str_replace('/admin/logs?', '/admin/logs' . $queryString . '&', $pager->links('logs')) ?>

    </div>

</div>

<?= $this->endSection() ?>
