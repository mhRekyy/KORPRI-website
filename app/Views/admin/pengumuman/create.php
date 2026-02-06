<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="page-header">
  <h1>Tambah Pengumuman</h1>
  <a href="/admin/pengumuman" class="btn-secondary">Kembali</a>
</div>

<form action="/admin/pengumuman/store"
      method="post"
      enctype="multipart/form-data"
      class="form-card">

  <?= csrf_field() ?>

  <div class="form-group">
    <label>Judul</label>
    <input 
      type="text" 
      name="judul" 
      placeholder="Judul pengumuman"
      required>
  </div>

  <div class="form-group">
    <label>Kategori</label>
    <input 
      type="text" 
      name="kategori" 
      placeholder="Contoh: Umum / Internal">
  </div>

  <div class="form-group">
    <label>Masa Bakti</label>
    <input 
      type="text" 
      name="masa_bakti" 
      placeholder="Contoh: 2023–2028">
  </div>

  <div class="form-group">
    <label>Instansi</label>
    <input 
      type="text" 
      name="instansi" 
      placeholder="Nama instansi">
  </div>

  <div class="form-group">
    <label>Tanggal Pengumuman</label>
    <input 
      type="date" 
      name="tanggal_pengumuman">
  </div>

  <div class="form-group">
    <label>File PDF</label>
    <input 
      type="file" 
      name="file_pdf" 
      accept="application/pdf"
      required>

    <small class="form-hint">
      Hanya file PDF (.pdf)
    </small>
  </div>

  <div class="form-action">
    <button type="submit" class="btn-primary">
      Simpan Pengumuman
    </button>
  </div>

</form>

<?= $this->endSection() ?>
