<?= $this->extend('layout/main_inner') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/kepengurusan.css') ?>">

<div class="doc-container">
    
    <!-- Header Bagian Atas -->
    <div class="doc-header">
        <h1>KEPUTUSAN DEWAN PENGURUS KORPRI</h1>
        <h2><?= $dokumen['judul'] ?></h2>
        
        <!-- Tags / Badges -->
        <div class="tags-wrapper">
            <div class="tag tag-blue">
                <i class="fas fa-book-open"></i> Provinsi ACEH
            </div>
            <div class="tag tag-white">
                <i class="far fa-calendar-alt"></i> <?= $dokumen['periode'] ?>
            </div>
            <div class="tag tag-gold">
                <?= $dokumen['kategori'] ?>
            </div>
        </div>
    </div>

    <!-- Layout Grid: Sidebar Info & PDF Viewer -->
    <div class="content-grid">
        
        <!-- Kolom Kiri: Informasi Dokumen -->
        <div class="sidebar-box">
            <h3 class="sidebar-title">Informasi Dokumen</h3>

            <div class="info-group">
                <div class="info-label">Nomor Keputusan :</div>
                <div class="info-value"><?= $dokumen['nomor_sk'] ?></div>
            </div>

            <div class="info-group">
                <div class="info-label">Ditetapkan Oleh :</div>
                <div class="info-value"><?= $dokumen['ditetapkan_oleh'] ?></div>
            </div>

            <div class="info-group">
                <div class="info-label">Tanggal :</div>
                <div class="info-value"><?= $dokumen['tanggal'] ?></div>
            </div>

            <div class="info-group">
                <div class="info-label">Status :</div>
                <div class="info-value status-active">
                    <i class="fas fa-check-circle"></i> <?= $dokumen['status'] ?>
                </div>
            </div>

            <hr style="border: 0; border-top: 1px solid #eee; margin: 20px 0;">

            <!-- Tombol Aksi -->
            <a href="<?= base_url('assets/pdf/' . $dokumen['file_pdf']) ?>" class="btn-action btn-gold" download>
                <i class="fas fa-download"></i> Download PDF
            </a>

            <!-- Tombol Fullscreen (Menggunakan JavaScript Sederhana) -->
            <button onclick="openFullscreen()" class="btn-action btn-outline">
                <i class="fas fa-expand"></i> Lihat Fullscreen
            </button>

            <!-- Tombol Cetak -->
            <button onclick="printPdf()" class="btn-action btn-outline">
                <i class="fas fa-print"></i> Cetak
            </button>
        </div>


        <!-- Kolom Kanan: PDF Viewer -->
        <div class="pdf-viewer-box">

            <!-- Object tag untuk embed PDF -->
            <iframe
            id="pdfDoc"
            src="<?= esc($dokumen['pdf_viewer_url']) ?>"
            class="pdf-frame"
            onload="window.__pdfReady = true"
            ></iframe>
        </div>

    </div>
</div>

<script>
function openFullscreen() {
    window.open("<?= esc($dokumen['pdf_viewer_url']) ?>", "_blank");
  }

  function printPdf() {
    const iframe = document.getElementById('pdfDoc');
    if (!iframe) return;

    try {
      iframe.contentWindow.focus();
      iframe.contentWindow.print(); // dialog print [web:242]
    } catch (e) {
      // fallback terakhir: buka viewer di tab baru lalu print
      const w = window.open("<?= esc($dokumen['pdf_viewer_url']) ?>", "_blank");
      if (w) setTimeout(() => { try { w.print(); } catch(e) {} }, 2000);
    }
  }
</script>



<?= $this->endSection() ?>
