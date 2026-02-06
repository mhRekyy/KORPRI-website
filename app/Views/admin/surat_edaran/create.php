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
        <div class="form-group">
            <label>Jenis Surat</label>
            <input type="text" name="jenis_surat" required>
        </div>

        <div class="form-group">
            <label>Masa Bakti</label>
            <input type="text" name="masa_bakti" placeholder="Contoh: 2023–2028">
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
