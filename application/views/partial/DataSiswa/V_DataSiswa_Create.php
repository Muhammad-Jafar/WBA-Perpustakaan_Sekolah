
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

              <?=form_open('data_siswa/add_new/', array('method'=>'post'));?>
                <input type="hidden" name="level_user" value="siswa" class="form-control"/>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Siswa</label>
                      <div class="col-sm-9">
                        <input type="text" name="nama_siswa" class="form-control" placeholder="Contoh: Muhammad Jafar"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">NIS</label>
                      <div class="col-sm-9">
                        <input type="number" name="nis" class="form-control" placeholder="Nomor Induk Sekolah"/>
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
                          <option value="X">X</option>
                          <option value="XI">XI</option>
                          <option value="XII">XIII</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Jurusan</label>
                      <div class="col-sm-9">
                        <select name="jurusan" class="form-control">
                          <option disabled selected>Pilih Jurusan</option>
                          <option value="IPA">IPA</option>
                          <option value="IPS">IPS</option>
                          <option value="Bahasa">Bahasa</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row" style="justify-content:right; margin-right: auto; margin-top: 10px;">
                      <button class="btn btn-warning mr-2 mdi mdi-arrow-left"> Kembali</button>
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