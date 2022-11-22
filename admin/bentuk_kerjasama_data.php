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
							<h4 class="card-title">Jenis Dokumen Kerjasama</h4>
							<button
									type="button"
									class="btn btn-outline-success round btn-sm"
									data-toggle="modal"
									data-target="#add">Tambah</button>
						</div>
							<div class="card-body table-responsive">
								<table id="dataTables" class="table table-striped">
									<thead>
											<tr>
													<th>No</th>
													<th>Bentuk Kerjasama</th>
													<th>Tgl Dibuat</th>
													<th>Tgl DiUpdate</th>
													<th style="text-align:center;">Aksi</th>
											</tr>
									</thead>
										<tbody>
											<?php 
											include "config.php";
											$no = 1;
											$data = mysqli_query($kon, "SELECT * FROM bentuk_kerjasama ORDER BY bkerja_nama ASC");
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
														<td><?php echo $hasil ['bkerja_nama'];?></td>
														<td><?php echo $hasil ['date_created'];?></td>
														<td><?php echo $hasil ['date_updated'];?></td>
														<td style="text-align:center ;">
															<a href="#" type="button" class="open_modal btn btn-outline-info round btn-sm" data-toggle="modal" data-target="#edit<?php echo $hasil['id_bkerja']; ?>">Edit</a> |
                              <a href="#" type="button" class="open_modal btn btn-outline-danger round btn-sm" data-toggle="modal" data-target="#deleteEmployeeModal<?php echo $hasil['id_bkerja']; ?>">Hapus</a>
														</td>
												</tr>

                        <!-- MODAL EDIT -->
                        <div class="modal-size-lg d-inline-block">
                        <div class="modal fade text-left" id="edit<?php echo $hasil['id_jenis_dok']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
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
                                        <?php
                                          $id = $hasil['id_jenis_dok']; 
                                          $query_edit = mysqli_query($kon, "SELECT * FROM jenis_dok WHERE id_jenis_dok='$id'");
                                          while ($row = mysqli_fetch_array($query_edit)) {  
                                          ?>
                                          <input type="hidden" name="id_jenis_dok" value="<?= $row['id_jenis_dok']?>">
                                            <div class="row">
                                              <div class="col-12">
                                              <div class="form-group row">
                                              <div class="col-sm-3 col-form-label">
                                                  <label for="jenis_dok"><strong>Jenis Dokumen </strong></label>
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
                                                          id="jenis_dok"
                                                          class="form-control"
                                                          name="jenis_dok"
                                                          placeholder="Isikan dengan nama Jenis Dokumen Kerjasama" value="<?= $row['jenis_dok']?>"/>
                                                  </div>
                                              </div>
                                              </div>
                                              <div class="form-group row">
                                                  <div class="col-sm-3 col-form-label">
                                                      <label for="jenis_ket"><strong> Keterangan </strong></label>
                                                  </div>
                                                  <div class="col-sm-9">
                                                      <div class="input-group input-group">
                                                        <textarea class="form-control" id="" name="jenis_ket" colspan="4" rows="3" placeholder="Keterangan Jenis Dokumen Kerjasama"><?= $row['jenis_ket']?>
                                                      </textarea>
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
                            <div id="deleteEmployeeModal<?php echo $hasil['id_bkerja']; ?>" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                <form method="post" action="jenis_dok_act.php">
                                <?php
                                  $id = $hasil['id_jenis_dok']; 
                                  $query_edit = mysqli_query($kon, "SELECT * FROM jenis_dok WHERE id_jenis_dok='$id'");
                                  //$result = mysqli_query($conn, $query);
                                  while ($row = mysqli_fetch_array($query_edit)) {  
                                  ?>
                                  <input type="hidden" class="form-control" value="<?php echo $hasil['id_jenis_dok']; ?>" name="id_jenis_dok" required>
                                  
                                    <div class="modal-header">
                                      <h4 class="modal-title">Delete</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                      <p>Apakah Kamu akan menghapus Jenis Dokumen <?php echo $hasil['jenis_dok']; ?>?</p>
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
                              <input
                                  type="text"
                                  id="jenis_dok"
                                  class="form-control"
                                  name="jenis_dok"
                                  placeholder="Isi dengan Nama Jenis Dokumen Kerjasama"/>
                          </div>
                      </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-sm-3 col-form-label">
                              <label for="jenis_ket"><strong> Keterangan </strong></label>
                          </div>
                          <div class="col-sm-9">
                              <div class="input-group input-group">
                                <textarea class="form-control" id="" name="jenis_ket" colspan="4" rows="3" placeholder="Keterangan Jenis Dokumen">
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