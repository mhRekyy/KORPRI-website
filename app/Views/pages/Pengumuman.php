<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/pengumuman.css') ?>">

<section class="peraturan-wrap">
  <div class="peraturan-container">

    <!-- FILTER (belum aktif, tahap berikutnya) -->
   <div class="peraturan-filter">

  <form method="get"
        action="<?= base_url('pengumuman') ?>"
        style="display: contents;">

    <!-- FILTER MASA BAKTI -->
    <select class="pf-select" name="masa_bakti" onchange="this.form.submit()">
      <option value="">Masa Bakti</option>
      <option value="2021-2026" <?= ($_GET['masa_bakti'] ?? '') == '2021-2026' ? 'selected' : '' ?>>
        2021 - 2026
      </option>
      <option value="2016-2021" <?= ($_GET['masa_bakti'] ?? '') == '2016-2021' ? 'selected' : '' ?>>
        2016 - 2021
      </option>
    </select>

    <!-- FILTER KATEGORI -->
    <select class="pf-select" name="kategori" onchange="this.form.submit()">
      <option value="">Semua Kategori</option>
      <option value="Peraturan" <?= ($_GET['kategori'] ?? '') == 'Peraturan' ? 'selected' : '' ?>>
        Peraturan
      </option>
      <option value="Keputusan" <?= ($_GET['kategori'] ?? '') == 'Keputusan' ? 'selected' : '' ?>>
        Keputusan
      </option>
      <option value="Pedoman" <?= ($_GET['kategori'] ?? '') == 'Pedoman' ? 'selected' : '' ?>>
        Pedoman
      </option>
    </select>

    <!-- SEARCH -->
    <div class="pf-search">
      <input
        class="pf-input"
        type="text"
        name="q"
        placeholder="Cari pengumuman..."
        value="<?= esc($_GET['q'] ?? '') ?>"
      >
      <button class="pf-btn" type="submit">
        <i class="bi bi-search pf-btn__icon"></i>
      </button>
    </div>

  </form>

</div>



    <!-- LIST -->
    <div class="peraturan-list">

      <?php if (!empty($pengumuman)): ?>
        <?php foreach ($pengumuman as $it): ?>

          <article class="per-card">
            <div class="per-left"> 
              <img
                class="per-pdf"
                src="<?= base_url('assets/img/date.png') ?>"
                alt="PDF"
              >
            </div>

            <div class="per-mid">
              <h3 class="per-title">
                <?= esc($it['judul']) ?>
              </h3>
              <p class="per-meta">
                <?= esc($it['instansi']) ?> |
                <?= date('d F Y', strtotime($it['tanggal_pengumuman'])) ?>
              </p>
            </div>

            <div class="per-right">
              <a class="per-btn"
                 href="<?= base_url('uploads/pengumuman/' . $it['file_pdf']) ?>"
                 target="_blank">
                <i class="bi bi-download per-btn__icon"></i>
                <span>UNDUH</span>
              </a>
            </div>
          </article>

        <?php endforeach; ?>
      <?php else: ?>
        <p>Belum ada pengumuman.</p>
      <?php endif; ?>

    </div>

  </div>
  </div>
</section>

<?= $this->endSection() ?>
