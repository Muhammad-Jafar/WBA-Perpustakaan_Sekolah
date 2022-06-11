      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper" style="margin-bottom: 0px;">
                <div class="profile-image">
                  <img src="<?=$user_avatar;?>" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?=$user_name;?></p>
                  <div>
                    <small class="designation text-muted">Admin</small>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('dashboard');?>">
              <i class="menu-icon mdi mdi-view-dashboard"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-dm" aria-expanded="false" aria-controls="ui-dm">
              <i class="menu-icon mdi mdi-library-books"></i>
              <span class="menu-title">Manajemen Data Buku</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-dm">
              <ul class="nav flex-column sub-menu">
                <?=generate_navlink($path_page, 'manajemen_buku/data_buku', 'Data Buku');?>
                <?=generate_navlink($path_page, 'manajemen_buku/jenis_buku', 'Klasifikasi Buku');?>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('data_siswa');?>">
              <i class="menu-icon mdi mdi-account"></i>
              <span class="menu-title">Manajemen Data Siswa</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('peminjaman');?>">
              <i class="menu-icon mdi mdi-book-plus"></i>
              <span class="menu-title">Data Peminjaman</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('pengembalian');?>">
              <i class="menu-icon mdi mdi-book-minus"></i>
              <span class="menu-title">Data Pengembalian</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('laporan');?>">
              <i class="menu-icon mdi mdi-checkbox-multiple-marked-outline"></i>
              <span class="menu-title">Laporan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('administrator');?>">
              <i class="menu-icon mdi mdi-checkbox-multiple-marked-outline"></i>
              <span class="menu-title">Administrator</span>
            </a>
          </li>
        </ul>
      </nav>
<div class="main-panel">