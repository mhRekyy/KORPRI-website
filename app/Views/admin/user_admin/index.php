<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<!-- PAGE HEADER -->
<div class="page-header user-admin-header">
    <div>
        <h1>User Admin</h1>
        <p class="page-subtitle">
            Manajemen akun administrator yang memiliki akses ke sistem KORPRI
        </p>
    </div>

    <?php if (session()->get('admin_role') === 'super_admin'): ?>
        <a href="<?= base_url('admin/user-admin/create') ?>" class="btn btn-primary">
            + Tambah Admin
        </a>
    <?php endif; ?>
</div>

<!-- STATS -->
<div class="admin-stats">
    <div class="stat-card">
        <span class="stat-label">Total Admin</span>
        <strong class="stat-value"><?= count($admins) ?></strong>
    </div>

    <div class="stat-card">
        <span class="stat-label">Super Admin</span>
        <strong class="stat-value">
            <?= count(array_filter($admins, fn($a) => $a['role'] === 'super_admin')) ?>
        </strong>
    </div>

    <div class="stat-card">
        <span class="stat-label">Admin Aktif</span>
        <strong class="stat-value">
            <?= count(array_filter($admins, fn($a) => $a['is_active'])) ?>
        </strong>
    </div>
</div>

<!-- TABLE CARD -->
<div class="card">
    <table class="table-admin">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Status</th>
                <th>Role</th>
                <th width="140">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($admins as $admin): ?>
            <tr>
                <td>
                    <div class="admin-name">
                        <?= esc($admin['name']) ?>
                        <?php if ($admin['id'] == session()->get('admin_id')): ?>
                            <span class="badge badge-self">Anda</span>
                        <?php endif; ?>
                    </div>
                </td>

                <td><?= esc($admin['email']) ?></td>

                <td>
                    <?php if ($admin['is_active']): ?>
                        <span class="badge badge-success">Aktif</span>
                    <?php else: ?>
                        <span class="badge badge-danger">Nonaktif</span>
                    <?php endif; ?>
                </td>

                <td>
                    <?php if ($admin['role'] === 'super_admin'): ?>
                        <span class="badge badge-primary">Super Admin</span>
                    <?php else: ?>
                        <span class="badge badge-secondary">Admin</span>
                    <?php endif; ?>
                </td>

                <td>
                    <?php if (
                        session()->get('admin_role') === 'super_admin'
                        && $admin['id'] != session()->get('admin_id')
                    ): ?>
                        <a href="<?= base_url('admin/user-admin/edit/'.$admin['id']) ?>"
                           class="btn-action">
                            Edit
                        </a>
                    <?php else: ?>
                        <span class="text-muted">—</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
