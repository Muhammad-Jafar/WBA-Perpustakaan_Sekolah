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
    <a class="nav-link d-flex align-items-center justify-content-center" href="<?=base_url('dashboard');?>">
      <i class="fas fa-tv"></i>
      <span class="menu-title">Dashboard</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <li class="nav-item active ">
    <a class="nav-link d-flex align-items-center justify-content-center" href="<?=base_url('laporan');?>">
      <i class="fas fa-user"></i>
      <span class="menu-title">Laporan</span>
    </a>
  </li>

  <!-- Nav Item - Data Master -->
  <li class="nav-item active">
    <a class="nav-link d-flex align-items-center justify-content-center" data-toggle="modal" data-target="#logoutModal" href=" <?=base_url('auth/logout');?> ">
      <i class="fas fa-sign-out-alt"></i>
      <span>Keluar</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>