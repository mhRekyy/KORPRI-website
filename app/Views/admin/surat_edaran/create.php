<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <h1>Tambah Surat Edaran</h1>
    <a href="<?= base_url('admin/surat-edaran') ?>" class="btn-secondary">
        Kembali
    </a>
</div>

<form
    action="<?= base_url('admin/surat-edaran/store') ?>"
    method="post"
    enctype="multipart/form-data"
    class="form-admin">

    <div class="form-group">
        <label>Judul Surat Edaran</label>
        <input type="text" name="judul" required>
    </div>

    <div class="form-group">
        <label>Instansi</label>
        <input type="text" name="instansi">
    </div>

<div class="form-row">

        <!-- JENIS SURAT -->
        <div class="form-group">
            <label>Jenis Surat</label>
            <select name="jenis_id" required>
                <option value="">-- Pilih Jenis Surat --</option>
                <?php foreach ($jenisList as $j): ?>
                    <option value="<?= $j['id'] ?>">
                        <?= esc($j['nama']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- MASA BAKTI -->
        <div class="form-group">
            <label>Masa Bakti</label>
            <select name="masa_bakti_id">
                <option value="">-- Pilih Masa Bakti --</option>
                <?php foreach ($masaBaktiList as $m): ?>
                    <option value="<?= $m['id'] ?>">
                        <?= esc($m['nama']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

    </div>


    <div class="form-group">
        <label>Tanggal Surat</label>
        <input type="date" name="tanggal_surat" required>
    </div>

    <div class="form-group">
        <label>Upload File (PDF / DOCX)</label>
        <input type="file" name="file_pdf" accept=".pdf,.doc,.docx">
    </div>

    <div class="form-group">
        <label class="checkbox">
            <input type="checkbox" name="is_active" value="1">
            Publish
        </label>
    </div>

    <div class="form-action">
        <button type="submit" class="btn-primary">
            Simpan
        </button>
    </div>

</form>

<?= $this->endSection() ?>
