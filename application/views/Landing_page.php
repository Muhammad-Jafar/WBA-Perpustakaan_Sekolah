<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistem Informasi Perpustakaan" />
  <meta name="author" content="Jafar 131" />
  <title>Sistem Informasi Perpustakaan</title>

  <link rel="stylesheet" href="<?=assets_url('css/style.css', false);?>">
  <link rel="shortcut icon" href="<?=assets_url('images/favicon.png');?>" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-6 mx-auto">
            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  <div class="col-lg-6 d-none d-lg-block">
                    <img src="<?= assets_url('library.gif'); ?>" alt="" style="padding-left: 50px; background-color: transparent; width: 450px; height: 400px;">
                  </div>

                  <div class="col-lg-6">
                    <div class="p-5">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-2">Selamat Datang Di E-Perpus</h1>
                        <h4 class="d-flex justify-content-center mt-4 mb-3 font-weight-semibold text-dark">SISTEM INFORMASI PERPUSTAKAAN</h4>
                        <h4 class="d-flex justify-content-center mt-8 mb-3 font-weight-semibold text-dark">SMA NEGERI 1 UTAN</h4>
                      </div>

                      <div class="col-md-12 justify-content-center">
                        <div class="form-group mt-4 mb-3">
                          <label class="label d-flex justify-content-center">Lihat Katalog Buku</label>
                            <button class="btn btn-primary submit-btn btn-block" type="button" onclick="javascript:top.location.href='<?=base_url("katalog"); ?>';" >Katalog buku</button>
                        </div>

                        <div class="form-group mt-4 mb-3">
                          <label class="label d-flex justify-content-center">Login sebagai admin</label>
                          <button class="btn btn-primary submit-btn btn-block" type="button" onclick="javascript:top.location.href='<?=base_url("auth/login"); ?>';" >Login</button>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="<?=assets_url('js/sb-admin-2.min.js');?>"></script>
</body>

</html>