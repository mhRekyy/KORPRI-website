<div class="form-group">
    <label>Nama</label>
    <input
        type="text"
        name="nama"
        value="<?= old('nama', $item['nama'] ?? '') ?>"
        required
    >
</div>

<div class="form-group">
    <label>Jabatan</label>
    <input
        type="text"
        name="jabatan"
        value="<?= old('jabatan', $item['jabatan'] ?? '') ?>"
        required
    >
</div>

<div class="form-group">
    <label>Masa Bakti</label>
    <input
        type="text"
        name="masa_bakti"
        value="<?= old('masa_bakti', $item['masa_bakti'] ?? '') ?>"
        placeholder="Contoh: 2024–2029"
    >
</div>

<div class="form-group">
    <label>Struktur</label>
    <input
        type="text"
        name="struktur"
        value="<?= old('struktur', $item['struktur'] ?? '') ?>"
        placeholder="Contoh: Dewan Pengurus"
    >
</div>

<div class="form-group">
    <label>Urutan</label>
    <input
        type="number"
        name="urutan"
        value="<?= old('urutan', $item['urutan'] ?? 0) ?>"
    >
</div>
