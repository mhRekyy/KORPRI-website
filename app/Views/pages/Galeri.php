<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/galeri.css') ?>">

<section class="galeri-wrap">

  <?php if (empty($sections)): ?>
    <p style="padding:40px">Belum ada galeri.</p>
  <?php endif; ?>

  <div class="galeri-fullbleed">
    <div class="bento-marquee" id="bentoMarquee">
      <div class="bento-marquee__track" id="bentoTrack">

        <?php
        // render 2x agar loop mulus: S1,S2,S1,S2
        for ($repeat = 0; $repeat < 2; $repeat++):
          foreach ($sections as $section):
        ?>
            <div class="bento-section">
              <div class="bento-grid">
                <?php foreach ($section as $i => $t): ?>
                  <div class="bento-tile tile-<?= ($i % 8) + 1 ?>">
                    <img
                      class="tile-img"
                      src="<?= base_url('uploads/galeri/' . $t['image']) ?>"
                      alt="<?= esc($t['title'] ?? '') ?>"
                    >
                    <?php if (!empty($t['title'])): ?>
                      <div class="tile-overlay">
                        <span class="tile-label">
                          <?= esc($t['title']) ?>
                        </span>
                      </div>
                    <?php endif; ?>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
        <?php
          endforeach;
        endfor;
        ?>

      </div>
    </div>
  </div>

</section>

<script>
(() => {
  const marquee = document.getElementById('bentoMarquee');
  const track   = document.getElementById('bentoTrack');
  if (!marquee || !track) return;

  const SPEED = 40;
  let paused = false;
  let x = 0;
  let last = performance.now();

  function tick(now) {
    const dt = (now - last) / 1000;
    last = now;

    if (!paused) {
      x -= SPEED * dt;

      // karena konten dirender 2x (S1,S2,S1,S2)
      const resetAt = track.scrollWidth / 2;
      if (Math.abs(x) >= resetAt) x += resetAt;

      track.style.transform = `translate3d(${x}px,0,0)`;
    }

    requestAnimationFrame(tick);
  }

  marquee.addEventListener('mouseenter', () => paused = true);
  marquee.addEventListener('mouseleave', () => {
    paused = false;
    last = performance.now();
  });

  requestAnimationFrame(tick);
})();
</script>

<?= $this->endSection() ?>
