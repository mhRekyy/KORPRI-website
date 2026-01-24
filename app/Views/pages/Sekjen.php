<?= $this->extend('layout/main_inner') ?>

<?= $this->section('content') ?>

    <link rel="stylesheet" href="<?= base_url('assets/css/pages/ketua_umum.css') ?>">

<div class="page-container">
    <!-- Watermark Background -->
    <div class="watermark-bg"></div>

    <div class="content-wrapper">
        <!-- Header / Judul -->
        <div class="section-title">
            <h1>Profil Sekretaris Jenderal Korpri</h1>
            <p>Berikut adalah daftar Sekretaris Jenderal KORPRI Aceh yang pernah menjabat dari masa ke masa, dari awal berdirinya hingga sekarang</p>
        </div>

        <!-- Grid Cards -->
        <div class="card-grid">
            <?php foreach ($Sekjen_list as $Sekjen) : ?>
                <div class="profile-card">
                    <div class="card-photo">
                        <!-- Logika: Tampilkan foto jika ada, jika kosong biarkan abu-abu -->
                        <?php if (!empty($Sekjen['foto']) && !empty($Sekjen['nama'])) : ?>
                            <!-- Pastikan path gambarnya benar -->
                            <img src="<?= base_url('assets/img/ketua/' . $Sekjen['foto']) ?>" alt="<?= $Sekjen['nama'] ?>" onerror="this.style.display='none'">
                        <?php endif; ?>
                    </div>
                    
                    <div class="card-footer">
                        <!-- Logika: Tampilkan nama jika ada -->
                        <?php if (!empty($Sekjen['nama'])) : ?>
                            <div class="footer-content">
                                <h3 class="card-name"><?= $Sekjen['nama'] ?></h3>
                                
                                <!-- Tambahkan baris ini untuk menampilkan Periode -->
                                <?php if (!empty($Sekjen['periode'])) : ?>
                                    <p class="card-period"><?= $Sekjen['periode'] ?></p>
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
