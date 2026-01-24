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
            <object id="pdfDoc" data="<?= base_url('assets/pdf/' . $dokumen['file_pdf']) ?>" type="application/pdf" class="pdf-frame">
                <div style="text-align: center; padding-top: 100px;">
                    <p>Browser Anda tidak mendukung preview PDF.</p>
                    <a href="<?= base_url('assets/pdf/' . $dokumen['file_pdf']) ?>" class="btn-gold">Download File</a>
                </div>
            </object>
        </div>

    </div>
</div>

<script>
    // Fungsi Cetak PDF
    function printPdf() {
        const pdfFrame = document.getElementById('pdfDoc');
        if (pdfFrame && typeof pdfFrame.print === 'function') {
            pdfFrame.print();
        } else {
            // Fallback: Buka PDF di tab baru lalu print manual
            window.open("<?= base_url('assets/pdf/' . $dokumen['file_pdf']) ?>", '_blank').print();
        }
    }

    // Fungsi Buka Fullscreen PDF
    function openFullscreen() {
        window.open("<?= base_url('assets/pdf/' . $dokumen['file_pdf']) ?>", '_blank');
    }
</script>

<?= $this->endSection() ?>
