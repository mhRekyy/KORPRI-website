<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<!-- HEADER -->
<div class="page-header">
    <div>
        <h1>Data Keputusan</h1>
        <p class="page-desc">Daftar keputusan yang dikelola oleh admin.</p>
    </div>

    <a href="<?= base_url('admin/keputusan/create') ?>" class="btn-primary">
        + Tambah Keputusan
    </a>
</div>

<!-- SEARCH -->
<form action="<?= base_url('admin/keputusan') ?>" method="get" class="filter-bar">
    <input
        type="text"
        name="keyword"
        placeholder="Cari judul keputusan..."
        value="<?= esc($keyword ?? '') ?>"
    >
    <button type="submit">Cari</button>
</form>

<!-- FLASH MESSAGE -->
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<!-- TABLE -->
<div class="table-wrapper">
    <table class="admin-table">
        <thead>
            <tr>
                <th width="50">No</th>
                <th>Judul Keputusan</th>
                <th>Instansi</th>
                <th>Jenis</th>
                <th>Status</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>

        <?php if (empty($keputusan)) : ?>
            <tr>
                <td colspan="6" class="empty-state">
                    Data keputusan belum tersedia.
                </td>
            </tr>
        <?php endif; ?>

        <?php
        $no = 1 + (10 * ($pager->getCurrentPage() - 1));
        foreach ($keputusan as $row) :
        ?>
            <tr>
                <td><?= $no++ ?></td>

                <!-- JUDUL -->
                <td class="col-title" title="<?= esc($row['judul']) ?>">
                    <?= esc($row['judul']) ?>
                </td>

                <td><?= esc($row['instansi']) ?></td>
                <td><?= esc($row['jenis_nama'] ?? '-') ?></td>

                <!-- STATUS -->
                <td class="col-status">
                    <?php if ($row['is_active'] == 1) : ?>
                        <span class="badge badge-publish">Publish</span>
                    <?php else : ?>
                        <span class="badge badge-draft">Draft</span>
                    <?php endif; ?>
                </td>

                <!-- AKSI -->
                <td class="action">
                    <a href="<?= base_url('admin/keputusan/toggle/' . $row['id']) ?>"
                       title="Ubah status"
                       onclick="return confirm('Ubah status keputusan ini?')">
                        Toggle
                    </a>

                    <a href="<?= base_url('admin/keputusan/edit/' . $row['id']) ?>" title="Edit data">
                        Edit
                    </a>

                    <a href="<?= base_url('admin/keputusan/delete/' . $row['id']) ?>"
                       class="text-danger"
                       title="Hapus data"
                       onclick="return confirm('Hapus keputusan ini?')">
                        Hapus
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>

<!-- PAGINATION -->
<div class="pagination-wrapper">
    <?= $pager->links() ?>
</div>

<?= $this->endSection() ?>
