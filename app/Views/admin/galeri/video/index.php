<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="admin-page">

    <div class="page-header">
        <div>
            <h1><?= esc($pageTitle) ?></h1>
            <p class="page-desc">Daftar video dokumentasi kegiatan KORPRI</p>
        </div>
        <div>
            <a href="<?= base_url('admin/galeri/video/create') ?>" class="btn-primary">
                + Tambah Video
            </a>
        </div>
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

    <div class="card">
        <?php if (empty($videos)): ?>
            <div class="empty-state">
                Belum ada video kegiatan yang ditambahkan.
            </div>
        <?php else: ?>
            <table class="table-admin">
                <thead>
                    <tr>
                        <th style="width:120px;">Thumbnail</th>
                        <th>Judul Video</th>
                        <th style="width:160px;">Tanggal</th>
                        <th style="width:140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($videos as $item): ?>
                        <tr>
                            <td>
                                <img
                                    src="<?= esc($item['thumbnail_url']) ?>"
                                    alt="Thumbnail"
                                    style="width:100px;border-radius:6px;"
                                >
                            </td>
                            <td>
                                <strong><?= esc($item['youtube_title']) ?></strong>
                                <?php if (! empty($item['description'])): ?>
                                    <div class="text-muted" style="margin-top:4px;">
                                        <?= esc($item['description']) ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?= date('d M Y', strtotime($item['created_at'])) ?>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/galeri/video/edit/' . $item['id']) ?>" class="btn-action">
                                    Edit
                                </a>

                                <form
                                    action="<?= base_url('admin/galeri/video/delete/' . $item['id']) ?>"
                                    method="post"
                                    style="display:inline"
                                    onsubmit="return confirm('Hapus video ini?')"
                                >
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn-action" style="color:#dc2626;">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

</div>

<?= $this->endSection() ?>
