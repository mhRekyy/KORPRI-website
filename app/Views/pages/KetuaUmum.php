<?= $this->extend('layout/main_inner') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/ketua_umum.css') ?>">

<div class="page-container">
    <!-- Watermark Background -->
    <div class="watermark-bg"></div>

    <div class="content-wrapper">
        <!-- Header / Judul -->
        <div class="section-title">
            <h1>Profil Ketua Umum Korpri</h1>
            <p>Berikut adalah daftar Ketua Umum KORPRI Aceh yang pernah menjabat dari masa ke masa, dari awal berdirinya hingga sekarang</p>
        </div>

        <!-- Grid Cards -->
        <div class="card-grid">
            
            <?php foreach ($ketua_list as $ketua) : ?>
                <div class="profile-card">
                    <div class="card-photo">
                        <?php if (!empty($ketua['foto'])) : ?>
                            <img src="<?= base_url('assets/img/ketua/' . $ketua['foto']) ?>"
                                alt="<?= esc($ketua['nama']) ?>"
                                class="ketua-photo">
                        <?php endif; ?>
                    </div>

                    
                    <div class="card-footer">
                        <!-- Logika: Tampilkan nama jika ada -->
                        <?php if (!empty($ketua['nama'])) : ?>
                            <div class="footer-content">
                                <h3 class="card-name"><?= $ketua['nama'] ?></h3>
                                
                                <!-- Tambahkan baris ini untuk menampilkan Periode -->
                                <?php if (!empty($ketua['periode'])) : ?>
                                    <p class="card-period"><?= $ketua['periode'] ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
