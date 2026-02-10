<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/pages/berita-detail.css') ?>">

<!-- HERO / BANNER -->
<section class="hero-detail-berita">
    <div class="container text-center"></div>
</section>

<!-- CONTENT -->
<section class="section-detail-berita">
    <div class="container">
        <div class="row">

            <!-- MAIN CONTENT -->
            <div class="col-lg-8">

                <!-- Thumbnail -->
                <?php if (!empty($artikel['thumbnail'])): ?>
                <div class="berita-image mb-3">
                    <img src="<?= base_url('uploads/artikel/' . $artikel['thumbnail']) ?>"
                         alt="<?= esc($artikel['title']) ?>"
                         class="img-fluid">
                </div>
                <?php endif; ?>

                <!-- Meta -->
                <div class="berita-meta mb-2">
                    <span class="badge badge-secondary">
                        Artikel
                    </span>
                    <span class="text-muted ms-2">
                        <?= date('d F Y', strtotime($artikel['published_at'])) ?>
                    </span>
                </div>

                <!-- Judul -->
                <h2 class="berita-judul mb-3">
                    <?= esc($artikel['title']) ?>
                </h2>

                <!-- Konten -->
                <div class="berita-konten">
                    <?= $artikel['content'] ?>
                </div>

            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-4">

                <!-- Artikel Terbaru -->
                <?php if (!empty($artikelTerbaru)): ?>
                <div class="sidebar-box mb-4">
                    <h5 class="sidebar-title">Artikel Terbaru</h5>

                    <?php foreach ($artikelTerbaru as $item): ?>
                        <?php
                        $thumb = !empty($item['thumbnail'])
                            ? base_url('uploads/artikel/' . $item['thumbnail'])
                            : base_url('uploads/artikel/default.jpg');
                        ?>

                        <div class="sidebar-item sidebar-news-item d-flex">
                            <a class="sidebar-news-thumb flex-shrink-0"
                               href="<?= base_url('artikel/' . $item['slug']) ?>">
                                <img src="<?= esc($thumb) ?>" alt="<?= esc($item['title']) ?>">
                            </a>

                            <div class="sidebar-news-content flex-grow-1">
                                <a class="sidebar-news-title"
                                   href="<?= base_url('artikel/' . $item['slug']) ?>">
                                    <?= esc($item['title']) ?>
                                </a>
                                <div class="sidebar-news-date">
                                    <i class="bi bi-calendar me-1"></i>
                                    <?= date('d M Y', strtotime($item['published_at'])) ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

</section>

<!-- ARTIKEL TERKAIT -->
<?php if (!empty($artikelTerkait)): ?>
<section class="section-berita-terkait">
    <div class="container">
        <h4 class="mb-4">Artikel Terkait</h4>

        <div class="row">
            <?php foreach ($artikelTerkait as $item): ?>
                <div class="col-md-4 mb-3">
                    <div class="berita-terkait-item">

                        <?php if (!empty($item['thumbnail'])): ?>
                            <img src="<?= base_url('uploads/artikel/' . $item['thumbnail']) ?>"
                                 class="img-fluid mb-2"
                                 alt="<?= esc($item['title']) ?>">
                        <?php else: ?>
                            <img src="<?= base_url('uploads/artikel/default.jpg') ?>"
                                 class="img-fluid mb-2"
                                 alt="<?= esc($item['title']) ?>">
                        <?php endif; ?>

                        <a href="<?= base_url('artikel/' . $item['slug']) ?>">
                            <strong><?= esc($item['title']) ?></strong>
                        </a>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>




<?= $this->endSection() ?>
