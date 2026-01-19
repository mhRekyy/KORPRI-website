<link rel="stylesheet" href="<?= base_url('assets/css/navbar.css') ?>">

<header class="korpri-navbar">
    <div class="container-fluid">
        <div class="korpri-nav-inner">

            <!-- LOGO -->
            <a href="<?= base_url('/') ?>" class="korpri-logo d-flex align-items-center">
                <img src="<?= base_url('assets/img/logo-korpri.png') ?>" alt="KORPRI">
                <span class="logo-text">
                    KORPRI<br>
                    <small>Korps Pegawai<br>
                        Republik Indonesia</small>
                </span>
            </a>

            <!-- MENU -->
            <nav class="korpri-menu d-none d-md-flex">
                <a href="<?= base_url('tentang-kami') ?>">Tentang kami</a>
                <a href="<?= base_url('galeri') ?>">Galeri</a>
                <a href="<?= base_url('kebijakan') ?>">Kebijakan</a>
                <a href="<?= base_url('media-publik') ?>">Media Publik</a>
            </nav>

            <!-- BUTTON -->
            <a href="<?= base_url('kontak') ?>" class="btn-kontak">
                Kontak Kami
            </a>

        </div>
    </div>
</header>
