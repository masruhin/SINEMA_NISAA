<?php 
include "config.php";
  include "header.php";
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(empty($_SESSION)){
  echo "<script>alert('Silahkan Login Terlebih Dahulu');window.location='index.php'</script>";
}
//total data univ
$q_univ = $kon->query("SELECT * FROM universitas");
$d_univ = mysqli_num_rows($q_univ);
//total  data fakultas
$q_fakultas = $kon->query("SELECT * FROM fakultas");
$d_fakultas = mysqli_num_rows($q_fakultas);
//total data Unit
$q_unit = $kon->query("SELECT * FROM unit  WHERE status='Y' ");
$d_unit = mysqli_num_rows($q_unit);
//total data Negara
$q_negara = $kon->query("SELECT * FROM negara");
$d_negara = mysqli_num_rows($q_negara);
?>
  <!-- BEGIN: Content-->
  <div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
      <div class="content-body">
        <div class="row match-height">
          <!-- Medal Card -->
          <div class="col-xl-3 col-md-3 col-12">
            <div class="card card-congratulation-medal">
              <div class="card-body">
                <!-- <h5>Universitas</h5> -->
                <h3 class="mb-75 mt-2 pt-50">
                  <a href="javascript:void(0);">Universitas</a>
                </h3>
                <p class="card-text font-small-3">Lihat untuk mengetahui lebih lanjut</p>
                <h3 class="mb-75 mt-2 pt-50">
                  <a href="javascript:void(0);">Jumlah <span></span><?php echo $d_univ?></a>
                </h3>
                <button type="button" class="btn btn-primary">Lihat</button>
                <img src="../vendor/app-assets/images/illustration/badge.svg" class="congratulation-medal" alt="Medal Pic" />
              </div>
            </div>
          </div>
          <!--/ Medal Carda -->

          <!-- Medal Card -->
          <div class="col-xl-3 col-md-3 col-12">
            <div class="card card-congratulation-medal">
              <div class="card-body">
                <h3 class="mb-75 mt-2 pt-50">
                  <a href="javascript:void(0);">Fakultas</a>
                </h3>
                <p class="card-text font-small-3">Lihat untuk mengetahui lebih lanjut</p>
                <h3 class="mb-75 mt-2 pt-50">
                  <a href="javascript:void(0);">Jumlah <?php echo $d_fakultas?></a>
                </h3>
                <button type="button" class="btn btn-primary">Lihat</button>
                <img src="../vendor/app-assets/images/illustration/badge.svg" class="congratulation-medal" alt="Medal Pic" />
              </div>
            </div>
          </div>
          <!--/ Medal Card -->
          <!-- Medal Card -->
          <div class="col-xl-3 col-md-3 col-12">
            <div class="card card-congratulation-medal">
              <div class="card-body">
                <h3 class="mb-75 mt-2 pt-50">
                  <a href="javascript:void(0);">Unit</a>
                </h3>
                <p class="card-text font-small-3">Lihat untuk mengetahui lebih lanjut</p>
                <h3 class="mb-75 mt-2 pt-50">
                  <a href="javascript:void(0);">Jumlah <?php echo $d_unit?></a>
                </h3>
                <button type="button" class="btn btn-primary">Lihat</button>
                <img src="../vendor/app-assets/images/illustration/badge.svg" class="congratulation-medal" alt="Medal Pic" />
              </div>
            </div>
          </div>
          <!--/ Medal Card -->

          <!-- Medal Card -->
          <div class="col-xl-3 col-md-3 col-12">
            <div class="card card-congratulation-medal">
              <div class="card-body">
                <h3 class="mb-75 mt-2 pt-50">
                  <a href="javascript:void(0);">Negara</a>
                </h3>
                <p class="card-text font-small-3">Lihat untuk mengetahui lebih lanjut</p>
                <h3 class="mb-75 mt-2 pt-50">
                  <a href="javascript:void(0);">Jumlah <?php echo $d_negara?></a>
                </h3>
                <button type="button" class="btn btn-primary">Lihat</button>
                <img src="../vendor/app-assets/images/illustration/badge.svg" class="congratulation-medal" alt="Medal Pic" />
              </div>
            </div>
          </div>
          <!--/ Medal Card -->
        </div>
      <!-- ChartJS section start -->
        <section id="chartjs-chart">
          <div class="row">
            <!-- Radar Chart Starts-->
            <div class="col-lg-6 col-12">
              <div class="card">
                <div class="card-header d-flex flex-row justify-content-between align-items-center">
                  <h4 class="card-title">Jenis Kerjasama</h4>
                  <div class="d-flex align-items-center flex-wrap">
                    <div id="tooltip" class="tooltip-placeholder"></div>
                  </div>
                </div>
                <div class="card-body">
                  <canvas class="radar-chart-ex chartjs" id="canvas" data-height="355"></canvas>
                </div>
              </div>
            </div>
            <!-- Radar Chart Ends-->

            <!-- Polar Area Chart Starts -->
            <div class="col-lg-6 col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Data Negara</h4>
                  <div class="dropdown">
                    <i data-feather="more-vertical" class="cursor-pointer" role="button" id="heat-chart-dd" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </i>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="heat-chart-dd">
                      <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                      <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                      <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <canvas class="polar-area-chart-ex chartjs" data-height="350"></canvas>
                </div>
              </div>
            </div>
            <!-- Polar Area Chart Ends-->
          </div>

        </section>
        <!-- ChartJS section end -->

        <!-- Basic Tables start -->
        <div class="row" id="basic-table">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Info Kerjasama</h4>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Jenis Kerjasama</th>
                      <th>Judul Kerjasama</th>
                      <th>Unit Pengajuan</th>
                      <th>Status</th>
                      <th>Detail</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <span class="font-weight-bold">1</span>
                      </td>
                      <td>Memorandum of Agreement (MoA)</td>
                      <td>
                        <p>PERJANJIAN KERJA SAMA ANTARA PROGRAM STUDI S1</p>
                      </td>
                      <td><span class="badge badge-pill badge-light-primary mr-1">Fakultas Ekonomi Bisnis</span></td>
                      <td><span class="badge badge-pill badge-light-primary mr-1">Active</span></td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn btn-sm dropdown-toggle hide-arrow">
                            <i data-feather="more-vertical"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0);">
                              <i data-feather="edit-2" class="mr-50"></i>
                              <span>Edit</span>
                            </a>
                            <a class="dropdown-item" href="javascript:void(0);">
                              <i data-feather="trash" class="mr-50"></i>
                              <span>Delete</span>
                            </a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- Basic Tables end -->


      </div>
    </div>
  </div>
  <!-- END: Content-->
        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>
<?php include "footer.php";?>
    </body>
</html>