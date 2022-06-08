<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="<?=$this->security->get_csrf_token_name();?>" content="<?=$this->security->get_csrf_hash();?>">
  <meta name="description" content="Sistem Informasi Perpustakaan" />
  <meta name="author" content="Jafar 131" />

  <title><?=$title_page;?> - Sistem Informasi Perpustakaan</title>
  <link rel="stylesheet" href="<?=assets_url('vendors/iconfonts/mdi/css/materialdesignicons.min.css');?>">
  <link rel="stylesheet" href="<?=assets_url('vendors/css/vendor.bundle.base.css');?>">
  <link rel="stylesheet" href="<?=assets_url('vendors/css/vendor.bundle.addons.css');?>">
  <link rel="stylesheet" href="<?=assets_url('vendors/datatables/datatables.min.css');?>">
  <link rel="stylesheet" href="<?=assets_url('css/style.css', false);?>">
  <link rel="stylesheet" href="<?=assets_url('css/jquery-ui.css');?>">
  <link rel="shortcut icon" href="<?=assets_url('images/favicon.png');?>" />
</head>