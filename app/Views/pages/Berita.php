<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/berita.css') ?>">
<section class="berita-wrap">
  <div class="berita-container">

    <div class="berita-filter">
      <select class="bf-select">
        <option selected>Pengumuman</option>
        <option>Semua</option>
        <option>Kegiatan</option>
      </select>

      <input class="bf-input" type="text" placeholder="" />

      <button class="bf-btn" type="button" aria-label="Search">
        <span class="bf-btn__icon">⌕</span>
      </button>
    </div>

    <div class="berita-list berita-list--timeline">
  <?php foreach ($posts as $p): ?>
    <div class="brow">

      <!-- kiri: media -->
      <article class="bcard bcard--media">
        <div class="bmedia">
          <?php if (!empty($p['image'])): ?>
            <img class="bmedia__img" src="<?= esc($p['image']) ?>" alt="Gambar berita">
          <?php else: ?>
            <div class="bmedia__ph">
              <div class="bmedia__icon">🖼</div>
            </div>
          <?php endif; ?>
          <div class="bmedia__gold"></div>
        </div>
      </article>

      <!-- tengah: badge tanggal -->
      <div class="bmid">
        <div class="bdate"><?= esc($p['date']) ?></div>
      </div>

      <!-- kanan: 2 box (atas kosong, bawah isi) -->
      <div class="bright">
        <div class="bcard bcard--top"></div>

        <article class="bcard bcard--text">
          <div class="btext">
            <div class="btext__dash"></div>
            <p class="btext__p"><?= esc($p['excerpt']) ?></p>
          </div>
        </article>
      </div>

    </div>
  <?php endforeach; ?>
</div>


  </div>
</section>

<?= $this->endSection() ?>
