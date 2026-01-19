<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?= esc($pageTitle ?? 'KORPRI Aceh') ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- CSS komponen title_pages -->
  <link rel="stylesheet" href="<?= base_url('assets/css/title_pages.css') ?>">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- CSS Footer -->
  <link rel="stylesheet" href="<?= base_url('assets/css/footer.css') ?>">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


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

  <!-- Footer kamu -->
  <?= view('layout/footer') ?>

</body>
</html>
