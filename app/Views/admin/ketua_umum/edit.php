<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/admin/edit.css') ?>">

<h1 class="page-title">Edit Ketua Umum</h1>

<form action="<?= base_url('admin/ketua-umum/update/' . $row['id']) ?>"
      method="post"
      enctype="multipart/form-data"
      class="form-admin">

    <?= csrf_field() ?>

    <!-- NAMA -->
    <div class="form-group">
        <label class="form-label">Nama Ketua Umum</label>
        <input type="text"
               name="nama"
               value="<?= esc($row['nama']) ?>"
               required
               class="form-input">
    </div>

    <!-- MASA JABATAN -->
    <div class="form-group">
        <label class="form-label">Masa Jabatan Mulai</label>
        <input type="number"
               name="masa_jabat_mulai"
               value="<?= $row['masa_jabat_mulai'] ?>"
               required
               class="form-input">
    </div>

    <div class="form-group">
        <label class="form-label">Masa Jabatan Selesai</label>
        <input type="number"
               name="masa_jabat_selesai"
               value="<?= $row['masa_jabat_selesai'] ?>"
               class="form-input">
    </div>

    <!-- URUTAN -->
    <div class="form-group">
        <label class="form-label">Urutan Tampil</label>
        <input type="number"
               name="urutan"
               value="<?= $row['urutan'] ?>"
               class="form-input">
    </div>

    <!-- STATUS -->
    <div class="form-group">
        <label class="form-label">Status</label>
        <select name="is_active" class="form-input">
            <option value="1" <?= $row['is_active'] ? 'selected' : '' ?>>
                Aktif
            </option>
            <option value="0" <?= !$row['is_active'] ? 'selected' : '' ?>>
                Nonaktif
            </option>
        </select>
    </div>

        <!-- FOTO -->
    <div class="form-group">
        <label class="form-label">Foto (kosongkan jika tidak diganti)</label>

        <?php if (!empty($row['foto'])): ?>
            <div class="thumbnail-preview">
                <img src="<?= base_url('assets/img/ketua/' . $row['foto']) ?>"
                     alt="Foto Ketua Umum">
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
        <a href="<?= base_url('admin/ketua-umum') ?>"
           class="btn btn-secondary">
            Kembali
        </a>
    </div>

</form>

<?= $this->endSection() ?>