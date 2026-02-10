<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="admin-page">

    <div class="page-header">
        <div>
            <h1><?= esc($pageTitle) ?></h1>
            <p class="page-desc">Perbarui link atau deskripsi video</p>
        </div>
        <div>
            <a href="<?= base_url('admin/galeri/video') ?>" class="btn-secondary">
                ← Kembali
            </a>
        </div>
    </div>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-error">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-error">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $err): ?>
                    <li><?= esc($err) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="card" style="max-width:800px;">
        <div style="margin-bottom:18px;">
            <img
                src="<?= esc($video['thumbnail_url']) ?>"
                alt="Thumbnail"
                style="width:240px;border-radius:8px;"
            >
        </div>

        <form action="<?= base_url('admin/galeri/video/update/' . $video['id']) ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-group">
                <label>Link YouTube <span class="required">*</span></label>
                <input
                    type="url"
                    name="youtube_url"
                    value="<?= old('youtube_url', $video['youtube_url']) ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea
                    name="description"
                    rows="4"
                ><?= old('description', $video['description']) ?></textarea>
            </div>

            <button type="submit" class="btn-primary">
                Simpan Perubahan
            </button>
        </form>
    </div>

</div>

<?= $this->endSection() ?>
