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
    <div class="content-header row">
      <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
          <div class="col-12">
            <h2 class="content-header-title float-start mb-0">Repository</h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="https://porma.uisu.ac.id/public/dashboard">Home</a>
                </li>
                </li>
                <li class="breadcrumb-item active">Detail
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
    <form action="kerjasama_act.php"></form>
    <div class="content-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <section id="basic-horizontal-layouts">
              <div class="row">
                <div class="col-md-4 col-12">
                  <div class="card">
                    <div class="card-header">
                      <div class="accordion list-group-item list-group-item-action active" type="button"
                        data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="true"
                        aria-controls="accordionTwo"><i class="me-1" data-feather="calendar"
                          class="font-medium-2"></i><span>Masa
                          Berlaku</span>
                      </div>
                      <div class="card-body list-group-item" id="accordionTwo">
                        <div class="row">
                          <div class="col-12">
                            <div class="mb-1">
                              <label class="form-label" for="first-name-icon">Status</label>
                              <div class="input-group input-group-merge">
                                <span class="input-group-text"><i data-feather="user"></i></span>
                                <div class="col-10">
                                  <select class="form-select  form-control" name="">
                                    <option value="2" selected>
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
                                <input type="text" id="tanggal_awal" class="form-control" name="tanggal_awal"
                                  value="2022-10-07 00:00:00" />
                              </div>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="mb-1">
                              <label class="form-label" for="tanggal_akhir">Tanggal
                                Akhir</label>
                              <div class="input-group ">
                                <span class="input-group-text"><i data-feather="calendar"></i></span>
                                <input type="text" id="tanggal_akhir" class="form-control" name="tanggal_akhir"
                                  value="2022-10-14 00:00:00" />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card accordion-item">
                    <div class="card-header">
                      <div class="accordion list-group-item list-group-item-action active" type="button"
                        data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="true"
                        aria-controls="accordionOne"><i class="me-1" data-feather="calendar"
                          class="font-medium-2"></i><span>Dokumen</span>
                      </div>
                      <div class="card-body list-group-item" id="accordionOne">
                        <ul class="nav nav-tabs" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                              aria-controls="home" role="tab" aria-selected="true"><i data-feather="list"></i></a>
                          </li>
                        </ul>
                        <hr>
                        <div class="tab-content">
                          <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8 col-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12">
                          <div class="mb-1">
                            <label class="form-label" for="id_jenis_dokumen">Jenis Dokumen
                              Kerjasama</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i data-feather="list"></i></span>
                              <div class="col-11">
                                <select class="form-select id_jenis_dokumen form-control" name="id_jenis_dokumen"
                                  id="id_jenis_dokumen">
                                  <option value="3" selected>
                                    Implementation Arrangement (IA)
                                  </option>
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
                                placeholder="Nomor Dokumen" required value="121212weewrwer" />
                            </div>
                          </div>
                        </div>
                        <div class=" col-12" id="form_dasar_dokumen">
                          <div class="mb-1">
                            <label class="form-label" for="dasar_dokumen_kerjasama">Dasar
                              Dokumen
                              Kerjasama</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i class="fa fa-file"></i></span>
                              <input type="text" id="dasar_dokumen_kerjasama" class="form-control"
                                name="dasar_dokumen_kerjasama" placeholder="Nomor Dokumen" value="erwerewr213213" />
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="mb-1">
                            <label class="form-label" for="judul_kerjasama">judul_kerjasama
                              Kerjasama</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i data-feather="sun"></i></span>
                              <input type="text" id="judul_kerjasama" class="form-control" name="judul_kerjasama"
                                placeholder="Judul Kerjasama" value="23321312312313131" />
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="mb-1">
                            <label class="form-label" for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4"
                              placeholder="Ringkasan singkat terkait cakupan atau kegiatan kerja sama">123123213</textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- Basic Horizontal form layout section end -->
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- User Timeline Card -->
      <div class="col-lg-6 col-12">
        <div class="card card-user-timeline">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <i data-feather="list" class="user-timeline-title-icon"></i>
              <h4 class="card-title">PENGGIAT KERJASAMA</h4>
            </div>
          </div>
          <div class="card-body">
            <ul class="timeline ms-50">
              <li class="timeline-item">
                <span class="timeline-point timeline-point-indicator"></span>
                <div class="timeline-event">
                  <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                    <h4>Pihak 1# : </h4>
                  </div>
                  <div class="row mb-1">
                    <div class="col-2">Alamat</div>
                    <div class="col-10">: 231231312312</div>
                  </div>
                  <div class="mb-1">
                    <b>Pejabat yang menandatangani dokumen</b>
                    <div class="row">
                      <div class="col-2">Nama</div>
                      <div class="col-10">: 121</div>
                    </div>
                    <div class="row">
                      <div class="col-2">Jabatan</div>
                      <div class="col-10">: asdsadasd</div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="timeline-item">
                <span class="timeline-point timeline-point-indicator"></span>
                <div class="timeline-event">
                  <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                    <h4>Pihak 1# :
                      Institusi tidak ditemukan
                    </h4>
                  </div>
                  <div class="row mb-1">
                    <div class="col-2">Alamat</div>
                    <div class="col-10">: </div>
                  </div>
                  <div class="mb-1">
                    <b>Pejabat yang menandatangani dokumen</b>
                    <div class="row">
                      <div class="col-2">Nama</div>
                      <div class="col-10">: </div>
                    </div>
                    <div class="row">
                      <div class="col-2">Jabatan</div>
                      <div class="col-10">: </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!--/ User Timeline Card -->

      <!-- User Timeline Card -->
      <div class="col-lg-6 col-12">
        <div class="card card-user-timeline">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <i class="me-1 fa fa-bullseye" class="user-timeline-title-icon"></i>
              <h4 class="card-title">BENTUK KEGIATAN</h4>
            </div>
          </div>
          <div class="card-body">
            <ul class="timeline ms-50">
            </ul>
          </div>
        </div>
      </div>
      <!--/ User Timeline Card -->

    </div>
  </div>
</div>
<!-- END: Content-->
<?php include "footer.php";?>
<script type="text/javascript">

</script>
</body>

</html>
