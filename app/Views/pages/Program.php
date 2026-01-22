<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/program.css') ?>">

<section class="prog">
  <div class="prog__container">

    <header class="prog__header">
      <h1 class="prog__title">Program Utama Korpri</h1>
      <div class="prog__line"></div>
    </header>

    <!-- Grid 2x2 -->
    <div class="row g-4 prog__grid">

      <div class="col-12 col-md-6">
        <article class="progCard">
        <div class="progCard__inner">
        <div class="progCard__lines" aria-hidden="true"></div>
          <div class="progBadge"><span>01</span></div>
          <h3 class="progCard__title">Digitalisasi Birokrasi</h3>
          <p class="progCard__text">Meningkatkan kualitas pelayanan publik dan digitalisasi birokrasi.</p>
        </article>
      </div>

      <div class="col-12 col-md-6">
        <article class="progCard">
          <div class="progCard__inner">
        <div class="progCard__lines" aria-hidden="true"></div>
          <div class="progBadge"><span>02</span></div>
          <h3 class="progCard__title">Penguatan Nilai ASN</h3>
          <p class="progCard__text">Menguatkan ideologi dan karakter ASN.</p>
        </article>
      </div>

      <div class="col-12 col-md-6">
        <article class="progCard">
          <div class="progCard__inner">
            <div class="progCard__lines" aria-hidden="true"></div>
            <div class="progBadge"><span>03</span></div>
            <h3 class="progCard__title">Perlindungan Karier</h3>
            <p class="progCard__text">Perlindungan karier dan bantuan hukum ASN.</p>
          </article>
      </div>

      <div class="col-12 col-md-6">
        <article class="progCard">
          <div class="progCard__inner">
            <div class="progCard__lines" aria-hidden="true"></div>
            <div class="progBadge"><span>04</span></div>
            <h3 class="progCard__title">Kesejahteraan ASN</h3>
            <p class="progCard__text">Peningkatan kesejahteraan ASN.</p>
        </article>
      </div>

    </div>
  </div>
</section>

<?= $this->endSection() ?>
