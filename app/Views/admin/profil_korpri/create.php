<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/admin/profil_korpri.css') ?>">

<div class="admin-content">

    <div class="page-header">
        <h1>Tambah Profil KORPRI</h1>
    </div>

    <form method="post" action="<?= base_url('admin/profil-korpri/store') ?>" class="admin-form">
        <?= csrf_field() ?>

        <?= $this->include('admin/profil_korpri/_form') ?>

        <div class="form-action">
            <button type="submit" class="btn-primary">Simpan</button>
            <a href="<?= base_url('admin/profil-korpri') ?>" class="btn-secondary">Batal</a>
        </div>
    </form>

</div>

<?= $this->endSection() ?>
