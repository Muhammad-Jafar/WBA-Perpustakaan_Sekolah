
<?php
    $tgl_skrang = date('Y-m-d');
?>

<div class="content-wrapper">
  <div class="row d-flex justify-content-center">

    <div class="col-lg-4">
      <div class="card shadow">
        <div class="card-body">
          <h4 class="card-title d-flex justify-content-center text-uppercase" style="margin-bottom:3rem;"> <?=$title_page;?> </h4>
            <hr>
            <?php if($this->session->flashdata('msg_alert')) : ?>
                <div class="alert alert-info">
                  <label style="font-size: 14px;"><?=$this->session->flashdata('msg_alert');?></label>
                </div>
            <?php endif; ?>
            
            <?=form_open('laporan/buat_sk', array('method'=>'post'));?>

                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Kode SK</label>
                      <div class="col-sm-9">
                      <input type="text" name="kode_sk" value="<?= $kode_sk; ?>" readonly class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Perihal</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="perihal" value="SK Bebas Pustaka" readonly placeholder="Perihal laporan">
                      </div>
                    </div>
                  </div>
                  <hr><br>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Siswa</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id='sksiswa' name="nama_anggota" placeholder="Cari nama siswa">
                        <input type="hidden" class="form-control" id='id_anggota' name="id_anggota">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">NIPD</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id='nomor_induk' name="nomor_induk" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Kelas</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id='kelas' name="kelas" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Jurusan</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id='jurusan' name="jurusan" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tanggal terbit SK</label>
                      <div class="col-sm-9">
                        <input type="date" value="<?= date('Y-m-d');?>" Readonly class="form-control" />
                      </div>
                    </div>
                  </div>
                  <hr> <br>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row" style="justify-content:right; margin-right: auto; margin-top: 10px;">
                      <button class="btn btn-warning mr-2 mdi mdi-arrow-left" type="button" onclick="javascript:top.location.href='<?=base_url("laporan"); ?>';"> Kembali</button>
                      <button type="submit" class="btn btn-success mr-2">Buat Surat Keterangan</button>
                      <button class="btn btn-light" type="reset">Hapus</button>
                    </div>
                  </div>
                </div>
              <?=form_close();?>   
        </div>
      </div>
    </div>

    <div class="col-lg-8">
        <div class="card shadow">
          <div class="card-body">
            <h4 class="card-title"><?=$title_page;?></h4>

            <?php if($this->session->flashdata('msg_alert')) : ?>
              <div class="col-md-6">
                <div class="alert alert-info">
                  <label style="font-size: 13px;"><?=$this->session->flashdata('msg_alert');?></label>
                </div>
              </div>
            <?php endif; ?>

            <div class="table-responsive">
              <p>
                <table class="data table table-striped" cellspacing="0" width="100%"></table>
              </p>
            </div>
            
          </div>
        </div>
      </div>
  </div>
</div>