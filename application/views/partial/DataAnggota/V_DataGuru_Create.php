
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
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

              <?=form_open('anggota/add_new/guru', array('method'=>'post'));?>
              <input type="hidden" name="kategori_anggota" value="guru">

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Guru</label>
                      <div class="col-sm-9">
                        <input type="text" name="nama_anggota" class="form-control" placeholder="Contoh: Muhammad Jafar"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">NIP</label>
                      <div class="col-sm-9">
                        <input type="number" name="nomor_induk" class="form-control" placeholder="Nomor Induk Pegawai"/>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Kelas Mengajar</label>
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
                      <label class="col-sm-3 col-form-label">Jurusan Mengajar</label>
                      <div class="col-sm-9">
                        <select name="jurusan" class="form-control">
                          <option disabled selected>Pilih Jurusan</option>
                          <option value="IPA">IPA</option>
                          <option value="IPS">IPS</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row" style="justify-content:right; margin-right: auto; margin-top: 10px;">
                      <button class="btn btn-warning mr-2 mdi mdi-arrow-left" type="button" onclick="javascript:top.location.href='<?=base_url("anggota/guru"); ?>';"> Kembali</button>
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