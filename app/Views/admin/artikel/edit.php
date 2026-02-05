<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<h1>Edit Artikel</h1>

<form action="<?= base_url('admin/artikel/update/' . $artikel['id']) ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <label>Judul Artikel</label>
    <input type="text" name="title" value="<?= esc($artikel['title']) ?>" required style="width:100%">

    <br><br>

    <label>Ringkasan</label>
    <textarea name="excerpt" rows="3" style="width:100%"><?= esc($artikel['excerpt']) ?></textarea>

    <br><br>

    <label>Konten</label>
    <textarea name="content" rows="8" style="width:100%"><?= esc($artikel['content']) ?></textarea>

    <br><br>

    <label>Thumbnail</label><br>
    <?php if (!empty($artikel['thumbnail'])): ?>
        <img src="<?= base_url('uploads/artikel/' . $artikel['thumbnail']) ?>" width="150"><br><br>
    <?php endif ?>

    <input type="file" name="thumbnail" accept="image/*">

    <br><br>

    <label>
        <input type="checkbox" name="is_active" value="1" <?= $artikel['is_active']?'checked':'' ?>>
        Publish
    </label>

    <br><br>

    <button type="submit">Update</button>
    <a href="<?= base_url('admin/artikel') ?>">Kembali</a>
</form>

<?= $this->endSection() ?>
