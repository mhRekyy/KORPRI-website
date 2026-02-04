<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<h1>Edit Berita</h1>

<form action="<?= base_url('admin/berita/update/'.$berita['id']) ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <label>Judul Berita</label>
    <input type="text" name="judul" value="<?= esc($berita['judul']) ?>" required style="width:100%">

    <br><br>

    <label>Kategori</label>
    <select name="kategori" required>
        <option value="Pengumuman" <?= $berita['kategori']=='Pengumuman'?'selected':'' ?>>Pengumuman</option>
        <option value="Kegiatan" <?= $berita['kategori']=='Kegiatan'?'selected':'' ?>>Kegiatan</option>
    </select>

    <br><br>

    <label>Konten</label>
    <textarea name="konten" rows="6" style="width:100%"><?= esc($berita['konten']) ?></textarea>

    <br><br>

    <label>Gambar (kosongkan jika tidak diganti)</label><br>
    <?php if ($berita['gambar']): ?>
        <img src="<?= base_url('uploads/berita/'.$berita['gambar']) ?>" width="120"><br>
    <?php endif ?>
    <input type="file" name="gambar" accept="image/*">

    <br><br>

    <label>
        <input type="checkbox" name="is_active" value="1" <?= $berita['is_active']?'checked':'' ?>>
        Publish
    </label>

    <br><br>

    <button type="submit">Update</button>
    <a href="<?= base_url('admin/berita') ?>">Kembali</a>
</form>

<?= $this->endSection() ?>
