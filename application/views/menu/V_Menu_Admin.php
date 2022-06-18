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

  <li class="nav-item nav-profile">
    <div class="nav-link">
      <div class="user-wrapper">
        <div class="profile-image d-flex justify-content-center">
          <img src="<?=$user_avatar;?>" alt="profile image" style="width: 0px;">
        </div>
        <div class="text-wrapper">
          <h5 class="profile-name d-flex justify-content-center mt-3"> <?=$user_name;?> </h5>
          <div> <p class="designation d-flex justify-content-center">Admin</p> </div>
        </div>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <li class="nav-item active">
    <a class="nav-link" href="<?=base_url('dashboard');?>">
      <i class="fas fa-tv"></i>
      <span class="menu-title">Dashboard</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">
          
  <!-- Heading -->
  <div class="sidebar-heading">vMASTER DATA </div>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#buku" aria-expanded="true" aria-controls="buku">
      <i class="fas fa-book"></i>
      <span class="menu-title">Data Buku</span>
    </a>
    <div id="buku" class="collapse" aria-labelledby="dataBuku" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">MANAJEMEN DATA BUKU</h6>
        <a class="collapse-item text-primary" href=" <?=base_url('manajemen_buku/data_buku');?> ">Data Buku</a>
        <a class="collapse-item text-primary" href=" <?=base_url('manajemen_buku/jenis_buku');?> ">Klasifikasi Buku</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#anggota" aria-expanded="true" aria-controls="anggota">
      <i class="fas fa-user"></i>
      <span class="menu-title">Data Anggota</span>
    </a>
    <div id="anggota" class="collapse" aria-labelledby="dataAnggota" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">MANAJEMEN DATA ANGGOTA</h6>
        <a class="collapse-item text-primary" href=" <?=base_url('anggota/siswa');?> ">Data Siswa</a>
        <a class="collapse-item text-primary" href=" <?=base_url('anggota/guru');?> ">Data Guru</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">
          
  <!-- Heading -->
  <div class="sidebar-heading"> TRANSAKSI </div>

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tranksasi" aria-expanded="true" aria-controls="tranksasi">
      <i class="fas fa-exchange-alt"></i>
      <span class="menu-title">Peminjaman</span>
    </a>
    <div id="tranksasi" class="collapse" aria-labelledby="Transaksi" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">DAFTAR TRANSAKSI</h6>
        <a class="collapse-item text-primary" href=" <?=base_url('peminjaman/siswa');?> ">Peminjaman Siswa</a>
        <a class="collapse-item text-primary" href=" <?=base_url('peminjaman/guru');?> ">Peminjaman Guru</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?=base_url('pengembalian');?>">
      <i class="fas fa-book-open"></i>
      <span class="menu-title">Data Pengembalian</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">
          
  <!-- Heading -->
  <div class="sidebar-heading"> LAPORAN </div>

  <li class="nav-item">
    <a class="nav-link" href="<?=base_url('laporan');?>">
      <i class="fas fa-file-alt"></i>
      <span class="menu-title">Data Laporan</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">
          
  <!-- Heading -->
  <div class="sidebar-heading"> PENGELOLA </div>

  <li class="nav-item">
    <a class="nav-link" href="<?=base_url('administrator');?>">
      <i class="fas fa-user-lock"></i>
      <span class="menu-title">Administrator</span>
    </a>
   </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Nav Item - Data Master -->
  <li class="nav-item active">
    <a class="nav-link" data-toggle="modal" data-target="#logoutModal" href=" <?=base_url('auth/logout');?> ">
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
