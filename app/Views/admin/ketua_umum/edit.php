<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<h4 class="mb-3">Edit Ketua Umum</h4>

<form action="<?= base_url('admin/ketua-umum/update/' . $row['id']) ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <table class="table table-bordered align-middle">
        <tbody>
            <tr>
                <th width="200">Nama Ketua Umum</th>
                <td>
                    <input type="text" name="nama" class="form-control"
                           value="<?= esc($row['nama']) ?>" required>
                </td>
            </tr>

            <tr>
                <th>Foto</th>
                <td>
                    <?php if (!empty($row['foto'])): ?>
                        <img src="<?= base_url('uploads/ketua_umum/' . $row['foto']) ?>"
                             style="width:80px;height:100px;object-fit:cover;border-radius:4px"
                             class="mb-2"><br>
                    <?php endif; ?>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                    <small class="text-muted">Upload jika ingin mengganti foto</small>
                </td>
            </tr>

            <tr>
                <th>Masa Jabatan Mulai</th>
                <td>
                    <input type="number" name="masa_jabat_mulai" class="form-control"
                           value="<?= $row['masa_jabat_mulai'] ?>" required>
                </td>
            </tr>

            <tr>
                <th>Masa Jabatan Selesai</th>
                <td>
                    <input type="number" name="masa_jabat_selesai" class="form-control"
                           value="<?= $row['masa_jabat_selesai'] ?>">
                </td>
            </tr>

            <tr>
                <th>Urutan Tampil</th>
                <td>
                    <input type="number" name="urutan" class="form-control"
                           value="<?= $row['urutan'] ?>">
                </td>
            </tr>

            <tr>
                <th>Status</th>
                <td>
                    <select name="is_active" class="form-select">
                        <option value="1" <?= $row['is_active'] ? 'selected' : '' ?>>Aktif</option>
                        <option value="0" <?= !$row['is_active'] ? 'selected' : '' ?>>Nonaktif</option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= base_url('admin/ketua-umum') ?>" class="btn btn-secondary">Kembali</a>
    </div>
</form>

<?= $this->endSection() ?>
