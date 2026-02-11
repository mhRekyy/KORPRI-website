<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?= esc($pageTitle ?? 'KORPRI Aceh') ?></title>

  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">

  <!-- CSS komponen title_pages -->
  <link rel="stylesheet" href="<?= base_url('assets/css/title_pages.css') ?>">

  <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap-icons/bootstrap-icons.css') ?>">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap">

  <!-- CSS Footer -->
  <link rel="stylesheet" href="<?= base_url('assets/css/footer.css') ?>">
  
</head>

<body class="has-fixed-navbar">

  <!-- Navbar (fixed) -->
  <?= $this->include('layout/navbar') ?>

  <!-- Hero/title untuk semua halaman dalam (kecuali landing) -->
  <?= $this->include('layout/title_pages') ?>

  <!-- Konten halaman -->
  <main>
    <?= $this->renderSection('content') ?>
  </main>
  <script src="<?= base_url('assets/js/landing.js') ?>"></script>

  <!-- Footer kamu -->
  <?= view('layout/footer') ?>

</body>
</html>
