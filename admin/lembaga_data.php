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
							<h4 class="card-title">Data Lembaga</h4>
                <button type="button" class="btn btn-outline-success round btn-sm" data-toggle="modal" data-target="#add">
                  <strong>Tambah</strong>
                </button>
						</div>
							<div class="card-body table-responsive">
								<table id="dataTables" class="table table-striped">
									<thead>
											<tr>
													<th>No</th>
													<th>KODE LEMBAGA</th>
													<th>NAMA LEMBAGA</th>
													<th>KETERANGAN</th>
													<th>TGL DIBUAT</th>
													<th>TGL DIUBAH</th>
													<th style="text-align:center;">Aksi</th>
											</tr>
									</thead>
										<tbody>
											<?php 
											include "config.php";
											$no = 1;
											$data = mysqli_query($kon, "SELECT * FROM lembaga ORDER BY lembaga_nama ASC");
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
														<td><?php echo $hasil ['lembaga_kode'];?></td>
														<td><?php echo $hasil ['lembaga_nama'];?></td>
														<td><?php echo $hasil ['lembaga_ket'];?></td>
														<td><?php echo $hasil ['date_created'];?></td>
														<td><?php echo $hasil ['date_updated'];?></td>
														<td style="text-align:center ;">
                                                            <a href="#" type="button" class="open_modal btn btn-outline-info round btn-sm" data-toggle="modal" data-target="#edit<?php echo $hasil['id_lembaga']; ?>">Edit</a> |
                                                            <a href="#" type="button" class="open_modal btn btn-outline-danger round btn-sm" data-toggle="modal" data-target="#deleteEmployeeModal<?php echo $hasil['id_lembaga']; ?>">Hapus</a>
														</td>
												</tr>

                        <!-- MODAL EDIT -->
                        <div class="modal-size-lg d-inline-block">
                        <div class="modal fade text-left" id="edit<?php echo $hasil['id_lembaga']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel110">Tambah Data Lembaga</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">
                                  <form class="form form-horizontal" action="lembaga_act.php" method="POST">
                                  <?php
                                    $id = $hasil['id_lembaga']; 
                                    $query_edit = mysqli_query($kon, "SELECT * FROM lembaga WHERE id_lembaga='$id'");
                                    while ($row = mysqli_fetch_array($query_edit)) {  
                                    ?>
                                    <input type="hidden" name="id_lembaga" value="<?= $row['id_lembaga']?>">
                                      <div class="row">
                                        <div class="col-12">
                                        <div div class="form-group row">
                                        <div class="col-sm-4 col-form-label">
                                            <label for="lembaga_kode"><strong>Kode Lembaga </strong></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i data-feather="terminal"></i>
                                                    </span>
                                                </div>
                                                <input
                                                    type="text"
                                                    id="lembaga_kode"
                                                    class="form-control"
                                                    name="lembaga_kode"
                                                    placeholder="Isikan dengan nama Lembaga" value="<?= $row['lembaga_kode']?>"/>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                        <div class="col-sm-4 col-form-label">
                                            <label for="lembaga_nama"><strong>Nama Lembaga </strong></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i data-feather="layers"></i>
                                                    </span>
                                                </div>
                                                <input
                                                    type="text"
                                                    id="lembaga_nama"
                                                    class="form-control"
                                                    name="lembaga_nama"
                                                    placeholder="Isikan dengan nama Lembaga" value="<?= $row['lembaga_nama']?>"/>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 col-form-label">
                                                <label for="lembaga_ket"><strong> Keterangan </strong></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group input-group">
                                                  <textarea class="form-control" id="" name="lembaga_ket" colspan="4" rows="3" placeholder="Keterangan Lembaga"><?= $row['lembaga_ket']?>
                                                </textarea>
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
                                                    <input
                                                        type="text"
                                                        id="date_created"
                                                        class="form-control"
                                                        name="date_created"
                                                        placeholder="tanggal dibuat" value="<?= $row['date_created']?>" disabled/>
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
                        <!-- END MODAL EDIT -->

                        <!-- MODAL HAPUS -->
                            <div id="deleteEmployeeModal<?php echo $hasil['id_lembaga']; ?>" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                <form method="post" action="Lembaga_act.php">
                                <?php
                                  $id = $hasil['id_lembaga']; 
                                  $query_edit = mysqli_query($kon, "SELECT * FROM Lembaga WHERE id_lembaga='$id'");
                                  //$result = mysqli_query($conn, $query);
                                  while ($row = mysqli_fetch_array($query_edit)) {  
                                  ?>
                                  <input type="hidden" class="form-control" value="<?php echo $hasil['id_lembaga']; ?>" name="id_lembaga" required>
                                  
                                    <div class="modal-header">
                                      <h4 class="modal-title">Delete</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                      <p>Apakah Kamu akan menghapus Lembaga <?php echo $hasil['lembaga_nama']; ?>?</p>
                                    </div>
                                    <div class="col-sm-12 offset-sm-12 modal-footer">
                                    <button type="submit" class="btn btn-danger mr-1 btn-sm" name="delete">Hapus</button>
                                    <button type="submit" class="btn btn-info mr-1 btn-sm" name="hapus" value="Batal" data-dismiss="modal">Batal</button>
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
<div class="modal fade text-left" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel110">Tambah Data Lembaga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
				<div class="modal-body">
					<form class="form form-horizontal" action="lembaga_act.php" method="POST">
						<div class="row">
							<div class="col-12">
							<div div class="form-group row">
                      <div class="col-sm-3 col-form-label">
                          <label for="lembaga_kode"><strong>Kode Lembaga </strong></label>
                      </div>
                      <div class="col-sm-9">
                          <div class="input-group input-group-merge">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i data-feather="terminal"></i>
                                  </span>
                              </div>
                              <input
                                  type="text"
                                  id="lembaga_kode"
                                  class="form-control"
                                  name="lembaga_kode"
                                  placeholder="Isikan dengan Kode Lembaga"/>
                          </div>
                      </div>
                      </div>
											<div class="form-group row">
                      <div class="col-sm-3 col-form-label">
                          <label for="lembaga_nama"><strong>Nama Lembaga </strong></label>
                      </div>
                      <div class="col-sm-9">
                          <div class="input-group input-group-merge">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i data-feather="layers"></i>
                                  </span>
                              </div>
                              <input
                                  type="text"
                                  id="lembaga_nama"
                                  class="form-control"
                                  name="lembaga_nama"
                                  placeholder="Isikan dengan nama Lembaga"/>
                          </div>
                      </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-sm-3 col-form-label">
                              <label for="lembaga_ket"><strong> Keterangan </strong></label>
                          </div>
                          <div class="col-sm-9">
                              <div class="input-group input-group">
                                <textarea class="form-control" id="" name="lembaga_ket" colspan="4" rows="3" placeholder="Keterangan Lembaga">
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
		<div class="sidenav-overlay"></div>
		<div class="drag-target"></div>
		<?php include "footer.php";?>
		<script type="text/javascript">

		</script>
</body>
</html>