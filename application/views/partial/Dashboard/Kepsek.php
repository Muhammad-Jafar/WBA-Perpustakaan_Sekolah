
    <div class="content-wrapper ">
      <div class="row d-flex justify-content-center p-2 ">
        
      <!-- CARD PERTAMA -->
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card border-left-primary shadow">
            <div class="card-body p-3">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-profile text-primary icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="text-lg font-weight-bold text-primary text-uppercase">Jumlah Admin</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0"><?=$jumlah_admin;?> </h3>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0 float-right">
                <i class="fas fa-industry fa text-gray-600"></i> Total seluruh anggota perpustakaan
              </p>
            </div>
          </div>
        </div>

      <!-- CARD KEDUA -->
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card border-left-dark shadow">
            <div class="card-body p-3">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-book-open-variant text-dark icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="text-lg font-weight-bold text-dark text-uppercase">Anggota Perpustakaan</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0"><?=$jumlah_anggota;?> </h3>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0 float-right">
                <i class="fas fa-industry fa text-gray-600"></i> Total seluruh anggota perpustakaan
              </p>
            </div>
          </div>
        </div>

        <!-- CARD KETIGA -->
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card border-left-danger shadow">
            <div class="card-body p-3">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-book-open-variant text-danger icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="text-lg font-weight-bold text-danger text-uppercase">Buku Perpustakaan</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0"><?=$jumlah_buku;?> </h3>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0 float-right">
              <i class="fas fa-industry fa text-gray-600"></i> Total seluruh buku
              </p>
            </div>
          </div>
        </div>

        <!-- CARD KEEMPAT -->
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card border-left-warning shadow">
            <div class="card-body p-3">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-book-plus text-warning icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="text-lg font-weight-bold text-warning text-uppercase">Total Buku dipinjam</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0">
                      <?=$buku_dipinjam;?></h3>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0 float-right">
                <i class="mdi mdi-treasure-chest mr-1" aria-hidden="true"></i> Jumlah buku yang dipinjam
              </p>
            </div>
          </div>
        </div>

        <!-- CARD KELIMA -->
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card border-left-success shadow">
            <div class="card-body p-3">
              <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-book-minus text-success icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="text-lg font-weight-bold text-success text-uppercase">Total Buku dikembalikan</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0">
                      <?=$buku_dikembalikan;?></h3>
                  </div>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0  float-right">
                <i class="mdi mdi-checkbox-multiple-marked-outline mr-1" aria-hidden="true"></i> Jumlah buku yang dikembalikan
              </p>
            </div>
          </div>
        </div>

    </div>
  </div>