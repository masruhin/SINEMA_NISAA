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
            <h4 class="card-title">Repository Kerjasama</h4>
            <a href="kerjasama_form_add.php" type="button" class="btn btn-outline-success round btn-sm">Tambah</a>
          </div>
          <div class="card-body table-responsive">
            <table id="dataTables" class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jenis</th>
                  <th>Judul</th>
                  <th>Deskripsi</th>
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
                  <td><?php echo $hasil ['deskripsi_kerjasama'];?></td>
                  <td><?php echo $hasil ['status_kerjasama'];?></td>
                  <td><?php echo $hasil ['tanggal_awal'];?> <strong style="color:red ;">s/d</strong>
                    <?php echo $hasil ['tanggal_akhir'];?>
                  </td>
                  <td><span
                      class="badge badge-pill badge-light-success mr-1 lg"><?php echo $hasil ['status_kerjasama'];?></span>
                  </td>
                  <td><?php echo $hasil ['date_created'];?></td>
                  <td style="text-align:center ;">
                    <a href="#" type="button" class="open_modal btn btn-outline-secondary round btn-sm"
                      data-toggle="modal" data-target="#view<?php echo $hasil['id_kerjasama']; ?>"
                      data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat"><i data-feather="eye"></i></a>
                    <a href="#" type="button" class="open_modal btn btn-outline-danger round btn-sm" data-toggle="modal"
                      data-target="#edit<?php echo $hasil['id_jenis_dok']; ?>" data-bs-toggle="tooltip"
                      data-bs-placement="top" title="Hapus"><i data-feather="trash"></i></a>
                    <a href="#" type="button" class="open_modal btn btn-outline-info round btn-sm" data-toggle="modal"
                      data-target="#deleteEmployeeModal<?php echo $hasil['id_jenis_dok']; ?>" data-bs-toggle="tooltip"
                      data-bs-placement="top" title="Edit"><i data-feather="edit"></i></a>
                  </td>
                </tr>

                <!-- MODAL EDIT -->
                <div class="modal-size-lg d-inline-block">
                  <div class="modal fade text-left" id="view<?php echo $hasil['id_kerjasama']; ?>" tabindex="-1"
                    role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="myModalLabel110">View Data</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="form form-horizontal" action="bentuk_kerjasama_act.php" method="POST">
                            <?php
                                          $id = $hasil['id_kerjasama']; 
                                          $query_edit = mysqli_query($kon, "SELECT
                                          a.id_kerjasama,
                                          b.id_jenis_dok,
                                          b.jenis_dok,
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
                                          LEFT JOIN unit c ON c.id_unit= a.id_unit ORDER BY id_kerjasama asc");
                                          while ($row = mysqli_fetch_array($query_edit)) {  
                                          ?>
                            <input type="hidden" name="id_kerjasama" value="<?= $row['id_kerjasama']?>">
                            <div class="row">
                              <div class="col-12">
                                <div class="col-lg-6 col-md-6">
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
                                              <label class="form-label" for="tanggal_awal">Tanggal
                                                Awal</label>
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
                                              <label class="form-label" for="tanggal_akhir">Tanggal
                                                Akhir</label>
                                              <div class="input-group ">
                                                <span class="input-group-text"><i data-feather="calendar"></i></span>
                                                <input type="date" id="tanggal_awal" class="form-control"
                                                  value="<?php echo $hasil ['tanggal_akhir'];?>" name="tanggal_awal"
                                                  readonly />
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
  <script type="text/javascript">

  </script>
  </body>

  </html>







  <?php 
include_once "header.php";
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
              <?php if (isset($_GET['pesan'])) { ?>
              <?php if ($_GET['pesan'] == "berhasil") { ?>
              <div class="alert alert-primary" role="alert">
                Berhasil Menambahkan Data Siswa
              </div>
              <?php }elseif ($_GET['pesan'] == "gagal") { ?>
              <div class="alert alert-danger" role="alert">
                Gagal Menambahkan Data Siswa
              </div>
              <?php }elseif ($_GET['pesan'] == "ekstensi") { ?>
              <div class="alert alert-warning" role="alert">
                Ekstensi File Harus PNG Dan JPG
              </div>
              <?php }elseif ($_GET['pesan'] == "size") { ?>
              <div class="alert alert-warning" role="alert">
                Size File Tidak Boleh Lebih Dari 2 MB
              </div>
              <?php } ?>
              <?php } ?>
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
                          <form class="form form-horizontal" action="jenis_dok_act.php" method="POST">
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
                                                  <select class="select2 form-select form-control"
                                                    name="status_kerjasama" required>
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
                                                <input type="date" id="tanggal_awal" class="form-control"
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
                                                  <select class="form-control select2" name="id_fak"
                                                    style="width: 100%;">
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
                                                    <option value="" selected="selected">--- Pilih Jenis Dokumen
                                                      Kerjasama
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
                                              <P class="form-label" for="fak_nama">File Dokumen
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
                              <button type="submit" class="btn btn-info mr-1 btn-sm" name="ubah">Simpan</button>
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
                  <div id="deleteEmployeeModal<?php echo $hasil['id_jenis_dok']; ?>" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form method="post" action="jenis_dok_act.php">
                          <?php
                          $id = $hasil['id_jenis_dok']; 
                          $query_edit = mysqli_query($kon, "SELECT * FROM jenis_dok WHERE id_jenis_dok='$id'");
                          //$result = mysqli_query($conn, $query);
                          while ($row = mysqli_fetch_array($query_edit)) {  
                          ?>
                          <input type="hidden" class="form-control" value="<?php echo $hasil['id_jenis_dok']; ?>"
                            name="id_jenis_dok" required>

                          <div class="modal-header">
                            <h4 class="modal-title">Delete</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          </div>
                          <div class="modal-body">
                            <p>Apakah Kamu akan menghapus Jenis Dokumen <?php echo $hasil['jenis_dok']; ?>?</p>
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


    <!-- Modal ADD-->
    <div class="modal-size-lg d-inline-block">
      <div class="modal fade text-left" id="add" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel110">Tambah Data Jenis Dokumen Kerjasama</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form form-horizontal" action="jenis_dok_act.php" method="POST">
                <div class="row">
                  <div class="col-12">
                    <div div class="form-group row">
                      <div class="col-sm-3 col-form-label">
                        <label for="jenis_dok"><strong>Jenis Dokumen </strong></label>
                      </div>
                      <div class="col-sm-9">
                        <div class="input-group input-group-merge">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i data-feather="terminal"></i>
                            </span>
                          </div>
                          <input type="text" id="jenis_dok" class="form-control" name="jenis_dok"
                            placeholder="Isi dengan Nama Jenis Dokumen Kerjasama" />
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-3 col-form-label">
                        <label for="jenis_ket"><strong> Keterangan </strong></label>
                      </div>
                      <div class="col-sm-9">
                        <div class="input-group input-group">
                          <textarea class="form-control" id="" name="jenis_ket" colspan="4" rows="3"
                            placeholder="Keterangan Jenis Dokumen">
                              </textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12 offset-sm-12 modal-footer">
                    <button type="submit" class="btn btn-info mr-1 btn-sm" name="tambah">Simpan</button>
                    <button type="reset" class="btn btn-outline-danger btn-sm">Reset</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal ADD-->


    <div class="row match-height">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Data Situs Instansi</h4>
            <button type="button" class="btn btn-outline-success round btn-sm" data-toggle="modal"
              data-target="#tambah_data">Tambah</button>
          </div>
          <div class="card-body table-responsive">
            <table id="dataTables" class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Instansi</th>
                  <th>Situs Instansi</th>
                  <!-- <th>TGL DIBUAT</th>
                <th>TGL DIUBAH</th> -->
                  <th style="text-align:center ;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
											include "config.php";
											$no = 1;
											$data = mysqli_query($kon, "SELECT * FROM instansi ORDER BY situs_nama ASC");
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
                  <td><?php echo $hasil ['instansi_nama'];?></td>
                  <td style="color: blue;"> <a href=""><?php echo $hasil ['situs_nama'];?></a> </td>
                  <!-- <td><?php echo $hasil ['date_created'];?></td>
                <td><?php echo $hasil ['date_updated'];?></td> -->
                  <td style="text-align:center ;">
                    <a href="#" type="button" class="open_modal btn btn-outline-info round btn-sm" data-toggle="modal"
                      data-target="#edit<?php echo $hasil['id_instansi']; ?>">Edit</a> |
                    <a href="#" type="button" class="open_modal btn btn-outline-danger round btn-sm" data-toggle="modal"
                      data-target="#hapusinstansi<?php echo $hasil['id_instansi']; ?>">Hapus</a>
                  </td>
                </tr>

                <!-- MODAL EDIT -->
                <div class="modal fade text-left modal-success" id="edit<?php echo $hasil['id_instansi']; ?>"
                  tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel110">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="form form-horizontal" action="instansi_act.php" method="POST">
                          <?php
                          $id = $hasil['id_instansi']; 
                          $query_edit = mysqli_query($kon, "SELECT * FROM instansi WHERE id_instansi='$id'");
                          while ($row = mysqli_fetch_array($query_edit)) {  
                          ?>
                          <input type="hidden" name="id_instansi" value="<?= $row['id_instansi']?>">
                          <div class="row">
                            <div class="col-12">
                              <div div class="form-group row">
                                <div class="col-sm-4 col-form-label">
                                  <label for="instansi_nama"><strong>Nama Instansi</strong></label>
                                </div>
                                <div class="col-sm-8">
                                  <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i data-feather="terminal"></i>
                                      </span>
                                    </div>
                                    <input type="text" id="instansi_nama" class="form-control" name="instansi_nama"
                                      placeholder="Isikan dengan Nama Instansi / Perusahaan"
                                      value="<?= $row['instansi_nama']?>" />
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-sm-4 col-form-label">
                                  <label for="situs_nama"><strong>Nama Situs Website
                                    </strong></label>
                                </div>
                                <div class="col-sm-8">
                                  <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i data-feather="layers"></i>
                                      </span>
                                    </div>
                                    <input type="text" id="situs_nama" class="form-control" name="situs_nama"
                                      placeholder="Isikan dengan nama Situs" value="<?= $row['situs_nama']?>" />
                                  </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <div class="col-sm-4 col-form-label">
                                  <label for="date_created"><strong> Tgl diBuat </strong></label>
                                </div>
                                <div class="col-sm-8">
                                  <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i data-feather="phone-call"></i>
                                      </span>
                                    </div>
                                    <input type="text" id="date_created" class="form-control" name="date_created"
                                      placeholder="tanggal dibuat" value="<?= $row['date_created']?>" disabled />
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
                <!-- END MODAL EDIT -->

                <!-- MODAL HAPUS -->
                <div id="hapusinstansi<?php echo $hasil['id_instansi']; ?>" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form method="post" action="instansi_act.php">
                        <?php
                        $id = $hasil['id_instansi']; 
                        $query_edit = mysqli_query($kon, "SELECT * FROM instansi WHERE id_instansi='$id'");
                        //$result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>
                        <input type="hidden" class="form-control" value="<?php echo $hasil['id_instansi']; ?>"
                          name="id_instansi" required>

                        <div class="modal-header">
                          <h4 class="modal-title">Delete</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                          <p>Apakah Kamu akan menghapus Situs Instansi <?php echo $hasil['instansi_nama']; ?>?</p>
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

  <!-- MODAL ADD -->
  <div class="modal fade text-left modal-success" id="tambah_data" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel110" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel110"><strong>Tambah Data</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form form-horizontal" action="instansi_act.php" method="POST">
            <div class="row">
              <div class="col-12">
                <div div class="form-group row">
                  <div class="col-sm-4 col-form-label">
                    <label for="instansi_nama"><strong>Nama Instansi</strong></label>
                  </div>
                  <div class="col-sm-8">
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i data-feather="terminal"></i>
                        </span>
                      </div>
                      <input type="text" id="instansi_nama" class="form-control" name="instansi_nama"
                        placeholder="Isikan dengan " />
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-4 col-form-label">
                    <label for="situs_nama"><strong>Nama Situs Website </strong></label>
                  </div>
                  <div class="col-sm-8">
                    <div class="input-group input-group-merge">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i data-feather="layers"></i>
                        </span>
                      </div>
                      <input type="text" id="situs_nama" class="form-control" name="situs_nama"
                        placeholder="Isikan dengan nama Situs" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 offset-sm-12 modal-footer">
                <button type="submit" class="btn btn-info mr-1 btn-sm" name="tambah">Simpan</button>
                <button type="reset" class="btn btn-outline-danger btn-sm">Reset</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- END MODAL ADD -->

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
