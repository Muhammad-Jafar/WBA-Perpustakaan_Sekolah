
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title"><?=$title_page;?></h3>
              <?php if($this->session->flashdata('msg_alert')) { ?>

              <div class="col-md-6">
                <div class="alert alert-info">
                  <label style="font-size: 13px;"><?=$this->session->flashdata('msg_alert');?></label>
                </div>
              </div>

              <?php } ?>
              <?=form_open_multipart('manajemen_buku/edit/data_buku/' . $data_buku->id_buku , array('method'=>'post'));?>
                <input type="hidden" name="id_buku" value="<?=$data_buku->id_buku; ?>">
                
                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kode Buku</label>
                        <div class="col-sm-9">
                          <input type="text" name="kode_buku" value="<?= $data_buku->kode_buku; ?>" readonly class="form-control"/>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Kategori Buku</label>
                      <div class="col-sm-5">
                        <select name="id_kategori_buku" class="form-control">
                            <option disabled selected>Pilih kategori Buku</option>
                              <?php foreach($kategori_buku as $jb) { ?>
                                <option value="<?=$jb->id_kategori_buku;?>" <?=( ($data_buku->id_kategori_buku == $jb->id_kategori_buku) ? 'selected' : '');?>> <?=$jb->kategori_buku;?> </option>
                              <?php } ?>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Jenis Buku</label>
                      <div class="col-sm-5">
                        <select name="id_jenis_buku" class="form-control">
                            <option disabled selected>Pilih Jenis Buku</option>
                              <?php foreach($jenis_buku as $jb) { ?>
                                <option value="<?=$jb->id_jenis_buku;?>" <?=( ($data_buku->id_jenis_buku == $jb->id_jenis_buku) ? 'selected' : '');?>> <?=$jb->jenis_buku;?> </option>
                              <?php } ?>
                          </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Judul Buku</label>
                      <div class="col-sm-9">
                        <input type="text" name="judul_buku" value="<?=$data_buku->judul_buku;?>" class="form-control"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Pengarang</label>
                      <div class="col-sm-9">
                        <input type="text" name="pengarang" value="<?=$data_buku->pengarang;?>"  class="form-control"/>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Penerbit</label>
                      <div class="col-sm-9">
                        <input type="text" name="penerbit" value="<?=$data_buku->penerbit;?>"  class="form-control"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tahun terbit</label>
                      <div class="col-sm-9">
                        <input type="number" name="tahun_terbit" value="<?=$data_buku->tahun_terbit;?>"  class="form-control"/>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Jumlah halaman buku</label>
                      <div class="col-sm-9">
                        <input type="number" name="jumlah_halaman" value="<?=$data_buku->jumlah_halaman;?>"  class="form-control"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Stok buku</label>
                      <div class="col-sm-9">
                        <input type="number" name="qt" value="<?=$data_buku->qt;?>"  class="form-control"/>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row" style="justify-content:right; margin-right: auto; margin-top: 10px;">
                      <button class="btn btn-warning mr-2 mdi mdi-arrow-left"> Kembali</button>
                      <button type="submit" class="btn btn-success mr-2">Perbarui data</button>
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