
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

            <div class="row col-md-6">
                <div class="card-tools pr-3">
                  <div class="input-group">
                      <button type="button" onclick="javascript:top.location.href='<?=base_url("/laporan/cetaklaporan");?>';" class="btn btn-block btn-success"><i class="mdi mdi-printer"></i>Cetak Laporan</button>
                  </div>
                </div>
                <div class="card-tools">
                  <div class="input-group">
                    <button type="button" onclick="javascript:top.location.href='<?=base_url("/laporan/buatsk");?>';" class="btn btn-block btn-warning"><i class="mdi mdi-file"></i>Buat SK Bebas Pustaka</button>
                  </div>
                </div>
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