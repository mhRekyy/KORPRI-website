<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/admin/Create.css') ?>">

<div class="form-wrapper">

    <h1 class="form-title">Tambah Ketua Umum</h1>

    <div class="form-card">
        <form action="<?= base_url('admin/ketua-umum/store') ?>"
              method="post"
              enctype="multipart/form-data">

            <?= csrf_field() ?>

            <!-- NAMA -->
            <div class="form-group">
                <label>Nama Ketua Umum</label>
                <input type="text"
                       name="nama"
                       value="<?= old('nama') ?>"
                       required>
            </div>

            <!-- FOTO -->
            <div class="form-group">
                <label>Foto</label>
                <input type="file"
                       name="foto"
                       accept="image/*">
                <small class="text-muted">
                    Format JPG / PNG. Boleh dikosongkan.
                </small>
            </div>

            <!-- MASA JABAT MULAI -->
            <div class="form-group">
                <label>Masa Jabatan Mulai</label>
                <input type="number"
                       name="masa_jabat_mulai"
                       placeholder="Contoh: 2017"
                       value="<?= old('masa_jabat_mulai') ?>"
                       required>
            </div>

            <!-- MASA JABAT SELESAI -->
            <div class="form-group">
                <label>Masa Jabatan Selesai</label>
                <input type="number"
                       name="masa_jabat_selesai"
                       placeholder="Kosongkan jika masih menjabat"
                       value="<?= old('masa_jabat_selesai') ?>">
            </div>

            <!-- URUTAN -->
            <div class="form-group">
                <label>Urutan Tampil</label>
                <input type="number"
                       name="urutan"
                       value="<?= old('urutan', 0) ?>">
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

                <a href="<?= base_url('admin/ketua-umum') ?>"
                   class="btn-secondary">
                    Kembali
                </a>
            </div>

        </form>
    </div>
</div>

<?= $this->endSection() ?>