<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistem Informasi Perpustakaan" />
  <meta name="author" content="Jafar 131" />
  <title>Login - Sistem Informasi Perpustakaan</title>

  <link rel="stylesheet" href="<?=assets_url('css/sb-admin-2.min.css');?>">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="shortcut icon" href="<?=assets_url('images/favicon.png');?>" />
</head>

<body>
<div class="container">
  <!-- Outer Row -->
  <div class="row justify-content-center mt-5">
    <div class="col-xl-5 col-lg-12 col-md-9">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="p-5">
            <div class="text-center">
              <img src="<?=assets_url('logo.png', false);?>" width="80">
                <h1 class="h4 text-gray-900 mb-4 mt-3 ">ADMIN PERPUSTAKAAN</h1>
                <p>Silahkan masukan username dan password</p>
            </div>
                  
            <?=form_open('auth/login', array('method'=>'post'));?>

              <?php if($this->session->flashdata('msg_alert')) : ?>
                <div class="alert alert-info">
                  <label style="font-size: 13px;"><?=$this->session->flashdata('msg_alert');?></label>
                </div>
               <?php endif; ?>
                    
              <div class="form-group">
                <label class="label">Username</label>
                  <input type="text" name="username" class="form-control form-control-user" placeholder="username">
              </div>

              <div class="form-group">
                <label class="label">Password</label>
                  <input type="password" name="password" class="form-control form-control-user" placeholder="*********">
              </div>

              <div class="form-group">
                <button class="btn btn-primary submit-btn btn-block">Masuk</button>
              </div>

            <?=form_close();?>    
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <script type="text/javascript" src="<?=assets_url('js/sb-admin-2.min.js');?>"></script>
</body>
</html>
