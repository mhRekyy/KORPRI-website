<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/keputusan.css') ?>">

<section class="peraturan-wrap">
  <div class="peraturan-container">

 <div class="peraturan-filter">
  <select class="pf-select" aria-label="Filter masa bakti">
    <option selected disabled>Masa Bakti</option>
    <option>2021 - 2026</option>
    <option>2016 - 2021</option>
  </select>

  <select class="pf-select" aria-label="Filter kategori">
    <option selected disabled>Jenis Keputusan</option>
    <option>Keputusan Pengangkatan</option>
    <option>Keputusan Pemberhentian</option>
    <option>Keputusan Penetapan</option>
    <option>Keputusan Lainnya</option>
  </select>

  <!-- WRAP: input + tombol (hover tombol => input muncul) -->
  <div class="pf-search">
    <input class="pf-input" type="text" placeholder="Cari peraturan..." aria-label="Cari peraturan">
    <button class="pf-btn" type="button" aria-label="Search">
      <i class="bi bi-search pf-btn__icon"></i>
    </button>
  </div>
</div>


    <!-- List -->
    <div class="peraturan-list">
      <?php
        // Dummy data (nanti bisa diganti dari controller)
        $items = $items ?? [
          [
            'judul' => 'Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur',
            'meta'  => 'Biro Hukum KORPRI | 15 Januari 2026',
            'file'  => '#'
          ],
          [
            'judul' => 'Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur',
            'meta'  => 'Biro Hukum KORPRI | 15 Januari 2026',
            'file'  => '#'
          ],
          [
            'judul' => 'Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur',
            'meta'  => 'Biro Hukum KORPRI | 15 Januari 2026',
            'file'  => '#'
          ],
          [
            'judul' => 'Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur',
            'meta'  => 'Biro Hukum KORPRI | 15 Januari 2026',
            'file'  => '#'
          ],
          [
            'judul' => 'Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur',
            'meta'  => 'Biro Hukum KORPRI | 15 Januari 2026',
            'file'  => '#'
          ],
          [
            'judul' => 'Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur',
            'meta'  => 'Biro Hukum KORPRI | 15 Januari 2026',
            'file'  => '#'
          ],
          [
            'judul' => 'Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur',
            'meta'  => 'Biro Hukum KORPRI | 15 Januari 2026',
            'file'  => '#'
          ],
        ];
      ?>

      
        <?php foreach ($items as $it): ?>
  <article class="per-card">

    <div class="per-left">
      <img
        class="per-pdf"
        src="<?= base_url('assets/img/icon_keputusan.png') ?>"
        alt="PDF"
      >
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
        <i class="bi bi-download per-btn__icon" aria-hidden="true"></i>
        <span>UNDUH</span>
      </a>
    </div>

  </article>
<?php endforeach; ?>

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

    if (masa && masa !== 'Masa Bakti') {
      params.append('masa', masa);
    }

    if (jenis && jenis !== 'Jenis Keputusan') {
      params.append('jenis', jenis);
    }

    if (q) {
      params.append('q', q);
    }

    window.location.href = "<?= base_url('keputusan') ?>?" + params.toString();
  }

  selects.forEach(s => s.addEventListener('change', applyFilter));
  button.addEventListener('click', applyFilter);
</script>

<?= $this->endSection() ?>