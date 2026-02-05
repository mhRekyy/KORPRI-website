<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div class="admin-content">

    <div class="page-header">
        <h1>Edit Peraturan</h1>

        <a href="<?= base_url('admin/peraturan') ?>" class="btn-secondary">
            ← Kembali
        </a>
    </div>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif ?>

    <form action="<?= base_url('admin/peraturan/update/' . $peraturan['id']) ?>"
          method="post"
          enctype="multipart/form-data"
          class="form-admin">

        <?= csrf_field() ?>

        <div class="form-group">
            <label>Judul Peraturan</label>
            <input type="text" name="judul"
                   value="<?= esc($peraturan['judul']) ?>" required>
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="kategori"
                   value="<?= esc($peraturan['kategori']) ?>">
        </div>

        <div class="form-group">
            <label>Instansi</label>
            <input type="text" name="instansi"
                   value="<?= esc($peraturan['instansi']) ?>">
        </div>

        <div class="form-group">
            <label>Tanggal Penetapan</label>
            <input type="date" name="tanggal_penetapan"
                   value="<?= esc($peraturan['tanggal_penetapan']) ?>">
        </div>

        <div class="form-group">
            <label>Masa Bakti</label>
            <input type="text" name="masa_bakti"
                   value="<?= esc($peraturan['masa_bakti']) ?>">
        </div>

        <div class="form-group">
            <label>File Peraturan</label>

            <?php if (!empty($peraturan['file_pdf'])) : ?>
                <p style="margin-bottom:8px;">
                    <a href="<?= base_url('uploads/peraturan/' . $peraturan['file_pdf']) ?>"
                       target="_blank">
                        Lihat file saat ini
                    </a>
                </p>
            <?php endif ?>

            <input type="file" name="file" accept=".pdf,.doc,.docx">
            <small>* Kosongkan jika tidak ingin mengganti file</small>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="is_active">
                <option value="1" <?= $peraturan['is_active'] == 1 ? 'selected' : '' ?>>
                    Publish
                </option>
                <option value="0" <?= $peraturan['is_active'] == 0 ? 'selected' : '' ?>>
                    Draft
                </option>
            </select>
        </div>

        <div class="form-action">
            <button type="submit" class="btn-primary">
                Update
            </button>
        </div>

    </form>

</div>

<?= $this->endSection() ?>
