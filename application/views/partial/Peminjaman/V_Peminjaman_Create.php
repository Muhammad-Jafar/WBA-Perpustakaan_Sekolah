<?php
    $tgl_pinjam = date('Y-m-d');

    // untuk menghitung selisih tanggal pinjam dan tanggal pengembalian
    $lima_hari = mktime(0,0,0,date("n"),date("j") + 5, date("Y"));
    $tgl_kembali = date('Y-m-d', $lima_hari);
?>

    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title"><?=$title_page;?></h4>
              <?php if($this->session->flashdata('msg_alert')) : ?>
                <div class="col-md-6">
                  <div class="alert alert-info">
                    <label style="font-size: 13px;"><?=$this->session->flashdata('msg_alert');?></label>
                  </div>
                </div>
              <?php endif; ?>

              <?=form_open('peminjaman/add_new/', array('method'=>'post'));?>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Kode Pinjam</label>
                      <div class="col-sm-9">
                      <input type="text" name="kode_pinjam" value="<?= $buat_kode; ?>" readonly class="form-control">
                      <input type="hidden" name="status" value="dipinjam" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Peminjam</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id='nama_siswa' name="nama_siswa" placeholder="Cari nama siswa">
                        <input type="hidden" class="form-control" id='idsiswa' name="id_siswa">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Judul Buku</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="judulbuku" name="judul_buku" placeholder="Cari judul buku">
                        <input type="hidden" class="form-control" id="idbuku" name="id_buku">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tanggal Pinjam</label>
                      <div class="col-sm-9">
                        <input type="date" value="<?= date('Y-m-d');?>" name="tgl_pinjam" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tanggal Dikembalikan</label>
                      <div class="col-sm-9">
                        <input type="date" name="tgl_kembali" value="<?php echo $tgl_kembali; ?>" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row" style="justify-content:right; margin-right: auto; margin-top: 10px;">
                      <button type="submit" class="btn btn-success mr-2">Tambah</button>
                      <button class="btn btn-light" type="reset">Hapus</button>
                    </div>
                  </div>
                </div>
              <?=form_close();?>
            </div>
          </div>
        </div>
    </div>
  </div>