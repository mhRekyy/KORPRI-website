<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="admin-content">

    <!-- HEADER -->
    <div class="page-header">
        <div>
            <h1>Tambah Keputusan</h1>
            <p class="page-desc">Form untuk menambahkan data keputusan baru.</p>
        </div>
    </div>

    <!-- FORM -->
    <form action="<?= base_url('admin/keputusan/store') ?>"
          method="post"
          enctype="multipart/form-data"
          class="form-admin form-card">

        <?= csrf_field() ?>

        <div class="form-group">
            <label>Judul Keputusan <span class="required">*</span></label>
            <input type="text" name="judul" placeholder="Masukkan judul keputusan" required>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Instansi</label>
                <input type="text" name="instansi" placeholder="Instansi terkait">
            </div>

        <div class="form-group">
            <label>Jenis Keputusan</label>
            <select name="jenis_keputusan">
                <option value="">-- Pilih Jenis Keputusan --</option>

                <?php foreach ($jenisOptions as $jenis): ?>
                    <option value="<?= $jenis ?>"
                        <?= old('jenis_keputusan') == $jenis ? 'selected' : '' ?>>
                        <?= $jenis ?>
                    </option>
                <?php endforeach; ?>

            </select>
        </div>

        </div>

            <div class="form-row">
                        <div class="form-group">
                <label>Masa Bakti</label>
                <select name="masa_bakti_id">
                    <option value="">-- Pilih Masa Bakti --</option>

                    <?php foreach ($masaBaktiOptions as $row): ?>
                        <option value="<?= $row['id'] ?>"
                            <?= old('masa_bakti_id') == $row['id'] ? 'selected' : '' ?>>
                            <?= esc($row['nama']) ?>
                        </option>
                    <?php endforeach; ?>

                </select>
            </div>


            <div class="form-group">
                <label>Tanggal Keputusan</label>
                <input type="date" name="tanggal_keputusan">
            </div>
        </div>

        <div class="form-group">
            <label>File Keputusan</label>
            <small class="form-hint">Format: PDF / DOCX. Maksimal 2MB.</small>
            <input type="file" name="file_pdf" accept=".pdf,.doc,.docx">
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="is_active">
                <option value="0">Draft</option>
                <option value="1">Publish</option>
            </select>
        </div>

        <div class="form-action">
            <button type="submit" class="btn-primary">Simpan</button>
            <a href="<?= base_url('admin/keputusan') ?>" class="btn-secondary">Kembali</a>
        </div>

    </form>

</div>

<?= $this->endSection() ?>
