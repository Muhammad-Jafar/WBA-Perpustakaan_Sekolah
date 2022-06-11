
  <div class="content-wrapper">
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
            <div class="input-group" style="width: 200px;">
                  <button type="button" onclick="javascript:top.location.href='<?=base_url("/manajemen_buku/add_new/jenis_buku");?>';" class="btn btn-block btn-success"><i class="mdi mdi-library-plus"></i> Tambah jenis buku</button>
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