<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<section class="landing-wrap">
  <div class="container-fluid landing-full">
    <div class="landing-container">
    
      <!-- Hero Slider Section -->
      <div class="hero-media">
          <div class="swiper" id="heroSwiper">
            <div class="swiper-wrapper">
              <?php foreach (($slides ?? []) as $s): ?>
                <div class="swiper-slide" data-caption="<?= esc($s['caption']) ?>">
                  <img src="<?= esc($s['image']) ?>" alt="<?= esc($s['caption']) ?>">
                </div>
              <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
      </div>
      
      <div class="caption-badge" id="heroCaption">
        <?= esc($slides[0]['caption'] ?? '') ?>
      </div>

    </div>

    <!-- Quick Access Section -->
    <div class="quick-access-section">
      <div class="container">
        <div class="quick-access-grid">

          <a class="quick-access-item" href="<?= base_url('profile') ?>">
            <div class="quick-icon"><i class="fas fa-search"></i></div>
            <h3>Cek Keanggotaan</h3>
          </a>

          <a class="quick-access-item" href="<?= base_url('Peraturan') ?>">
            <div class="quick-icon"><i class="fas fa-balance-scale"></i></div>
            <h3>Peraturan</h3>
          </a>

          <a class="quick-access-item" href="<?= base_url('Program') ?>">
            <div class="quick-icon"><i class="fas fa-tasks"></i></div>
            <h3>Program Utama</h3>
          </a>

          <a class="quick-access-item" href=https://kinerja.bkn.go.id/login>
            <div class="quick-icon"><i class="fas fa-book"></i></div>
            <h3>E-Kinerja</h3>
          </a>

        </div>
      </div>
    </div>


    <!-- Latest News Section -->
    <div class="news-section">
      <div class="container">
        <div class="section-header">
          <h2>Berita Terkini</h2>
          <h2 class="pengumuman-title">Pengumuman</h2>
        </div>
        
        <div class="news-pengumuman-wrapper">
          <?php if (!empty($news)): ?>
            <?php foreach (array_slice($news, 0, 3) as $item): ?>
              <div class="news-card">
                <div class="news-image">
                  <img src="<?= esc($item['image']) ?>" alt="<?= esc($item['title']) ?>">
                </div>
                <div class="news-content">
                  <p class="news-excerpt"><?= esc($item['excerpt']) ?></p>
                  <span class="news-date"><?= esc($item['date']) ?></span>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
          
          <div class="pengumuman-box">
            <div class="pengumuman-content">
              <?php if (!empty($pengumuman)): ?>
                <ul style="list-style: none; padding: 0; margin: 0;">
                  <?php foreach (array_slice($pengumuman, 0, 5) as $p): ?>
                    <li style="margin-bottom: 12px;">
                      <a href="<?= esc($p['link']) ?>" style="color: #4b5563; text-decoration: none; font-size: 14px; line-height: 1.5; display: block;">
                        • <?= esc($p['title']) ?>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php else: ?>
                <p style="color: #9ca3af; font-size: 14px; text-align: center; margin-top: 50px;">Tidak ada pengumuman</p>
              <?php endif; ?>
            </div>
          </div>
        </div>
        
        <div class="text-center mt-4">
          <a href="/berita" class="btn-selengkapnya">
            Selengkapnya →
          </a>
        </div>
      </div>
    </div>

    <!-- Tentang KORPRI Section -->
    <div class="about-section">
        <div class="about-wrapper">
          <div class="about-logo">
            <img src="<?= base_url('assets/img/logo-korpri.png') ?>" alt="Logo KORPRI">
          </div>
          <div class="about-content">
            <h2>TENTANG KORPRI</h2>
            <p>
              <?= esc($tentang_korpri) ?>
            </p>
          </div>
        </div>
    </div>

    <!-- Program Unggulan KORPRI -->
    <div class="program-section">
      <div class="container">
        <h2 class="program-title">PROGRAM UNGGULAN KORPRI</h2>
        
        <div class="program-grid">
          <?php if (!empty($programs)): ?>
            <?php foreach ($programs as $program): ?>
              <a class="program-card">
                <div class="program-icon">
                  <i class="<?= esc($program['icon']) ?>"></i>
                </div>
                <h3><?= esc($program['title']) ?></h3>
                <p><?= esc($program['description']) ?></p>
              </a>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
      
  </div>
</section>
<?= $this->endSection() ?>
