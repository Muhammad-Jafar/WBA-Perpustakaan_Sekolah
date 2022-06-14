
    <div class="content-wrapper ">
      <div class="row d-flex- justify-content-center p-2">
        
      <!-- CARD PERTAMA -->
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-book-open-variant text-danger icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right">Buku Perpustakaan</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0"><?=$jumlah_buku;?></h3>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-account-star mr-1" aria-hidden="true"></i> Total buku
              </p>
            </div>
          </div>
        </div>

        <!-- CARD KEDUA -->
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-book-plus text-warning icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right">Total Buku dipinjam</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0">
                      <!-- <?=$buku_dipinjam;?></h3> -->
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-treasure-chest mr-1" aria-hidden="true"></i> Jumlah buku yang dipinjam
              </p>
            </div>
          </div>
        </div>

        <!-- CARD KETIGA -->
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-book-minus text-success icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right">Total Buku dikembalikan</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0">
                      <!-- <?=$buku_dikembalikan;?></h3> -->
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-checkbox-multiple-marked-outline mr-1" aria-hidden="true"></i> Jumlah buku yang dikembalikan
              </p>
            </div>
          </div>
        </div>

    </div>
  </div>