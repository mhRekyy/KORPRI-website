<?= $this->extend('admin/layout/main') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/admin/index.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>


<div class="admin-container">

    <h2>Hero Section</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert-error">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <div style="margin-bottom:20px;">
        <a href="<?= base_url('admin/hero/create') ?>" class="btn-primary">
            + Tambah Slide
        </a>
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Thumbnail</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Urutan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($slides)): ?>
                <?php foreach ($slides as $slide): ?>
                    <tr>
                        <td>
                            <img src="<?= base_url('uploads/hero/' . $slide['image']) ?>"
                                 style="width:120px; height:70px; object-fit:cover;">
                        </td>
                        <td><?= esc($slide['title']) ?></td>
                        <td><?= esc(substr($slide['description'], 0, 80)) ?></td>
                        <td><?= esc($slide['sort_order']) ?></td>
                        <td>
                            <a href="<?= base_url('admin/hero/edit/' . $slide['id']) ?>" class="btn-edit">
                                Edit
                            </a>

                            <a href="<?= base_url('admin/hero/delete/' . $slide['id']) ?>"
                               onclick="return confirm('Yakin ingin menghapus slide ini?')"
                               class="btn-delete">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align:center;">
                        Belum ada slide hero.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>

<?= $this->endSection() ?>
