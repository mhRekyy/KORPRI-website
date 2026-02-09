<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<!-- TABLE HEADER / TOOLBAR -->
<table class="table table-borderless mb-3">
    <tr>
        <td>
            <h3 class="mb-0">Profil Ketua Umum</h3>
        </td>
        <td class="text-end">
            <a href="<?= base_url('admin/ketua-umum/create') ?>"
               class="btn btn-primary">
                + Tambah Ketua Umum
            </a>
        </td>
    </tr>
</table>

<!-- TABLE DATA -->
<div class="table-responsive">
<table class="table table-bordered table-striped align-middle">
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
                             style="width:60px;height:80px;object-fit:cover;border-radius:6px">
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

                <!-- STATUS (CLICK TO TOGGLE) -->
                <td class="text-center">
                    <?php if ($row['is_active']): ?>
                        <a href="<?= base_url('admin/ketua-umum/toggle/' . $row['id']) ?>"
                           class="badge bg-success text-dark"
                           onclick="return confirm('Nonaktifkan Ketua Umum ini?')">
                            Aktif
                        </a>
                    <?php else: ?>
                        <a href="<?= base_url('admin/ketua-umum/toggle/' . $row['id']) ?>"
                           class="badge bg-secondary text-white"
                           onclick="return confirm('Aktifkan Ketua Umum ini?')">
                            Nonaktif
                        </a>
                    <?php endif; ?>
                </td>

                <td class="text-center">
                    <a href="<?= base_url('admin/ketua-umum/edit/' . $row['id']) ?>"
                       class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= base_url('admin/ketua-umum/delete/' . $row['id']) ?>"
                       onclick="return confirm('Hapus data ini?')"
                       class="btn btn-danger btn-sm">Hapus</a>
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

<?= $this->endSection() ?>
