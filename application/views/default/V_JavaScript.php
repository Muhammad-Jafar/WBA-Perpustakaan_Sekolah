  <script src="<?=assets_url('vendors/js/vendor.bundle.base.js');?>"></script>
  <script src="<?=assets_url('vendors/js/vendor.bundle.addons.js');?>"></script>
  <script src="<?=assets_url('js/off-canvas.js');?>"></script>
  <script src="<?=assets_url('js/misc.js');?>"></script>  

  <script src="<?=assets_url('js/app.js', false);?>"></script>
  <script src="<?=assets_url('vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
  <script src="<?=assets_url('vendor/jquery-easing/jquery.easing.min.js');?>"></script>
  <script src="<?=assets_url('js/sb-admin-2.min.js');?>"></script>
  <script src="<?=assets_url('vendor/datatables/jquery.dataTables.min.js');?>"></script>
  <script src="<?=assets_url('vendor/datatables/dataTables.bootstrap4.min.js');?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 

  <script type="text/javascript"> // pencarian auto complete nama siswa
        $(document).ready(function() {
            $( "#namasiswa" ).autocomplete({
              source: "<?php echo site_url('peminjaman/get_nama_siswa/?');?>",
              select: function(event, ui) {
                $('[name="nama_siswa"]').val(ui.item.value);
                $('[name="id_siswa"]').val(ui.item.nama_siswa);
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
                $('[name="id_kategori_buku"]').val(ui.item.kategori_buku);
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
