<!DOCTYPE html>
<html lang="id">

  <?=$header;?>
  
  <body id="page-top">
    <div id="wrapper">
      <!-- menu sidebar -->
      <?=$menu;?>
      <!-- menu sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
        
          <!-- Topbar -->
          <?=$navbar;?>

          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- page content start -->
            <div class="row">
              <?=$content;?>
            </div>
            <!-- page content end -->

          </div>
        </div>
        <?=$footer;?>
      </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Ingin keluar ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">Klik 'KELUAR' jika anda ingin keluar dari sesi sebagai admin !</div>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-success" href="<?= base_url('auth/logout'); ?>">Keluar</a>
                </div>
            </div>
        </div>
    </div>

    <?=$javascript;?>
  </body>

</html>
