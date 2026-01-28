<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/profile.css') ?>">


<section class="profil-wrap">
  <div class="profil-container">

    <form method="get" class="profil-search">
      <input
        class="bf-input"
        type="text"
        name="q"
        placeholder="Cari nama atau jabatan..."
        value="<?= esc($keyword ?? '') ?>"
      >
      <button class="bf-btn" type="submit" aria-label="Search">
        <i class="fas fa-search bf-btn__icon"></i>
      </button>
    </form>

    <?php if (empty($dataProfil)): ?>
      <div class="empty-state">
        <div class="empty-state__icon">
          <i class="bi bi-search"></i>
        </div>

        <h3 class="empty-state__title">Data profil tidak ditemukan</h3>

        <?php if (!empty($keyword)): ?>
          <p class="empty-state__desc">
            Tidak ada data untuk kata kunci: <strong><?= esc($keyword) ?></strong>.
          </p>
        <?php else: ?>
          <p class="empty-state__desc">
            Belum ada data profil yang ditampilkan.
          </p>
        <?php endif; ?>

        <div class="empty-state__actions">
          <a class="empty-state__btn" href="<?= site_url('profile') ?>">Lihat semua</a>
        </div>
      </div>
    <?php else: ?>
      <table class="table-profil">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($dataProfil as $i => $row): ?>
            <tr>
              <td><span class="badge-no"><?= $i + 1 ?></span></td>
              <td><?= esc($row['nama']) ?></td>
              <td><?= esc($row['jabatan']) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>

  </div>
</section>


<?= $this->endSection() ?>