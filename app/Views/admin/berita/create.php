<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/admin/form.css') ?>">

<div class="form-wrapper">

    <h1 class="form-title">Tambah berita</h1>

    <div class="form-card">
        <form action="<?= base_url('admin/berita/store') ?>" 
                method="post" 
                enctype="multipart/form-data">

            <?= csrf_field() ?>

            <div class="form-group">

                <label>Judul Berita</label>
                <input type="text" 
                        name="judul" 
                        value="<?= old('judul') ?>" 
                        required>

            </div>

        <div class="form-group">

        <label>Kategori</label>
        <select name="kategori" required>
            <option value="">-- Pilih Kategori --</option>
            <option value="Pengumuman" <?= old('kategori')=='Pengumuman'?'selected':'' ?>>Pengumuman</option>
            <option value="Kegiatan" <?= old('kategori')=='Kegiatan'?'selected':'' ?>>Kegiatan</option>
        </select>

        </div>

        <div class="form-group">

        <label>Konten</label>
        <textarea name="konten" rows="6"><?= old('konten') ?></textarea>

        </div>

        <div class="form-group">

        <label>Gambar</label>
        <input type="file" name="gambar" accept="image/*">

        </div>

        <div class="form-check">

        <label>
            <input type="checkbox" name="is_active" value="1" <?= old('is_active')?'checked':'' ?>>
            Publish
        </label>

        </div>

        <div class="form-actions">

        <button type="submit" class="btn-primary">
            Simpan
        </button>
        <a href="<?= base_url('admin/berita') ?>"  class="btn-secondary">
            Kembali</a>

        </div>
    </form>
    </div>
</div>

<?= $this->endSection() ?>
