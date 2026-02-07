<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/admin/dashboard.css') ?>">

<div class="dashboard">

  <!-- Header Info -->
  <div class="dashboard-header">
    <h1>Dashboard</h1>
    <p>Selamat datang, <strong><?= esc($admin_name) ?></strong></p>
    <small><?= $now ?></small>
  </div>

  <!-- Statistik -->
  <div class="dashboard-grid">
    <?php
    $cards = [
        'Berita'        => $stat['berita'] ?? 0,
        'Artikel'       => $stat['artikel'] ?? 0,
        'Pengumuman'    => $stat['pengumuman'] ?? 0,
        'Peraturan'     => $stat['peraturan'] ?? 0,
        'Keputusan'     => $stat['keputusan'] ?? 0,
        'Surat Edaran'  => $stat['surat_edaran'] ?? 0,
        'Galeri'        => $stat['galeri'] ?? 0,
        ];

    ?>

    <?php foreach ($cards as $label => $value): ?>
      <div class="card">
        <h3><?= $value ?></h3>
        <p><?= $label ?></p>
      </div>
    <?php endforeach ?>
  </div>

  <!-- Status Konten -->
  <div class="dashboard-section">
    <h2>Status Konten</h2>
    <div class="status-grid">
      <div class="status-box">
        <h4>Berita</h4>
        <p>Publish: <?= $berita_status['publish'] ?></p>
        <p>Draft: <?= $berita_status['draft'] ?></p>
      </div>
      <div class="status-box">
        <h4>Artikel</h4>
        <p>Publish: <?= $artikel_status['publish'] ?></p>
        <p>Draft: <?= $artikel_status['draft'] ?></p>
      </div>
    </div>
  </div>

  <!-- Berita Terbaru -->
  <div class="dashboard-section">
    <h2>Berita Terbaru</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Judul</th>
          <th>Status</th>
          <th>Tanggal</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($latest_berita as $b): ?>
          <tr>
            <td><?= esc($b['judul']) ?></td>
            <td><?= $b['is_active'] ? 'Publish' : 'Draft' ?></td>
            <td><?= date('d/m/Y', strtotime($b['created_at'])) ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>

  <!-- Quick Link -->
  <div class="dashboard-section">
    <h2>Akses Cepat</h2>
    <div class="quick-link">
      <a href="<?= base_url('admin/berita') ?>">Kelola Berita</a>
      <a href="<?= base_url('admin/artikel') ?>">Kelola Artikel</a>
      <a href="<?= base_url('admin/pengumuman') ?>">Kelola Pengumuman</a>
    </div>
  </div>

</div>

<?= $this->endSection() ?>
