<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/galeri_video.css') ?>">

<div class="video-kegiatan-page">

    <?php foreach ($videos as $index => $video): ?>
    <div class="video-row <?= $index % 2 == 0 ? 'left' : 'right' ?>">

        <!-- VIDEO FRAME -->
        <div class="video-frame-wrapper">
            <div class="video-layer back"></div>

            <a href="<?= esc($video['youtube_url']) ?>" 
               target="_blank" 
               class="video-layer front">

                <img src="<?= esc($video['thumbnail']) ?>" alt="<?= esc($video['title']) ?>">

                <div class="play-icon">
                    ▶
                </div>

                <div class="video-footer">
                    <h4><?= esc($video['title']) ?></h4>
                    <span><?= esc($video['date']) ?></span>
                </div>

            </a>
        </div>

        <!-- DESCRIPTION -->
        <div class="video-info">
            <h2><?= esc($video['title']) ?></h2>
            <p><?= esc($video['description']) ?></p>
        </div>

    </div>
    <?php endforeach; ?>

</div>

<?= $this->endSection() ?>
