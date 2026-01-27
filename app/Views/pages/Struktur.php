<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/struktur.css') ?>">


<?php
// ==============================
// DATA (Multidimensional Array)
// ==============================
$org = [
  'ketua' => [
    'title' => 'Ketua',
    'subtitle' => 'Lorem ipsum',
    'image' => 'assets/img/avatar.png',
  ],
  'wakil' => [
    [
      'id' => 'wk1',
      'title' => 'Wakil Ketua I',
      'subtitle' => 'Lorem ipsum',
      'image' => 'assets/img/avatar.png',
      'children' => [
        [
          'title' => 'Bidang organisasi & Kelembagaan',
          'subtitle' => 'Lorem ipsum',
          'image' => 'assets/img/icon_organisasi.png',
        ],
      ],
    ],
    [
      'id' => 'wk2',
      'title' => 'Wakil Ketua II',
      'subtitle' => 'Lorem ipsum',
      'image' => 'assets/img/avatar.png',
      // children[0] = Level 3 (anak langsung)
      // children[1..4] = Level 4 (anak tambahan khusus WK II)
      'children' => [
        [
          'title' => 'Bidang Perlindungan & Bantuan Hukum',
          'subtitle' => 'Lorem ipsum',
          'image' => 'assets/img/icon_hukum.png',
        ],
        [
          'title' => 'Bidang Usaha & Kesejahteraan',
          'subtitle' => 'Lorem ipsum',
          'image' => 'assets/img/icon_usaha.png',
        ],
        [
          'title' => 'Bidang Pembinaan Keagamaan & mental',
          'subtitle' => 'Lorem ipsum',
          'image' => 'assets/img/icon_agama.png',
        ],
        [
          'title' => 'Bidang Pembinaan Olahraga & Seni Budaya',
          'subtitle' => 'Lorem ipsum',
          'image' => 'assets/img/icon_olahraga.png',
        ],
        [
          'title' => 'Bidang Pengabdian Masyarakat & Pemberdayaan',
          'subtitle' => 'Lorem ipsum',
          'image' => 'assets/img/icon_masyarakat.png',
        ],
      ],
    ],
    [
      'id' => 'wk3',
      'title' => 'Wakil Ketua III',
      'subtitle' => 'Lorem ipsum',
      'image' => 'assets/img/avatar.png',
      'children' => [
        [
          'title' => 'Bidang Pembinaan disiplin jiwa Korps & wawasan Kebangsaan',
          'subtitle' => 'Lorem ipsum',
          'image' => 'assets/img/icon_disiplin.png',
        ],
      ],
    ],
    [
      'id' => 'wk4',
      'title' => 'Wakil Ketua IV',
      'subtitle' => 'Lorem ipsum',
      'image' => 'assets/img/avatar.png',
      'children' => [
        [
          'title' => 'Sekretariat',
          'subtitle' => 'Lorem ipsum',
          'image' => 'assets/img/icon_sekretariat.png',
        ],
      ],
    ],
  ],
];

// helper kecil untuk render card
function renderCard($title, $subtitle, $image, $variant = 'small') {
  $titleEsc = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
  $subEsc   = htmlspecialchars($subtitle, ENT_QUOTES, 'UTF-8');
  $imgEsc   = htmlspecialchars($image, ENT_QUOTES, 'UTF-8');

  $cls = $variant === 'big' ? 'card card--big' : 'card card--small';
  ?>
  <div class="<?= $cls ?>">
    <div class="card__top">
      <div class="card__avatar">
        <img src="<?= $imgEsc ?>" alt="<?= $titleEsc ?>">
      </div>
    </div>
    <div class="card__body">
      <div class="card__title"><?= $titleEsc ?></div>
      <div class="card__sub"><?= $subEsc ?></div>
    </div>
  </div>
  <?php
}

$wk1 = $org['wakil'][0];
$wk2 = $org['wakil'][1];
$wk3 = $org['wakil'][2];
$wk4 = $org['wakil'][3];

// level 3 (anak langsung)
$l3_wk1 = $wk1['children'][0];
$l3_wk2 = $wk2['children'][0];
$l3_wk3 = $wk3['children'][0];
$l3_wk4 = $wk4['children'][0];

// level 4 khusus wk2 (index 1..4)
$l4_wk2 = array_slice($wk2['children'], 1);
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Struktur Organisasi</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="chart">


  <!-- Level 1 -->
  <div class="row row--ketua">
    <?php renderCard($org['ketua']['title'], $org['ketua']['subtitle'], $org['ketua']['image'], 'small'); ?>
  </div>
  <!-- connector: ketua -> bar wakil (pakai connector khusus) -->
  <div class="connector connector--ketua-wakil"></div>

  <!-- Level 2 (4 wakil) -->
  <div class="row row--wakil">
    <div class="grid grid--4">
      <div class="col col--1"><?php renderCard($wk1['title'], $wk1['subtitle'], $wk1['image'], 'small'); ?></div>
      <div class="col col--2"><?php renderCard($wk2['title'], $wk2['subtitle'], $wk2['image'], 'small'); ?></div>
      <div class="col col--3"><?php renderCard($wk3['title'], $wk3['subtitle'], $wk3['image'], 'small'); ?></div>
      <div class="col col--4"><?php renderCard($wk4['title'], $wk4['subtitle'], $wk4['image'], 'small'); ?></div>
    </div>
    <!-- connector horizontal + drop ke bawah -->
    <div class="connector connector--wk-to-l3"></div>
  </div>

  <!-- Level 3 (anak langsung masing-masing wakil) -->
  <div class="row row--l3">
    <div class="grid grid--4">
      <div class="col col--1"><?php renderCard($l3_wk1['title'], $l3_wk1['subtitle'], $l3_wk1['image'], 'big'); ?></div>
      <div class="col col--2"><?php renderCard($l3_wk2['title'], $l3_wk2['subtitle'], $l3_wk2['image'], 'big'); ?></div>
      <div class="col col--3"><?php renderCard($l3_wk3['title'], $l3_wk3['subtitle'], $l3_wk3['image'], 'big'); ?></div>
      <div class="col col--4"><?php renderCard($l3_wk4['title'], $l3_wk4['subtitle'], $l3_wk4['image'], 'big'); ?></div>
    </div>
    <!-- connector vertikal panjang khusus dari WK II ke bawah -->
    <div class="connector connector--wk2-down"></div>
  </div>

  <!-- Level 4 (4 anak tambahan WK II) -->
  <div class="row row--l4">
    <div class="grid grid--4">
      <?php foreach ($l4_wk2 as $i => $node): ?>
        <div class="col col--<?= $i+1 ?>">
          <?php renderCard($node['title'], $node['subtitle'], $node['image'], 'big'); ?>
        </div>
      <?php endforeach; ?>
    </div>
    <!-- bracket (garis horizontal) + 4 garis turun kecil ke tiap card bawah -->
    <div class="connector connector--bracket-l4"></div>
  </div>

</div>

</body>
</html>


<?= $this->endSection() ?>
