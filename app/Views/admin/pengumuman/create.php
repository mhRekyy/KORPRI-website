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
    <select name="kategori_id" required>
      <option value="">-- Pilih Kategori --</option>
      <?php foreach ($kategoriList as $k): ?>
        <option value="<?= $k['id'] ?>">
          <?= esc($k['nama']) ?>
        </option>
      <?php endforeach ?>
    </select>
  </div>

  <div class="form-group">
    <label>Masa Bakti</label>
    <select name="masa_bakti_id" required>
      <option value="">-- Pilih Masa Bakti --</option>
      <?php foreach ($masaBaktiList as $m): ?>
        <option value="<?= $m['id'] ?>">
          <?= esc($m['nama']) ?>
        </option>
      <?php endforeach ?>
    </select>
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
