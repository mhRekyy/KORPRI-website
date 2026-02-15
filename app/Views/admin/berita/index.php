<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/admin/index.css') ?>">

<h1 class="admin-title">Berita</h1>

<!-- FILTER -->
<form method="get" class="filter-bar">

    <input type="text"
           name="q"
           placeholder="Cari judul"
           value="<?= esc($q ?? '') ?>">

    <select name="kategori">
        <option value="">Semua Kategori</option>
        <option value="Pengumuman" <?= ($kategori ?? '') === 'Pengumuman' ? 'selected' : '' ?>>
            Pengumuman
        </option>
        <option value="Kegiatan" <?= ($kategori ?? '') === 'Kegiatan' ? 'selected' : '' ?>>
            Kegiatan
        </option>
    </select>

    <select name="status">
        <option value="">Semua Status</option>
        <option value="1" <?= ($status ?? '') === '1' ? 'selected' : '' ?>>Publish</option>
        <option value="0" <?= ($status ?? '') === '0' ? 'selected' : '' ?>>Draft</option>
    </select>

    <button type="submit">Filter</button>
</form>

<!-- ADD BUTTON -->
<a href="<?= base_url('admin/berita/create') ?>" class="btn-add-floating">
    <span class="icon">＋</span>
    <span>Tambah Berita</span>
</a>

<!-- TABLE -->
<table class="table-admin">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Thumbnail</th>
            <th width="180">Aksi</th>
        </tr>
    </thead>
    <tbody>

    <?php if (!empty($berita)): ?>

        <?php
        $perPage = 10;
        $page = $_GET['page_berita'] ?? 1;
        $no = 1 + ($perPage * ((int)$page - 1));
        ?>

        <?php foreach ($berita as $b): ?>
        <tr>
            <td><?= $no++ ?></td>

            <td><?= esc($b['judul']) ?></td>

            <td><?= esc($b['kategori']) ?></td>

            <!-- STATUS -->
            <td>
                <?php if ($b['is_active']): ?>
                    <span class="status status-publish">Publish</span>
                <?php else: ?>
                    <span class="status status-draft">Draft</span>
                <?php endif ?>
            </td>

            <!-- THUMBNAIL -->
            <td>
                <?php if (!empty($b['gambar'])): ?>
                    <img src="<?= base_url('uploads/berita/' . $b['gambar']) ?>"
                         class="thumb-admin">
                <?php else: ?>
                    <span class="thumb-empty">—</span>
                <?php endif ?>
            </td>

            <!-- AKSI -->
            <td class="admin-action">

                <!-- EDIT -->
                <a href="<?= base_url('admin/berita/edit/' . $b['id']) ?>"
                   class="btn-action btn-edit js-tooltip"
                   data-tooltip="Edit Berita">
                    ✏️
                </a>

                <!-- TOGGLE (POPUP) -->
                <button type="button"
                        class="btn-action btn-toggle js-toggle js-tooltip
                               <?= $b['is_active'] ? 'is-publish' : 'is-draft' ?>"
                        data-url="<?= base_url('admin/berita/toggle/' . $b['id']) ?>"
                        data-status="<?= $b['is_active'] ? 'publish' : 'draft' ?>"
                        data-tooltip="<?= $b['is_active'] ? 'Unpublish' : 'Publish' ?>">
                    <?= $b['is_active'] ? '👁️' : '🚫' ?>
                </button>

                <!-- DELETE (POPUP) -->
                <button type="button"
                        class="btn-action btn-delete js-delete js-tooltip"
                        data-url="<?= base_url('admin/berita/delete/' . $b['id']) ?>"
                        data-tooltip="Hapus Berita">
                    🗑️
                </button>

            </td>
        </tr>
        <?php endforeach ?>

    <?php else: ?>
        <tr>
            <td colspan="6" align="center">
                <?php if ($q || $kategori || $status): ?>
                    Data tidak ditemukan berdasarkan filter
                <?php else: ?>
                    Belum ada data berita
                <?php endif ?>
            </td>
        </tr>
    <?php endif ?>

    </tbody>
</table>

<!-- PAGINATION -->
<?php if (isset($pager)): ?>
<div class="pagination">
    <?= $pager->links('berita') ?>
</div>
<?php endif ?>

<!-- MODAL -->
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