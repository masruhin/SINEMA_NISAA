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
            <?php 
            include "config.php";
            $id_kerjasama = $_GET['id_kerjasama'];
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
                      LEFT JOIN unit c ON c.id_unit = a.id_unit WHERE id_kerjasama='$id_kerjasama' ORDER BY id_kerjasama asc");
											if (!$data) {
												printf("Error: %s\n", mysqli_error($kon));
												exit();
											}
											while($hasil = mysqli_fetch_array($data)){
											?>
            <input type="hidden" name="id_kerjasama" value="<?= $row['id_kerjasama']?>">
            <form action="kerjasama_proses_edit.php" method="post" enctype="multipart/form-data" id="demo-form2"
              data-parsley-validate class="form-horizontal form-label-left">
              <input type="hidden" name="id_kerjasama" value="<?= $row['id_kerjasama']?>">
              <section id="input-sizing">
                <div class="row match-height">
                  <div class="col-lg-4 col-md-4">
                    <div class="card">
                      <div class="card-header">
                        <div class="accordion list-group-item list-group-item-action active" type="button"
                          data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="true"
                          aria-controls="accordionTwo"><span>Masa Berlaku</span>
                        </div>
                        <div class="card-body list-group-item" id="accordionTwo">
                          <div class="row">
                            <div class="col-12">
                              <div class="mb-1">
                                <P class="form-label" for="tawal">Tanggal
                                  Awal</P>
                                <div class="input-group ">
                                  <span class="input-group-text"><i data-feather="calendar"></i></span>
                                  <input type="date" id="tawal" class="form-control"
                                    value="<?php echo $hasil ['tanggal_awal'];?>" name="tawal" />
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-1">
                                <P class="form-label" for="takhir">Tanggal
                                  Akhir</P>
                                <div class="input-group ">
                                  <span class="input-group-text"><i data-feather="calendar"></i></span>
                                  <input type="date" id="takhir" class="form-control"
                                    value="<?php echo $hasil ['tanggal_akhir'];?>" name="takhir" />
                                </div>
                              </div>
                            </div>

                            <div class="col-12">
                              <div class="mb-1">
                                <p>Fakultas Penggiat</p>
                                <div class="input-group input-group-merge">
                                  <span class="input-group-text"><i data-feather='link'></i></span>
                                  <div class="col-lg-10">
                                    <select class="form-control select2" name="id_f" id="id_fak" style="width: 100%;">
                                      <option value="" selected="selected">-- Fakultas Penggiat --
                                      </option>
                                      <?php
                                      $no = 1;
                                      $q_unit = "SELECT * FROM kerjasama ORDER BY id_fak ASC";
                                      $qry = mysqli_query($kon, $q_unit);
                                      while ($row_unit = mysqli_fetch_array($qry)) {
                                      ?>
                                      <option value="<?php echo $row_unit['id_fak'] ?>">
                                        <?php echo $no++  ." | ". $row_unit['fak_nama']; ?>
                                      </option>
                                      <?php
                                        }
                                        ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-1">
                                <p>Unit Penggiat</p>
                                <div class="input-group input-group-merge">
                                  <span class="input-group-text"><i data-feather='link'></i></span>
                                  <div class="col-lg-10">
                                    <select class="form-control select2" name="select" style="width: 100%;">
                                      <?php 
                                      include 'config.php';
                                      $qry = $kon->query("SELECT  a.id_kerjasama,
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
                                                                LEFT JOIN unit c ON c.id_unit = a.id_unit WHERE id_kerjasama='$id_kerjasama' ORDER BY id_kerjasama asc");
                                                                $selected = '';
                                                                while ($data = $qry->fetch_assoc()) {?>
                                      <option value="<?= $data['id']?>" <?php if( $selected == $data['id_fak']){
                                        echo  $selected;
                                      }?>> <?= $data['fak_nama'] ?> </option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-8 col-md-8">
                    <div class="card">
                      <div class="card-header">
                        <div class="card-body list-group-item" id="accordionTwo">
                          <div class="row">
                            <div class="col-12">
                              <div class="mb-1">
                                <p>Jenis Dokumen Kerjasama</p>
                                <!-- <p class="form-p" for="first-name-icon">Status</p> -->
                                <div class="input-group input-group-merge">
                                  <span class="input-group-text"><i data-feather='link'></i></span>
                                  <div class="col-lg-10">
                                    <select class="form-control select2" name="id_dok" style="width: 100%;">
                                      <option value="" selected="selected">--- Pilih Jenis Dokumen Kerjasama
                                        ---</option>
                                      <?php
                                                  $no = 1;
                                                  $q_jenis = "SELECT * FROM jenis_dok ORDER BY jenis_dok";
                                                  $hasil_jenis = mysqli_query($kon, $q_jenis);
                                                  while ($row_jenis = mysqli_fetch_array($hasil_jenis)) {
                                                  ?>
                                      <option value="<?php echo $row_jenis['id_jenis_dok'] ?>">
                                        <?php echo $no++  ." | ". $row_jenis['jenis_dok']; ?>
                                      </option>
                                      <?php
                                                  }
                                                  ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-12">
                              <div class="mb-1">
                                <P class="form-label" for="first-name-icon">Judul Kerjasama</P>
                                <div class="input-group mb-1">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i data-feather='at-sign'></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="judul"
                                    value="<?php echo $hasil['judul_kerjasama']?>" />
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-1">
                                <P class="form-label" for="deskripsi">Deskripsi
                                  Kerjasama</P>
                                <div class="input-group ">
                                  <span class="input-group-text"><i data-feather="calendar"></i></span>
                                  <input type="text" id="deskripsi" class="form-control"
                                    value="<?php echo $hasil ['deskripsi_kerjasama'];?>" name="deskripsi" />
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-1">
                                <P class="form-label" for="no_ref">No Ref Kerjasama</P>
                                <div class="input-group ">
                                  <span class="input-group-text"><i data-feather='map-pin'></i></span>
                                  <input type="text" id="no_ref" class="form-control"
                                    value="<?php echo $hasil ['no_ref_kerjasama'];?>" name="no_ref" />
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-1">
                                <P class="form-label" for="tanggal_akhir">Tanggal Input</P>
                                <div class="input-group ">
                                  <span class="input-group-text"><i data-feather='pen-tool'></i></span>
                                  <input type="text" id="date_created" class="form-control"
                                    value="<?php echo $hasil ['date_created'];?>" name="date_created" />
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-1">
                                <P class="form-label" for="file">File Dokumen
                                  Kerjasama</P>
                                <label for="" style="color:red ;">
                                  * Dokumen Sebelumnya
                                  <b style="color:blue"><?php echo $hasil ['file'];?></b>.
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
                  </div>
                </div>
              </section>
              <div class="col-sm-12 offset-sm-12 modal-footer">
                <button type="submit" class="btn btn-info mr-1 btn-sm" name="update" value="Update">Simpan</button>
              </div>
              <?php 
                              }
                              //mysql_close($host);
                              ?>
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
