<?php 
include "header.php";
include "config.php";
if(empty($_SESSION['username'])){
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
            <h4 class="card-title">Form Input Kerjasama</h4>
          </div>
          <div class="card-body">
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
                            <label class="form-label" for="first-name-icon">Status</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i data-feather='chevrons-down'></i></span>
                              <div class="col-lg-10">
                                <select class="select2 form-select id_status_kerjasama form-control"
                                  name="id_status_kerjasama" required>
                                  <option value="" readonly>Pilih Status Kerjasama
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
                            <label class="form-label" for="tanggal_awal">Tanggal
                              Awal</label>
                            <div class="input-group ">
                              <span class="input-group-text"><i data-feather="calendar"></i></span>
                              <input type="date" id="tanggal_awal" class="form-control" name="tanggal_awal" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="mb-1">
                            <label class="form-label" for="tanggal_akhir">Tanggal
                              Akhir</label>
                            <div class="input-group ">
                              <span class="input-group-text"><i data-feather="calendar"></i></span>
                              <input type="date" id="tanggal_akhir" class="form-control" name="tanggal_akhir"
                                required />
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
                            <label class="form-label" for="id_jenis_dokumen">Jenis Dokumen
                              Kerjasama</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i data-feather="list"></i></span>
                              <div class="col-10">
                                <select class="select2 form-select id_jenis_dokumen form-control"
                                  name="id_jenis_dokumen" id="id_jenis_dokumen">
                                  <option value="" selected="selected">--- Pilih Jenis Dokumen Kerjasama ---</option>
                                  <?php
                                  $query = "SELECT * FROM jenis_dok ORDER BY id_jenis_dok";
                                  $hasil = mysqli_query($kon, $query);
                                  while ($row = mysqli_fetch_array($hasil)) {
                                  ?>
                                  <option value="<?php echo $row['id_jenis_dok'] ?>">
                                    <?php echo $row['id_jenis_dok']  ." | ". $row['jenis_dok']; ?></option>
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
                            <label class="form-label" for="nomor_dokumen">Nomor
                              Kerjasama</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i data-feather="slack"></i></span>
                              <input type="text" id="nomor_dokumen" class="form-control" name="nomor_dokumen"
                                placeholder="Nomor Kerjasama" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="mb-1">
                            <label class="form-label" for="judul_kerjasama">Judul Kerjasama</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i data-feather="sun"></i></span>
                              <input type="text" id="judul_kerjasama" class="form-control" name="judul_kerjasama"
                                placeholder="Judul Kerjasama" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="mb-1">
                            <label class="form-label" for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4"
                              placeholder="Ringkasan singkat terkait cakupan atau kegiatan kerja sama"></textarea>
                          </div>
                        </div>
                        <div class="col-12">
                          <label for="customFile">Masukan Dokumen</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" />
                            <label class="custom-file-label" for="customFile"
                              style="background-color:aqua;color:black;">Pilih
                              Dokumen</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
<?php include "footer.php";?>
<script type="text/javascript">

</script>
</body>

</html>
