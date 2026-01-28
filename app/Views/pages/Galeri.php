<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/pages/galeri.css') ?>">

<section class="galeri-wrap">
  <!-- <div class="galeri-container">
    <h2 class="galeri-title">GALERI FOTO</h2>
  </div> -->

  <!-- BREAKOUT FULL WIDTH -->
  <div class="galeri-fullbleed">
    <div class="bento-marquee" aria-label="Galeri foto berjalan">
      <div class="bento-marquee__track">

        <!-- SET 1 -->
        <div class="bento-grid">
          <?php foreach ($galeri as $i => $g): ?>
            <div class="bento-tile tile-<?= ($i % 8) + 1 ?>">
              <img class="tile-img" src="<?= esc($g['image']) ?>" alt="<?= esc($g['title']) ?>">
              <div class="tile-overlay">
                <span class="tile-label"><?= esc($g['title']) ?></span>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- SET 2 (duplikat untuk looping mulus) -->
        <div class="bento-grid" aria-hidden="true">
          <?php foreach ($galeri as $i => $g): ?>
            <div class="bento-tile tile-<?= ($i % 8) + 1 ?>">
              <img class="tile-img" src="<?= esc($g['image']) ?>" alt="">
              <div class="tile-overlay">
                <span class="tile-label"><?= esc($g['title']) ?></span>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        
        <!-- SET 3 (duplikat untuk looping mulus) -->
        <div class="bento-grid" aria-hidden="true">
          <?php foreach ($galeri as $i => $g): ?>
            <div class="bento-tile tile-<?= ($i % 8) + 1 ?>">
              <img class="tile-img" src="<?= esc($g['image']) ?>" alt="">
              <div class="tile-overlay">
                <span class="tile-label"><?= esc($g['title']) ?></span>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

      </div>
    </div>
  </div>
</section>

</section>
<?= $this->endSection() ?>