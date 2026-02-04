<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/peraturan.css') ?>">

<section class="peraturan-wrap">
  <div class="peraturan-container">

    <!-- FILTER -->
    <form method="get" class="peraturan-filter">

      <select name="masa_bakti" class="pf-select" aria-label="Filter masa bakti">
        <option value="">Masa Bakti</option>
        <option value="2021–2026" <?= (($_GET['masa_bakti'] ?? '') == '2021–2026') ? 'selected' : '' ?>>
          2021 – 2026
        </option>
        <option value="2016–2021" <?= (($_GET['masa_bakti'] ?? '') == '2016–2021') ? 'selected' : '' ?>>
          2016 – 2021
        </option>
      </select>

      <select name="kategori" class="pf-select" aria-label="Filter kategori">
        <option value="">Semua Kategori</option>
        <?php foreach ($kategoriList as $k): ?>
          <option value="<?= $k ?>" <?= (($_GET['kategori'] ?? '') == $k) ? 'selected' : '' ?>>
            <?= $k ?>
          </option>
        <?php endforeach; ?>
      </select>

      <div class="pf-search">
        <input
          class="pf-input"
          type="text"
          name="keyword"
          placeholder="Cari peraturan..."
          value="<?= esc($_GET['keyword'] ?? '') ?>"
          aria-label="Cari peraturan"
        >
        <button class="pf-btn" type="submit" aria-label="Search">
          <i class="fas fa-search pf-btn__icon"></i>
        </button>
      </div>

    </form>

    <!-- LIST -->
    <div class="peraturan-list">

      <?php if (empty($peraturan)): ?>
        <p class="per-empty">Data peraturan tidak ditemukan.</p>
      <?php endif; ?>

      <?php foreach ($peraturan as $row): ?>
        <article class="per-card">

          <div class="per-left">
            <img
              class="per-pdf"
              src="<?= base_url('assets/img/pdf.png') ?>"
              alt="PDF"
            >
          </div>

          <div class="per-mid">
            <h3 class="per-title">
              <?= esc($row['judul']) ?>
            </h3>
            <p class="per-meta">
              <?= esc($row['instansi']) ?> |
              <?= date('d F Y', strtotime($row['tanggal_penetapan'])) ?>
            </p>
          </div>

          <div class="per-right">
            <a
              class="per-btn"
              href="<?= base_url('uploads/peraturan/' . $row['file_pdf']) ?>"
              target="_blank"
            >
              <i class="bi bi-download per-btn__icon" aria-hidden="true"></i>
              <span>UNDUH</span>
            </a>
          </div>

        </article>
      <?php endforeach; ?>

    </div>

  </div>
</section>

<?= $this->endSection() ?>
