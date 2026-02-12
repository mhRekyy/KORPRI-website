<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/keputusan.css') ?>">

<section class="peraturan-wrap">
  <div class="peraturan-container">

 <div class="peraturan-filter">
    <select class="pf-select" aria-label="Filter masa bakti">
      <option selected disabled>Masa Bakti</option>

      <?php foreach ($masaBaktiOptions as $row): ?>
      <option value="<?= $row['id'] ?>"
          <?= (isset($_GET['masa']) && $_GET['masa'] == $row['id']) ? 'selected' : '' ?>>

          <?= esc($row['nama']) ?>
        </option>
      <?php endforeach; ?>

    </select>


  <select class="pf-select" aria-label="Filter kategori">
    <option value="">Jenis Keputusan</option>

    <?php foreach ($jenisOptions as $row): ?>
      <option value="<?= $row['id'] ?>"
        <?= (isset($_GET['jenis']) && $_GET['jenis'] == $row['id']) ? 'selected' : '' ?>>
        <?= esc($row['nama']) ?>
      </option>
    <?php endforeach; ?>

  </select>


  <!-- WRAP: input + tombol (hover tombol => input muncul) -->
  <div class="pf-search">
    <input class="pf-input" type="text" placeholder="Cari keputusan..." aria-label="Cari keputusan">
    <button class="pf-btn" type="button" aria-label="Search">
      <i class="bi bi-search pf-btn__icon"></i>
    </button>
  </div>
</div>


    <!-- List -->
    <div class="peraturan-list">


      
        <?php if (!empty($items)) : ?>

  <?php foreach ($items as $it): ?>
    <article class="per-card">

      <div class="per-left">
        <img
          class="per-pdf"
          src="<?= base_url('assets/img/icon_keputusan.png') ?>"
          alt="PDF">
      </div>

      <div class="per-mid">
        <h3 class="per-title">
          <?= esc($it['judul']) ?>
        </h3>

        <p class="per-meta">
          <?= esc($it['instansi']) ?> |
          <?= date('d F Y', strtotime($it['tanggal_keputusan'])) ?>
        </p>
      </div>

      <div class="per-right">
        <a class="per-btn"
           href="<?= base_url('uploads/keputusan/' . $it['file_pdf']) ?>"
           target="_blank">
          <i class="bi bi-download per-btn__icon"></i>
          <span>UNDUH</span>
        </a>
      </div>

    </article>
  <?php endforeach; ?>

<?php else: ?>

  <p style="text-align:center">Data tidak ditemukan.</p>

<?php endif; ?>


    </div>

  </div>
</section>
<script>
  const selects = document.querySelectorAll('.pf-select');
  const input   = document.querySelector('.pf-input');
  const button  = document.querySelector('.pf-btn');

  function applyFilter() {
  const masa  = selects[0].value;
  const jenis = selects[1].value;
  const q     = input.value;

  const params = new URLSearchParams();

  if (masa) {
    params.append('masa', masa);
  }

  if (jenis) {
    params.append('jenis', jenis);
  }

  if (q) {
    params.append('q', q);
  }

  window.location.href = "<?= base_url('Keputusan') ?>?" + params.toString();
}


  selects.forEach(s => s.addEventListener('change', applyFilter));
  button.addEventListener('click', applyFilter);
</script>

<?= $this->endSection() ?>