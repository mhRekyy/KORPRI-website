<?= $this->extend('layout/main_inner') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('assets/css/pages/kontak_kami.css') ?>">

<div class="kontak-wrap">

  <!-- SECTION ATAS: lebih sempit -->
  <div class="container kontak-page">
    <section class="kontak-panel">

      <div class="kontak-grid">
        <!-- KIRI -->
        <div class="kontak-left">
          <h2 class="kontak-heading">HUBUNGI KAMI</h2>
          <p class="kontak-sub">
            Sampaikan aspirasi, saran, atau pertanyaan terkait layanan keanggotaan KORPRI.
          </p>

          <div class="kontak-list">
            <div class="kontak-item">
              <div class="kontak-ic" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none">
                  <path d="M6.6 3.5c.5-1 1.7-1.4 2.7-1l1.6.7c.8.3 1.2 1.2 1 2l-.6 2.2c-.2.6 0 1.2.4 1.6l2.2 2.2c.4.4 1 .5 1.6.4l2.2-.6c.8-.2 1.7.2 2 1l.7 1.6c.4 1 .1 2.2-1 2.7l-1.4.7c-1.1.6-2.3.8-3.5.5-6.1-1.5-10.9-6.3-12.4-12.4-.3-1.2-.1-2.4.5-3.5l.7-1.4Z"
                    stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <div>
                <div class="kontak-label">SETJEN DP KORPRI NASIONAL</div>
                <div class="kontak-value">(WA) 0852-0000-0000</div>
              </div>
            </div>

            <div class="kontak-item">
              <div class="kontak-ic" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none">
                  <path d="M4 7.5A2.5 2.5 0 0 1 6.5 5h11A2.5 2.5 0 0 1 20 7.5v9A2.5 2.5 0 0 1 17.5 19h-11A2.5 2.5 0 0 1 4 16.5v-9Z"
                    stroke="currentColor" stroke-width="1.8"/>
                  <path d="m5.5 7 6.5 5 6.5-5"
                    stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <div>
                <div class="kontak-label">EMAIL</div>
                <div class="kontak-value">korpri@gmail.com</div>
              </div>
            </div>

            <div class="kontak-item">
              <div class="kontak-ic" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none">
                  <path d="M4.5 20V6.8c0-.8.5-1.6 1.3-1.8l5.8-1.8c.9-.3 1.8.4 1.8 1.3V20"
                    stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M13.4 9h5.2c.8 0 1.4.6 1.4 1.4V20"
                    stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M3.5 20h17.5"
                    stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                </svg>
              </div>
              <div>
                <div class="kontak-label">KANTOR KAMI</div>
                <div class="kontak-value">
                  Jl. Gajah Mada No.8, RT.1/RW.2, Krukut,<br>
                  Kec. Taman Sari, Kota Jakarta Barat
                </div>
              </div>
            </div>
          </div>

          <div class="kontak-sosmed">
            <a class="sosmed-btn fb" href="https://facebook.com/USERNAME" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                <i class="fab fa-facebook-f" aria-hidden="true"></i>
            </a>

            <a class="sosmed-btn x" href="https://x.com/USERNAME" target="_blank" rel="noopener noreferrer" aria-label="X (Twitter)">
                <i class="fab fa-x-twitter" aria-hidden="true"></i>
            </a>

            <a class="sosmed-btn ig" href="https://instagram.com/USERNAME" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                <i class="fab fa-instagram" aria-hidden="true"></i>
            </a>

            <a class="sosmed-btn in" href="https://linkedin.com/in/USERNAME" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                <i class="fab fa-linkedin-in" aria-hidden="true"></i>
            </a>

            <a class="sosmed-btn yt" href="https://youtube.com/@USERNAME" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                <i class="fab fa-youtube" aria-hidden="true"></i>
            </a>
            </div>
        </div>

        <!-- KANAN -->
        <div class="kontak-right">
          <h2 class="kontak-heading">KIRIMKAN PESAN ANDA</h2>

          <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
              <?= session()->getFlashdata('success') ?>
            </div>
          <?php endif; ?>

          <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
              <?= session()->getFlashdata('error') ?>
            </div>
          <?php endif; ?>

          <form class="kontak-form" action="<?= base_url('kontak-kami/kirim') ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-row">
              <input class="form-controlx" type="text" name="nama" placeholder="Nama" required>
            </div>

            <div class="form-row two">
              <input class="form-controlx" type="text" name="nomor" placeholder="Nomor handphone">
              <input class="form-controlx" type="email" name="email" placeholder="Email">
            </div>

            <div class="form-row">
                <input class="form-controlx" type="text" name="subjek" placeholder="Subjek" required>
            </div>

            <div class="form-row">
              <textarea class="form-controlx" name="pesan" rows="2" placeholder="Pesan" required></textarea>
            </div>

            <button class="btn-kirim" type="submit">Kirim</button>
          </form>
        </div>
      </div>

    </section>
  </div>

    <!-- SECTION BAWAH: lebih lebar (container-lg) -->
    <div class="container-fluid px-0 kontak-map-fluid">
    <section class="map-wrap map-wrap--fluid">
        <div class="map-embed">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.07233966317!2d95.32341957510174!3d5.556295594424119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304037472b2ab407%3A0x5bf35ca17862773a!2sBadan%20Kepegawaian%20Aceh!5e0!3m2!1sen!2sus!4v1768808630285!5m2!1sen!2sus"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="Peta Kantor">
        </iframe>
        </div>
    </section>
    </div>

<?= $this->endSection() ?>
