
  <div class="content-wrapper">

    <div class="row">
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">

              <h4 class="card-title">
                <?php if(!empty($this->input->get('id_jenis_buku'))) : ?>
                  Edit data jenis buku
                  <?php else : ?>
                  Tambah data jenis buku
							    <?php endif; ?>
              </h4>
                
              <?php if(!empty($this->input->get('id_jenis_buku'))) : ?>
                <?=form_open('manajemen_buku/edit/jenis_buku/' . $jenis_buku->id_jenis_buku, array('method'=>'post'));?>
                  <input type="hidden" name="id_jenis_buku" value="<?=$jenis_buku->id_jenis_buku;?>">

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jenis Buku</label>
                        <div class="col-sm-9">
                          <input type="text" value="<?=$jenis_buku->jenis_buku;?>" name="jenis_buku" class="form-control" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row" style="justify-content:right; margin-right: auto; margin-top: 10px;">
                        <button type="submit" class="btn btn-success mr-2">Perbarui</button>
                        <button class="btn btn-light" type="reset">Hapus</button>
                      </div>
                    </div>
                  </div>
                <?=form_close();?>
              <?php else : ?>
                <?=form_open('manajemen_buku/add_new/jenis_buku', array('method'=>'post'));?>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jenis Buku</label>
                        <div class="col-sm-9">
                          <input type="text" name="jenis_buku" class="form-control" />
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
              <?php endif; ?>

            </div>
        </div>
			</div>

      <div class="col-sm-8">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?=$title_page;?></h4>

            <?php if($this->session->flashdata('msg_alert')) { ?>
              <div class="col-md-6">
                <div class="alert alert-info">
                  <label style="font-size: 14px;"><?=$this->session->flashdata('msg_alert');?></label>
                </div>
              </div>
              
            <?php } ?>
            <div class="card-tools">
            </div>
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