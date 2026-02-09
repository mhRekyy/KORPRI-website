<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<h1>Edit User Admin</h1>

<form action="<?= base_url('admin/user-admin/update/'.$admin['id']) ?>" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="name" value="<?= esc($admin['name']) ?>" required>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="<?= esc($admin['email']) ?>" required>
    </div>

    <div class="form-group">
        <label>Password (kosongkan jika tidak diganti)</label>
        <input type="password" name="password">
    </div>

    <div class="form-group">
        <label>Role</label>
        <select name="role">
            <option value="admin" <?= $admin['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
            <option value="super_admin" <?= $admin['role'] === 'super_admin' ? 'selected' : '' ?>>Super Admin</option>
        </select>
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="is_active">
            <option value="1" <?= $admin['is_active'] ? 'selected' : '' ?>>Aktif</option>
            <option value="0" <?= ! $admin['is_active'] ? 'selected' : '' ?>>Nonaktif</option>
        </select>
    </div>

    <button type="submit" class="btn-primary">Update</button>
    <a href="<?= base_url('admin/user-admin') ?>">Kembali</a>
</form>

<?= $this->endSection() ?>
