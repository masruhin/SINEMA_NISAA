<?php
include 'header.php';
include 'config.php';
if (empty($_SESSION['username'])) {
    echo "<script>alert('Silahkan Login Terlebih Dahulu');window.location='index.php'</script>";
}
?>
<!-- BEGIN: Content-->
<div class="app-content content ">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper container-xxl p-0">
    <div class="row match-height">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header border-bottom">
            <h4 class="card-title">Form Edit Kerjasama</h4>
          </div>
          <div class="card-body">
            <form action="kerjasama_proses_edit.php" method="post" enctype="multipart/form-data">
              <?php include 'config.php';
              $id			= $_GET['id_kerjasama'];
              $sql  		= "SELECT a.id_kerjasama, b.id_jenis_dok, b.jenis_dok, d.id_fak, d.fak_kode, d.fak_nama,
              c.id_unit, c.unit_nama, a.judul_kerjasama,  a.deskripsi_kerjasama, a.status_kerjasama,a.tanggal_awal,
              a.tanggal_akhir, a.no_ref_kerjasama,a.file,a.date_created,a.date_updated FROM kerjasama a
              LEFT JOIN jenis_dok b ON b.id_jenis_dok = a.id_jenis_dok
              LEFT JOIN fakultas d ON d.id_fak = a.id_fak
              LEFT JOIN unit c ON c.id_unit= a.id_unit WHERE id_kerjasama = 1 ";                        
              $query  	= mysqli_query($kon, $sql);
              $data 		= mysqli_fetch_array($query);
              // echo '<pre>';
              // print_r($data['fak_nama']);
              // echo '</pre>';
              // die();
              $fak      = $data['id_fak'];
              $unit     = $data['id_unit'];
              $judul    = $data['judul_kerjasama'];
              $deskripsi = $data['deskripsi_kerjasama'];
              $tanggal_awal   = $data['tanggal_awal'];
              $tanggal_akhir  = $data['tanggal_akhir'];
              $noref          = $data['no_ref_kerjasama'];
              $date_c         = $data['date_created'];
              $date_u         = $data['date_updated'];
              ?>

              <input type=hidden name="id_suratmasuk" value="<?php echo $id;?>">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Edit</h4>
                    </div>
                    <div class="card-body">

                      <div class="row">

                        <div class="col-md-6 col-12 mb-1">
                          <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Default</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="colFormLabel" placeholder="Normal Input" />
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6 col-12 mb-1">
                          <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Fakultas Penggiat</label>
                            <div class="col-sm-9">
                              <select name="id_fak" class="select2 form-control" tabindex="-1">
                                <option value="<?php echo $data['fak_nama'];?>">
                                  <?php echo $data['fak_nama'];?>
                                </option>
                                <option>-- Pilh untuk mengganti --</option>
                                <?php include 'config.php';
                                $sql2  		= "SELECT fak_nama FROM fakultas";                        
                                $query2  	= mysqli_query($kon, $sql2);
                                while ($data2 = mysqli_fetch_array($query2)){
                                      echo '<option value="'.$data2['fak_nama'].'">'.$data2['fak_nama'].'</option>';
                                      } 
                                ?>
                              </select>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
<?php include 'footer.php'; ?>
<script>
$(document).ready(function() {
  $(".select2").select2();
});
</script>
</body>

</html>
