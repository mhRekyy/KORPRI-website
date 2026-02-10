<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="admin-page">

    <!-- HEADER HALAMAN -->
    <div class="page-header">
        <div>
            <h1><?= esc($pageTitle) ?></h1>
            <p class="page-desc">
                Manajemen foto dokumentasi kegiatan (maksimal 6 foto)
            </p>
        </div>
        <div>
            <a href="<?= base_url('admin/galeri/foto/edit/' . $kegiatan['id']) ?>" class="btn-secondary">
                ← Kembali
            </a>
        </div>
    </div>

    <!-- FLASH MESSAGE -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-error">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <!-- META KEGIATAN -->
    <div class="card" style="margin-bottom: 28px;">
        <table class="table-admin">
            <tr>
                <th style="width:180px;">Judul Kegiatan</th>
                <td><?= esc($kegiatan['judul_kegiatan']) ?></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td><?= date('d F Y', strtotime($kegiatan['tanggal_kegiatan'])) ?></td>
            </tr>
            <tr>
                <th>Lokasi</th>
                <td><?= esc($kegiatan['lokasi'] ?? '-') ?></td>
            </tr>
        </table>
    </div>

    <?php
        $jumlahFoto = count($foto);
        $sisaSlot   = 6 - $jumlahFoto;
    ?>

    <!-- UPLOAD SECTION -->
    <div class="card" style="margin-bottom: 28px;">
        <h2 style="margin-bottom:6px;">Upload Foto</h2>
        <p class="text-muted" style="margin-bottom:16px;">
            <?= $sisaSlot > 0
                ? 'Sisa slot foto: ' . $sisaSlot
                : 'Batas maksimal foto telah tercapai.' ?>
        </p>

        <?php if ($sisaSlot > 0): ?>
            <form
                action="<?= base_url('admin/galeri/foto/upload/' . $kegiatan['id']) ?>"
                method="post"
                enctype="multipart/form-data"
                style="max-width:520px;"
            >
                <?= csrf_field() ?>

                <div class="form-group">
                    <label>Pilih Foto</label>
                    <input
                        type="file"
                        name="foto[]"
                        accept="image/jpeg,image/png"
                        multiple
                        required
                    >
                    <div class="form-hint">
                        JPG / PNG, maksimal 2MB per foto
                    </div>
                </div>

                <button type="submit" class="btn-primary">
                    Upload
                </button>
            </form>
        <?php endif; ?>
    </div>

    <!-- DAFTAR FOTO -->
    <div class="card">
        <h2 style="margin-bottom:16px;">Foto Tersimpan</h2>

        <?php if (empty($foto)): ?>
            <div class="empty-state">
                Belum ada foto untuk kegiatan ini.
            </div>
        <?php else: ?>
            <div class="photo-grid">
                <?php foreach ($foto as $item): ?>
                    <div class="photo-item">
                        <img
                            src="<?= base_url('uploads/galeri/foto/' . $item['file_name']) ?>"
                            alt="Foto Kegiatan"
                        >

                        <form
                            action="<?= base_url('admin/galeri/foto/hapus-foto/' . $item['id']) ?>"
                            method="post"
                            onsubmit="return confirm('Hapus foto ini?')"
                        >
                            <?= csrf_field() ?>
                            <button type="submit" style="
                                margin-top:6px;
                                font-size:12px;
                                padding:6px;
                                background:#fee2e2;
                                color:#991b1b;
                                border:none;
                                border-radius:6px;
                                width:100%;
                                cursor:pointer;
                            ">
                                Hapus
                            </button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

</div>

<?= $this->endSection() ?>
