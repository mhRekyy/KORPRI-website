<?php
  $uri = uri_string(); // contoh: admin/berita
?>

<aside class="admin-sidebar">
  <h2 class="sidebar-title">KORPRI</h2>

  <ul class="admin-menu">

    <li>
      <a href="<?= base_url('admin') ?>"
         class="<?= ($uri === 'admin') ? 'active' : '' ?>">
         Dashboard
      </a>
    </li>

    <li class="menu-title">Media Publik</li>

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

    <li class="menu-title">Kebijakan</li>

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

    <li class="menu-title">Manajemen</li>

    <li>
      <a href="<?= base_url('admin/users') ?>"
         class="<?= str_starts_with($uri, 'admin/users') ? 'active' : '' ?>">
         User Admin
      </a>
    </li>

    <li class="menu-logout">
      <a href="<?= base_url('logout') ?>">Logout</a>
    </li>

  </ul>
</aside>
