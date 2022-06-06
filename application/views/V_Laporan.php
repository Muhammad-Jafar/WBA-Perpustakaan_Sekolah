
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
            <div class="row">
                <div class="col-md-4 card-tools">
                <div class="input-group input-group-sm" style="width:200px;">
                    <button type="button" onclick="javascript:top.location.href='<?=base_url("/laporan/cetaklaporan");?>';" class="btn btn-block btn-success btn-sm"><i class="mdi mdi-plus-circle-outline"></i>Cetak Laporan</button>
                    <button type="button" onclick="javascript:top.location.href='<?=base_url("/laporan/cetaklaporan");?>';" class="btn btn-block btn-warning btn-sm"><i class="mdi mdi-plus-circle-outline"></i>Buat SK Perpustakaan</button>
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