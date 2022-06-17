
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card shadow">
            <div class="card-body">
              <h4 class="card-title"><?=$title_page;?></h4>
              <?php if($this->session->flashdata('msg_alert')) { ?>

              <div class="alert alert-info">
                <label style="font-size: 13px;"><?=$this->session->flashdata('msg_alert');?></label>
              </div>
              <?php } ?>
              <?=form_open('anggota/edit/guru/' . $data_guru->id_guru, array('method'=>'post'));?>
                <input type="hidden" name="id_guru" value="<?= $data_guru->id_guru; ?>">

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Guru</label>
                      <div class="col-sm-9">
                        <input type="text" name="nama_guru" value="<?= $data_guru->nama_guru; ?>" class="form-control"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">NIPD</label>
                      <div class="col-sm-9">
                        <input type="number" name="nipd" value="<?= $data_guru->nipd; ?>" class="form-control"/>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Kelas Mengajar</label>
                      <div class="col-sm-9">
                        <select name="kelas_ajar" class="form-control">
                          <option disabled selected>Pilih Kelas</option>
                          <option value="X" <?=( ($data_guru->kelas_ajar == 'X') ? 'selected' : '');?>>X</option>
                          <option value="XI" <?=( ($data_guru->kelas_ajar == 'XI') ? 'selected' : '');?>>XI</option>
                          <option value="XII" <?=( ($data_guru->kelas_ajar == 'XII') ? 'selected' : '');?>>XII</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Jurusan Mengajar</label>
                      <div class="col-sm-9">
                        <select name="jurusan_ajar" class="form-control">
                          <option disabled selected>Pilih Kelas</option>
                          <option value="IPA" <?=( ($data_guru->jurusan_ajar == 'IPA') ? 'selected' : '');?>>IPA</option>
                          <option value="IPS" <?=( ($data_guru->jurusan_ajar == 'IPS') ? 'selected' : '');?>>IPS</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row" style="justify-content:right; margin-right: auto; margin-top: 10px;">
                      <button class="btn btn-warning mr-2 mdi mdi-arrow-left" type="button" onclick="javascript:top.location.href='<?=base_url("anggota/guru"); ?>';"> Kembali</button>
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