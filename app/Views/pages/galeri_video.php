<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/galeri_video.css') ?>">

<section class="vk-wrap">
  <div class="watermark-bg"></div>

  <div class="vk-container">

    <?php if (empty($videos)): ?>
        <div class="empty-state">
            Dokumentasi video kegiatan belum tersedia.
        </div>
    <?php else: ?>

    <div class="vk-list">
      <?php foreach ($videos as $i => $v): ?>
        <div class="vk-item <?= ($i % 2 === 0) ? 'is-left' : 'is-right' ?>">

          <!-- CARD VIDEO -->
          <div class="vk-card">
            <button
              class="vk-thumb"
              type="button"
              aria-label="Putar video"
              data-video-id="<?= esc($v['youtube_video_id']) ?>"
            >
              <img
                class="vk-thumb__img"
                src="<?= esc($v['thumbnail_url']) ?>"
                alt="<?= esc($v['youtube_title']) ?>"
                loading="lazy"
              >
              <span class="vk-thumb__play"></span>
            </button>

            <div class="vk-card__meta">
              <div class="vk-card__title">
                <?= esc($v['youtube_title']) ?>
              </div>
              <div class="vk-card__date">
                <?= date('d F Y', strtotime($v['created_at'])) ?>
              </div>
            </div>
          </div>

          <!-- DESKRIPSI -->
          <div class="vk-desc">
            <h3 class="vk-desc__title">
              <?= esc($v['youtube_title']) ?>
            </h3>
            <?php if (! empty($v['description'])): ?>
              <p class="vk-desc__text">
                <?= esc($v['description']) ?>
              </p>
            <?php endif; ?>
          </div>

        </div>
      <?php endforeach; ?>
    </div>

    <?php endif; ?>

  </div>
</section>

<script>
  function mountIframe(container, videoId) {
    const iframe = document.createElement('iframe');
    iframe.className = 'vk-iframe';
    iframe.src = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1';
    iframe.title = 'YouTube video player';
    iframe.setAttribute('allow', 'autoplay; encrypted-media; picture-in-picture');
    iframe.setAttribute('allowfullscreen', '');
    container.innerHTML = '';
    container.appendChild(iframe);
  }

  document.addEventListener('click', function (e) {
    const btn = e.target.closest('.vk-thumb');
    if (!btn) return;

    const videoId = btn.dataset.videoId;
    if (!videoId) return;

    mountIframe(btn.parentElement, videoId);
  });
</script>

<?= $this->endSection() ?>
