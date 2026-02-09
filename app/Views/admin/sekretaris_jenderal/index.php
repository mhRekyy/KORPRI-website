<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<!-- CSS KHUSUS SEKRETARIS JENDERAL -->
<link rel="stylesheet" href="<?= base_url('assets/css/admin/sekretaris-jenderal.css') ?>">

<div class="container-fluid sekjen-wrapper">

    <!-- HEADER -->
    <div class="sekjen-header">
        <h1><?= esc($title) ?></h1>

        <a href="<?= base_url('admin/sekretaris-jenderal/create') ?>"
           class="btn btn-primary">
            + Tambah Sekretaris Jenderal
        </a>
    </div>

    <!-- FLASH MESSAGE -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- TABLE -->
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover align-middle sekjen-table">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Periode</th>
                        <th>Urutan</th>
                        <th>Status</th>
                        <th width="18%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($sekjen)) : ?>
                        <?php $no = 1; foreach ($sekjen as $item) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>

                                <td class="text-center">
                                    <img src="<?= base_url('assets/img/sekjen/' . $item['foto']) ?>"
                                         class="sekjen-photo">
                                </td>

                                <td><?= esc($item['nama']) ?></td>

                                <td>
                                    <?= esc($item['masa_jabat_mulai']) ?>
                                    –
                                    <?= esc($item['masa_jabat_selesai']) ?>
                                </td>

                                <td class="text-center"><?= esc($item['urutan']) ?></td>

                                <td class="text-center">
                                    <span class="sekjen-status <?= $item['is_active'] ? 'active' : 'inactive' ?>">
                                        <?= $item['is_active'] ? 'Aktif' : 'Nonaktif' ?>
                                    </span>
                                </td>

                                <td class="text-center sekjen-aksi">
                                    <a href="<?= base_url('admin/sekretaris-jenderal/edit/' . $item['id']) ?>"
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <a href="<?= base_url('admin/sekretaris-jenderal/toggle/' . $item['id']) ?>"
                                       class="btn btn-sm btn-info"
                                       onclick="return confirm('Ubah status Sekretaris Jenderal ini?')">
                                        Toggle
                                    </a>

                                    <a href="<?= base_url('admin/sekretaris-jenderal/delete/' . $item['id']) ?>"
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Yakin hapus data ini?')">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                Belum ada data
                            </td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
