<?php
  $uri = uri_string();
?>

<aside class="admin-sidebar">
  <div class="sidebar-brand">
    <h2>KORPRI</h2>
  </div>

  <ul class="admin-menu">

    <!-- DASHBOARD -->
    <li class="menu-item <?= ($uri === 'admin' || $uri === 'admin/dashboard') ? 'active' : '' ?>">
      <a href="<?= base_url('admin') ?>">Dashboard</a>
    </li>

    <!-- LANDING PAGE -->
    <li class="menu-item has-submenu <?= str_starts_with($uri, 'admin/hero') ? 'open' : '' ?>">
      <span class="menu-label">Landing Page</span>
      <ul class="submenu">
        <li>
          <a href="<?= base_url('admin/hero') ?>"
             class="<?= str_starts_with($uri, 'admin/hero') ? 'active' : '' ?>">
            Hero Section
          </a>
        </li>
      </ul>
    </li>

    <!-- MEDIA PUBLIK -->
    <li class="menu-item has-submenu open">
      <span class="menu-label">Media Publik</span>
      <ul class="submenu">
        <li>
          <a href="<?= base_url('admin/berita') ?>"
             class="<?= str_starts_with($uri, 'admin/berita') ? 'active' : '' ?>">
            Berita
          </a>
        </li>
        <li>
          <a href="<?= base_url('admin/artikel') ?>"
             class="<?= str_starts_with($uri, 'admin/artikel') ? 'active' : '' ?>">
            Artikel
          </a>
        </li>
        <li>
          <a href="<?= base_url('admin/pengumuman') ?>"
             class="<?= str_starts_with($uri, 'admin/pengumuman') ? 'active' : '' ?>">
            Pengumuman
          </a>
        </li>
      </ul>
    </li>

    <!-- GALERI -->
    <li class="menu-item has-submenu <?= str_starts_with($uri, 'admin/galeri') ? 'open' : '' ?>">
      <span class="menu-label">Galeri</span>
      <ul class="submenu">
        <li>
          <a href="<?= base_url('admin/galeri/foto') ?>"
             class="<?= str_starts_with($uri, 'admin/galeri/foto') ? 'active' : '' ?>">
            Foto Kegiatan
          </a>
        </li>
        <li>
          <a href="<?= base_url('admin/galeri/video') ?>"
             class="<?= str_starts_with($uri, 'admin/galeri/video') ? 'active' : '' ?>">
            Video Kegiatan
          </a>
        </li>
      </ul>
    </li>

    <!-- KEBIJAKAN -->
    <li class="menu-item has-submenu open">
      <span class="menu-label">Kebijakan</span>
      <ul class="submenu">
        <li>
          <a href="<?= base_url('admin/peraturan') ?>"
             class="<?= str_starts_with($uri, 'admin/peraturan') ? 'active' : '' ?>">
            Peraturan
          </a>
        </li>
        <li>
          <a href="<?= base_url('admin/keputusan') ?>"
             class="<?= str_starts_with($uri, 'admin/keputusan') ? 'active' : '' ?>">
            Keputusan
          </a>
        </li>
        <li>
          <a href="<?= base_url('admin/surat-edaran') ?>"
             class="<?= str_starts_with($uri, 'admin/surat-edaran') ? 'active' : '' ?>">
            Surat Edaran
          </a>
        </li>
      </ul>
    </li>

    <!-- TENTANG KAMI -->
    <li class="menu-item has-submenu open">
      <span class="menu-label">Tentang Kami</span>
      <ul class="submenu">
        <li>
          <a href="<?= base_url('admin/struktur-dpk') ?>"
             class="<?= str_starts_with($uri, 'admin/struktur-dpk') ? 'active' : '' ?>">
            Struktur DPK
          </a>
        </li>
        <li>
          <a href="<?= base_url('admin/profil-korpri') ?>"
             class="<?= str_starts_with($uri, 'admin/profil-korpri') ? 'active' : '' ?>">
            Profil KORPRI
          </a>
        </li>
        <li>
          <a href="<?= base_url('admin/ketua-umum') ?>"
             class="<?= str_starts_with($uri, 'admin/ketua-umum') ? 'active' : '' ?>">
            Ketua Umum
          </a>
        </li>
        <li>
          <a href="<?= base_url('admin/sekretaris-jenderal') ?>"
             class="<?= str_starts_with($uri, 'admin/sekretaris-jenderal') ? 'active' : '' ?>">
            Sekretaris Jenderal
          </a>
        </li>
      </ul>
    </li>

    <!-- MANAJEMEN -->
    <li class="menu-item has-submenu open">
      <span class="menu-label">Manajemen</span>
      <ul class="submenu">
        <li>
          <a href="<?= base_url('admin/user-admin') ?>"
             class="<?= str_starts_with($uri, 'admin/user-admin') ? 'active' : '' ?>">
            User Admin
          </a>
        </li>
      </ul>
    </li>

    <!-- LOGOUT -->
    <li class="menu-logout">
      <a href="<?= base_url('logout') ?>">Logout</a>
    </li>

  </ul>
</aside>
