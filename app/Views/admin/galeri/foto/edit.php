<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="admin-page">

    <div class="admin-page__header">
        <h1><?= esc($pageTitle) ?></h1>
        <div class="header-action">
            <a href="<?= base_url('admin/galeri/foto') ?>" class="btn-secondary">
                ← Kembali
            </a>
            <a href="<?= base_url('admin/galeri/foto/kelola/' . $kegiatan['id']) ?>" class="btn-info">
                Kelola Foto
            </a>
        </div>
    </div>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-error">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/galeri/foto/update/' . $kegiatan['id']) ?>" method="post" class="form-box">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="judul_kegiatan">Judul Kegiatan <span class="required">*</span></label>
            <input
                type="text"
                name="judul_kegiatan"
                id="judul_kegiatan"
                value="<?= old('judul_kegiatan', $kegiatan['judul_kegiatan']) ?>"
                required
                maxlength="255"
            >
        </div>

        <div class="form-group">
            <label for="tanggal_kegiatan">Tanggal Kegiatan <span class="required">*</span></label>
            <input
                type="date"
                name="tanggal_kegiatan"
                id="tanggal_kegiatan"
                value="<?= old('tanggal_kegiatan', $kegiatan['tanggal_kegiatan']) ?>"
                required
            >
        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input
                type="text"
                name="lokasi"
                id="lokasi"
                value="<?= old('lokasi', $kegiatan['lokasi']) ?>"
                maxlength="255"
            >
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea
                name="deskripsi"
                id="deskripsi"
                rows="5"
            ><?= old('deskripsi', $kegiatan['deskripsi']) ?></textarea>
        </div>

        <div class="form-action">
            <button type="submit" class="btn-primary">
                Simpan Perubahan
            </button>
        </div>
    </form>

    <hr class="divider">

    <div class="section-box">
        <h2>Preview Foto Kegiatan</h2>

        <?php if (empty($foto ?? [])): ?>
            <p class="text-muted">Belum ada foto untuk kegiatan ini.</p>
        <?php else: ?>
            <div class="photo-grid">
                <?php foreach ($foto as $item): ?>
                    <div class="photo-item">
                        <img
                            src="<?= base_url('uploads/galeri/foto/' . $item['file_name']) ?>"
                            alt="Foto Kegiatan"
                        >
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="section-action">
            <a href="<?= base_url('admin/galeri/foto/kelola/' . $kegiatan['id']) ?>" class="btn-info">
                Kelola Foto Kegiatan
            </a>
        </div>
    </div>

</div>

<?= $this->endSection() ?>
