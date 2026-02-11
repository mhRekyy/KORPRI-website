<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/admin/edit.css') ?>">

<h1 class="page-title">Edit Sekretaris Jenderal</h1>

<form action="<?= base_url('admin/sekretaris-jenderal/update/' . $sekjen['id']) ?>"
      method="post"
      enctype="multipart/form-data"
      class="form-admin">

    <?= csrf_field() ?>

    <!-- NAMA -->
    <div class="form-group">
        <label class="form-label">Nama</label>
        <input type="text"
               name="nama"
               value="<?= esc($sekjen['nama']) ?>"
               required
               class="form-input">
    </div>

    <!-- MASA JABATAN -->
    <div class="form-group">
        <label class="form-label">Masa Jabatan Mulai</label>
        <input type="number"
               name="masa_jabat_mulai"
               value="<?= esc($sekjen['masa_jabat_mulai']) ?>"
               required
               class="form-input">
    </div>

    <div class="form-group">
        <label class="form-label">Masa Jabatan Selesai</label>
        <input type="number"
               name="masa_jabat_selesai"
               value="<?= esc($sekjen['masa_jabat_selesai']) ?>"
               required
               class="form-input">
    </div>

    <!-- URUTAN -->
    <div class="form-group">
        <label class="form-label">Urutan Tampil</label>
        <input type="number"
               name="urutan"
               value="<?= esc($sekjen['urutan']) ?>"
               class="form-input">
    </div>

    <!-- FOTO -->
    <div class="form-group">
        <label class="form-label">Foto (kosongkan jika tidak diganti)</label>

        <?php if (!empty($sekjen['foto'])): ?>
            <div class="thumbnail-preview">
                <img src="<?= base_url('assets/img/sekjen/' . $sekjen['foto']) ?>"
                     alt="Foto Sekretaris Jenderal">
            </div>
        <?php endif ?>

        <input type="file"
               name="foto"
               accept="image/*"
               class="form-file">
    </div>

    <!-- ACTION -->
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">
            Update
        </button>
        <a href="<?= base_url('admin/sekretaris-jenderal') ?>"
           class="btn btn-secondary">
            Kembali
        </a>
    </div>

</form>

<?= $this->endSection() ?>