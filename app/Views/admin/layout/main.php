<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Admin KORPRI' ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/admin.css') ?>">
</head>
<body>

<div class="admin-wrapper">

    <?= $this->include('admin/layout/sidebar') ?>

    <div class="admin-content">
        <?= $this->include('admin/layout/header') ?>

        <main class="admin-main">
            <?= $this->renderSection('content') ?>
        </main>
    </div>

</div>

</body>
</html>
