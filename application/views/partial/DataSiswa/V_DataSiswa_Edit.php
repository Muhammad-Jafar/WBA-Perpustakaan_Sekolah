
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title"><?=$title_page;?></h4>
              <?php if($this->session->flashdata('msg_alert')) { ?>

              <div class="alert alert-info">
                <label style="font-size: 13px;"><?=$this->session->flashdata('msg_alert');?></label>
              </div>
              <?php } ?>
              <?=form_open('data_siswa/edit/' . $data_siswa->id_siswa, array('method'=>'post'));?>
                <input type="hidden" name="id_siswa" value="<?=$data_siswa->id_siswa;?>">
                <!-- <input type="hidden" name="level_user" value="<?=$data_siswa->level_user;?>" class="form-control"/> -->

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Siswa</label>
                      <div class="col-sm-9">
                        <input type="text" name="nama_siswa" value="<?=$data_siswa->nama_siswa;?>" class="form-control"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">NIS</label>
                      <div class="col-sm-9">
                        <input type="number" name="nis" value="<?=$data_siswa->nis;?>" class="form-control"/>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Kelas</label>
                      <div class="col-sm-9">
                        <select name="kelas" class="form-control">
                          <option disabled selected>Pilih Kelas</option>
                          <option value="X" <?=( ($data_siswa->kelas == 'X') ? 'selected' : '');?>>X</option>
                          <option value="XI" <?=( ($data_siswa->kelas == 'XI') ? 'selected' : '');?>>XI</option>
                          <option value="XII" <?=( ($data_siswa->kelas == 'XII') ? 'selected' : '');?>>XII</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Jurusan</label>
                      <div class="col-sm-9">
                        <select name="jurusan" class="form-control">
                          <option disabled selected>Pilih Kelas</option>
                          <option value="IPA" <?=( ($data_siswa->jurusan == 'IPA') ? 'selected' : '');?>>IPA</option>
                          <option value="IPS" <?=( ($data_siswa->jurusan == 'IPS') ? 'selected' : '');?>>IPS</option>
                          <option value="Bahasa" <?=( ($data_siswa->jurusan == 'Bahasa') ? 'selected' : '');?>>Bahasa</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row" style="justify-content:right; margin-right: auto; margin-top: 10px;">
                      <button class="btn btn-warning mr-2 mdi mdi-arrow-left"> Kembali</button>
                      <button type="submit" class="btn btn-success mr-2">Perbarui</button>
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