<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<h1>Tambah User Admin</h1>

<form action="<?= base_url('admin/user-admin/store') ?>" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="name" required>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" required>
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" required>
    </div>

    <div class="form-group">
        <label>Role</label>
        <select name="role" required>
            <option value="admin">Admin</option>
            <option value="super_admin">Super Admin</option>
        </select>
    </div>

    <button type="submit" class="btn-primary">Simpan</button>
    <a href="<?= base_url('admin/user-admin') ?>">Kembali</a>
</form>

<?= $this->endSection() ?>
