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
              $sql  		= "SELECT a.id_kerjasama, b.id_jenis_dok, b.jenis_dok, b.jenis_ket, d.id_fak, d.fak_kode, d.fak_nama, c.id_unit, c.unit_nama, a.judul_kerjasama,  a.deskripsi_kerjasama, a.status_kerjasama,a.tanggal_awal, a.tanggal_akhir, a.no_ref_kerjasama,a.file,a.date_created,a.date_updated FROM kerjasama a
              LEFT JOIN jenis_dok b ON b.id_jenis_dok = a.id_jenis_dok
              LEFT JOIN fakultas d ON d.id_fak = a.id_fak
              LEFT JOIN unit c ON c.id_unit= a.id_unit WHERE id_kerjasama ='$id' ";                        
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
              $status    = $data['status_kerjasama'];
              $tanggal_awal   = $data['tanggal_awal'];
              $tanggal_akhir  = $data['tanggal_akhir'];
              $noref          = $data['no_ref_kerjasama'];
              $date_c         = $data['date_created'];
              $date_u         = $data['date_updated'];
              $file         = $data['file'];
              ?>

              <input type=hidden name="id_kerjasama" value="<?php echo $id;?>">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">

                      <div class="row">

                        <div class="col-md-6 col-12 mb-1">
                          <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-4 col-form-label"><span
                                class="badge badge-pill badge-light-success mr-1 lg"
                                style="background-color: rgb(255 205 21 / 83%); height:25px; color: #020202 !important;">Jenis
                                Dokumen Kerjasama</span></label>
                            <div class="col-sm-8">
                              <select name="id_jenis_dok" class="select2 form-control" tabindex="-1">
                                <option value="<?php echo $data['id_jenis_dok'];?>">
                                  <?php echo $data['jenis_dok'] ." | ". $data['jenis_ket']; ?>
                                </option>
                                <option disabled>-- Pilh untuk mengganti --</option>
                                <?php include 'config.php';
                                $sql2  		= "SELECT * FROM jenis_dok";                        
                                $query2  	= mysqli_query($kon, $sql2);
                                while ($data2 = mysqli_fetch_array($query2)){?>
                                <option value="<?php echo $data2['id_jenis_dok'] ?>">
                                  <?php echo $data2['jenis_dok'] ." | ". $data2['jenis_ket']; ?>
                                </option>
                                <!-- echo '<option value="'.$data2['id_jenis_dok'].'">'.$data2['jenis_ket'].'
                                  |'.$data2['jenis_dok'].'</option>'; -->
                                <?php }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label"><span
                                class="badge badge-pill badge-light-success mr-1 lg"
                                style="background-color: rgb(255 205 21 / 83%); height:25px; color: #020202 !important;">Fakultas
                                Penggiat</span></label>
                            <div class="col-sm-9">
                              <select name="id_fak" class="select2 form-control" tabindex="-1">
                                <option value="<?php echo $data['id_fak'];?>">
                                  <!-- <?php echo $data['fak_kode'] ." | ". $data['fak_nama']; ?> -->
                                  <?php echo $data['fak_nama']; ?>
                                </option>
                                <option disabled>-- Pilh untuk mengganti --</option>
                                <?php include 'config.php';
                                $sql2  		= "SELECT * FROM fakultas";                        
                                $query2  	= mysqli_query($kon, $sql2);
                                while ($data2 = mysqli_fetch_array($query2)){?>
                                <option value="<?php echo $data2['id_fak'] ?>">
                                  <?php echo $data2['fak_kode'] ." | ". $data2['fak_nama']; ?>
                                </option>
                                <!-- echo '<option value="'.$data2['id_fak'].'">'.$data2['fak_nama'].'</option>'; -->
                                <?php }
                                ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">
                              <span class="badge badge-pill badge-light-success mr-1 lg"
                                style="background-color: rgb(255 205 21 / 83%); height:25px; color: #020202 !important;">Unit
                                Penggiat</span>
                            </label>
                            <div class="col-sm-9">
                              <select name="id_unit" class="select2 form-control" tabindex="-1">
                                <option value="<?php echo $data['id_unit'];?>">
                                  <?php echo $data['unit_nama'];?>
                                </option>
                                <option disabled>-- Pilh untuk mengganti --</option>
                                <?php include 'config.php';
                                $sql2  		= "SELECT * FROM unit";                        
                                $query2  	= mysqli_query($kon, $sql2);
                                while ($data2 = mysqli_fetch_array($query2)){
                                      echo '<option value="'.$data2['id_unit'].'">'.$data2['unit_nama'].'</option>';
                                      } 
                                ?>
                              </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-4 col-form-label"> <span
                                class="badge badge-pill badge-light-success mr-1 lg"
                                style="background-color: rgb(255 205 21 / 83%); height:25px; color: #020202 !important;">No
                                Referensi Kerjasama</span></label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="colFormLabel" name="no_ref_kerjasama"
                                placeholder="Normal Input" / value="<?= $noref ?>">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-4 col-form-label"> <span
                                class="badge badge-pill badge-light-success mr-1 lg"
                                style="background-color: rgb(255 205 21 / 83%); height:25px; color: #020202 !important;">Status</span></label>
                            <div class="col-sm-8">
                              <select name="status" class="select2 form-control" tabindex="-1">
                                <option value="<?php echo $status;?>">
                                  <?php echo $status;?>
                                </option>
                                <option value="" disabled>-- Pilih status Kerjasama --</option>
                                <option value="aktif">aktif</option>
                                <option value="nonaktif">Nonaktif</option>
                              </select>
                            </div>
                          </div>

                        </div>

                        <div class="col-md-6 col-12 mb-1">
                          <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Judul Kerjasama</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="colFormLabel" name="judul_kerjasama"
                                placeholder="Normal Input" / value="<?= $judul ?>">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Deskripsi Kerjasama</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="colFormLabel" name="deskripsi_kerjasama"
                                placeholder="Normal Input" / value="<?= $deskripsi ?>">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Tanggal Awal</label>
                            <div class="col-sm-5">
                              <div class="input-group ">
                                <span class="input-group-text"><i data-feather="calendar"></i></span>
                                <input type="date" id="tawal" class="form-control" value="<?php echo $tanggal_awal;?>"
                                  name="tawal" />
                              </div>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-3 col-form-label">Tanggal Akhir</label>
                            <div class="col-sm-5">

                              <div class="input-group ">
                                <span class="input-group-text"><i data-feather="calendar"></i></span>
                                <input type="date" id="takhir" class="form-control" value="<?php echo $tanggal_akhir;?>"
                                  name="takhir" />
                              </div>
                            </div>
                          </div>

                          <div class="mb-1">
                            <P class="form-label" for="file">File Dokumen
                              Kerjasama</P>
                            <label for="" style="color:#59b711 ;">
                              * Dokumen Sebelumnya
                              <b style="color:blue"><?php echo $file;?></b>.
                            </label>
                            <div class="input-group ">
                              <input type="file" name="file" class="form-control-file" id="basicInputFile" />
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-12 offset-sm-12 modal-footer">
                  <button type="submit" class="btn btn-info mr-1 btn-sm" name="ubah">Simpan</button>
                  <button type="reset" class="btn btn-outline-danger btn-sm">Reset</button>
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
