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
            <select name="jenis_id" required>
                <option value="">-- Pilih Jenis Surat --</option>

                <?php foreach ($jenisList as $j): ?>
                    <option value="<?= $j['id']; ?>"
                        <?= $data['jenis_id'] == $j['id'] ? 'selected' : '' ?>>
                        <?= esc($j['nama']); ?>
                    </option>
                <?php endforeach; ?>

            </select>


        </div>

        <!-- MASA BAKTI -->
        <div class="form-group">
            <label>Masa Bakti</label>
            <select name="masa_bakti_id" required>
                <option value="">-- Pilih Masa Bakti --</option>

                <?php foreach ($masaBaktiList as $m): ?>
                    <option value="<?= $m['id']; ?>"
                        <?= $data['masa_bakti_id'] == $m['id'] ? 'selected' : '' ?>>
                        <?= esc($m['nama']); ?>
                    </option>
                <?php endforeach; ?>

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
