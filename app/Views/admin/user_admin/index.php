<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <h1>User Admin</h1>

    <?php if (session()->get('admin_role') === 'super_admin'): ?>
        <a href="<?= base_url('admin/user-admin/create') ?>" class="btn-primary">
            + Tambah Admin
        </a>
    <?php endif; ?>
</div>

<div class="card">
    <table class="table table-admin">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Status</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($admins as $admin): ?>
            <tr>
                <td><?= esc($admin['name']) ?></td>
                <td><?= esc($admin['email']) ?></td>
                <td><?= $admin['is_active'] ? 'Aktif' : 'Nonaktif' ?></td>
                <td><?= $admin['role'] === 'super_admin' ? 'Super Admin' : 'Admin' ?></td>
                <td>
                    <?php if (
                        session()->get('admin_role') === 'super_admin'
                        && $admin['id'] != session()->get('admin_id')
                    ): ?>
                        <a href="<?= base_url('admin/user-admin/edit/'.$admin['id']) ?>">
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
