<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/admin/form.css') ?>">

<div class="form-wrapper">

    <h1 class="form-title">Tambah Artikel</h1>

    <div class="form-card">
        <form action="<?= base_url('admin/artikel/store') ?>"
              method="post"
              enctype="multipart/form-data">

            <?= csrf_field() ?>

            <div class="form-group">
                <label>Judul Artikel</label>
                <input type="text" name="title"
                       value="<?= old('title') ?>"
                       required>
            </div>

            <div class="form-group">
                <label>Ringkasan</label>
                <textarea name="excerpt" rows="3"><?= old('excerpt') ?></textarea>
            </div>

            <div class="form-group">
                <label>Konten</label>
                <textarea name="content" rows="8"><?= old('content') ?></textarea>
            </div>

            <div class="form-group">
                <label>Thumbnail</label>
                <input type="file" name="thumbnail" accept="image/*">
            </div>

            <div class="form-check">
                <input type="checkbox" name="is_active" value="1"
                       <?= old('is_active') ? 'checked' : '' ?>>
                <label>Publish</label>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">
                    Simpan
                </button>
                <a href="<?= base_url('admin/artikel') ?>" class="btn-secondary">
                    Kembali
                </a>
            </div>

        </form>
    </div>
</div>

<?= $this->endSection() ?>
