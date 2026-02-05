<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="admin-content">

    <!-- HEADER -->
    <div class="page-header">
        <div>
            <h1>Edit Keputusan</h1>
            <p class="page-desc">Perbarui informasi keputusan yang sudah ada.</p>
        </div>
    </div>

    <!-- FORM -->
    <form action="<?= base_url('admin/keputusan/update/' . $keputusan['id']) ?>"
          method="post"
          enctype="multipart/form-data"
          class="form-admin form-card">

        <?= csrf_field() ?>

        <div class="form-group">
            <label>Judul Keputusan <span class="required">*</span></label>
            <input type="text"
                   name="judul"
                   value="<?= esc($keputusan['judul']) ?>"
                   required>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Instansi</label>
                <input type="text"
                       name="instansi"
                       value="<?= esc($keputusan['instansi']) ?>">
            </div>

            <div class="form-group">
                <label>Jenis Keputusan</label>
                <input type="text"
                       name="jenis_keputusan"
                       value="<?= esc($keputusan['jenis_keputusan']) ?>">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Masa Bakti</label>
                <input type="text"
                       name="masa_bakti"
                       value="<?= esc($keputusan['masa_bakti']) ?>">
            </div>

            <div class="form-group">
                <label>Tanggal Keputusan</label>
                <input type="date"
                       name="tanggal_keputusan"
                       value="<?= esc($keputusan['tanggal_keputusan']) ?>">
            </div>
        </div>

        <div class="form-group">
            <label>Ganti File (Opsional)</label>
            <small class="form-hint">
                Format: PDF / DOCX. Maksimal 2MB.
            </small>
            <input type="file" name="file_pdf" accept=".pdf,.doc,.docx">

            <?php if (!empty($keputusan['file_pdf'])) : ?>
                <div class="file-preview">
                    File saat ini:
                    <a href="<?= base_url('uploads/keputusan/' . $keputusan['file_pdf']) ?>"
                       target="_blank">
                        Lihat file
                    </a>
                </div>
            <?php endif ?>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="is_active">
                <option value="0" <?= $keputusan['is_active'] == 0 ? 'selected' : '' ?>>Draft</option>
                <option value="1" <?= $keputusan['is_active'] == 1 ? 'selected' : '' ?>>Publish</option>
            </select>
        </div>

        <div class="form-action">
            <button type="submit" class="btn-primary">Update</button>
            <a href="<?= base_url('admin/keputusan') ?>" class="btn-secondary">Kembali</a>
        </div>

    </form>

</div>

<?= $this->endSection() ?>
