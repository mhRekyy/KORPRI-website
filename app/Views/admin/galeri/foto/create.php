<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="admin-page">

    <div class="admin-page__header">
        <h1><?= esc($pageTitle) ?></h1>
        <a href="<?= base_url('admin/galeri/foto') ?>" class="btn-secondary">
            ← Kembali
        </a>
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

    <form action="<?= base_url('admin/galeri/foto/store') ?>" method="post" class="form-box">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="judul_kegiatan">Judul Kegiatan <span class="required">*</span></label>
            <input
                type="text"
                name="judul_kegiatan"
                id="judul_kegiatan"
                value="<?= old('judul_kegiatan') ?>"
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
                value="<?= old('tanggal_kegiatan') ?>"
                required
            >
        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input
                type="text"
                name="lokasi"
                id="lokasi"
                value="<?= old('lokasi') ?>"
                maxlength="255"
                placeholder="Contoh: Banda Aceh"
            >
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea
                name="deskripsi"
                id="deskripsi"
                rows="5"
                placeholder="Deskripsi singkat kegiatan"
            ><?= old('deskripsi') ?></textarea>
        </div>

        <div class="form-action">
            <button type="submit" class="btn-primary">
                Simpan Kegiatan
            </button>
        </div>

    </form>

</div>

<?= $this->endSection() ?>
