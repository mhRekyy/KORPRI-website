<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/galeri_video.css') ?>">

<section class="vk-wrap">
  <div class="vk-container">

    <div class="vk-hero">
      <div class="vk-filter">
        <input class="vk-input" type="text" placeholder="Tahun">
        <input class="vk-input" type="text" placeholder="Kategori Acara">
        <button class="vk-btn" type="button" aria-label="Search">⌕</button>
      </div>
    </div>

    <div class="vk-list">
      <?php foreach ($videos as $i => $v): ?>
        <div class="vk-item <?= ($i % 2 === 0) ? 'is-left' : 'is-right' ?>"
             data-youtube-url="<?= esc($v['youtube_url']) ?>">

          <!-- CARD VIDEO -->
          <div class="vk-card">
            <button class="vk-thumb" type="button" aria-label="Play video">
              <img class="vk-thumb__img" alt="Thumbnail video">
              <span class="vk-thumb__play"></span>
            </button>

            <div class="vk-card__meta">
              <div class="vk-card__title js-title">Memuat judul…</div>
              <div class="vk-card__date"><?= date('d F Y', strtotime($v['tanggal'])) ?></div>
            </div>
          </div>

          <!-- DESKRIPSI -->
          <div class="vk-desc">
            <h3 class="vk-desc__title js-title2">Memuat judul…</h3>
            <p class="vk-desc__text"><?= esc($v['deskripsi']) ?></p>
          </div>

        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<script>
  function getYouTubeId(url) {
    url = String(url || '');
    const m = url.match(/(?:v=|youtu\.be\/|embed\/)([A-Za-z0-9_-]{6,})/);
    return m ? m[1] : null;
  }

  async function getOEmbed(url) {
    const endpoint = 'https://www.youtube.com/oembed?format=json&url=' + encodeURIComponent(url);
    const res = await fetch(endpoint);
    if (!res.ok) throw new Error('oEmbed failed');
    return await res.json();
  }

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

  document.querySelectorAll('.vk-item').forEach(async (item) => {
    const url = item.dataset.youtubeUrl;
    const videoId = getYouTubeId(url);

    // set thumbnail
    const img = item.querySelector('.vk-thumb__img');
    if (videoId) {
      img.src = 'https://i.ytimg.com/vi/' + videoId + '/hqdefault.jpg';
      img.dataset.videoId = videoId;
    }

    // set title from oEmbed
    try {
      const data = await getOEmbed(url);
      item.querySelectorAll('.js-title, .js-title2').forEach(el => el.textContent = data.title);
    } catch (e) {
      item.querySelectorAll('.js-title, .js-title2').forEach(el => el.textContent = 'Video Kegiatan');
    }
  });

  // click play
  document.addEventListener('click', (e) => {
    const btn = e.target.closest('.vk-thumb');
    if (!btn) return;

    const item = btn.closest('.vk-item');
    const img = btn.querySelector('.vk-thumb__img');
    const vid = img.dataset.videoId;
    if (!vid) return;

    // ganti area thumbnail jadi iframe autoplay
    mountIframe(btn.parentElement, vid);
  });
</script>


<?= $this->endSection() ?>
