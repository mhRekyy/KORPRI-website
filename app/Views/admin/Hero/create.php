<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="admin-container">

    <h2>Tambah Slide Hero</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert-error">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/hero/store') ?>" method="post" enctype="multipart/form-data">

        <?= csrf_field() ?>

        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="image" required>
        </div>

        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="title" required>
        </div>

        <div class="form-group">
            <label>Deskripsi (Opsional)</label>
            <textarea name="description" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label>Urutan Tampil</label>
            <input type="number" name="sort_order" value="1" required>
        </div>

        <div style="margin-top:20px;">
            <button type="submit" class="btn-primary">Simpan</button>
            <a href="<?= base_url('admin/hero') ?>" class="btn-secondary">Kembali</a>
        </div>

    </form>

</div>

<?= $this->endSection() ?>
