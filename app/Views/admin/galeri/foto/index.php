<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="admin-page">

    <div class="admin-page__header">
        <h1><?= esc($pageTitle) ?></h1>
        <a href="<?= base_url('admin/galeri/foto/create') ?>" class="btn-primary">
            + Tambah Kegiatan
        </a>
    </div>

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

    <div class="table-wrapper">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Kegiatan</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Jumlah Foto</th>
                    <th width="220">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($kegiatan)): ?>
                    <tr>
                        <td colspan="6" style="text-align:center;">Belum ada data kegiatan</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($kegiatan as $i => $row): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($row['judul_kegiatan']) ?></td>
                            <td><?= date('d-m-Y', strtotime($row['tanggal_kegiatan'])) ?></td>
                            <td><?= esc($row['lokasi'] ?? '-') ?></td>
                            <td><?= (int) $row['total_foto'] ?> / 6</td>
                            <td class="table-action">
                                <a href="<?= base_url('admin/galeri/foto/edit/' . $row['id']) ?>" class="btn-small">
                                    Edit
                                </a>
                                <a href="<?= base_url('admin/galeri/foto/kelola/' . $row['id']) ?>" class="btn-small btn-info">
                                    Kelola Foto
                                </a>
                                <form action="<?= base_url('admin/galeri/foto/delete/' . $row['id']) ?>" method="post" onsubmit="return confirm('Hapus kegiatan ini? Semua foto akan ikut terhapus.')">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn-small btn-danger">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

<?= $this->endSection() ?>
