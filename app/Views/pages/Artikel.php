<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/artikel.css') ?>">

<section class="artikel-wrap">
  <div class="artikel-container">

    <!-- Search Artikel -->
    <div class="artikel-filter">
      <form method="get" class="artikel-filter-form">
        <input
          class="bf-input"
          type="text"
          name="q"
          value="<?= esc($keyword ?? '') ?>"
          placeholder="Cari artikel..."
        />

        <button class="bf-btn" type="submit">
          <i class="fas fa-search bf-btn__icon"></i>
        </button>
      </form>
    </div>

    <!-- List Artikel -->
    <div class="artikel-list artikel-list--timeline <?= empty($artikel) ? 'is-empty' : '' ?>">

      <?php if (empty($artikel)): ?>
        <!-- EMPTY STATE -->
        <div class="empty-state">
          <div class="empty-state__icon">
            <i class="bi bi-search"></i>
          </div>

          <h3 class="empty-state__title">Artikel tidak ditemukan</h3>

          <?php if (!empty($keyword)): ?>
            <p class="empty-state__desc">
              Tidak ada artikel untuk kata kunci: <strong><?= esc($keyword) ?></strong>.
            </p>
          <?php else: ?>
            <p class="empty-state__desc">
              Tidak ada artikel yang cocok dengan filter yang dipilih.
            </p>
          <?php endif; ?>

          <div class="empty-state__actions">
            <a class="empty-state__btn" href="<?= site_url('artikel') ?>">Lihat semua artikel</a>
          </div>
        </div>
      <?php else: ?>

      <div class="artikel-grid">
        <?php foreach ($artikel as $a): ?>
          <article class="brow artikel-item">

            <!-- Thumbnail -->
            <div class="media-card">
              <div class="bmedia">
                <?php if (!empty($a['thumbnail'])): ?>
                  <img
                    class="bmedia__img"
                    src="<?= base_url('uploads/artikel/' . $a['thumbnail']) ?>"
                    alt="<?= esc($a['title']) ?>"
                  >
                <?php endif; ?>
              </div>

              <div class="btn-wrapper">
                <a href="<?= site_url('artikel/' . $a['slug']) ?>" class="bmedia__btn">
                  SELENGKAPNYA
                </a>
              </div>
            </div>

            <!-- Tanggal -->
            <div class="bmid">
              <div class="bdate">
                 <?php
            setlocale(LC_TIME, 'id_ID.UTF-8', 'id_ID', 'Indonesian_indonesia.1252');
            echo esc(strftime('%d %B %Y', strtotime($a['published_at'])));
          ?>
              </div>
            </div>

            <!-- Judul + Excerpt -->
            <div class="b-right">
              <div class="title-card">
              <h3 class="btitle"><?= esc($a['title']) ?></h3>
              </div>

              <div class="desc-card">
              <p class="bdesc"><?= esc($a['excerpt']) ?></p>
            </div>
                </div>

          </article>
        <?php endforeach; ?>
      </div>

<?php if (isset($pager)): ?>
  <nav class="pager-wrap" aria-label="Pagination artikel">
    <?= $pager->links('artikel') ?>
  </nav>
<?php endif; ?>

        

      <?php endif; ?>

    </div>
  </div>
</section>

<?= $this->endSection() ?>
