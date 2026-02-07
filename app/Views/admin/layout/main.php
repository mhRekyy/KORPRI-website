<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'Admin KORPRI') ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS Utama Admin -->
    <link rel="stylesheet" href="<?= base_url('assets/css/admin/admin.css') ?>">

    <?= $this->renderSection('css') ?>
</head>
<body>

<div class="admin-wrapper">

    <!-- Sidebar -->
    <?= $this->include('admin/layout/sidebar') ?>

    <!-- Main Content -->
    <div class="admin-main">

        <!-- (OPSIONAL) Header / Topbar -->
        <?php if (is_file(APPPATH . 'Views/admin/layout/header.php')) : ?>
            <?= $this->include('admin/layout/header') ?>
        <?php endif; ?>

        <main class="admin-content">
            <?= $this->renderSection('content') ?>
        </main>

    </div>

</div>

<?= $this->renderSection('js') ?>
</body>
</html>
