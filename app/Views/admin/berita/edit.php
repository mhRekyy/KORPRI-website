<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/admin/edit.css') ?>">

<h1 class="page-title">Edit Berita</h1>

<form action="<?= base_url('admin/berita/update/' . $berita['id']) ?>"
      method="post"
      enctype="multipart/form-data"
      class="form-admin">

    <?= csrf_field() ?>

    <!-- JUDUL -->
    <div class="form-group">
        <label class="form-label">Judul Berita</label>
        <input type="text"
               name="judul"
               value="<?= esc($berita['judul']) ?>"
               required
               class="form-input">
    </div>

    <!-- KATEGORI -->
    <div class="form-group">
        <label class="form-label">Kategori</label>
        <select name="kategori"
                required
                class="form-input">
            <option value="Pengumuman" <?= $berita['kategori'] == 'Pengumuman' ? 'selected' : '' ?>>
                Pengumuman
            </option>
            <option value="Kegiatan" <?= $berita['kategori'] == 'Kegiatan' ? 'selected' : '' ?>>
                Kegiatan
            </option>
        </select>
    </div>

    <!-- KONTEN -->
    <div class="form-group">
        <label class="form-label">Konten</label>
        <textarea name="konten"
                  rows="6"
                  class="form-textarea"><?= esc($berita['konten']) ?></textarea>
    </div>

    <!-- GAMBAR -->
    <div class="form-group">
        <label class="form-label">Gambar (kosongkan jika tidak diganti)</label>

        <?php if (!empty($berita['gambar'])): ?>
            <div class="thumbnail-preview">
                <img src="<?= base_url('uploads/berita/' . $berita['gambar']) ?>"
                     alt="Gambar Berita">
            </div>
        <?php endif ?>

        <input type="file"
               name="gambar"
               accept="image/*"
               class="form-file">
    </div>

    <!-- STATUS -->
    <div class="form-group form-check">
        <label class="check-label">
            <input type="checkbox"
                   name="is_active"
                   value="1"
                   <?= $berita['is_active'] ? 'checked' : '' ?>>
            Publish
        </label>
    </div>

    <!-- ACTION -->
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= base_url('admin/berita') ?>" class="btn btn-secondary">Kembali</a>
    </div>

</form>

<?= $this->endSection() ?>