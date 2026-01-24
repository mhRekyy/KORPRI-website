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
          Lorem ipsum dolor sit amet consectetur adipisicing elit aliquam
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
      <div class="col-12 col-lg-4">
        <h6 class="korpri-footer__heading">Statistik Pengunjung</h6>

        <ul class="korpri-footer__list">
          <li class="korpri-footer__item">
            <span class="korpri-footer__item-left">
              <i class="bi bi-people-fill korpri-footer__icon"></i>
              Pengunjung Hari ini
            </span>
            <span class="korpri-footer__value">133 <span class="korpri-footer__unit">USER</span></span>
          </li>

          <li class="korpri-footer__item">
            <span class="korpri-footer__item-left">
              <i class="bi bi-people-fill korpri-footer__icon"></i>
              Pengunjung Kemarin
            </span>
            <span class="korpri-footer__value">332 <span   class="korpri-footer__unit">USER</span></span>
          </li>

          <li class="korpri-footer__item">
            <span class="korpri-footer__item-left">
              <i class="bi bi-people-fill korpri-footer__icon"></i>
              Total Pengunjung
            </span>
            <span class="korpri-footer__value">575.946 <span class="korpri-footer__unit">USER</span></span>
          </li>

          <li class="korpri-footer__item">
            <span class="korpri-footer__item-left">
              <i class="bi bi-people-fill korpri-footer__icon"></i>
              Pengunjung Bulan ini
            </span>
            <span class="korpri-footer__value">29.419 <span class="korpri-footer__unit">USER</span></span>
          </li>

          <li class="korpri-footer__item">
            <span class="korpri-footer__item-left">
              <i class="bi bi-people-fill korpri-footer__icon"></i>
              Pengunjung Tahun ini
            </span>
            <span class="korpri-footer__value">4.903 <span class="korpri-footer__unit">USER</span></span>
          </li>

          <li class="korpri-footer__item">
            <span class="korpri-footer__item-left">
              <i class="bi bi-people-fill korpri-footer__icon"></i>
              Pengunjung Online
            </span>
            <span class="korpri-footer__value">133 <span class="korpri-footer__unit">USER</span></span>
          </li>
        </ul>
      </div>

      <!-- Kanan: Kontak -->
      <div class="col-12 col-lg-4 korpri-footer__contact-col">
        <div class="korpri-footer__contact-wrap">
          <h6 class="korpri-footer__heading">Contacts us</h6>

          <ul class="korpri-footer__contact">
            <li class="korpri-footer__contact-item">
              <i class="bi bi-envelope korpri-footer__contact-icon"></i>
              <span>contact@company.com</span>
            </li>
            <li class="korpri-footer__contact-item">
              <i class="bi bi-telephone korpri-footer__contact-icon"></i>
              <span>(414) 687 - 5892</span>
            </li>
            <li class="korpri-footer__contact-item">
              <i class="bi bi-geo-alt korpri-footer__contact-icon"></i>
              <span>794 Mcallister St<br>San Francisco, 94102</span>
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
