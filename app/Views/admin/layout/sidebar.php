<?php
  $uri = uri_string(); // contoh: admin/berita
?>

<aside class="admin-sidebar">
  <h2 class="sidebar-title">KORPRI</h2>

  <ul class="admin-menu">

    <!-- Dashboard -->
    <li class="menu-item">
      <a href="<?= base_url('admin') ?>"
         class="<?= ($uri === 'admin') ? 'active' : '' ?>">
        Dashboard
      </a>
    </li>

    <!-- Media Publik -->
    <li class="menu-item has-submenu
      <?= str_starts_with($uri, 'admin/berita') ||
         str_starts_with($uri, 'admin/artikel') ||
         str_starts_with($uri, 'admin/pengumuman')
         ? 'active' : '' ?>">
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

    <!-- Kebijakan -->
    <li class="menu-item has-submenu
      <?= str_starts_with($uri, 'admin/peraturan') ||
         str_starts_with($uri, 'admin/keputusan') ||
         str_starts_with($uri, 'admin/surat-edaran')
         ? 'active' : '' ?>">
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

    <!-- Manajemen -->
    <li class="menu-item has-submenu
      <?= str_starts_with($uri, 'admin/users') ? 'active' : '' ?>">
      <span class="menu-label">Manajemen</span>

      <ul class="submenu">
        <li>
          <a href="<?= base_url('admin/users') ?>"
             class="<?= str_starts_with($uri, 'admin/users') ? 'active' : '' ?>">
            User Admin
          </a>
        </li>
      </ul>
    </li>

    <!-- Logout -->
    <li class="menu-logout">
      <a href="<?= base_url('logout') ?>">Logout</a>
    </li>

  </ul>
</aside>
