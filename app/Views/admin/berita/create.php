<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<h1>Tambah Berita</h1>

<form action="<?= base_url('admin/berita/store') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <label>Judul Berita</label>
    <input type="text" name="judul" value="<?= old('judul') ?>" required style="width:100%">

    <br><br>

    <label>Kategori</label>
    <select name="kategori" required>
        <option value="">-- Pilih Kategori --</option>
        <option value="Pengumuman" <?= old('kategori')=='Pengumuman'?'selected':'' ?>>Pengumuman</option>
        <option value="Kegiatan" <?= old('kategori')=='Kegiatan'?'selected':'' ?>>Kegiatan</option>
    </select>

    <br><br>

    <label>Konten</label>
    <textarea name="konten" rows="6" style="width:100%"><?= old('konten') ?></textarea>

    <br><br>

    <label>Gambar</label>
    <input type="file" name="gambar" accept="image/*">

    <br><br>

    <label>
        <input type="checkbox" name="is_active" value="1" <?= old('is_active')?'checked':'' ?>>
        Publish
    </label>

    <br><br>

    <button type="submit">Simpan</button>
    <a href="<?= base_url('admin/berita') ?>">Kembali</a>
</form>

<?= $this->endSection() ?>
