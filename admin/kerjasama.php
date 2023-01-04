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
    <div class="row match-height">
      <div class="col-lg-12">
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
                  <th style="text-align:center;">Aksi</th>
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
                        // echo '<pre>';
                        // print_r($hasil);
                        // echo'</pre>';
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
                  <td style="text-align:center ;">
                    <a href="#" type="button"
                      class="open_modal btn btn-icon btn-icon rounded-circle btn-primary waves-effect waves-float waves-light btn-sm"
                      data-toggle="modal" data-target="#view<?php echo $hasil['id_kerjasama']; ?>"><i
                        data-feather='eye'></i></a>
                    <!-- <a href="kerjasama_edit.php?id_kerjasama=<?php echo $hasil['id_kerjasama']?>" type="button"
                      class="btn btn-icon btn-icon rounded-circle btn-success waves-effect waves-float waves-light btn-sm"><i
                        data-feather='edit-3'></i></a> -->
                    <a href="#" type="button"
                      class="open_modal btn btn-icon btn-icon rounded-circle btn-danger waves-effect waves-float waves-light btn-sm"
                      data-toggle="modal" data-target="#deleteEmployeeModal<?php echo $hasil['id_kerjasama']; ?>"><i
                        data-feather='trash-2'></i></a>
                    <a href="#" type="button"
                      class="open_modal btn btn-icon btn-icon rounded-circle btn-success waves-effect waves-float waves-light btn-sm"
                      data-toggle="modal" data-target="#edit<?php echo $hasil['id_kerjasama']; ?>"><i
                        data-feather='edit'></i></a>
                  </td>
                </tr>

                <!-- MODAL VIEW -->
                <div class="modal fade text-left" id="view<?php echo $hasil['id_kerjasama']; ?>" role="dialog"
                  aria-labelledby="myModalLabel16" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel16">View Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="form form-horizontal" action="jenis_dok_act.php" method="POST">
                          <?php
                              $id = $hasil['id_kerjasama']; 
                              $query_edit = mysqli_query($kon, "SELECT
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
                              LEFT JOIN unit c ON c.id_unit= a.id_unit WHERE id_kerjasama='$id'");
                              while ($row = mysqli_fetch_array($query_edit)) {  
                              ?>
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
                                            <P class="form-label" for="first-name-icon">Status</P>
                                            <div class="input-group mb-1">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="pocket"></i></span>
                                              </div>
                                              <input type="text" class="form-control"
                                                value="<?php echo $hasil['status_kerjasama']?>" readonly />
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-12">
                                          <div class="mb-1">
                                            <P class="form-label" for="tanggal_awal">Tanggal
                                              Awal</P>
                                            <div class="input-group ">
                                              <span class="input-group-text"><i data-feather="calendar"></i></span>
                                              <input type="date" id="tanggal_awal" class="form-control"
                                                value="<?php echo $hasil ['tanggal_awal'];?>" name="tanggal_awal"
                                                readonly />
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-12">
                                          <div class="mb-1">
                                            <P class="form-label" for="tanggal_akhir">Tanggal
                                              Akhir</P>
                                            <div class="input-group ">
                                              <span class="input-group-text"><i data-feather="calendar"></i></span>
                                              <input type="date" id="tanggal_awal" class="form-control"
                                                value="<?php echo $hasil ['tanggal_akhir'];?>" name="tanggal_awal"
                                                readonly />
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-12">
                                          <div class="mb-1">
                                            <P class="form-label" for="fak_nama">Fakultas Penggiat
                                              Kerjasama</P>
                                            <div class="input-group ">
                                              <span class="input-group-text"><i data-feather="layers"></i></span>
                                              <input type="text" id="fak_nama" class="form-control"
                                                value="<?php echo $hasil['fak_nama'];?>" name="fak_nama" readonly />
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
                                            <P class="form-label" for="first-name-icon">Jenis Dokumen
                                              Kerjasama</P>
                                            <div class="input-group mb-1">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather='link'></i></span>
                                              </div>

                                              <input type="text" class="form-control"
                                                value="<?php echo $hasil['jenis_dok']?>" readonly />
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
                                              <input type="text" class="form-control"
                                                value="<?php echo $hasil['judul_kerjasama']?>" readonly />
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-12">
                                          <div class="mb-1">
                                            <P class="form-label" for="deskripsi_kerjasama">Deskripsi
                                              Kerjasama</P>
                                            <div class="input-group ">
                                              <span class="input-group-text"><i data-feather="calendar"></i></span>
                                              <input type="text" id="deskripsi_kerjasama" class="form-control"
                                                value="<?php echo $hasil ['deskripsi_kerjasama'];?>"
                                                name="deskripsi_kerjasama" readonly />
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-12">
                                          <div class="mb-1">
                                            <P class="form-label" for="tanggal_akhir">No Ref Kerjasama</P>
                                            <div class="input-group ">
                                              <span class="input-group-text"><i data-feather='map-pin'></i></span>
                                              <input type="text" id="no_ref_kerjasama" class="form-control"
                                                value="<?php echo $hasil ['no_ref_kerjasama'];?>"
                                                name="no_ref_kerjasama" readonly />
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-12">
                                          <div class="mb-1">
                                            <P class="form-label" for="tanggal_akhir">Tanggal Input</P>
                                            <div class="input-group ">
                                              <span class="input-group-text"><i data-feather='pen-tool'></i></span>
                                              <input type="text" id="date_created" class="form-control"
                                                value="<?php echo $hasil ['date_created'];?>" name="date_created"
                                                readonly />
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-12">
                                          <div class="mb-1">
                                            <P class="form-label" for="fak_nama">File Dokumen
                                              Kerjasama</P>
                                            <div class="input-group ">
                                              <span class="input-group-text"><i data-feather="file"></i></span>
                                              <input type="text" id="file" class="form-control"
                                                value="<?php echo $hasil['file'];?>" name="file" readonly />
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
                          <?php 
                              }
                              //mysql_close($host);
                              ?>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END MODAL VIEw -->


                <!-- MODAL EDIT -->
                <div class="modal fade text-left" id="edit<?php echo $hasil['id_kerjasama']; ?>" role="dialog"
                  aria-labelledby="myModalLabel16" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel16">View Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <?php
                              $id = $hasil['id_kerjasama']; 
                              $query_edit = mysqli_query($kon, "SELECT
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
                              LEFT JOIN unit c ON c.id_unit= a.id_unit WHERE id_kerjasama='$id'");
                              while ($row = mysqli_fetch_array($query_edit)) {  
                              ?>
                        <form action="kerjasama_proses_edit.php" method="post" enctype="multipart/form-data"
                          id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
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
                                            <P class="form-label" for="first-name-icon">Status</P>
                                            <div class="input-group mb-1">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="pocket"></i></span>
                                              </div>
                                              <div class="col-md-10">
                                                <select class="select2 form-select form-control" name="status_kerjasama"
                                                  required>
                                                  <option readonly>-- Pilih Status Kerjasama --
                                                  </option>
                                                  <option>
                                                    Aktif
                                                  </option>
                                                  <option>
                                                    Tidak Aktif
                                                  </option>
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-12">
                                          <div class="mb-1">
                                            <P class="form-label" for="tanggal_awal">Tanggal
                                              Awal</P>
                                            <div class="input-group ">
                                              <span class="input-group-text"><i data-feather="calendar"></i></span>
                                              <input type="date" id="tanggal_awal" class="form-control"
                                                value="<?php echo $hasil ['tanggal_awal'];?>" name="tanggal_awal" />
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-12">
                                          <div class="mb-1">
                                            <P class="form-label" for="tanggal_akhir">Tanggal
                                              Akhir</P>
                                            <div class="input-group ">
                                              <span class="input-group-text"><i data-feather="calendar"></i></span>
                                              <input type="date" id="tanggal_akhir" class="form-control"
                                                value="<?php echo $hasil ['tanggal_akhir'];?>" name="tanggal_akhir" />
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-12">
                                          <div class="mb-1">
                                            <p>Fakultas Penggiat Kerjasama</p>
                                            <!-- <p class="form-p" for="first-name-icon">Status</p> -->
                                            <div class="input-group input-group-merge">
                                              <span class="input-group-text"><i data-feather='link'></i></span>
                                              <div class="col-lg-10">
                                                <select class="form-control select2" name="id_fak" style="width: 100%;">
                                                  <option value="" selected="selected">-- Fakultas Penggiat --
                                                  </option>
                                                  <?php
                                                  $no = 1;
                                                  $query = "SELECT * FROM fakultas ORDER BY id_fak ASC";
                                                  $qry = mysqli_query($kon, $query);
                                                  while ($row = mysqli_fetch_array($qry)) {
                                                  ?>
                                                  <option value="<?php echo $row['id_fak'] ?>">
                                                    <?php echo $no++  ." | ". $row['fak_nama']; ?>
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
                                            <p>Fakultas Penggiat Kerjasama</p>
                                            <!-- <p class="form-p" for="first-name-icon">Status</p> -->
                                            <div class="input-group input-group-merge">
                                              <span class="input-group-text"><i data-feather='link'></i></span>
                                              <div class="col-lg-10">
                                                <select class="form-control select2" name="id_unit"
                                                  style="width: 100%;">
                                                  <option value="" selected="selected">-- Unit Penggiat --
                                                  </option>
                                                  <?php
                                                  $no = 1;
                                                  $query = "SELECT * FROM unit ORDER BY id_unit ASC";
                                                  $qry = mysqli_query($kon, $query);
                                                  while ($row = mysqli_fetch_array($qry)) {
                                                  ?>
                                                  <option value="<?php echo $row['id_unit'] ?>">
                                                    <?php echo $no++  ." | ". $row['unit_nama']; ?>
                                                  </option>
                                                  <?php
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
                                                <select class="form-control select2" name="id_jenis_dok"
                                                  style="width: 100%;">
                                                  <option value="" selected="selected">--- Pilih Jenis Dokumen Kerjasama
                                                    ---</option>
                                                  <?php
                                                  $no = 1;
                                                  $query = "SELECT * FROM jenis_dok ORDER BY jenis_dok";
                                                  $q = mysqli_query($kon, $query);
                                                  while ($row = mysqli_fetch_array($q)) {
                                                  ?>
                                                  <option value="<?php echo $row['id_jenis_dok'] ?>">
                                                    <?php echo $no++  ." | ". $row['jenis_dok']; ?>
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
                                              <input type="text" class="form-control" name="judul_kerjasama"
                                                value="<?php echo $hasil['judul_kerjasama']?>" />
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-12">
                                          <div class="mb-1">
                                            <P class="form-label" for="deskripsi_kerjasama">Deskripsi
                                              Kerjasama</P>
                                            <div class="input-group ">
                                              <span class="input-group-text"><i data-feather="calendar"></i></span>
                                              <input type="text" id="deskripsi_kerjasama" class="form-control"
                                                value="<?php echo $hasil ['deskripsi_kerjasama'];?>"
                                                name="deskripsi_kerjasama" />
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-12">
                                          <div class="mb-1">
                                            <P class="form-label" for="tanggal_akhir">No Ref Kerjasama</P>
                                            <div class="input-group ">
                                              <span class="input-group-text"><i data-feather='map-pin'></i></span>
                                              <input type="text" id="no_ref_kerjasama" class="form-control"
                                                value="<?php echo $hasil ['no_ref_kerjasama'];?>"
                                                name="no_ref_kerjasama" />
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
                                              <input type="file" name="file" class="form-control-file"
                                                id="basicInputFile" />
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
                            <button type="submit" class="btn btn-info mr-1 btn-sm" name="update"
                              value="Update">Simpan</button>
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
                <!-- END MODAL EDIT -->

                <!-- MODAL HAPUS -->
                <div id="deleteEmployeeModal<?php echo $hasil['id_kerjasama']; ?>" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form method="post" action="kerjasama_proses.php">
                        <?php
                          $id = $hasil['id_kerjasama']; 
                          $hapus = mysqli_query($kon, "SELECT * FROM kerjasama WHERE id_kerjasama='$id'");
                          //$result = mysqli_query($conn, $query);
                          while ($row = mysqli_fetch_array($hapus)) {  
                          ?>
                        <input type="hidden" class="form-control" value="<?php echo $hasil['id_kerjasama']; ?>"
                          name="id_kerjasama" required>

                        <div class="modal-header">
                          <h4 class="modal-title">Delete</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                          <p>Apakah Kamu akan menghapus Kerjasama <?php echo $hasil['judul_kerjasama']; ?>?</p>
                        </div>
                        <div class="col-sm-12 offset-sm-12 modal-footer">
                          <button type="submit" class="btn btn-danger mr-1 btn-sm" name="delete">Hapus</button>
                          <button type="submit" class="btn btn-info mr-1 btn-sm" name="hapus" value="Batal"
                            data-dismiss="modal">Batal</button>
                        </div>
                        <?php 
                            }
                            //mysql_close($host);
                            ?>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- END MODAL HAPUS -->
                <?php               
									} 
									?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>
  <?php include "footer.php";?>
  <script>
  $(document).ready(function() {
    $(".select2").select2();
  });
  </script>
  </body>

  </html>
