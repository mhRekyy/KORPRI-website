<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/berita.css') ?>">

<section class="berita-wrap">
  <div class="berita-container">

    <!-- Filter (tetap) -->
<div class="berita-filter">
  <form method="get" class="berita-filter-form">

    <select class="bf-select" name="kategori">
      <option value="Semua">Semua</option>
      <option value="Pengumuman">Pengumuman</option>
      <option value="Kegiatan">Kegiatan</option>
    </select>

    <input
      class="bf-input"
      type="text"
      name="q"
      placeholder="Cari berita..."
    />

    <button class="bf-btn" type="submit" aria-label="Search">
      <i class="fas fa-search bf-btn__icon"></i>
    </button>

  </form>
</div>


    <!-- List Timeline -->
    <div class="berita-list berita-list--timeline">
      <?php foreach ($berita as $b): ?>
      <div class="brow">
        
        <!-- Kolom 1: SATU CONTAINER PUTIH Gambar + Tombol -->
        <div class="media-card">
          <div class="bmedia">
          <?php if (!empty($b['gambar'])): ?>
  <img
    class="bmedia__img"
    src="<?= base_url('uploads/berita/' . $b['gambar']) ?>"
    alt="<?= esc($b['judul']) ?>"
  >
        <?php else: ?>
          <div class="bmedia__ph">
            <svg class="ph-icon" viewBox="0 0 48 48">
              <rect x="4" y="4" width="40" height="30" rx="4" fill="#f3f4f6"/>
              <circle cx="32" cy="36" r="6" fill="#d1d5db"/>
            </svg>
            <span class="ph-plus">+</span>
          </div>
        <?php endif; ?>

          </div>
          <div class="btn-wrapper">
          <a href="<?= site_url('berita/' . $b['id']) ?>" class="bmedia__btn">SELENGKAPNYA</a>
          </div>
        </div>

        <!-- Kolom 2: Tanggal Tengah (posisi lebih tinggi) -->
        <div class="bmid">
        <div class="bdate">
  <?= esc(date('d M Y', strtotime($b['created_at']))) ?>
</div>

        </div>

        <!-- Kolom 3: Judul Container + Deskripsi Container Terpisah -->
        <div class="b-right">
          <!-- Judul: Container Putih Sendiri -->
          <div class="title-card">
            <h3 class="btitle"><?= esc($b['judul']) ?></h3>
          </div>
          
          <!-- Deskripsi: Container Putih Sendiri + Border Emas Kiri -->
          <div class="desc-card">
          <p class="bdesc">
    <?= esc(strip_tags(substr($b['konten'], 0, 120))) ?>...
  </p>

          </div>
        </div>

      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<?= $this->endSection() ?>
