
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
                      <label class="col-sm-3 col-form-label">Nama Peminjam</label>
                      <div class="col-sm-9">
                        <select name="id_siswa" class="form-control">
                          <option disabled selected>Nama Siswa :</option>
                            <?php foreach($list_siswa as $ls) { ?>
                              <option value="<?=$ls->id_siswa;?>" <?=( ($ls->id_siswa) ? 'selected' : '');?>> <?=$ls->nama_siswa;?></option>
                            <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Judul Buku</label>
                      <div class="col-sm-9">
                      <select name="id_buku" class="form-control">
                          <option disabled selected>Pilih Buku :</option>
                          <?php foreach($list_buku as $ls) { ?>
                            <option value="<?=$ls->id_buku;?>" <?=( ($ls->id_buku) ? 'selected' : '');?>> <?=$ls->judul_buku;?></option>
                          <?php } ?>
                        </select>
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