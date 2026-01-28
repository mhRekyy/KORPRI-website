<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/profile.css') ?>">

<table class="table-profil">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Jabatan</th>
    </tr>
  </thead>
  <tbody>
    <?php if (empty($dataProfil)): ?>
      <tr>
        <td colspan="3" align="center">Data tidak ditemukan</td>
      </tr>
    <?php endif; ?>

    <?php foreach ($dataProfil as $i => $row): ?>
      <tr>
        <td><span class="badge-no"><?= $i + 1 ?></span></td>

        <td><?= esc($row['nama']) ?></td>
        <td><?= esc($row['jabatan']) ?></td>
      </tr>
    <?php endforeach; ?>

    <form method="get" class="profil-search">
  <input 
    type="text" 
    name="q" 
    placeholder="Cari nama atau jabatan..." 
    value="<?= esc($keyword ?? '') ?>"
  >
  <button type="submit">Cari</button>
</form>

  </tbody>
</table>


<?= $this->endSection() ?>