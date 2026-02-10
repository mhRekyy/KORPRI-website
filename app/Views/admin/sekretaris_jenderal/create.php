<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/admin/Create.css') ?>">

<div class="form-wrapper">

    <h1 class="form-title"><?= esc($title) ?></h1>

    <!-- ERROR VALIDATION -->
    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="form-card">
        <form action="<?= base_url('admin/sekretaris-jenderal/store') ?>"
              method="post"
              enctype="multipart/form-data">

            <?= csrf_field() ?>

            <!-- NAMA -->
            <div class="form-group">
                <label>Nama Sekretaris Jenderal</label>
                <input type="text"
                       name="nama"
                       value="<?= old('nama') ?>"
                       required>
            </div>

            <!-- MASA JABAT -->
            <div class="form-group">
                <label>Masa Jabatan Mulai</label>
                <input type="number"
                       name="masa_jabat_mulai"
                       value="<?= old('masa_jabat_mulai') ?>"
                       placeholder="Contoh: 2020"
                       required>
            </div>

            <div class="form-group">
                <label>Masa Jabatan Selesai</label>
                <input type="number"
                       name="masa_jabat_selesai"
                       value="<?= old('masa_jabat_selesai') ?>"
                       placeholder="Kosongkan jika masih menjabat">
            </div>

            <!-- URUTAN -->
            <div class="form-group">
                <label>Urutan Tampil</label>
                <input type="number"
                       name="urutan"
                       value="<?= old('urutan', 0) ?>">
            </div>

            <!-- FOTO -->
            <div class="form-group">
                <label>Foto</label>
                <input type="file"
                       name="foto"
                       accept="image/*"
                       required>
            </div>

            <!-- STATUS -->
            <div class="form-group">
                <label>Status</label>
                <select name="is_active">
                    <option value="1" <?= old('is_active', '1') == '1' ? 'selected' : '' ?>>
                        Aktif
                    </option>
                    <option value="0" <?= old('is_active') == '0' ? 'selected' : '' ?>>
                        Nonaktif
                    </option>
                </select>
            </div>

            <!-- ACTION -->
            <div class="form-actions">
                <button type="submit" class="btn-primary">
                    Simpan
                </button>

                <a href="<?= base_url('admin/sekretaris-jenderal') ?>"
                   class="btn-secondary">
                    Kembali
                </a>
            </div>

        </form>
    </div>
</div>

<?= $this->endSection() ?>