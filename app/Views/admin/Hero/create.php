<?= $this->extend('admin/layout/main') ?>

<?= $this->section('css') ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="<?= base_url('assets/css/admin/Create.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="admin-container">

    <h2 class="page-title">Tambah Slide Hero</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert-error">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <div class="form-wrapper">

        <form action="<?= base_url('admin/hero/store') ?>" method="post" enctype="multipart/form-data">

            <?= csrf_field() ?>

            <!-- Upload -->
            <div class="form-group">
                <label>Upload Foto Hero</label>
                <input type="file" name="image" id="imageInput" required>
                <small class="form-note">
                    Rasio otomatis 16:6 sesuai frame hero landing page.
                </small>
            </div>

            <!-- Preview + Crop -->
            <div class="crop-container">
                <img id="previewImage">
            </div>

            <!-- Hidden crop data -->
            <input type="hidden" name="crop_x" id="crop_x">
            <input type="hidden" name="crop_y" id="crop_y">
            <input type="hidden" name="crop_width" id="crop_width">
            <input type="hidden" name="crop_height" id="crop_height">

            <!-- Title -->
            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="title" required>
            </div>

            <!-- Description -->
            <div class="form-group">
                <label>Deskripsi (Opsional)</label>
                <textarea name="description" rows="4"></textarea>
            </div>

            <!-- Sort -->
            <div class="form-group">
                <label>Urutan Tampil</label>
                <input type="number" name="sort_order" value="1" required>
            </div>

            <div class="form-action">
                <button type="submit" class="btn-primary">Simpan</button>
                <a href="<?= base_url('admin/hero') ?>" class="btn-secondary">Kembali</a>
            </div>

        </form>

    </div>

</div>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

<script>
let cropper;
const input = document.getElementById('imageInput');
const preview = document.getElementById('previewImage');

input.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function(event) {

        preview.src = event.target.result;
        preview.style.display = 'block';

        if (cropper) {
            cropper.destroy();
        }

        cropper = new Cropper(preview, {
            aspectRatio: 16 / 6,
            viewMode: 1,
            autoCropArea: 1,
            responsive: true,
            background: false,
            crop(event) {
                document.getElementById('crop_x').value = event.detail.x;
                document.getElementById('crop_y').value = event.detail.y;
                document.getElementById('crop_width').value = event.detail.width;
                document.getElementById('crop_height').value = event.detail.height;
            }
        });
    };
    reader.readAsDataURL(file);
});
</script>
<?= $this->endSection() ?>
