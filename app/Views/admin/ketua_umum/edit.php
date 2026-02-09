<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<h4 class="mb-4">Edit Ketua Umum</h4>

<form action="<?= base_url('admin/ketua-umum/update/' . $row['id']) ?>"
      method="post"
      enctype="multipart/form-data">
    <?= csrf_field() ?>

    <table class="table table-borderless align-middle" style="max-width:900px">
        <tbody>
            <tr>
                <th style="width:220px">Nama Ketua Umum</th>
                <td>
                    <input type="text"
                           name="nama"
                           class="form-control w-100"
                           value="<?= esc($row['nama']) ?>"
                           required>
                </td>
            </tr>

            <tr>
                <th>Foto</th>
                <td>
                    <?php if (!empty($row['foto'])): ?>
                        <img src="<?= base_url('assets/img/ketua/' . $row['foto']) ?>"
                             style="width:120px;height:160px;object-fit:cover;border-radius:6px"
                             class="mb-3 d-block">
                    <?php endif; ?>

                    <input type="file"
                           name="foto"
                           class="form-control w-100"
                           accept="image/*">

                    <small class="text-muted">
                        Upload hanya jika ingin mengganti foto
                    </small>
                </td>
            </tr>

            <tr>
                <th>Masa Jabatan Mulai</th>
                <td>
                    <input type="number"
                           name="masa_jabat_mulai"
                           class="form-control w-100"
                           value="<?= $row['masa_jabat_mulai'] ?>"
                           required>
                </td>
            </tr>

            <tr>
                <th>Masa Jabatan Selesai</th>
                <td>
                    <input type="number"
                           name="masa_jabat_selesai"
                           class="form-control w-100"
                           value="<?= $row['masa_jabat_selesai'] ?>">
                </td>
            </tr>

            <tr>
                <th>Urutan Tampil</th>
                <td>
                    <input type="number"
                           name="urutan"
                           class="form-control w-100"
                           value="<?= $row['urutan'] ?>">
                </td>
            </tr>

            <tr>
                <th>Status</th>
                <td>
                    <select name="is_active" class="form-select w-100">
                        <option value="1" <?= $row['is_active'] ? 'selected' : '' ?>>Aktif</option>
                        <option value="0" <?= !$row['is_active'] ? 'selected' : '' ?>>Nonaktif</option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary px-4">Update</button>
        <a href="<?= base_url('admin/ketua-umum') ?>" class="btn btn-secondary px-4">
            Kembali
        </a>
    </div>

</form>

<?= $this->endSection() ?>
