<?php 
include "header.php";
if(empty($_SESSION['username'])){
  echo "<script>alert('Silahkan Login Terlebih Dahulu');window.location='index.php'</script>";
}

?>
  <!-- BEGIN: Content-->
  <div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
      <!-- <div class="content-body"> -->
        <div class="row match-height">
          <!-- Basic Tables start -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Negara</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="dataTables" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NAMA NEGARA</th>
                                            <th>DIBUAT PADA TANGGAL</th>
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
                                            <td>

                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- Basic Tables end -->
        </div>
    <!-- </div> -->
  </div>
  <!-- END: Content-->
  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>
  <?php include "footer.php";?>
  </body>
</html>