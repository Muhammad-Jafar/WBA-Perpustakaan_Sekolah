
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card shadow">
            <div class="card-body">
              <h4 class="card-title"><?=$title_page;?></h4>
              <?php if($this->session->flashdata('msg_alert')) { ?>

              <div class="col-md-6">
                <div class="alert alert-info">
                  <label style="font-size: 13px;"><?=$this->session->flashdata('msg_alert');?></label>
                </div>
              </div>
              
              <?php } ?>
              <?=form_open('buku/add_new/jenis_buku', array('method'=>'post'));?>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Jenis Buku</label>
                      <div class="col-sm-9">
                        <input type="text" name="jenis_buku" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row" style="justify-content:right; margin-right: auto; margin-top: 10px;">
                      <button class="btn btn-warning mr-2 mdi mdi-arrow-left" type="button" onclick="javascript:top.location.href='<?=base_url("buku/jenis_buku"); ?>';"> Kembali</button>
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