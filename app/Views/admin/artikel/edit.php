<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/admin/edit.css') ?>">

<h1 class="page-title">Edit Artikel</h1>

<form action="<?= base_url('admin/artikel/update/' . $artikel['id']) ?>"
      method="post"
      enctype="multipart/form-data"
      class="form-admin">

    <?= csrf_field() ?>

    <!-- JUDUL -->
    <div class="form-group">
        <label class="form-label">Judul Artikel</label>
        <input type="text"
               name="title"
               value="<?= esc($artikel['title']) ?>"
               required
               class="form-input">
    </div>

    <!-- RINGKASAN -->
    <div class="form-group">
        <label class="form-label">Ringkasan</label>
        <textarea name="excerpt"
                  rows="3"
                  class="form-textarea"><?= esc($artikel['excerpt']) ?></textarea>
    </div>

    <!-- KONTEN -->
    <div class="form-group">
        <label class="form-label">Konten</label>
        <textarea name="content"
                  rows="8"
                  class="form-textarea"><?= esc($artikel['content']) ?></textarea>
    </div>

    <!-- THUMBNAIL -->
    <div class="form-group">
        <label class="form-label">Thumbnail</label>

        <?php if (!empty($artikel['thumbnail'])): ?>
            <div class="thumbnail-preview">
                <img src="<?= base_url('uploads/artikel/' . $artikel['thumbnail']) ?>"
                     alt="Thumbnail">
            </div>
        <?php endif ?>

        <input type="file"
               name="thumbnail"
               accept="image/*"
               class="form-file">
    </div>

    <!-- STATUS -->
    <div class="form-group form-check">
        <label class="check-label">
            <input type="checkbox"
                   name="is_active"
                   value="1"
                   <?= $artikel['is_active'] ? 'checked' : '' ?>>
            Publish
        </label>
    </div>

    <!-- ACTION -->
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= base_url('admin/artikel') ?>" class="btn btn-secondary">Kembali</a>
    </div>

</form>

<?= $this->endSection() ?>