<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <h1>Edit Surat Edaran</h1>
    <a href="<?= base_url('admin/surat-edaran') ?>" class="btn-secondary">
        Kembali
    </a>
</div>

<form
    action="<?= base_url('admin/surat-edaran/update/' . $data['id']) ?>"
    method="post"
    enctype="multipart/form-data"
    class="form-admin">

    <div class="form-group">
        <label>Judul Surat Edaran</label>
        <input
            type="text"
            name="judul"
            value="<?= esc($data['judul']) ?>"
            required>
    </div>

    <div class="form-group">
        <label>Instansi</label>
        <input
            type="text"
            name="instansi"
            value="<?= esc($data['instansi']) ?>">
    </div>

    <div class="form-row">

        <!-- JENIS SURAT -->
        <div class="form-group">
            <label>Jenis Surat</label>
            <select name="jenis_surat" required>
            <option value="">-- Pilih Jenis Surat --</option>

            <option value="Surat Edaran Organisasi"
                <?= $data['jenis_surat'] === 'Surat Edaran Organisasi' ? 'selected' : '' ?>>
                Surat Edaran Organisasi
            </option>

            <option value="Surat Edaran Umum"
                <?= $data['jenis_surat'] === 'Surat Edaran Umum' ? 'selected' : '' ?>>
                Surat Edaran Umum
            </option>

            <option value="Surat Edaran Kepegawaian"
                <?= $data['jenis_surat'] === 'Surat Edaran Kepegawaian' ? 'selected' : '' ?>>
                Surat Edaran Kepegawaian
            </option>

            <option value="Surat Edaran Lainnya"
                <?= $data['jenis_surat'] === 'Surat Edaran Lainnya' ? 'selected' : '' ?>>
                Surat Edaran Lainnya
            </option>
        </select>

        </div>

        <!-- MASA BAKTI -->
        <div class="form-group">
            <label>Masa Bakti</label>
            <select name="masa_bakti">
                <option value="">-- Pilih Masa Bakti --</option>
                <option value="2016–2021"
                    <?= $data['masa_bakti'] === '2016–2021' ? 'selected' : '' ?>>
                    2016–2021
                </option>
                <option value="2021–2026"
                    <?= $data['masa_bakti'] === '2021–2026' ? 'selected' : '' ?>>
                    2021–2026
                </option>
            </select>
        </div>

    </div>

    <div class="form-group">
        <label>Tanggal Surat</label>
        <input
            type="date"
            name="tanggal_surat"
            value="<?= esc($data['tanggal_surat']) ?>"
            required>
    </div>

    <div class="form-group">
        <label>File Saat Ini</label>
        <?php if (!empty($data['file_pdf'])) : ?>
            <p>
                <a href="<?= base_url('uploads/surat-edaran/' . $data['file_pdf']) ?>"
                   target="_blank">
                    Lihat File
                </a>
            </p>
        <?php else : ?>
            <p><em>Tidak ada file</em></p>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label>Ganti File (PDF / DOCX)</label>
        <input type="file" name="file_pdf" accept=".pdf,.doc,.docx">
        <small>Kosongkan jika tidak ingin mengganti file</small>
    </div>

    <div class="form-group">
        <label class="checkbox">
            <input
                type="checkbox"
                name="is_active"
                value="1"
                <?= $data['is_active'] ? 'checked' : '' ?>>
            Publish
        </label>
    </div>

    <div class="form-action">
        <button type="submit" class="btn-primary">
            Update
        </button>
    </div>

</form>

<?= $this->endSection() ?>
