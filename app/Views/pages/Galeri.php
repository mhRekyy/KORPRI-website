<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/galeri.css') ?>">

<div class="gallery-container">

    <div class="slider" id="slider">
        <?php foreach ($kegiatan as $index => $item): ?>
            <section class="slide <?= $index === 0 ? 'active' : '' ?>">
                <h2><?= esc($item['judul']) ?></h2>
                <div class="meta">
                    <?= esc($item['tanggal']) ?> | <?= esc($item['lokasi']) ?>
                </div>
                <p class="desc"><?= esc($item['deskripsi']) ?></p>

                <div class="photo-grid">
                    <?php if (empty($item['foto'])): ?>
                        <p class="text-muted">Belum ada foto untuk kegiatan ini.</p>
                    <?php else: ?>
                        <?php foreach ($item['foto'] as $foto): ?>
                            <img
                                src="<?= base_url('uploads/galeri/foto/' . $foto) ?>"
                                alt="Foto Kegiatan"
                            >
                        <?php endforeach ?>
                    <?php endif; ?>
                </div>
            </section>
        <?php endforeach ?>
    </div>

    <div class="navigation">
        <button onclick="prevSlide()">← Kegiatan Sebelumnya</button>
        <span id="counter">1 dari <?= count($kegiatan) ?> Kegiatan</span>
        <button onclick="nextSlide()">Kegiatan Selanjutnya →</button>
    </div>

    <div class="dots" id="dots"></div>
</div>

<script>
let currentSlide = 0;
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;
const counter = document.getElementById('counter');
const dotsContainer = document.getElementById('dots');

let autoSlide; // ⬅️ TAMBAHAN

// buat dot indikator
slides.forEach((_, i) => {
    const dot = document.createElement('span');
    dot.classList.add('dot');
    if (i === 0) dot.classList.add('active');
    dot.onclick = () => {
        goToSlide(i);
        resetAutoSlide(); // ⬅️ TAMBAHAN
    };
    dotsContainer.appendChild(dot);
});

const dots = document.querySelectorAll('.dot');

function showSlide(index) {
    slides.forEach(slide => slide.classList.remove('active'));
    dots.forEach(dot => dot.classList.remove('active'));

    slides[index].classList.add('active');
    dots[index].classList.add('active');

    counter.innerText = `${index + 1} dari ${totalSlides} Kegiatan`;
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    showSlide(currentSlide);
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    showSlide(currentSlide);
}

function goToSlide(index) {
    currentSlide = index;
    showSlide(currentSlide);
}

// ================= AUTO SLIDE =================
function startAutoSlide() {
    autoSlide = setInterval(nextSlide, 8000);
}

function resetAutoSlide() {
    clearInterval(autoSlide);
    startAutoSlide();
}

// start pertama
startAutoSlide();
</script>

<?= $this->endSection() ?>
