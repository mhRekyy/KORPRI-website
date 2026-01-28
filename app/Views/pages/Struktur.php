<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/struktur.css') ?>">

<?php
/* =====================================================
   HELPER CARD (TETAP – TIDAK DIUBAH)
===================================================== */
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
      <div class="card__sub">
  <?= nl2br($subEsc) ?>
</div>

    </div>
  </div>
<?php } ?>


<?php
/* =====================================================
   HELPER ICON (TETAP – TIDAK DIUBAH)
===================================================== */
function getIconByJabatan(string $jabatan): string
{
  $map = [
    'Organisasi'    => 'icon_organisasi.png',
    'Perlindungan'  => 'icon_hukum.png',
    'Usaha'         => 'icon_usaha.png',
    'Keagamaan'     => 'icon_agama.png',
    'Olahraga'      => 'icon_olahraga.png',
    'Disiplin'      => 'icon_disiplin.png',
    'Sekretariat'   => 'icon_sekretariat.png',
    'Pengabdian'    => 'icon_masyarakat.png',
  ];

  foreach ($map as $key => $icon) {
    if (stripos($jabatan, $key) !== false) {
      return base_url('assets/img/' . $icon);
    }
  }

  return base_url('assets/img/avatar.png');
}
?>

<div class="chart">

  <!-- ================= LEVEL 1 : KETUA ================= -->
  <div class="row row--ketua">
    <?php
      renderCard(
        $ketua['jabatan'],
        $ketua['nama'],
        base_url('assets/img/avatar.png')
      );
    ?>
  </div>

  <div class="connector connector--ketua-wakil"></div>

  <!-- ================= LEVEL 2 : WAKIL ================= -->
  <div class="row row--wakil">
    <div class="grid grid--4">
      <?php foreach ($wakil as $i => $wk): ?>
        <div class="col col--<?= $i + 1 ?>">
          <?php
            renderCard(
              $wk['jabatan'],
              $wk['nama'],
              base_url('assets/img/avatar.png')
            );
          ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- ================= LEVEL 3 : ANAK LANGSUNG TIAP WAKIL ================= -->
  <div class="row row--l3">
    <div class="grid grid--4">

      <?php for ($i = 0; $i < 4; $i++): ?>
        <div class="col col--<?= $i + 1 ?>">
          <?php
            $wk = $wakil[$i] ?? null;
            $child = $wk ? ($children[$wk['id']][0] ?? null) : null;

            if ($child) {
              renderCard(
                $child['jabatan'],
                $child['nama'],
                getIconByJabatan($child['jabatan']),
                'big'
              );
            }
          ?>
        </div>
      <?php endfor; ?>

    </div>
  </div>

  <!-- ================= LEVEL 4 : KHUSUS WAKIL II (5 BIDANG) ================= -->
  <?php
    $wk2 = $wakil[1] ?? null;
    $wk2Children = $wk2 && isset($children[$wk2['id']])
      ? array_slice($children[$wk2['id']], 1)
      : [];
  ?>

  <?php if (!empty($wk2Children)): ?>
    <div class="row row--l4 wakil2">
      <div class="grid grid--5">
        <?php foreach ($wk2Children as $node): ?>
          <div class="col">
            <?php
              renderCard(
                $node['jabatan'],
                $node['nama'],
                getIconByJabatan($node['jabatan']),
                'big'
              );
            ?>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="connector connector--bracket-l4"></div>
    </div>
  <?php endif; ?>

</div>

<?= $this->endSection() ?>
