<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<div class="admin-content">

    <div class="page-header">
        <h1>Tambah Peraturan</h1>

        <a href="<?= base_url('admin/peraturan') ?>" class="btn-secondary">
            ← Kembali
        </a>
    </div>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif ?>

    <form action="<?= base_url('admin/peraturan/store') ?>"
          method="post"
          enctype="multipart/form-data"
          class="form-admin">

        <?= csrf_field() ?>

        <div class="form-group">
            <label>Judul Peraturan</label>
            <input type="text" name="judul" required>
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori_id" required>
                <option value="">-- Pilih Kategori --</option>

                <?php foreach ($kategoriList as $k): ?>
                    <option value="<?= $k['id']; ?>">
                        <?= esc($k['nama']); ?>
                    </option>
                <?php endforeach; ?>

            </select>
        </div>


        <div class="form-group">
            <label>Instansi</label>
            <input type="text" name="instansi">
        </div>

        <div class="form-group">
            <label>Tanggal Penetapan</label>
            <input type="date" name="tanggal_penetapan">
        </div>

        <div class="form-group">
            <label>Masa Bakti</label>
            <select name="masa_bakti_id" required>
                <option value="">-- Pilih Masa Bakti --</option>

                <?php foreach ($masaBaktiOptions as $row): ?>
                    <option value="<?= $row['id'] ?>">
                        <?= esc($row['nama']) ?>
                    </option>
                <?php endforeach; ?>

            </select>
        </div>


        <div class="form-group">
            <label>File Peraturan (PDF / DOCX)</label>
            <input type="file" name="file" accept=".pdf,.doc,.docx" required>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="is_active">
                <option value="1">Publish</option>
                <option value="0" selected>Draft</option>
            </select>
        </div>

        <div class="form-action">
            <button type="submit" class="btn-primary">
                Simpan
            </button>
        </div>

    </form>

</div>

<?= $this->endSection() ?>
