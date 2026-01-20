<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/tujuan_fungsi.css') ?>">

<section class="tf2">

  <!-- HERO -->
  <!-- <header class="tf2Hero">
    <!-- <div class="tf2Hero__inner">
      <div class="tf2Hero__seal" aria-hidden="true">
        <img src="<?= base_url('assets/img/logo-korpri.png') ?>" alt="" class="tf2Hero__sealImg">
      </div>
<!-- 
      <h1 class="tf2Hero__title">TUJUAN &amp;<br>FUNGSI KORPRI</h1>
      <div class="tf2Hero__divider" aria-hidden="true"></div> -->
    </div> -->
  </header> -->

  <main class="tf2Wrap">

    <!-- TUJUAN -->
    <h2 class="tf2Heading">Tujuan KORPRI</h2>

    <section class="tf2Card tf2Card--goal">
      <div class="tf2Card__content">
        <h3 class="tf2Card__kicker">Korps Pegawai Republik Indonesia (KORPRI)</h3>
        <p class="tf2Card__lead">
          bertujuan untuk menghimpun dan membina aparatur agar menjadi aparatur negara yang profesional, berintegritas,
          netral, serta berorientasi pada pelayanan publik guna mendukung terwujudnya pemerintahan yang baik.
        </p>

        <ol class="tf2List">
          <li>Mewujudkan aparatur yang profesional, netral, dan berintegritas.</li>
          <li>Memperkuat persatuan dan kesatuan di kalangan aparatur.</li>
          <li>Menumbuhkan semangat pengabdian sebagai abdi negara dan abdi masyarakat.</li>
          <li>Meningkatkan kesejahteraan, perlindungan, serta pembelaan hak anggota.</li>
          <li>Mendukung pelaksanaan tugas pemerintahan dan pembangunan nasional secara berkelanjutan.</li>
          <li>Menjaga etika, moral, dan disiplin aparatur dalam kehidupan berbangsa dan bernegara.</li>
        </ol>
      </div>

      <aside class="tf2Card__media" aria-hidden="true">
        <img src="<?= base_url('assets/img/logo-korpri.png') ?>" alt="" class="tf2LogoBig">
        <div class="tf2Tag">ABDI NEGARA</div>
      </aside>
    </section>

    <!-- FUNGSI -->
    <h2 class="tf2Heading tf2Heading--mt">Fungsi KORPRI</h2>

    <section class="tf2Grid">
      <div class="tf2Media">
        <img src="<?= base_url('assets/img/fungsi_elemen.png') ?>" alt="Ilustrasi fungsi KORPRI" class="tf2Illu">
      </div>

      <div class="tf2Card tf2Card--func">
        <ol class="tf2List tf2List--func">
          <li>Sebagai satu-satunya wadah berhimpunnya seluruh anggota.</li>
          <li>Membina dan meningkatkan jiwa korps (korsa).</li>
          <li>Sebagai perekat dan pemersatu bangsa dan negara.</li>
          <li>Sebagai wadah untuk peningkatan kesejahteraan dan memberikan penghargaan bagi anggota.</li>
          <li>Sebagai pengayom, pelindung, dan pemberi bantuan hukum bagi anggota.</li>
          <li>Meningkatkan harkat dan martabat anggota.</li>
          <li>Meningkatkan ketaqwaan, kejujuran, keadilan, disiplin, dan profesionalisme.</li>
          <li>Mewujudkan kepemerintahan yang baik.</li>
        </ol>

        <div class="tf2Source">
          Rumusan fungsi mengacu pada publikasi KORPRI:
          <a href="https://korpri.go.id/tujuan-dan-fungsi" target="_blank" rel="noopener">Lihat sumber</a>.
        </div>
      </div>
    </section>

    <!-- QUOTE -->
    <section class="tf2Quote">
      <span class="tf2Quote__mark" aria-hidden="true">“</span>
      KORPRI berkomitmen menjadi wadah pemersatu ASN yang berlandaskan nilai pengabdian, profesionalisme, dan integritas.
      <span class="tf2Quote__mark" aria-hidden="true">”</span>
    </section>

  </main>

</section>

<?= $this->endSection() ?>
