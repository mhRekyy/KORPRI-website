<footer class="korpri-footer">
  <div class="container korpri-footer__inner">

    <div class="row g-4 align-items-start">
      <!-- Kiri: Brand -->
      <div class="col-12 col-lg-4">
        <div class="korpri-footer__brand">
          <div class="korpri-footer__logo">
            <img src="<?= base_url('assets/img/logo-korpri.png') ?>" alt="KORPRI Logo">
          </div>

          <div class="korpri-footer__brand-text">
            <h5 class="korpri-footer__title">KORPRI</h5>
            <div class="korpri-footer__subtitle">Dewan Pengurus<br>Provinsi Aceh</div>
          </div>
        </div>

        <p class="korpri-footer__desc">
          KORPRI Provinsi Aceh merupakan organisasi yang mewadahi aparatur sipil negara dalam memperkuat persatuan, profesionalisme, dan pengabdian kepada masyarakat.
        </p>

        <div class="korpri-footer__sosmed">
          <a class="footer_sosmed-btn fb" href="https://facebook.com/USERNAME" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
            <i class="fab fa-facebook-f" aria-hidden="true"></i>
          </a>
          <a class="footer_sosmed-btn x" href="https://x.com/USERNAME" target="_blank" rel="noopener noreferrer" aria-label="X (Twitter)">
            <i class="fab fa-x-twitter" aria-hidden="true"></i>
          </a>
          <a class="footer_sosmed-btn ig" href="https://instagram.com/USERNAME" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
            <i class="fab fa-instagram" aria-hidden="true"></i>
          </a>
          <a class="footer_sosmed-btn in" href="https://linkedin.com/in/USERNAME" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
            <i class="fab fa-linkedin-in" aria-hidden="true"></i>
          </a>
          <a class="footer_sosmed-btn yt" href="https://youtube.com/@USERNAME" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
            <i class="fab fa-youtube" aria-hidden="true"></i>
          </a>
        </div>
      </div>

      <!-- Tengah: Statistik -->
<!-- Tengah: Informasi & Layanan -->
  <div class="col-12 col-lg-4">
    <h6 class="korpri-footer__heading1">Informasi & Layanan</h6>

    <ul class="korpri-footer__list korpri-footer__menu">
      <li class="korpri-footer__item">
        <a href="<?= base_url('profile') ?>" class="korpri-footer__link">
          <i class="bi bi-building korpri-footer__icon"></i>
          Profil Organisasi Korpri
        </a>
      </li>

      <li class="korpri-footer__item">
        <a href="<?= base_url('struktur') ?>" class="korpri-footer__link">
          <i class="bi bi-diagram-3-fill korpri-footer__icon"></i>
          Struktur Kepengurusan korpri
        </a>
      </li>

      <li class="korpri-footer__item">
        <a href="<?= base_url('berita') ?>" class="korpri-footer__link">
          <i class="bi bi-newspaper korpri-footer__icon"></i>
          Berita & Kegiatan Korpri
        </a>
      </li>

      <li class="korpri-footer__item">
        <a href="<?= base_url('pengumuman') ?>" class="korpri-footer__link">
          <i class="bi bi-megaphone-fill korpri-footer__icon"></i>
          Pengumuman Resmi Korpri
        </a>
      </li>

      <li class="korpri-footer__item">
        <a href="<?= base_url('peraturan') ?>" class="korpri-footer__link">
          <i class="bi bi-file-earmark-text-fill korpri-footer__icon"></i>
          Peraturan & Keputusan Korpri
        </a>
      </li>

      <li class="korpri-footer__item">
        <a href="<?= base_url('galeri') ?>" class="korpri-footer__link">
          <i class="bi bi-images korpri-footer__icon"></i>
          Galeri Kegiatan Korpri
        </a>
      </li>
    </ul>
  </div>


      <!-- Kanan: Kontak -->
      <div class="col-12 col-lg-4 korpri-footer__contact-col">
        <div class="korpri-footer__contact-wrap">
          <h6 class="korpri-footer__heading2">Contacts us</h6>

          <ul class="korpri-footer__contact">
            <li class="korpri-footer__contact-item">
              <i class="bi bi-envelope korpri-footer__contact-icon"></i>
              <span>korpri@gmail.com</span>
            </li>
            <li class="korpri-footer__contact-item">
              <i class="bi bi-telephone korpri-footer__contact-icon"></i>
              <span> 0852-0000-0000</span>
            </li>
            <li class="korpri-footer__contact-item">
              <i class="bi bi-geo-alt korpri-footer__contact-icon"></i>
              <span>Jl. Tengku Malem No.2,<br> Kuta Alam,Kec. Kuta Alam, <br>Kota Banda Aceh, Aceh 24415</span>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <hr class="korpri-footer__divider">

    <div class="korpri-footer__bottom">
      <span>© <?= date('Y') ?> KORPRI</span>
      <span>All rights reserved</span>
    </div>

  </div>
</footer>
