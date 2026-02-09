<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<!-- CSS KHUSUS KETUA UMUM -->
<link rel="stylesheet" href="<?= base_url('assets/css/admin/ketua-umum.css') ?>">

<div class="ketua-umum-wrapper">

    <!-- HEADER / TOOLBAR -->
    <div class="ketua-umum-header">
        <h3 class="mb-0">Profil Ketua Umum</h3>

        <a href="<?= base_url('admin/ketua-umum/create') ?>"
           class="btn btn-primary">
            + Tambah Ketua Umum
        </a>
    </div>

    <!-- TABLE DATA -->
    <div class="table-responsive">
        <table class="table ketua-umum-table align-middle">
            <thead class="table-light">
                <tr>
                    <th class="text-center" width="50">No</th>
                    <th class="text-center" width="90">Foto</th>
                    <th>Nama</th>
                    <th>Masa Jabatan</th>
                    <th class="text-center" width="80">Urutan</th>
                    <th class="text-center" width="100">Status</th>
                    <th class="text-center" width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($list)) : ?>
                    <?php foreach ($list as $i => $row): ?>
                    <tr>
                        <td class="text-center"><?= $i + 1 ?></td>

                        <td class="text-center">
                            <?php if (!empty($row['foto'])): ?>
                                <img src="<?= base_url('assets/img/ketua/' . $row['foto']) ?>"
                                     class="ketua-umum-photo">
                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>

                        <td><?= esc($row['nama']) ?></td>

                        <td>
                            <?= $row['masa_jabat_mulai'] ?>
                            –
                            <?= $row['masa_jabat_selesai'] ?? 'Sekarang' ?>
                        </td>

                        <td class="text-center"><?= $row['urutan'] ?></td>

                        <!-- STATUS -->
                        <td class="text-center">
                            <span class="ketua-umum-status <?= $row['is_active'] ? 'active' : 'inactive' ?>">
                                <?= $row['is_active'] ? 'Aktif' : 'Nonaktif' ?>
                            </span>
                        </td>

                        <!-- AKSI -->
                        <td class="text-center ketua-umum-aksi">
                            <a href="<?= base_url('admin/ketua-umum/edit/' . $row['id']) ?>"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <a href="<?= base_url('admin/ketua-umum/toggle/' . $row['id']) ?>"
                               class="btn btn-info btn-sm"
                               onclick="return confirm('Ubah status Ketua Umum ini?')">
                                Toggle
                            </a>

                            <a href="<?= base_url('admin/ketua-umum/delete/' . $row['id']) ?>"
                               onclick="return confirm('Hapus data ini?')"
                               class="btn btn-danger btn-sm">
                                Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted">
                            Belum ada data Ketua Umum
                        </td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>

</div>

<?= $this->endSection() ?>
