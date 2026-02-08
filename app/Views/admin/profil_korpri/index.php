<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/admin/profil_korpri.css') ?>">

<div class="page-header">
    <h1>Profil KORPRI</h1>
    <a href="<?= base_url('admin/profil-korpri/create') ?>" class="btn-primary">
        + Tambah
    </a>
</div>

<!-- FILTER + SEARCH -->
<form method="get" class="filter-bar">
    <select name="kategori">
        <option value="">Semua Jabatan</option>
        <option value="pimpinan" <?= ($kategori === 'pimpinan') ? 'selected' : '' ?>>
            Ketua / Wakil Ketua
        </option>
        <option value="anggota" <?= ($kategori === 'anggota') ? 'selected' : '' ?>>
            Anggota
        </option>
    </select>

    <input
        type="text"
        name="q"
        placeholder="Cari nama atau jabatan..."
        value="<?= esc($q) ?>"
    >

    <button type="submit">Filter</button>

    <?php if ($q || $kategori): ?>
        <a href="<?= base_url('admin/profil-korpri') ?>" class="btn-reset">
            Reset
        </a>
    <?php endif ?>
</form>

<table class="admin-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Masa Bakti</th>
            <th>Urutan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($profil)): ?>
            <?php $no = 1; foreach ($profil as $row): ?>
                <tr class="<?= $row['is_active'] == 0 ? 'row-nonaktif' : '' ?>">
                    <td><?= $no++ ?></td>

                    <td><?= esc($row['nama']) ?></td>

                    <td>
                        <?php
                        $jabatan = $row['jabatan'];
                        $lower   = strtolower($jabatan);

                        if (strpos($lower, 'ketua') !== false || strpos($lower, 'wakil') !== false) {
                            echo '<span class="badge badge-pimpinan">Pimpinan</span><br>';
                        } else {
                            echo '<span class="badge badge-anggota">Anggota</span><br>';
                        }
                        ?>
                        <small class="jabatan-text"><?= esc($jabatan) ?></small>
                    </td>

                    <td><?= esc($row['masa_bakti']) ?></td>

                    <!-- URUTAN -->
                    <td>
                        <?= $row['is_active'] == 1 ? esc($row['urutan']) : '-' ?>
                    </td>

                    <!-- AKSI -->
                    <td>
                        <?php if ($row['is_active'] == 1): ?>
                            <a href="<?= base_url('admin/profil-korpri/edit/'.$row['id']) ?>">Edit</a>
                            |
                            <a href="<?= base_url('admin/profil-korpri/deactivate/'.$row['id']) ?>"
                               onclick="return confirm('Nonaktifkan data ini?')">
                               Nonaktifkan
                            </a>
                        <?php else: ?>
                            <a href="<?= base_url('admin/profil-korpri/activate/'.$row['id']) ?>"
                               onclick="return confirm('Aktifkan kembali data ini?')">
                               Aktifkan
                            </a>
                        <?php endif ?>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php else: ?>
            <tr>
                <td colspan="6" align="center">Data tidak ditemukan</td>
            </tr>
        <?php endif ?>
    </tbody>
</table>

<?= $this->endSection() ?>
