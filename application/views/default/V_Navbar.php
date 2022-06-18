<nav class="navbar navbar-expand navbar-light bg-light topbar mb-2 static-top shadow">

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>

  <ul class="navbar-nav ml-auto">
    <div class="topbar-divider d-none d-sm-block"></div>

    <li class="nav-item dropdown no-arrow">
      <?php if ( $this->session->userdata('user_type') == 'siswa') : ?>
        <span class="profile-text text-light-600">
          <h6>SMA NEGERI 1 UTAN</h6>
        </span>

      <?php elseif ($this->session->userdata('user_type') == 'admin' || $this->session->userdata('user_type') == 'kepsek') :?>
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-ligth"> <?=$user_name;?> </span>
          <img class="img-profile rounded-circle" src=" <?=$user_avatar;?> ">
        </a>
      <?php endif; ?>

      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href=" <?=base_url('auth/logout');?> " data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </a>
      </div>
    </li>
  </ul>
</nav>
<!-- End of Topbar -->