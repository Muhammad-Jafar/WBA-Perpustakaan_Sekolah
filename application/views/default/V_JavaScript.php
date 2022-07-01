  <script src="<?=assets_url('vendor/js/vendor.bundle.base.js');?>"></script>
  <script src="<?=assets_url('vendor/js/vendor.bundle.addons.js');?>"></script>
  <script src="<?=assets_url('js/off-canvas.js');?>"></script>
  <script src="<?=assets_url('js/misc.js');?>"></script>  

  <!-- SHOW TABEL JS -->
  <script src="<?=assets_url('js/app.js', false);?>"></script>


  <!-- Core plugin for auto complete search-->
  <script src="<?=assets_url('js/jquery-ui.js');?>"></script>

  <!-- Core plugin JavaScript-->
  <!-- <script src="<?=assets_url('vendor/jquery/jquery.min.js');?>"></script> // jquery ini bentrok sama jquery-ui --> 
  <script src="<?=assets_url('vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=assets_url('vendor/jquery-easing/jquery.easing.min.js');?>"></script>

   <!-- Custom scripts for all pages-->
  <script src="<?=assets_url('js/sb-admin-2.min.js');?>"></script>

   <!-- Custom scripts for ICON-->
  <script src="<?=assets_url('vendor/fontawesome-free/js/fontawesome.min.js');?>"></script>

  <script src="<?=assets_url('vendor/datatables/jquery.dataTables.min.js');?>"></script>
  <script src="<?=assets_url('vendor/datatables/dataTables.bootstrap4.min.js');?>"></script>


  <script type="text/javascript"> // pencarian auto complete nama siswa
        $(document).ready(function() {
            $( "#namasiswa" ).autocomplete({
              source: "<?php echo site_url('peminjaman/get_nama_siswa/?');?>",
              select: function(event, ui) {
                $('[name="nama_anggota"]').val(ui.item.value);
                $('[name="id_anggota"]').val(ui.item.nama_anggota);
              }
            });
        });
  </script>

  <script type="text/javascript"> // pencarian auto complete nama guru
          $(document).ready(function() {
              $( "#namaguru" ).autocomplete({
                source: "<?php echo site_url('peminjaman/get_nama_guru/?');?>",
                select: function(event, ui) {
                  $('[name="nama_anggota"]').val(ui.item.value);
                  $('[name="id_anggota"]').val(ui.item.nama_anggota);
                }
              });
          });
    </script>

  <script type="text/javascript"> // pencarian auto complete judul buku
        $(document).ready(function() {
            $( "#judulbuku" ).autocomplete({
              source: "<?php echo site_url('peminjaman/get_judul_buku/?');?>",
              select: function(event, ui) {
                $('[name="judul_buku"]').val(ui.item.value);
                $('[name="id_buku"]').val(ui.item.judul_buku);
              }
            });
        });
  </script>

<script type="text/javascript"> // pencarian auto complete nama siswa
        $(document).ready(function() {
            $( "#sksiswa" ).autocomplete({
              source: "<?php echo site_url('laporan/get_nama_siswa/?');?>",
              select: function(event, ui) {
                $('[name="nama_anggota"]').val(ui.item.id_anggota);
                $('[name="id_anggota"]').val(ui.item.id_anggota);
                $('[name="nomor_induk"]').val(ui.item.nomor_induk);
                $('[name="kelas"]').val(ui.item.kelas);
                $('[name="jurusan"]').val(ui.item.jurusan);
              }
            });
        });
  </script>

  <script type="text/javascript"> //show tabel
    base_url='<?=base_url();?>';
    $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': $('meta[name="<?=$this->security->get_csrf_token_name();?>"]').attr('content') },
      xhrFields: {
        withCredentials: true
      },
      dataType: 'json',
      cache: false
    });
  </script>
