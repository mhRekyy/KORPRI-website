<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/sejarah.css') ?>">

<section class="sejarah">
  <div class="container sejarah__container">

    <!-- Header -->
    <div class="sejarah__header">
      <div class="sejarah__header-left">
        <h1 class="sejarah__title">SEJARAH KORPRI</h1>
        <p class="sejarah__lead">
          Ringkasan perjalanan KORPRI dari masa ke masa, beserta peristiwa dan kebijakan penting yang membentuk organisasi.
        </p>
        <div class="sejarah__line"></div>
      </div>

      <img class="sejarah__hero" src="<?= base_url('assets/img/hero-sejarah.png') ?>" alt="Ilustrasi sejarah">
    </div>

    <!-- Tabs timeline (seperti desain) -->
    <div class="sejarah__tabs-wrap">
      <div class="sejarah__tabs">
        <button class="sejarah__tab is-active" type="button">
          <span class="sejarah__tab-ico"><i class="bi bi-arrow-repeat"></i></span>
          <span class="sejarah__tab-text">
            <strong>1950 – 1959</strong>
            <small>Demokrasi Liberal</small>
          </span>
        </button>

        <button class="sejarah__tab" type="button">
          <span class="sejarah__tab-ico"><i class="bi bi-bank"></i></span>
          <span class="sejarah__tab-text">
            <strong>1959 – 1965</strong>
            <small>Demokrasi Terpimpin &amp; Nasakom</small>
          </span>
        </button>

        <button class="sejarah__tab" type="button">
          <span class="sejarah__tab-ico"><i class="bi bi-buildings"></i></span>
          <span class="sejarah__tab-text">
            <strong>1966 – 1970</strong>
            <small>Penataan Netralitas PNS</small>
          </span>
        </button>

        <button class="sejarah__tab" type="button">
          <span class="sejarah__tab-ico"><i class="bi bi-receipt"></i></span>
          <span class="sejarah__tab-text">
            <strong>1971</strong>
            <small>Lahirnya KORPRI</small>
          </span>
        </button>
      </div>
    </div>

    <!-- Konten -->
    <div class="sejarah__content">

      <!-- Item 1 -->
      <article class="sejarah__item">
        <div class="sejarah__marker"></div>

        <div class="sejarah__body">
          <h2 class="sejarah__heading">Masa Demokrasi Liberal (1950-1959)</h2>

          <div class="sejarah__grid">
            <div class="sejarah__text">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>

            <aside class="sejarah__card">
              <div class="sejarah__card-head">
                <span class="sejarah__card-ico"><i class="bi bi-calendar-range"></i></span>
                <div>
                  <div class="sejarah__card-title">1950 - 1959</div>
                </div>
              </div>

              <ul class="sejarah__card-list">
                <li>Loyalitas ganda</li>
                <li>Intervensi partai</li>
                <li>Ketidakpastian jabatan</li>
              </ul>
            </aside>
          </div>
        </div>
      </article>

      <!-- Item 2 -->
      <article class="sejarah__item">
        <div class="sejarah__marker"></div>

        <div class="sejarah__body">
          <h2 class="sejarah__heading">Demokrasi Terpimpin &amp; Nasakom</h2>

          <div class="sejarah__grid">
            <div class="sejarah__text">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>

            <aside class="sejarah__card">
              <div class="sejarah__card-head">
                <span class="sejarah__card-ico"><i class="bi bi-building"></i></span>
                <div>
                  <div class="sejarah__card-title">Undang-undang Penting</div>
                  <div class="sejarah__card-sub">UU No. 18 Tahun 1961</div>
                </div>
              </div>

              <div class="sejarah__card-subtext">
                Larangan PNS masuk organisasi tertentu
              </div>
            </aside>
          </div>
        </div>
      </article>

    </div>
  </div>
</section>

<?= $this->endSection() ?>
