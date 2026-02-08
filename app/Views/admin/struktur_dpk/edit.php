<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="page-header">
    <h1>Edit Struktur DPK</h1>
</div>

<form action="<?= base_url('admin/struktur-dpk/update/' . $data['id']) ?>" method="post" class="form-card">

    <?php if (session()->getFlashdata('error')): ?>
        <p class="alert-error"><?= session('error') ?></p>
    <?php endif; ?>

    <div class="form-group">
        <label>Parent</label>
        <select name="parent_id">
            <option value="">-- Ketua (Root) --</option>
            <?php foreach ($parents as $p): ?>
                <option value="<?= $p['id'] ?>" <?= $p['id'] == $data['parent_id'] ? 'selected' : '' ?>>
                    <?= esc($p['jabatan']) ?> — <?= esc($p['nama']) ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="form-group">
        <label>Jabatan</label>
        <input type="text" name="jabatan" value="<?= esc($data['jabatan']) ?>" required>
    </div>

    <div class="form-group">
    <label>Nama (1 baris = 1 orang)</label>
    <textarea name="nama" rows="4"><?= esc($data['nama']) ?></textarea>
    <small>Gunakan ENTER untuk memisahkan nama</small>
    </div>


    <div class="form-group">
        <label>Urutan</label>
        <input type="number" name="urutan" value="<?= esc($data['urutan']) ?>">
    </div>

    <button type="submit" class="btn-primary">Update</button>
    <a href="<?= base_url('admin/struktur-dpk') ?>" class="btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
