<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/pages/galeri.css') ?>">

<section class="galeri-wrap">

  <div class="galeri-fullbleed">
  <div class="bento-marquee" id="bentoMarquee">
    <div class="bento-marquee__track" id="bentoTrack">

      <div class="bento-grid" id="bentoSet">
        <?php foreach ($galeri as $i => $g): ?>
          <div class="bento-tile tile-<?= ($i % 8) + 1 ?>">
            <img class="tile-img" src="<?= esc($g['image']) ?>" alt="<?= esc($g['title']) ?>">
            <div class="tile-overlay">
              <span class="tile-label"><?= esc($g['title']) ?></span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- duplikat awal (biar langsung jalan), nanti JS akan clone lagi kalau perlu -->
      <div class="bento-grid" aria-hidden="true">
        <?php foreach ($galeri as $i => $g): ?>
          <div class="bento-tile tile-<?= ($i % 8) + 1 ?>">
            <img class="tile-img" src="<?= esc($g['image']) ?>" alt="" aria-hidden="true">
            <div class="tile-overlay" aria-hidden="true">
              <span class="tile-label"><?= esc($g['title']) ?></span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</div>


</section>
<script>
(() => {
  const marquee = document.getElementById('bentoMarquee');
  const track   = document.getElementById('bentoTrack');
  const firstSet = document.getElementById('bentoSet');

  if (!marquee || !track || !firstSet) return;

  // px per detik (velocity). ubah sesukamu.
  const SPEED = 40;

  let paused = false;
  let x = 0;
  let last = performance.now();

  function ensureEnoughClones() {
    // pastikan track cukup panjang untuk menutup layar + cadangan
    const needWidth = marquee.clientWidth * 2;
    while (track.scrollWidth < needWidth) {
      const clone = firstSet.cloneNode(true);
      clone.removeAttribute('id');
      clone.setAttribute('aria-hidden', 'true');
      track.appendChild(clone);
    }
  }

  function tick(now) {
    const dt = (now - last) / 1000;
    last = now;

    if (!paused) {
      x -= SPEED * dt;

      const setWidth = firstSet.offsetWidth + parseFloat(getComputedStyle(track).columnGap || 0) || firstSet.offsetWidth;
      // reset saat sudah lewat 1 set (supaya loop mulus)
      if (Math.abs(x) >= setWidth) x += setWidth;

      track.style.transform = `translate3d(${x}px,0,0)`;
    }

    requestAnimationFrame(tick);
  }

  ensureEnoughClones();
  window.addEventListener('resize', ensureEnoughClones);

  marquee.addEventListener('mouseenter', () => paused = true);
  marquee.addEventListener('mouseleave', () => paused = false);

  requestAnimationFrame(tick);
})();
</script>

<?= $this->endSection() ?>
