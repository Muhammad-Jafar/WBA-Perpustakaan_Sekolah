<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

 <!-- Sidebar - Brand -->
 <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-book"></i>
    </div>
    <div class="sidebar-brand-text mx-3">E-Perpus</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <li class="nav-item active ">
    <a class="nav-link d-flex align-items-center justify-content-center" href="<?=base_url('katalog');?>">
      <i class="fas fa-book"></i>
      <span class="menu-title">Katalog Buku</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <li class="nav-item active ">
    <a class="nav-link d-flex align-items-center justify-content-center" href="<?=base_url('auth');?>">
      <i class="fas fa-user"></i>
      <span class="menu-title">Login sebagai admin</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>