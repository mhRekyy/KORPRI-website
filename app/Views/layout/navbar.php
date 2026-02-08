<link rel="stylesheet" href="<?= base_url('assets/css/navbar.css') ?>">

<header class="korpri-navbar">
    <div class="container-fluid">
        <div class="korpri-nav-inner">

            <!-- LOGO -->
            <a href="<?= base_url('/') ?>" class="korpri-logo d-flex align-items-center">
                <img src="<?= base_url('assets/img/logo-korpri.png') ?>" alt="KORPRI">
                <span class="logo-text">
                    KORPRI<br>
                    <small>Dewan Pengurus<br>
                        Provinsi Aceh</small>
                </span>
            </a>

            <button class="korpri-burger" type="button" aria-label="Toggle menu">
              <span></span>
              <span></span>
              <span></span>
          </button>

            <!-- MENU -->
            <nav class="korpri-menu navbar-nav d-none d-md-flex flex-row gap-3">

              <!-- Tentang Kami -->
              <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                  href="#"
                  id="ddTentang"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Tentang kami
                </a>

                <ul class="dropdown-menu dd-wide" aria-labelledby="ddTentang">
                  <li>
                    <a class="dropdown-item" href="<?= base_url('profile') ?>">
                      <span class="dd-ic"><i class="fas fa-user-tie"></i></span>
                      <span class="dd-txt">
                        <span class="dd-title">Profil pengurus DPKN</span>
                        <small class="dd-desc">Informasi pengurus dan bidang.</small>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a class="dropdown-item" href="<?= base_url('struktur') ?>">
                      <span class="dd-ic"><i class="fas fa-sitemap"></i></span>
                      <span class="dd-txt">
                        <span class="dd-title">Struktur kelembagaan DPKN</span>
                        <small class="dd-desc">Bagan dan susunan organisasi.</small>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a class="dropdown-item" href="<?= base_url('kepengurusan') ?>">
                      <span class="dd-ic"><i class="fas fa-users"></i></span>
                      <span class="dd-txt">
                        <span class="dd-title">Kepengurusan KORPRI</span>
                        <small class="dd-desc">Daftar kepengurusan dan unit.</small>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a class="dropdown-item" href="<?= base_url('visi-misi') ?>">
                      <span class="dd-ic"><i class="fas fa-bullseye"></i></span>
                      <span class="dd-txt">
                        <span class="dd-title">Visi dan misi KORPRI</span>
                        <small class="dd-desc">Arah, tujuan, dan strategi.</small>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a class="dropdown-item" href="<?= base_url('sejarah') ?>">
                      <span class="dd-ic"><i class="fas fa-landmark"></i></span>
                      <span class="dd-txt">
                        <span class="dd-title">Sejarah KORPRI</span>
                        <small class="dd-desc">Perjalanan dan perkembangan.</small>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a class="dropdown-item" href="<?= base_url('tujuan_fungsi') ?>">
                      <span class="dd-ic"><i class="fas fa-clipboard-list"></i></span>
                      <span class="dd-txt">
                        <span class="dd-title">Tujuan dan Fungsi</span>
                        <small class="dd-desc">Peran dan fungsi organisasi.</small>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a class="dropdown-item" href="<?= base_url('Program') ?>">
                      <span class="dd-ic"><i class="fas fa-tasks"></i></span>
                      <span class="dd-txt">
                        <span class="dd-title">Program Utama</span>
                        <small class="dd-desc">Agenda dan program prioritas.</small>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a class="dropdown-item" href="<?= base_url('KetuaUmum') ?>">
                      <span class="dd-ic"><i class="fas fa-user-check"></i></span>
                      <span class="dd-txt">
                        <span class="dd-title">Ketua umum dari masa ke masa</span>
                        <small class="dd-desc">Daftar ketua umum terdahulu.</small>
                      </span>
                    </a>
                  </li>

                  <li>
                    <a class="dropdown-item" href="<?= base_url('Sekjen') ?>">
                      <span class="dd-ic"><i class="fas fa-user-edit"></i></span>
                      <span class="dd-txt">
                        <span class="dd-title">Sekretaris jenderal dari masa ke masa</span>
                        <small class="dd-desc">Daftar sekretaris Jenderal.</small>
                      </span>
                    </a>
                  </li>
                </ul>
              </div>

              <!-- Galeri -->
              <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                  href="#"
                  id="ddGaleri"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Galeri
                </a>

                <ul class="dropdown-menu" aria-labelledby="ddGaleri">
                  <li>
                    <a class="dropdown-item" href="<?= base_url('galeri') ?>">
                      <span class="dd-ic"><i class="fas fa-image"></i></span>
                      <span class="dd-txt">
                        <span class="dd-title">Foto kegiatan</span>
                        <small class="dd-desc">Dokumentasi foto kegiatan.</small>
                      </span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= base_url('galeri_video') ?>">
                      <span class="dd-ic"><i class="fas fa-video"></i></span>
                      <span class="dd-txt">
                        <span class="dd-title">Video kegiatan</span>
                        <small class="dd-desc">Rekaman dan highlight kegiatan.</small>
                      </span>
                    </a>
                  </li>
                </ul>
              </div>

              <!-- Kebijakan -->
              <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                  href="#"
                  id="ddKebijakan"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Kebijakan
                </a>

                <ul class="dropdown-menu" aria-labelledby="ddKebijakan">
                  <li>
                    <a class="dropdown-item" href="<?= base_url('peraturan') ?>">
                      <span class="dd-ic"><i class="fas fa-scale-balanced"></i></span>
                      <span class="dd-txt">
                        <span class="dd-title">Peraturan</span>
                        <small class="dd-desc">Regulasi dan ketentuan.</small>
                      </span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= base_url('Keputusan') ?>">
                      <span class="dd-ic"><i class="fas fa-gavel"></i></span>
                      <span class="dd-txt">
                        <span class="dd-title">Keputusan</span>
                        <small class="dd-desc">SK dan keputusan organisasi.</small>
                      </span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= base_url('suratedaran') ?>">
                      <span class="dd-ic"><i class="fas fa-envelope-open-text"></i></span>
                      <span class="dd-txt">
                        <span class="dd-title">Surat edaran</span>
                        <small class="dd-desc">Informasi resmi dan edaran.</small>
                      </span>
                    </a>
                  </li>
                </ul>
              </div>

              <!-- Media Publik -->
              <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                  href="#"
                  id="ddMedia"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Media Publik
                </a>

                <ul class="dropdown-menu" aria-labelledby="ddMedia">
                  <li>
                    <a class="dropdown-item" href="<?= base_url('berita') ?>">
                      <span class="dd-ic"><i class="fas fa-newspaper"></i></span>
                      <span class="dd-txt">
                        <span class="dd-title">Berita KORPRI</span>
                        <small class="dd-desc">Update kegiatan dan informasi.</small>
                      </span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= base_url('artikel') ?>">
                      <span class="dd-ic"><i class="fas fa-file-alt"></i></span>
                      <span class="dd-txt">
                        <span class="dd-title">Artikel KORPRI</span>
                        <small class="dd-desc">Opini, edukasi, dan artikel.</small>
                      </span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= base_url('pengumuman') ?>">
                      <span class="dd-ic"><i class="fas fa-bullhorn"></i></span>
                      <span class="dd-txt">
                        <span class="dd-title">Pengumuman</span>
                        <small class="dd-desc">Info penting untuk anggota.</small>
                      </span>
                    </a>
                  </li>
                </ul>
              </div>

            </nav>

            <!-- BUTTON -->
            <a href="<?= base_url('kontak-kami') ?>" class="btn-kontak">
                Kontak Kami
            </a>
        </div>
    </div>
</header>

<div class="korpri-overlay"></div>

<script>
document.addEventListener('DOMContentLoaded', function () {

  const burger  = document.querySelector('.korpri-burger');
  const menu    = document.querySelector('.korpri-menu');
  const overlay = document.querySelector('.korpri-overlay');
  const btnKontak = document.querySelector('.btn-kontak');

  /* ===============================
     BURGER & SIDEBAR
  =============================== */
  burger?.addEventListener('click', () => {
    menu.classList.toggle('is-open');
    overlay.classList.toggle('active');
  });

  overlay?.addEventListener('click', () => {
    menu.classList.remove('is-open');
    overlay.classList.remove('active');
  });

  /* ===============================
     DROPDOWN → ACCORDION (SMOOTH + AUTO CLOSE)
  =============================== */
  const dropdownLinks = document.querySelectorAll(
    '.korpri-menu .nav-item.dropdown > a'
  );

  dropdownLinks.forEach(link => {
    link.addEventListener('click', function (e) {
      if (window.innerWidth > 991) return;

      e.preventDefault();

      const currentItem = this.parentElement;
      const isOpen = currentItem.classList.contains('open');

      // 1️⃣ tutup dropdown lain dulu (smooth)
      document.querySelectorAll(
        '.korpri-menu .nav-item.dropdown.open'
      ).forEach(item => {
        if (item !== currentItem) {
          item.classList.remove('open');
        }
      });

      // 2️⃣ kalau dropdown ini sudah open → tutup
      if (isOpen) {
        currentItem.classList.remove('open');
        return;
      }

      // 3️⃣ frame berikutnya → buka dropdown ini
      requestAnimationFrame(() => {
        currentItem.classList.add('open');
      });
    });
  });

  /* ===============================
     PINDAHKAN TOMBOL KONTAK KE SIDEBAR (MOBILE)
  =============================== */
  function moveKontakButton() {
    if (!menu || !btnKontak) return;

    if (window.innerWidth <= 991) {
      if (!menu.contains(btnKontak)) {
        menu.appendChild(btnKontak);
      }
    }
  }

  moveKontakButton();
  window.addEventListener('resize', moveKontakButton);

});
</script>
