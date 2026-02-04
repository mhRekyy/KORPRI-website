<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Admin KORPRI' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/admin/admin.css') ?>">
</head>
<body>

<div class="admin-wrapper">

  <?= $this->include('admin/layout/sidebar') ?>

  <main class="admin-content">
    <?= $this->renderSection('content') ?>
  </main>

</div>

</body>
</html>
