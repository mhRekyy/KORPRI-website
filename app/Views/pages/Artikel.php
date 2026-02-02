<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/artikel.css') ?>">

<section class="berita-wrap">
  <div class="berita-container">

    <!-- Search Artikel -->
    <div class="berita-filter">
      <form method="get" class="berita-filter-form">
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
    <div class="berita-list berita-list--timeline <?= empty($artikel) ? 'is-empty' : '' ?>">

      <?php if (empty($artikel)): ?>
        <div class="empty-state">
          <h3 class="empty-state__title">Artikel tidak ditemukan</h3>
        </div>
      <?php else: ?>

      <div class="berita-grid">
        <?php foreach ($artikel as $a): ?>
          <article class="brow berita-item">

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
                <?= date('d F Y', strtotime($a['published_at'])) ?>
              </div>
            </div>

            <!-- Judul + Excerpt -->
            <div class="b-right">
              <h3 class="btitle"><?= esc($a['title']) ?></h3>
              <p class="bdesc"><?= esc($a['excerpt']) ?></p>
            </div>

          </article>
        <?php endforeach; ?>
      </div>

<?php if (isset($pager) && $pager->getPageCount() > 1): ?>
    <?= $pager->links() ?>
<?php endif; ?>


        

      <?php endif; ?>

    </div>
  </div>
</section>

<?= $this->endSection() ?>
