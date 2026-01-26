<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<section class="container py-5">
    <h1><?= esc($title) ?></h1>

    <div class="mt-4">
        <?= $content ?>
    </div>
</section>

<?= $this->endSection() ?>
