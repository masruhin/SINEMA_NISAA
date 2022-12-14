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
              <img src="../img/universitas.png" class="rounded" width="50" height="50" alt="Medal Pic" />
              <h3 class="mb-75 mt-2 pt-50">
                <a href="javascript:void(0);">Universitas</a>
              </h3>
              <h6 class="mb-75 mt-2 pt-50">
                <a href="javascript:void(0);">Jumlah <span></span><?php echo $d_univ?></a>
              </h6>
            </div>
          </div>
        </div>
        <!--/ Medal Carda -->

        <!-- Medal Card -->
        <div class="col-xl-3 col-md-3 col-12">
          <div class="card card-congratulation-medal">
            <div class="card-body">
              <img src="../img/fakultas.png" class="rounded" width="50" height="50" alt="Medal Pic" />
              <h3 class="mb-75 mt-2 pt-50">
                <a href="javascript:void(0);">Fakultas</a>
              </h3>
              <h6 class="mb-75 mt-2 pt-50">
                <a href="javascript:void(0);">Jumlah <?php echo $d_fakultas?></a>
              </h6>
            </div>
          </div>
        </div>
        <!--/ Medal Card -->
        <!-- Medal Card -->
        <div class="col-xl-3 col-md-3 col-12">
          <div class="card card-congratulation-medal">
            <div class="card-body">
              <img src="../img/unit.png" class="rounded" width="50" height="50" alt="Medal Pic" />
              <h3 class="mb-75 mt-2 pt-50">
                <a href="javascript:void(0);">Unit</a>
              </h3>
              <h6 class="mb-75 mt-2 pt-50">
                <a href="javascript:void(0);">Jumlah <?php echo $d_unit?></a>
              </h6>
            </div>
          </div>
        </div>
        <!--/ Medal Card -->

        <!-- Medal Card -->
        <div class="col-xl-3 col-md-3 col-12">
          <div class="card card-congratulation-medal">
            <div class="card-body">
              <img src="../img/negara.png" class="rounded" width="50" height="50" alt="Medal Pic" />
              <h3 class="mb-75 mt-2 pt-50">
                <a href="javascript:void(0);">Negara</a>
              </h3>
              <h6 class="mb-75 mt-2 pt-50">
                <a href="javascript:void(0);">Jumlah <?php echo $d_negara?></a>
              </h6>
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
                  <i data-feather="more-vertical" class="cursor-pointer" role="button" id="heat-chart-dd"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
              <h4 class="card-title">Kerjasama</h4>
              <a href="kerjasama_form_add.php" type="button" class="btn btn-outline-success round btn-sm">Tambah</a>
            </div>
            <div class="card-body table-responsive">
              <table id="dataTables" class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Jenis</th>
                    <th>Judul</th>
                    <th>File</th>
                    <th>Status</th>
                    <th>Masa Berlaku</th>
                    <th>No Ref</th>
                    <th>Tanggal Dibuat</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
											include "config.php";
											$no = 1;
											$data = mysqli_query($kon, "SELECT
                      a.id_kerjasama,
                      b.id_jenis_dok,
                      b.jenis_dok,
                      d.id_fak,
                      d.fak_kode,
                      d.fak_nama,
                      c.id_unit,
                      c.unit_nama,
                      a.judul_kerjasama,
                      a.deskripsi_kerjasama,
                      a.status_kerjasama,
                      a.tanggal_awal,
                      a.tanggal_akhir,
                      a.no_ref_kerjasama,
                      a.file,
                      a.date_created,
                      a.date_updated 
                    FROM
                      kerjasama a
                      LEFT JOIN jenis_dok b ON b.id_jenis_dok = a.id_jenis_dok
                      LEFT JOIN fakultas d ON d.id_fak = a.id_fak
                      LEFT JOIN unit c ON c.id_unit= a.id_unit ORDER BY id_kerjasama asc");
											if (!$data) {
												printf("Error: %s\n", mysqli_error($kon));
												exit();
											}
											while($hasil = mysqli_fetch_array($data)){
											?>
                  <tr>
                    <td>
                      <?php echo $no++; ?>
                    </td>
                    <td><?php echo $hasil ['jenis_dok'];?></td>
                    <td><?php echo $hasil ['judul_kerjasama'];?></td>
                    <td>
                      <?php if ($hasil['file']!=0) {?>
                      <button
                        onclick="JavaScript:window.location.href='kerjasama_download.php?file=<?php echo $hasil['file']?>';"
                        class="btn btn-outline-info round btn-sm">Download</button>
                      <?php }else{ ?>
                      <span class="badge badge-pill badge-light-danger mr-1 lg">Tidak ada file!</span>
                      <?php }
                    ?>
                    </td>
                    <?php 
                    if ($hasil['status_kerjasama']=='aktif') {?>
                    <td>
                      <div class=" badge badge-pill badge-glow badge-success"><?php echo $hasil ['status_kerjasama'];?>
                      </div>
                    </td>
                    <?php }else{ ?>
                    <td>
                      <div class="badge badge-pill badge-glow badge-danger"><?php echo $hasil ['status_kerjasama'];?>
                      </div>
                    </td>
                    <?php }
                  ?>
                    <td><?php echo $hasil ['tanggal_awal'];?> <strong style="color:red ;">s/d</strong>
                      <?php echo $hasil ['tanggal_akhir'];?>
                    </td>
                    <td><?php echo $hasil ['no_ref_kerjasama'];?></td>
                    <td><?php echo tanggal_indonesia("2022-02-02");?></td>
                  </tr>
                  <?php               
									} 
									?>
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
