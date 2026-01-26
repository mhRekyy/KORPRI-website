<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/pages/berita-detail.css') ?>">


<!-- HERO / BANNER -->
<section class="hero-detail-berita">
    <div class="container text-center">
    </div>
</section>

<!-- CONTENT -->
<section class="section-detail-berita">
    <div class="container">
        <div class="row">

            <!-- MAIN CONTENT -->
            <div class="col-lg-8">

                <!-- Gambar -->
                <div class="berita-image mb-3">
                    <img src="<?= base_url('uploads/berita/' . $berita['gambar']) ?>"
                         alt="<?= esc($berita['judul']) ?>"
                         class="img-fluid">
                </div>

                <!-- Meta -->
                <div class="berita-meta mb-2">
                    <span class="badge badge-secondary">
                        <?= esc($berita['kategori']) ?>
                    </span>
                    <span class="text-muted ms-2">
                        <?= date('d F Y', strtotime($berita['created_at'])) ?>
                    </span>
                </div>

                <!-- Judul -->
                <h2 class="berita-judul mb-3">
                    <?= esc($berita['judul']) ?>
                </h2>

                <!-- Konten -->
                <div class="berita-konten">
                    <?= $berita['konten'] ?>
                </div>

            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-4">

                <!-- Berita Terkini -->
                <div class="sidebar-box mb-4">
                    <h5 class="sidebar-title">Berita Terkini</h5>

                    <?php foreach ($beritaTerkini as $item): ?>
                        <div class="sidebar-item">
                            <a href="<?= base_url('berita/' . $item['id']) ?>">
                                <?= esc($item['judul']) ?>
                            </a>
                            <div class="small text-muted">
                                <?= date('d M Y', strtotime($item['created_at'])) ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Kategori -->
                <div class="sidebar-box">
                    <h5 class="sidebar-title">Kategori Berita</h5>
                    <ul class="list-unstyled">
                        <?php foreach ($kategoriList as $kat): ?>
                            <li>
                                <a href="<?= base_url('berita?kategori=' . $kat['kategori']) ?>">
                                    <?= esc($kat['kategori']) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- BERITA TERKAIT -->
<section class="section-berita-terkait">
    <div class="container">
        <h4 class="mb-4">Berita Terkait</h4>

        <div class="row">
            <?php foreach ($beritaTerkait as $item): ?>
                <div class="col-md-4 mb-3">
                    <div class="berita-terkait-item">
                        <img src="<?= base_url('uploads/berita/' . $item['gambar']) ?>"
                             class="img-fluid mb-2"
                             alt="<?= esc($item['judul']) ?>">

                        <a href="<?= base_url('berita/' . $item['id']) ?>">
                            <strong><?= esc($item['judul']) ?></strong>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
