<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <h1>Manajemen Peraturan</h1>

    <a href="<?= base_url('admin/peraturan/create') ?>" class="btn-primary">
        + Tambah Peraturan
    </a>
</div>

<!-- SEARCH -->
<form action="<?= base_url('admin/peraturan') ?>" method="get" class="filter-bar">
    <input
        type="text"
        name="keyword"
        placeholder="Cari judul peraturan..."
        value="<?= esc($keyword ?? '') ?>"
    >
    <button type="submit">Cari</button>
</form>

<!-- TABLE -->
<div class="table-wrapper">
    <table class="admin-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Instansi</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th width="160">Aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php if (empty($peraturan)) : ?>
                <tr>
                    <td colspan="7" style="text-align:center;">
                        Data peraturan belum tersedia.
                    </td>
                </tr>
            <?php endif ?>

            <?php
            $no = 1 + (10 * ($pager->getCurrentPage('peraturan') - 1));
            foreach ($peraturan as $row) :
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($row['judul']) ?></td>
                    <td><?= esc($row['kategori']) ?></td>
                    <td><?= esc($row['instansi']) ?></td>
                    <td><?= date('d M Y', strtotime($row['tanggal_penetapan'])) ?></td>

                    <td>
                        <?php if ($row['is_active'] == 1) : ?>
                            <span class="badge badge-success">Publish</span>
                        <?php else : ?>
                            <span class="badge badge-warning">Draft</span>
                        <?php endif ?>
                    </td>

                    <td class="action">
                        <a href="<?= base_url('uploads/peraturan/' . $row['file_pdf']) ?>" target="_blank">
                            File
                        </a>

                        <a href="<?= base_url('admin/peraturan/edit/' . $row['id']) ?>">
                            Edit
                        </a>

                        <a href="<?= base_url('admin/peraturan/toggle/' . $row['id']) ?>"
                           onclick="return confirm('Ubah status peraturan ini?')">
                            Toggle
                        </a>

                        <a href="<?= base_url('admin/peraturan/delete/' . $row['id']) ?>"
                           onclick="return confirm('Hapus peraturan ini?')"
                           class="text-danger">
                            Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</div>

<!-- PAGINATION -->
<div class="pagination-wrapper">
    <?= $pager->links('peraturan', 'default_full') ?>
</div>

<?= $this->endSection() ?>
