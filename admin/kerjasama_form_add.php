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
            <button type="button" class="btn btn-outline-success round btn-sm" data-toggle="modal"
              data-target="#add">Tambah</button>
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
                              <input type="date" id="tanggal_awal" class="form-control" name="tanggal_awal"
                                value="27-11-22" required />
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
                                value="27-11-22" required />
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
                                  <option value="" selected="selected">--- Pilih Barang ---</option>
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
                              Dokumen</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i data-feather="slack"></i></span>
                              <input type="text" id="nomor_dokumen" class="form-control" name="nomor_dokumen"
                                placeholder="Nomor Dokumen" required />
                            </div>
                          </div>
                        </div>
                        <div class="collapse col-12" id="form_dasar_dokumen">
                          <div class="mb-1">
                            <label class="form-label" for="dasar_dokumen_kerjasama">Dasar Dokumen
                              Kerjasama</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i class="fa fa-file"></i></span>
                              <input type="text" id="dasar_dokumen_kerjasama" class="form-control"
                                name="dasar_dokumen_kerjasama" placeholder="Nomor Dokumen" />
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

                        <div class="collapse col-12" id="form_anggaran">
                          <div class="col-12">
                            <div class="mb-1">
                              <label class="form-label">Anggaran</label>
                              <div class="input-group input-group-merge">
                                <div class="col-3">
                                  <select id="id_mata_uang" class="select2 form-select" name="id_mata_uang">
                                    <option value="1">
                                      Rp
                                    </option>
                                    <option value="2">
                                      $
                                    </option>
                                  </select>
                                </div>

                                <input type="number" id="biaya_anggaran" class="form-control" name="biaya_anggaran"
                                  placeholder="Biaya" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="collapse col-12" id="form_sumber_pendanaan">
                          <div class="mb-1">
                            <label class="form-label" for="id_sumber_pendanaan">Sumber
                              Pendanaan
                              Kerjasama</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i data-feather="credit-card"></i></span>
                              <div class="col-11">
                                <select class="select2 form-select id_sumber_pendanaan form-control"
                                  name="id_sumber_pendanaan" id="id_sumber_pendanaan">
                                  <option value="" readonly>Pilih Sumber Pendanaan
                                  </option>
                                  <option value="4">
                                    Direktorat PSD
                                  </option>
                                  <option value="5">
                                    Direktorat PSMP
                                  </option>
                                  <option value="6">
                                    Direktorat PSMA
                                  </option>
                                  <option value="7">
                                    Direktorat PSMK
                                  </option>
                                  <option value="8">
                                    Direktorat PKLK Dikdas
                                  </option>
                                  <option value="9">
                                    Direktorat PKLK Dikmen
                                  </option>
                                  <option value="10">
                                    Direktorat P2TK Dikdas
                                  </option>
                                  <option value="11">
                                    Direktorat P2TK Dikmen
                                  </option>
                                  <option value="12">
                                    Sekretariat Dikdas
                                  </option>
                                  <option value="13">
                                    Sekretariat Dikmen
                                  </option>
                                  <option value="14">
                                    Biro PKLN
                                  </option>
                                  <option value="15">
                                    Pustekkom
                                  </option>
                                  <option value="16">
                                    Puskurbuk
                                  </option>
                                  <option value="17">
                                    Puspendik
                                  </option>
                                  <option value="18">
                                    Balitbang
                                  </option>
                                  <option value="19">
                                    Badan PSDMPK dan PMP
                                  </option>
                                  <option value="20">
                                    Dikti
                                  </option>
                                  <option value="21">
                                    Dinas Propinsi
                                  </option>
                                  <option value="22">
                                    Dinas Kabupaten
                                  </option>
                                  <option value="23">
                                    DIPA PTN
                                  </option>
                                  <option value="24">
                                    DP2M Ristekdikti
                                  </option>
                                  <option value="25">
                                    Insinas Ristekdikti
                                  </option>
                                  <option value="26">
                                    Lembaga donor dalam negeri
                                  </option>
                                  <option value="27">
                                    Lembaga donor luar negeri
                                  </option>
                                  <option value="28">
                                    Dana mandiri
                                  </option>
                                  <option value="29">
                                    Bantuan Swasta
                                  </option>
                                  <option value="30">
                                    Bantuan Asing
                                  </option>

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
