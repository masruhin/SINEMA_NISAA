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
