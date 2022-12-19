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
                      LEFT JOIN unit c ON c.id_unit= a.id_unit WHERE id_kerjasama='$id_kerjasama' ORDER BY id_kerjasama asc");
											if (!$data) {
												printf("Error: %s\n", mysqli_error($kon));
												exit();
											}
											while($hasil = mysqli_fetch_array($data)){
											?>
            <input type="hidden" name="id_kerjasama" value="<?= $row['id_kerjasama']?>">
            <form action="kerjasama_proses.php" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-lg-4">
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
                              <p>Status</p>
                              <!-- <p class="form-p" for="first-name-icon">Status</p> -->
                              <div class="input-group input-group-merge">
                                <span class="input-group-text"><i data-feather='chevrons-down'></i></span>
                                <div class="col-lg-10">
                                  <select class="select2 form-select form-control" name="status_kerjasama" required>
                                    <option value="" readonly>-- Pilih Status Kerjasama --
                                    </option>
                                    <option value="aktif">
                                      Aktif
                                    </option>
                                    <option value="nonaktif">
                                      Tidak Aktif
                                    </option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="mb-1">
                              <p class="form-p" for="tanggal_awal">Tanggal
                                Awal</p>
                              <div class="input-group ">
                                <span class="input-group-text"><i data-feather="calendar"></i></span>
                                <input type="date" id="tanggal_awal" class="form-control" name="tanggal_awal"
                                  value="<?php echo $hasil ['tanggal_awal'];?>" required />
                              </div>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="mb-1">
                              <p class="form-p" for="tanggal_akhir">Tanggal
                                Akhir</p>
                              <div class="input-group ">
                                <span class="input-group-text"><i data-feather="calendar"></i></span>
                                <input type="date" id="tanggal_akhir" class="form-control"
                                  value="<?php echo $hasil ['tanggal_akhir'];?>" name="tanggal_akhir" required />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="col-md-8 co12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12">
                            <div class="mb-1">
                              <div class="col-12">
                                <div class="mb-1">
                                  <p class="form-p" for="id_jenis_dok">Jenis
                                    Kerjasama</p>
                                  <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i data-feather='paperclip'></i></i></span>
                                    <div class="col-10">
                                      <select class="select2 form-control form-control-md" name="id_jenis_dok">
                                        <option value="" selected="selected">-- Pilih Bentuk Kerjasama --</option>
                                        <?php
                                      $no = 1;
                                      $query =
                                          'SELECT * FROM jenis_dok ORDER BY id_jenis_dok';
                                      $ok = mysqli_query($kon, $query);
                                      while ($row = mysqli_fetch_array($ok)) { ?>
                                        <option value="<?php echo $row[
                                          'id_jenis_dok'
                                      ]; ?>">
                                          <?php echo $row['id_jenis_dok'] .
                                            ' | ' .
                                            $row['jenis_dok']; ?></option>
                                        <?php }
                                      ?>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="mb-1">
                                  <p class="form-p" for="judul_kerjasama">Judul Kerjasama</p>
                                  <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i data-feather='pocket'></i></span>
                                    <input type="text" id="judul_kerjasama"
                                      value="<?php echo $hasil ['judul_kerjasama'];?>" class="form-control"
                                      name="judul_kerjasama" placeholder="Judul Kerjasama" required />
                                  </div>
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="mb-1">
                                  <p class="form-p" for="deskripsi_kerjasama">Deskripsi</p>
                                  <textarea name="deskripsi_kerjasama" id="deskripsi_kerjasama" class="form-control"
                                    rows="4"
                                    placeholder="Ringkasan singkat terkait cakupan atau kegiatan kerja sama"><?php echo $hasil ['deskripsi_kerjasama'];?></textarea>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-1">
                                <p class="form-p" for="no_ref_kerjasama">Nomor
                                  Referensi</p>
                                <div class="input-group input-group-merge">
                                  <span class="input-group-text"><i data-feather='file-minus'></i></i></span>
                                  <input type="text" id="no_ref_kerjasama" class="form-control"
                                    value="<?php echo $hasil ['no_ref_kerjasama'];?>" name="no_ref_kerjasama"
                                    placeholder="Nomor Dokumen" required />
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="">
                                <div class="form-group">
                                  <p for="basicInputFile">Upload Dokumen Surat Perjanjian</p>
                                  <input type="file" name="file" class="form-control-file" id="basicInputFile"
                                    value="" />
                                  <span class="sm" style="color:red ;">
                                    <label for="" style="color:red ;">
                                      File yang bisa di Upload hanya file dengan ekstensi .doc, .docx, .xls, .xlsx,
                                      .ppt,
                                      .pptx, .pdf, .rar, .exe, .zip dan besar file (file size) maksimal hanya <b>3
                                        MB</b>.
                                    </label>
                                  </span>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-1">
                                <p class="form-p" for="id_unit">Unit Penggiat Kerjasama</p>
                                <div class="input-group input-group-merge">
                                  <span class="input-group-text"><i data-feather='paperclip'></i></i></span>
                                  <div class="col-10">
                                    <select class="select2 form-control form-control-md" name="id_unit" id="id_unit">
                                      <option value="" selected="selected">-- Pilih Penggiat Kerjasama --</option>
                                      <?php
                                      $query =
                                          'SELECT * FROM unit ORDER BY id_unit';
                                      $hasil = mysqli_query($kon, $query);
                                      while ($row = mysqli_fetch_array($hasil)) { ?>
                                      <option value="<?php echo $row[
                                          'id_unit'
                                      ]; ?>">
                                        <?php echo $row['id_unit'] .
                                            ' | ' .
                                            $row['unit_nama']; ?></option>
                                      <?php }
                                      ?>
                                    </select>
                                  </div>
                                  <span class="sm" style="color:red ;">
                                    <label for="" style="color:red ;">
                                      *boleh dikosongkan
                                    </label>
                                  </span>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-1">
                                <p class="form-p" for="id_fak">Fakultas Penggiat Kerjasama</p>
                                <div class="input-group input-group-merge">
                                  <span class="input-group-text"><i data-feather='paperclip'></i></i></span>
                                  <div class="col-10">
                                    <select class="select2 form-control form-control-md" name="id_fak" id="id_fak">
                                      <option value="" selected="selected">-- Pilih Penggiat Kerjasama --</option>
                                      <?php
                                      $query =
                                          'SELECT * FROM fakultas ORDER BY id_fak';
                                      $hasil = mysqli_query($kon, $query);
                                      while ($row = mysqli_fetch_array($hasil)) { ?>
                                      <option value="<?php echo $row[
                                          'id_fak'
                                      ]; ?>">
                                        <?php echo $row['fak_kode'] .
                                            ' | ' .
                                            $row['fak_nama']; ?></option>
                                      <?php }
                                      ?>
                                    </select>
                                  </div>
                                  <span class="sm" style="color:red ;">
                                    <label for="" style="color:red ;">
                                      *boleh dikosongkan
                                    </label>
                                  </span>
                                </div>
                              </div>
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
