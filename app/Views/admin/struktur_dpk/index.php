<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/admin/struktur_dpk.css') ?>">

<div class="page-header">
    <h1>Struktur DPK</h1>
</div>


<div class="form-card">

<?php if (session()->getFlashdata('success')): ?>
    <p class="alert-success"><?= session('success') ?></p>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <p class="alert-error"><?= session('error') ?></p>
<?php endif; ?>

<table class="struktur-table">
    <thead>
        <tr>
            <th width="40">No</th>
            <th>Jabatan</th>
            <th>Nama</th>
            <th>Parent</th>
            <th width="60">Level</th>
            <th width="70">Urutan</th>
            <th width="140">Aksi</th>
        </tr>
    </thead>
    <tbody>

        <?php if (empty($rows)): ?>
            <tr>
                <td colspan="7" class="struktur-empty">Data kosong</td>
            </tr>
        <?php endif; ?>

        <?php foreach ($rows as $i => $row): ?>
            <tr>
                <td><?= $i + 1 ?></td>

                <td>
                    <strong><?= esc($row['jabatan']) ?></strong>
                </td>

                <td>
                    <?php
                    // Tampilkan 1 nama per baris
                    $names = preg_split('/\r\n|\r|\n|  +/', $row['nama']);
                    foreach ($names as $name) {
                        if (trim($name) !== '') {
                            echo '<div>' . esc($name) . '</div>';
                        }
                    }
                    ?>
                </td>

                <td>
                    <?= $row['parent_jabatan']
                        ? esc($row['parent_jabatan']) . ' — ' . esc($row['parent_nama'])
                        : '-' ?>
                </td>

                <td style="text-align:center"><?= $row['level'] ?></td>
                <td style="text-align:center"><?= $row['urutan'] ?></td>

                <td class="struktur-action">
                    <a href="<?= base_url('admin/struktur-dpk/edit/'.$row['id']) ?>">Edit</a>
                    <a href="<?= base_url('admin/struktur-dpk/delete/'.$row['id']) ?>"
                       onclick="return confirm('Yakin hapus data ini?')">
                       Hapus
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>

</div>

<?= $this->endSection() ?>
