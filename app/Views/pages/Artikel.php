<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/artikel.css') ?>">

<section class="berita-wrap">
  <div class="berita-container">

    <!-- Filter (tetap) -->
<div class="berita-filter">
  <form method="get" class="berita-filter-form">

<select
  class="bf-select"
  name="kategori"
  onchange="this.form.submit()"
>
  <option value="Semua" <?= ($kategori_aktif ?? 'Semua') === 'Semua' ? 'selected' : '' ?>>
    Semua
  </option>
  <option value="Pengumuman" <?= ($kategori_aktif ?? '') === 'Pengumuman' ? 'selected' : '' ?>>
    Pengumuman
  </option>
  <option value="Kegiatan" <?= ($kategori_aktif ?? '') === 'Kegiatan' ? 'selected' : '' ?>>
    Kegiatan
  </option>
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
    <div class="berita-list berita-list--timeline <?= empty($berita) ? 'is-empty' : '' ?>">

      <?php if (empty($berita)): ?>
        <!-- EMPTY STATE -->
        <div class="empty-state">
          <div class="empty-state__icon">
            <i class="bi bi-search"></i>
          </div>

          <h3 class="empty-state__title">Berita tidak ditemukan</h3>

          <?php if (!empty($keyword)): ?>
            <p class="empty-state__desc">
              Tidak ada berita untuk kata kunci: <strong><?= esc($keyword) ?></strong>.
            </p>
          <?php else: ?>
            <p class="empty-state__desc">
              Tidak ada berita yang cocok dengan filter yang dipilih.
            </p>
          <?php endif; ?>

          <div class="empty-state__actions">
            <a class="empty-state__btn" href="<?= site_url('berita') ?>">Lihat semua berita</a>
          </div>
        </div>

      <?php else: ?>
        <div class="berita-grid">
  <?php foreach ($berita as $b): ?>
    <article class="brow berita-item">
      <!-- Kolom 1: Media -->
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

      <!-- Kolom 2: Tanggal -->
      <div class="bmid">
        <div class="bdate">
          <?php
            setlocale(LC_TIME, 'id_ID.UTF-8', 'id_ID', 'Indonesian_indonesia.1252');
            echo esc(strftime('%d %B %Y', strtotime($b['created_at'])));
          ?>
        </div>
      </div>

      <!-- Kolom 3: Judul + Deskripsi -->
      <div class="b-right">
        <div class="title-card">
          <h3 class="btitle"><?= esc($b['judul']) ?></h3>
        </div>

        <div class="desc-card">
          <p class="bdesc"><?= esc(strip_tags($b['konten'])) ?></p>
        </div>
      </div>
    </article>
  <?php endforeach; ?>
</div>

<?php if (isset($pager)): ?>
  <nav class="pager-wrap" aria-label="Pagination berita">
    <?= $pager->links('berita') ?>
  </nav>
<?php endif; ?>



        <?php endif; ?>

      </div>

  </div>
</section>

<?= $this->endSection() ?>
