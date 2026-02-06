<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/admin/artikel.css') ?>">

<h1 class="admin-title">Artikel</h1>

<form method="get" class="filter-bar">
    <input type="text" name="q" placeholder="Cari judul"
           value="<?= esc($filter['q']) ?>">

    <select name="status">
        <option value="">Semua Status</option>
        <option value="1" <?= $filter['status']==='1'?'selected':'' ?>>Publish</option>
        <option value="0" <?= $filter['status']==='0'?'selected':'' ?>>Draft</option>
    </select>

    <button type="submit">Filter</button>
</form>

<a href="<?= base_url('admin/artikel/create') ?>" class="btn-add-floating">
    <span class="icon">＋</span>
    <span>Tambah Artikel</span>
</a>


<table class="table-admin">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th>Thumbnail</th>
            <th width="180">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($artikel as $row): ?>
        <tr>
    <td><?= esc($row['title']) ?></td>

    <td>
        <?php if ($row['is_active']): ?>
            <span class="status status-publish">Publish</span>
        <?php else: ?>
            <span class="status status-draft">Draft</span>
        <?php endif ?>
    </td>

    <td><?= date('d M Y', strtotime($row['created_at'])) ?></td>

    <!-- THUMBNAIL -->
    <td>
        <?php if (!empty($row['thumbnail'])): ?>
            <img src="<?= base_url('uploads/artikel/' . $row['thumbnail']) ?>"
                 class="thumb-admin">
        <?php else: ?>
            <span class="thumb-empty">—</span>
        <?php endif ?>
    </td>

    <td class="admin-action">

    <!-- EDIT -->
    <a href="<?= base_url('admin/artikel/edit/' . $row['id']) ?>"
       class="btn-action btn-edit js-tooltip"
       data-tooltip="Edit Artikel">
        ✏️
    </a>

    <!-- TOGGLE -->
    <button type="button"
            class="btn-action btn-toggle js-toggle js-tooltip"
            data-url="<?= base_url('admin/artikel/toggle/' . $row['id']) ?>"
            data-status="<?= $row['is_active'] ? 'publish' : 'draft' ?>"
            data-tooltip="<?= $row['is_active'] ? 'Unpublish' : 'Publish' ?>">
        <?= $row['is_active'] ? '👁️' : '🚫' ?>
    </button>

    <!-- DELETE -->
    <button type="button"
            class="btn-action btn-delete js-delete js-tooltip"
            data-url="<?= base_url('admin/artikel/delete/' . $row['id']) ?>"
            data-tooltip="Hapus Artikel">
        🗑️
    </button>

</td>

</tr>

    <?php endforeach ?>
    </tbody>
</table>

<div class="pagination">
    <?= $pager->links() ?>
</div>

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
        modalText.innerText = 'Yakin ingin menghapus artikel ini?';
        targetUrl = btn.dataset.url;
        modal.style.display = 'flex';
    });
});

document.querySelectorAll('.js-toggle').forEach(btn => {
    btn.addEventListener('click', () => {
        const status = btn.dataset.status === 'publish' ? 'unpublish' : 'publish';
        modalText.innerText = `Yakin ingin ${status} artikel ini?`;
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
