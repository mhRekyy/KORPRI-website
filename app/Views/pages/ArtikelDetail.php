<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<section class="artikel-detail">
  <div class="container">

    <h1><?= esc($artikel['title']) ?></h1>

    <p class="artikel-date">
      <?= date('d F Y', strtotime($artikel['published_at'])) ?>
    </p>

    <?php if (!empty($artikel['thumbnail'])): ?>
      <img
        src="<?= base_url('uploads/artikel/' . $artikel['thumbnail']) ?>"
        alt="<?= esc($artikel['title']) ?>"
        class="artikel-thumbnail"
      >
    <?php endif; ?>

    <div class="artikel-content">
      <?= $artikel['content'] ?>
    </div>

  </div>
</section>

<?= $this->endSection() ?>
