<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <h1>Surat Edaran</h1>
    <a href="<?= base_url('admin/surat-edaran/create') ?>" class="btn-primary">
        Tambah Surat Edaran
    </a>
</div>

<div class="table-wrapper">

    <!-- SEARCH -->
    <form method="get" class="form-search">
        <input
            type="text"
            name="keyword"
            placeholder="Cari judul surat edaran..."
            value="<?= esc($keyword ?? '') ?>">
        <button type="submit">Cari</button>
    </form>

    <!-- TABLE -->
    <table class="admin-table">
        <thead>
            <tr>
                <th width="50">No</th>
                <th>Judul</th>
                <th>Jenis Surat</th>
                <th>Masa Bakti</th>
                <th>Tanggal Surat</th>
                <th>Status</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>
        <tbody>

        <?php if (!empty($suratEdaran)) : ?>
            <?php $no = 1 + (10 * ($pager->getCurrentPage('surat_edaran') - 1)); ?>
            <?php foreach ($suratEdaran as $row) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($row['judul']) ?></td>
                    <td><?= esc($row['jenis_surat']) ?></td>
                    <td><?= esc($row['masa_bakti']) ?></td>
                    <td><?= date('d-m-Y', strtotime($row['tanggal_surat'])) ?></td>
                    <td>
                        <span class="<?= $row['is_active'] ? 'status-publish' : 'status-draft' ?>">
                            <?= $row['is_active'] ? 'Publish' : 'Draft' ?>
                        </span>
                    </td>
                    <td class="action">
                        <a href="<?= base_url('admin/surat-edaran/edit/' . $row['id']) ?>">
                            Edit
                        </a>
                        <a href="<?= base_url('admin/surat-edaran/toggle/' . $row['id']) ?>">
                            <?= $row['is_active'] ? 'Draft' : 'Publish' ?>
                        </a>
                        <a href="<?= base_url('admin/surat-edaran/delete/' . $row['id']) ?>"
                           onclick="return confirm('Yakin ingin menghapus data ini?')">
                            Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php else : ?>
            <tr>
                <td colspan="7" style="text-align:center;">
                    Data surat edaran belum tersedia.
                </td>
            </tr>
        <?php endif ?>

        </tbody>
    </table>

    <!-- PAGINATION -->
    <?= $pager->links('surat_edaran', 'default_full') ?>

</div>

<?= $this->endSection() ?>
