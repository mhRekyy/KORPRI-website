<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="h3 mb-4"><?= esc($title) ?></h1>

    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/sekretaris-jenderal/update/' . $sekjen['id']) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= esc($sekjen['nama']) ?>" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Masa Jabatan Mulai</label>
                <input type="number" name="masa_jabat_mulai" class="form-control" value="<?= esc($sekjen['masa_jabat_mulai']) ?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Masa Jabatan Selesai</label>
                <input type="number" name="masa_jabat_selesai" class="form-control" value="<?= esc($sekjen['masa_jabat_selesai']) ?>" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Urutan Tampil</label>
            <input type="number" name="urutan" class="form-control" value="<?= esc($sekjen['urutan']) ?>">
        </div>

        <div class="mb-3">
            <label>Foto Saat Ini</label><br>
            <img src="<?= base_url('assets/img/sekjen/' . $sekjen['foto']) ?>" width="120" class="img-thumbnail mb-2">
            <input type="file" name="foto" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="<?= base_url('admin/sekretaris-jenderal') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection() ?>
