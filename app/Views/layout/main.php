<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'KORPRI') ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

  <!-- CSS Landing -->
  <link rel="stylesheet" href="<?= base_url('assets/css/landing.css') ?>">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

</head>

<body>
  
  <!-- Navbar kamu -->
  <?= $this->include('layout/navbar') ?>

  <main class="landing-wrap">
    <?= $this->renderSection('content') ?>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <script src="<?= base_url('assets/js/landing.js') ?>"></script>
</body>
</html>
