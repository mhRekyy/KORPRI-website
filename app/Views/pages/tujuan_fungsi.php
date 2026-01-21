<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/tujuan_fungsi.css') ?>">

<section class="tf">
  <div class="tf__container">

    <!-- TUJUAN -->
    <header class="tf__header">
      <h1 class="tf__title">Tujuan KORPRI</h1>
      <div class="tf__title-line"></div>
    </header>

    <div class="tfCard">
      <div class="tfCard__text">
        <p>
          KORPRI (Korps Pegawai Republik Indonesia) bertujuan menghimpun dan membina seluruh anggota
          agar menjadi aparatur sipil negara yang profesional, berintegritas, dan berorientasi pada pelayanan publik.
        </p>
        <p>
          Melalui pembinaan jiwa korsa dan penguatan etika profesi, KORPRI mendorong peningkatan kualitas
          kinerja, kedisiplinan, serta peran aktif anggota dalam menjaga persatuan dan kesatuan bangsa.
        </p>
        <p>
          KORPRI juga berupaya meningkatkan kesejahteraan anggota serta memperkuat perlindungan dan bantuan
          bagi anggota sesuai ketentuan yang berlaku.
        </p>
      </div>

      <div class="tfCard__logo">
        <img
          src="<?= base_url('assets/img/korpri-watermark.png') ?>"
          alt="Logo KORPRI"
          loading="lazy"
        >
      </div>
    </div>

    <!-- FUNGSI -->
    <header class="tf__header tf__header--spaced">
      <h2 class="tf__title">Fungsi KORPRI</h2>
      <div class="tf__title-line"></div>
    </header>

    <div class="tfGrid">
      <div class="tfGrid__art">
        <img
          src="<?= base_url('assets/img/fungsi_elemen.png') ?>"
          alt="Ilustrasi"
          loading="lazy"
        >
      </div>

      <ol class="tfList">
        <li>Sebagai satu-satunya wadah berhimpunnya seluruh anggota.</li>
        <li>Membina dan meningkatkan jiwa korps (korsa).</li>
        <li>Sebagai perekat dan pemersatu bangsa dan negara.</li>
        <li>Sebagai wadah untuk peningkatan kesejahteraan dan memberikan penghargaan bagi anggota.</li>
        <li>Sebagai pengayom, pelindung, dan pemberi bantuan hukum bagi anggota.</li>
        <li>Meningkatkan harkat dan martabat anggota.</li>
        <li>Meningkatkan ketakwaan, kejujuran, keadilan, disiplin, dan profesionalisme.</li>
        <li>Mewujudkan kepemerintahan yang baik.</li>
      </ol>
    </div>

  </div>
</section>

<?= $this->endSection() ?>
