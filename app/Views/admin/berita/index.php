<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<h1>Data Berita</h1>

<a href="<?= base_url('admin/berita/create') ?>">+ Tambah Berita</a>

<br><br>
<form method="get" action="<?= base_url('admin/berita') ?>">
  <div class="admin-filter">


    <!-- Search Judul -->
    <div>
      <label>Search Judul</label><br>
      <input type="text" name="q" 
             value="<?= esc($q ?? '') ?>" 
             placeholder="Cari judul berita...">
    </div>

    <!-- Filter Kategori -->
    <div>
      <label>Kategori</label><br>
      <select name="kategori">
        <option value="">Semua</option>
        <option value="Pengumuman" <?= ($kategori ?? '') == 'Pengumuman' ? 'selected' : '' ?>>Pengumuman</option>
        <option value="Kegiatan" <?= ($kategori ?? '') == 'Kegiatan' ? 'selected' : '' ?>>Kegiatan</option>
      </select>
    </div>

    <!-- Filter Status -->
    <div>
      <label>Status</label><br>
      <select name="status">
        <option value="">Semua</option>
        <option value="1" <?= ($status ?? '') === '1' ? 'selected' : '' ?>>Publish</option>
        <option value="0" <?= ($status ?? '') === '0' ? 'selected' : '' ?>>Draft</option>
      </select>
    </div>

    <!-- Tombol -->
    <div>
      <button type="submit">Filter</button>
      <a href="<?= base_url('admin/berita') ?>">Reset</a>
    </div>

  </div>
</form>

<table class="admin-table">

    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($berita)): ?>
            <?php
$perPage = 10; // HARUS sama dengan paginate(10)
$page = $_GET['page_berita'] ?? 1;
$no = 1 + ($perPage * ((int)$page - 1));
?>


            <?php foreach ($berita as $i => $b): ?>
                <tr>
                    <td><?= $no++ ?></td>
                

                    <td><?= esc($b['judul']) ?></td>

                    <td><?= esc($b['kategori']) ?></td>

                    <!-- STATUS (TOGGLE) -->
                    <td>
                        <form action="<?= base_url('admin/berita/toggle/'.$b['id']) ?>"
                              method="post"
                              style="display:inline">
                            <?= csrf_field() ?>

                            <button type="submit" class="badge <?= $b['is_active'] ? 'badge-publish' : 'badge-draft' ?>">
  <?= $b['is_active'] ? 'Publish' : 'Draft' ?>
</button>

                        </form>
                    </td>

                    <!-- GAMBAR -->
                    <td>
                        <?php if (!empty($b['gambar'])): ?>
                            <img src="<?= base_url('uploads/berita/'.esc($b['gambar'])) ?>" width="80">
                        <?php else: ?>
                            -
                        <?php endif ?>
                    </td>

                    <!-- AKSI -->
                    <td class="admin-action">

                        <a href="<?= base_url('admin/berita/edit/'.$b['id']) ?>">Edit</a> |

                        <form action="<?= base_url('admin/berita/delete/'.$b['id']) ?>"
                              method="post"
                              style="display:inline"
                              onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                            <?= csrf_field() ?>
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php else: ?>
            <tr>
                <td colspan="6" align="center">
                <?php if ($q || $kategori || $status): ?>
                Data tidak ditemukan berdasarkan filter
                <?php else: ?>
                Belum ada data berita
                <?php endif ?>
            </td>

            </tr>
        <?php endif ?>
    </tbody>
</table>

<?php if (isset($pager)) : ?>
  <div style="margin-top:20px;">
    <?= $pager->links('berita') ?>
  </div>
<?php endif ?>




<?= $this->endSection() ?>
