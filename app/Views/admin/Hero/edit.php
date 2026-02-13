<?= $this->extend('admin/layout/main') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/admin/edit.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>



<div class="admin-container">

    <h2>Edit Slide Hero</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert-error">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/hero/update/' . $slide['id']) ?>" method="post" enctype="multipart/form-data">

        <?= csrf_field() ?>

        <div class="form-group">
            <label>Foto Lama</label><br>
            <img src="<?= base_url('uploads/hero/' . $slide['image']) ?>"
                 style="width:200px; height:120px; object-fit:cover; margin-bottom:10px;">
        </div>

        <div class="form-group">
            <label>Ganti Foto (Opsional)</label>
            <input type="file" name="image">
        </div>

        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="title" value="<?= esc($slide['title']) ?>" required>
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" rows="4"><?= esc($slide['description']) ?></textarea>
        </div>

        <div class="form-group">
            <label>Urutan Tampil</label>
            <input type="number" name="sort_order"
                   value="<?= esc($slide['sort_order']) ?>" required>
        </div>

        <div style="margin-top:20px;">
            <button type="submit" class="btn-primary">Update</button>
            <a href="<?= base_url('admin/hero') ?>" class="btn-secondary">Kembali</a>
        </div>

    </form>

</div>

<?= $this->endSection() ?>
