<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'KORPRI') ?></title>

  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/swiper-bundle.min.css') ?>">

  <!-- CSS Landing -->
  <link rel="stylesheet" href="<?= base_url('assets/css/landing.css') ?>">

  <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bootstrap-icons/bootstrap-icons.css') ?>">
  <link rel="stylesheet" href="https://api.fontshare.com/css?f[]=clash-display@500,600,700&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap">

  <!-- CSS Footer -->
   
  <link rel="stylesheet" href="<?= base_url('assets/css/footer.css') ?>">


</head>

<body>
  
  <!-- Navbar kamu -->
  <?= $this->include('layout/navbar') ?>
  

  <main class="landing-wrap">
    <?= $this->renderSection('content') ?>
  </main>

  <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/swiper-bundle.min.js') ?>"></script>

  <script src="<?= base_url('assets/js/landing.js') ?>"></script>

    <!-- Footer kamu -->
  <?= view('layout/footer') ?>
  
</body>
</html>
