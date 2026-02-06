<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<a href="/admin/pengumuman" class="btn-back">← Kembali</a>

<h1>Edit Pengumuman</h1>
<div class="page-subtitle">Perbarui data dan file pengumuman</div>

<form action="/admin/pengumuman/update/<?= $row['id'] ?>"
      method="post"
      enctype="multipart/form-data">

  <?= csrf_field() ?>

  <div class="form-card">

  <div class="form-section-title">
    Informasi Pengumuman
  </div>

  <!-- JUDUL -->
  <div class="form-group">
    <label>Judul <span class="required">*</span></label>
    <input type="text" name="judul" value="<?= esc($row['judul']) ?>" required>
  </div>

  <!-- KATEGORI -->
  <div class="form-group">
    <label>Kategori</label>
    <input type="text" name="kategori" value="<?= esc($row['kategori']) ?>">
  </div>

  <!-- MASA BAKTI -->
  <div class="form-group">
    <label>Masa Bakti</label>
    <input type="text" name="masa_bakti" value="<?= esc($row['masa_bakti']) ?>">
  </div>

  <!-- INSTANSI -->
  <div class="form-group">
    <label>Instansi</label>
    <input type="text" name="instansi" value="<?= esc($row['instansi']) ?>">
  </div>

  <!-- TANGGAL -->
  <div class="form-group">
    <label>Tanggal Pengumuman</label>
    <input type="date" name="tanggal_pengumuman"
           value="<?= esc($row['tanggal_pengumuman']) ?>">
  </div>

  <!-- FILE PDF -->
  <div class="form-group">
    <label>File PDF</label>

    <?php if ($row['file_pdf']): ?>
      <div class="file-preview">
        📄 File saat ini:
        <a href="<?= base_url('uploads/pengumuman/' . $row['file_pdf']) ?>" target="_blank">
          <?= esc($row['file_pdf']) ?>
        </a>
      </div>
    <?php endif; ?>

    <input type="file" name="file_pdf" accept="application/pdf">
    <span class="form-hint">
      Kosongkan jika tidak ingin mengganti file PDF
    </span>
  </div>

  <hr class="form-divider">

  <!-- ACTION -->
  <div class="form-action">
    <button type="submit" class="btn-primary">
      Simpan Perubahan
    </button>
  </div>

</div>

  </div>

</form>

<?= $this->endSection() ?>
