<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/pages/galeri.css') ?>">

<section class="galeri-wrap">
  <div class="galeri-container">

    <h2 class="galeri-title">GALERI FOTO</h2>

    <div class="bento-grid">
      <?php foreach ($galeri as $i => $g): ?>
        <a
          href="<?= !empty($g['href']) ? esc($g['href']) : '#' ?>"
          class="bento-tile tile-<?= $i+1 ?>"
          aria-label="<?= esc($g['title']) ?>"
        >
          <div class="tile-marquee">
            <!-- 2 track untuk efek looping mulus -->
            <div class="tile-track">
              <img src="<?= base_url('uploads/galeri/' . $g['image']) ?>" alt="<?= esc($g['title']) ?>">
              <img src="<?= base_url('uploads/galeri/' . $g['image']) ?>" alt="" aria-hidden="true">
            </div>
          </div>

          <div class="tile-overlay">
            <span class="tile-label"><?= esc($g['title']) ?></span>
          </div>
        </a>
      <?php endforeach; ?>
    </div>

  </div>
</section>
<?= $this->endSection() ?>