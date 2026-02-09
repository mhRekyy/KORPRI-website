<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<h4 class="mb-3">Tambah Ketua Umum</h4>

<form action="<?= base_url('admin/ketua-umum/store') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <table class="table table-bordered align-middle">
        <tbody>
            <tr>
                <th width="200">Nama Ketua Umum</th>
                <td>
                    <input type="text" name="nama" class="form-control" required>
                </td>
            </tr>

            <tr>
                <th>Foto</th>
                <td>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                    <small class="text-muted">Format JPG / PNG. Boleh dikosongkan.</small>
                </td>
            </tr>

            <tr>
                <th>Masa Jabatan Mulai</th>
                <td>
                    <input type="number" name="masa_jabat_mulai" class="form-control" placeholder="Contoh: 2017" required>
                </td>
            </tr>

            <tr>
                <th>Masa Jabatan Selesai</th>
                <td>
                    <input type="number" name="masa_jabat_selesai" class="form-control" placeholder="Kosongkan jika masih menjabat">
                </td>
            </tr>

            <tr>
                <th>Urutan Tampil</th>
                <td>
                    <input type="number" name="urutan" class="form-control" value="0">
                </td>
            </tr>

            <tr>
                <th>Status</th>
                <td>
                    <select name="is_active" class="form-select">
                        <option value="1" selected>Aktif</option>
                        <option value="0">Nonaktif</option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('admin/ketua-umum') ?>" class="btn btn-secondary">Kembali</a>
    </div>
</form>

<?= $this->endSection() ?>
