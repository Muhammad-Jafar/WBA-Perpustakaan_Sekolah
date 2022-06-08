  <script src="<?=assets_url('vendors/js/vendor.bundle.base.js');?>"></script>
  <script src="<?=assets_url('vendors/js/vendor.bundle.addons.js');?>"></script>
  <script src="<?=assets_url('js/off-canvas.js');?>"></script>
  <script src="<?=assets_url('js/misc.js');?>"></script>  
  <script src="<?=assets_url('vendors/datatables/datatables.min.js');?>"></script>

  <script type="text/javascript"> // pencarian auto complete nama siswa
        $(document).ready(function() {
            $( "#namasiswa" ).autocomplete({
              source: "<?php echo site_url('peminjaman/get_nama_siswa/?');?>"
            });
        });
  </script>

<script type="text/javascript"> // pencarian auto complete judul buku
        $(document).ready(function() {
            $( "#judulbuku" ).autocomplete({
              source: "<?php echo site_url('peminjaman/get_judul_buku/?');?>"

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

<script src="<?=assets_url('js/jquery-ui.js');?>"></script>
<script src="<?=assets_url('js/app.js');?>"></script>
<script src="<?=assets_url('js/bootstrap.js', false);?>"></script>