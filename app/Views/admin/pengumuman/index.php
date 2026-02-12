<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/admin/index.css') ?>">

<h1 class="admin-title">Pengumuman</h1>

<!-- FILTER -->
<form method="get" class="filter-bar">

    <input type="text"
           name="q"
           placeholder="Cari judul"
           value="<?= esc($_GET['q'] ?? '') ?>">

    <select name="kategori">
        <option value="">Semua Kategori</option>
        <option value="Peraturan" <?= ($_GET['kategori'] ?? '') === 'Peraturan' ? 'selected' : '' ?>>
            Peraturan
        </option>
        <option value="Keputusan" <?= ($_GET['kategori'] ?? '') === 'Keputusan' ? 'selected' : '' ?>>
            Keputusan
        </option>
    </select>

    <select name="masa_bakti">
    <option value="">Semua Masa Bakti</option>
    <option value="2016-2021" <?= ($_GET['masa_bakti'] ?? '') === '2016-2021' ? 'selected' : '' ?>>
        2016-2021
    </option>
    <option value="2021–2026" <?= ($_GET['masa_bakti'] ?? '') === '2021–2026' ? 'selected' : '' ?>>
        2021–2026
    </option>
</select>

    <select name="status">
        <option value="">Semua Status</option>
        <option value="1" <?= ($_GET['status'] ?? '') === '1' ? 'selected' : '' ?>>Publish</option>
        <option value="0" <?= ($_GET['status'] ?? '') === '0' ? 'selected' : '' ?>>Draft</option>
    </select>

    <button type="submit">Filter</button>
</form>

<!-- ADD BUTTON -->
<a href="<?= base_url('admin/pengumuman/create') ?>" class="btn-add-floating">
    <span class="icon">＋</span>
    <span>Tambah Pengumuman</span>
</a>

<!-- TABLE -->
<table class="table-admin">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Masa Bakti</th>
            <th>Instansi</th>
            <th>Status</th>
            <th width="180">Aksi</th>
        </tr>
    </thead>
    <tbody>

    <?php if (!empty($pengumuman)): ?>
        <?php $no = 1; foreach ($pengumuman as $row): ?>
        <tr>
            <td><?= $no++ ?></td>

                <td><?= esc($row['judul']) ?></td>

                <td><?= esc($row['kategori_nama'] ?? '-') ?></td>

                <td><?= esc($row['masa_bakti_nama'] ?? '-') ?></td>

                <td><?= esc($row['instansi']) ?></td>

            <!-- STATUS -->
            <td>
                <?php if ($row['is_active']): ?>
                    <span class="status status-publish">Publish</span>
                <?php else: ?>
                    <span class="status status-draft">Draft</span>
                <?php endif ?>
            </td>

            <!-- AKSI -->
            <td class="admin-action">

                <!-- EDIT -->
                <a href="<?= base_url('admin/pengumuman/edit/' . $row['id']) ?>"
                   class="btn-action btn-edit js-tooltip"
                   data-tooltip="Edit Pengumuman">
                    ✏️
                </a>

                <!-- TOGGLE -->
                <button type="button"
                        class="btn-action btn-toggle js-toggle js-tooltip
                               <?= $row['is_active'] ? 'is-publish' : 'is-draft' ?>"
                        data-url="<?= base_url('admin/pengumuman/toggle/' . $row['id']) ?>"
                        data-status="<?= $row['is_active'] ? 'publish' : 'draft' ?>"
                        data-tooltip="<?= $row['is_active'] ? 'Unpublish' : 'Publish' ?>">
                    <?= $row['is_active'] ? '👁️' : '🚫' ?>
                </button>

                <!-- DELETE -->
                <button type="button"
                        class="btn-action btn-delete js-delete js-tooltip"
                        data-url="<?= base_url('admin/pengumuman/delete/' . $row['id']) ?>"
                        data-tooltip="Hapus Pengumuman">
                    🗑️
                </button>

            </td>
        </tr>
        <?php endforeach ?>
    <?php else: ?>
        <tr>
            <td colspan="7" align="center">Belum ada data pengumuman</td>
        </tr>
    <?php endif ?>

    </tbody>
</table>

<!-- PAGINATION -->
<?php if (isset($pager)): ?>
<div class="pagination">
    <?= $pager->links() ?>
</div>
<?php endif ?>

<!-- MODAL (SAMA DENGAN ARTIKEL) -->
<div class="modal-overlay" id="confirmModal">
    <div class="modal">
        <h3 id="modalTitle">Konfirmasi</h3>
        <p id="modalText">Apakah Anda yakin?</p>

        <div class="modal-actions">
            <button id="modalCancel" class="btn-action">Batal</button>
            <button id="modalConfirm" class="btn-action btn-delete">Ya</button>
        </div>
    </div>
</div>

<script>
const modal = document.getElementById('confirmModal');
const modalText = document.getElementById('modalText');
const btnConfirm = document.getElementById('modalConfirm');
const btnCancel = document.getElementById('modalCancel');

let targetUrl = '';

document.querySelectorAll('.js-delete').forEach(btn => {
    btn.addEventListener('click', () => {
        modalText.innerText = 'Yakin ingin menghapus berita ini?';
        targetUrl = btn.dataset.url;
        modal.style.display = 'flex';
    });
});

document.querySelectorAll('.js-toggle').forEach(btn => {
    btn.addEventListener('click', () => {
        const status = btn.dataset.status === 'publish'
            ? 'unpublish'
            : 'publish';
        modalText.innerText = `Yakin ingin ${status} berita ini?`;
        targetUrl = btn.dataset.url;
        modal.style.display = 'flex';
    });
});

btnConfirm.onclick = () => {
    window.location.href = targetUrl;
};

btnCancel.onclick = () => {
    modal.style.display = 'none';
};
</script>

<?= $this->endSection() ?>