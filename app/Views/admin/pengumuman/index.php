<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="page-header">
  <div>
    <h1>Pengumuman</h1>
    <p class="page-subtitle">Kelola pengumuman resmi KORPRI</p>
  </div>
  <a href="/admin/pengumuman/create" class="btn-primary">+ Tambah</a>
</div>

<form method="get" class="filter-bar">
  <input type="text" name="q" placeholder="Cari judul..."
         value="<?= esc($_GET['q'] ?? '') ?>">

  <select name="kategori">
    <option value="">Kategori</option>
    <option value="Umum" <?= ($_GET['kategori'] ?? '') === 'Umum' ? 'selected' : '' ?>>Umum</option>
    <option value="Internal" <?= ($_GET['kategori'] ?? '') === 'Internal' ? 'selected' : '' ?>>Internal</option>
  </select>

  <select name="status">
    <option value="">Status</option>
    <option value="1" <?= ($_GET['status'] ?? '') === '1' ? 'selected' : '' ?>>Publish</option>
    <option value="0" <?= ($_GET['status'] ?? '') === '0' ? 'selected' : '' ?>>Draft</option>
  </select>

  <button type="submit">Filter</button>
</form>

<div class="pengumuman-list">

<?php foreach ($pengumuman as $row): ?>
  <div class="pengumuman-card">

    <div class="pengumuman-main">
      <h3 class="pengumuman-title">
        <?= esc($row['judul']) ?>
      </h3>

      <div class="pengumuman-meta">
        <span><?= esc($row['instansi']) ?></span>
        <span>• <?= esc($row['kategori']) ?></span>
        <span>• <?= esc($row['masa_bakti']) ?></span>
      </div>
    </div>

    <div class="pengumuman-actions">
      <span class="status <?= $row['is_active'] ? 'publish' : 'draft' ?>">
        <?= $row['is_active'] ? 'Publish' : 'Draft' ?>
      </span>

      <a href="/admin/pengumuman/edit/<?= $row['id'] ?>" title="Edit">✏️</a>

      <a href="/admin/pengumuman/toggle/<?= $row['id'] ?>"
         title="<?= $row['is_active'] ? 'Unpublish' : 'Publish' ?>">
        <?= $row['is_active'] ? '👁️' : '🚫' ?>
      </a>

      <a href="/admin/pengumuman/delete/<?= $row['id'] ?>"
         onclick="return confirm('Hapus pengumuman ini?')"
         title="Hapus">
        🗑️
      </a>
    </div>

  </div>
<?php endforeach ?>

</div>

<?= $pager->links() ?>

<?= $this->endSection() ?>
