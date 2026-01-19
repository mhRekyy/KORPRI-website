<?= $this->extend('layout/main_inner') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/visi_misi.css') ?>">

<section class="vm-page container-fluid">
  <div class="vm-inner">

    <!-- VISI -->
    <div class="vm-visi">
      <div class="vm-visi__text">
        <h2 class="vm-title-left">VISI KORPRI</h2>
        <p class="vm-visi__desc">
          Terwujudnya KORPRI sebagai organisasi profesi 
          pegawai Republik Indonesia yang kuat, modern, dan berintegritas; 
          menjadi perekat persatuan serta penggerak peningkatan 
          kualitas layanan publik, dengan menjunjung tinggi etika, profesionalisme, dan netralitas, 
          guna mewujudkan kesejahteraan anggota beserta keluarga dan meningkatkan harkat 
          serta martabat pegawai Republik Indonesia secara berkelanjutan.
        </p>
      </div>

      <div class="vm-visi__mark">
        <!-- OPTIONAL: watermark jika punya (hapus kalau tidak ada) -->
        <img src="<?= base_url('assets/img/korpri-watermark.png') ?>" alt="" class="vm-watermark">
      </div>
    </div>

    <!-- JUDUL: MISI KORPRI + GARIS -->
    <div class="vm-section-head">
      <span class="vm-section-head__line"></span>
      <h3 class="vm-section-head__title">MISI KORPRI</h3>
      <span class="vm-section-head__line"></span>
    </div>

    <!-- GRID MISI (6 CARD) -->
    <div class="vm-grid vm-grid--3">
      <?php
        $misi = [
          ['no'=>1, 'icon'=>'fa-briefcase',          'desc'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
          ['no'=>2, 'icon'=>'fa-user-tie',           'desc'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
          ['no'=>3, 'icon'=>'fa-clipboard-check',    'desc'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
          ['no'=>4, 'icon'=>'fa-people-group',       'desc'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
          ['no'=>5, 'icon'=>'fa-award',              'desc'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
          ['no'=>6, 'icon'=>'fa-shield-halved',      'desc'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
        ];
      ?>

      <?php foreach ($misi as $item): ?>
        <article class="vm-card">
          <div class="vm-card__top">
            <span class="vm-badge"><?= esc($item['no']) ?></span>
            <i class="fa-solid <?= esc($item['icon']) ?> vm-card__icon" aria-hidden="true"></i>
          </div>

          <p class="vm-card__desc"><?= esc($item['desc']) ?></p>
        </article>
      <?php endforeach; ?>
    </div>

    <!-- JUDUL: NILAI-NILAI KORPRI + GARIS -->
    <div class="vm-section-head vm-section-head--mt">
      <span class="vm-section-head__line"></span>
      <h3 class="vm-section-head__title">Nilai-Nilai<br>KORPRI</h3>
      <span class="vm-section-head__line"></span>
    </div>

    <!-- GRID NILAI (4 CARD BIRU) -->
    <div class="vm-grid vm-grid--4">
      <?php
        $nilai = [
          ['icon'=>'fa-star',             'title'=>'Profesional', 'desc'=>'Lorem ipsum dolor sit amet, consectetur.'],
          ['icon'=>'fa-scale-balanced',   'title'=>'Netral',      'desc'=>'Lorem ipsum dolor sit amet, consectetur.'],
          ['icon'=>'fa-handshake',        'title'=>'Solidaritas', 'desc'=>'Lorem ipsum dolor sit amet, consectetur.'],
          ['icon'=>'fa-landmark',         'title'=>'Abdi Negara', 'desc'=>'Lorem ipsum dolor sit amet, consectetur.'],
        ];
      ?>

      <?php foreach ($nilai as $n): ?>
        <article class="vm-card vm-card--nilai">
          <i class="fa-solid <?= esc($n['icon']) ?> vm-nilai__icon" aria-hidden="true"></i>
          <h4 class="vm-nilai__title"><?= esc($n['title']) ?></h4>
          <p class="vm-nilai__desc"><?= esc($n['desc']) ?></p>
        </article>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<?= $this->endSection() ?>
