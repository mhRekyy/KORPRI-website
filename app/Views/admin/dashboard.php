<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/admin/dashboard.css') ?>">

<!-- ===============================
     DASHBOARD CONTAINER
================================ -->
<div class="dashboard">

  <!-- ===============================
       HEADER (EXECUTIVE STYLE)
  ================================ -->
  <div class="dashboard-header">
    <div>
      <h1>Dashboard</h1>
      <p class="dashboard-subtitle">
        Ringkasan aktivitas dan konten KORPRI
      </p>
    </div>

    <div class="dashboard-meta">
      <span><?= esc($now) ?></span>
      <span class="meta-separator">•</span>
      <strong><?= esc($admin_name) ?></strong>
    </div>
  </div>

  <!-- ===============================
       KPI / STATISTIK UTAMA
  ================================ -->
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

  <div class="dashboard-kpi">
    <?php foreach ($cards as $label => $value): ?>
      <div class="kpi-card">
        <div class="kpi-value"><?= $value ?></div>
        <div class="kpi-label"><?= $label ?></div>
      </div>
    <?php endforeach ?>
  </div>

  <!-- ===============================
       QUICK ACTION (PRIORITY PANEL)
  ================================ -->
  <div class="quick-action-panel">

    <div class="quick-action-title">
      Akses Cepat
      <span>Tindakan utama admin</span>
    </div>

    <div class="quick-action-grid">

      <a href="<?= base_url('admin/berita') ?>" class="qa-card qa-blue">
        <div class="qa-icon">📰</div>
        <div class="qa-text">
          <strong>Berita</strong>
          <span>Tambah & kelola berita</span>
        </div>
      </a>

      <a href="<?= base_url('admin/artikel') ?>" class="qa-card qa-indigo">
        <div class="qa-icon">📄</div>
        <div class="qa-text">
          <strong>Artikel</strong>
          <span>Kelola artikel</span>
        </div>
      </a>

      <a href="<?= base_url('admin/pengumuman') ?>" class="qa-card qa-emerald">
        <div class="qa-icon">📢</div>
        <div class="qa-text">
          <strong>Pengumuman</strong>
          <span>Kelola pengumuman</span>
        </div>
      </a>

      <a href="<?= base_url('admin/peraturan') ?>" class="qa-card qa-slate">
        <div class="qa-icon">⚖️</div>
        <div class="qa-text">
          <strong>Peraturan</strong>
          <span>Dokumen kebijakan</span>
        </div>
      </a>

    </div>
  </div>

  <!-- ===============================
       OVERVIEW (2 KOLOM)
  ================================ -->
  <div class="dashboard-grid-2">

    <!-- STATUS KONTEN -->
    <div class="dashboard-box">
      <h3>Status Konten</h3>

      <ul class="status-list">
        <li>
          <span>Berita Publish</span>
          <strong><?= $berita_status['publish'] ?></strong>
        </li>
        <li>
          <span>Berita Draft</span>
          <strong><?= $berita_status['draft'] ?></strong>
        </li>
        <li>
          <span>Artikel Publish</span>
          <strong><?= $artikel_status['publish'] ?></strong>
        </li>
        <li>
          <span>Artikel Draft</span>
          <strong><?= $artikel_status['draft'] ?></strong>
        </li>
      </ul>
    </div>

    <!-- BERITA TERBARU -->
    <div class="dashboard-box">
      <h3>Berita Terbaru</h3>

      <?php if (empty($latest_berita)): ?>
        <p class="empty-state">Belum ada berita terbaru.</p>
      <?php else: ?>
        <table class="table table-compact">
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
                <td><?= date('d M Y', strtotime($b['created_at'])) ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      <?php endif ?>
    </div>

  </div>

</div>

<?= $this->endSection() ?>
