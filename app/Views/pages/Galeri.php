<?= $this->extend('layout/main_inner') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/galeri.css') ?>">

<section class="galeri-wrap">
  <div class="container-galeri">

    <!-- FILTER -->
    <div class="galeri-filter">
      <div class="gf-col">
        <select class="gf-select">
          <option selected disabled>Cari Kegiatan</option>
          <option>Rapat Koordinasi</option>
          <option>Upacara</option>
          <option>Pelatihan</option>
        </select>
      </div>

      <div class="gf-col">
        <select class="gf-select">
          <option selected disabled>Tahun</option>
          <option>2025</option>
          <option>2024</option>
          <option>2023</option>
        </select>
      </div>

      <div class="gf-col gf-col--btn">
        <button class="gf-btn" type="button">Search</button>
      </div>
    </div>

    <!-- CARD 1 -->
    <article class="gcard gcard--big">
      <div class="gcard__pad gcard__pad--left">
        <h3 class="gcard__title">Lorem Ipsum Dolor Sit Amet consectetur adipisicing elit</h3>
        <p class="gcard__desc">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
        </p>
      </div>

      <div class="gcard__pad gcard__pad--right">
        <div class="gcard__split"></div>

        <div class="gpanel">
          <div class="gpanel__year">2025</div>
          <div class="gpanel__shape"></div>

          <div class="gpanel__action">
            <a class="gbtn" href="#">dokumentasi lainnya</a>
            <span class="gdot" aria-hidden="true"></span>
          </div>
        </div>
      </div>
    </article>

    <!-- CARD 2 -->
    <article class="gcard gcard--mid">
      <div class="gmedia"></div>

      <div class="gmid">
        <div class="gmid__split"></div>
        <div class="gmid__year">2024</div>

        <div class="gmid__text">
          <h3 class="gcard__title">Lorem Ipsum Dolor Sit Amet consectetur adipisicing elit</h3>
          <p class="gcard__desc">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          </p>

          <div class="gmid__action">
            <a class="gbtn" href="#">dokumentasi lainnya</a>
            <span class="gdot" aria-hidden="true"></span>
          </div>
        </div>
      </div>
    </article>

    <!-- CARD 3 -->
    <article class="gcard gcard--stack">
      <div class="gstack__top">
        <div class="gstack__left">
          <h3 class="gcard__title">Lorem Ipsum Dolor Sit Amet consectetur adipisicing elit</h3>
          <p class="gcard__desc">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          </p>

          <div class="gstack__action">
            <a class="gbtn" href="#">dokumentasi lainnya</a>
            <span class="gdot" aria-hidden="true"></span>
          </div>
        </div>

        <div class="gstack__right">
          <div class="gstack__split"></div>
          <div class="gstack__year">2023</div>
          <div class="gstack__shape"></div>
        </div>
      </div>

      <div class="gstack__thumbs">
        <div class="gthumb"></div>
        <div class="gthumb"></div>
        <div class="gthumb"></div>
      </div>
    </article>

  </div>
</section>



<?= $this->endSection() ?>