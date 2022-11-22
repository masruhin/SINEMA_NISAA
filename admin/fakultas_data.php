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
							<h4 class="card-title">Data Fakultas</h4>
							<button
									type="button"
									class="btn btn-outline-success round btn-sm"
									data-toggle="modal"
									data-target="#tambah_data">Tambah</button>
						</div>
							<div class="card-body table-responsive">
								<table id="dataTables" class="table table-striped">
									<thead>
											<tr>
													<th>No</th>
													<th>KODE FAKULTAS</th>
													<th>NAMA FAKULTAS</th>
													<th>KETERANGAN</th>
													<th>TGL DIBUAT</th>
													<th>TGL DIUBAH</th>
													<th style="text-align:center ;">Aksi</th>
											</tr>
									</thead>
										<tbody>
											<?php 
											include "config.php";
											$no = 1;
											$data = mysqli_query($kon, "SELECT * FROM fakultas ORDER BY fak_nama ASC");
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
														<td><?php echo $hasil ['fak_kode'];?></td>
														<td><?php echo $hasil ['fak_nama'];?></td>
														<td><?php echo $hasil ['fak_ket'];?></td>
														<td><?php echo $hasil ['date_created'];?></td>
														<td><?php echo $hasil ['date_updated'];?></td>
														<td style="text-align:center ;">
															<a href="#" type="button" class="open_modal btn btn-outline-info round btn-sm" data-toggle="modal" data-target="#edit<?php echo $hasil['id_fak']; ?>">Edit</a> |
                                                            <a href="#" type="button" class="open_modal btn btn-outline-danger round btn-sm" data-toggle="modal" data-target="#deleteEmployeeModal<?php echo $hasil['id_fak']; ?>">Hapus</a>
														</td>
												</tr>

<!-- MODAL EDIT -->
    <div
        class="modal fade text-left modal-success"
        id="edit<?php echo $hasil['id_fak']; ?>"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel110"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel110">Edit Data Fakultas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
              <div class="modal-body">
                <form class="form form-horizontal" action="fakultas_act.php" method="POST">
                <?php
                  $id = $hasil['id_fak']; 
                  $query_edit = mysqli_query($kon, "SELECT * FROM fakultas WHERE id_fak='$id'");
                  while ($row = mysqli_fetch_array($query_edit)) {  
                  ?>
                  <input type="hidden" name="id_fak" value="<?= $row['id_fak']?>">
                    <div class="row">
                      <div class="col-12">
                      <div div class="form-group row">
                      <div class="col-sm-4 col-form-label">
                          <label for="fak_kode"><strong>Kode Fakultas </strong></label>
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
                                  id="fak_kode"
                                  class="form-control"
                                  name="fak_kode"
                                  placeholder="Isikan dengan nama Fakultas" value="<?= $row['fak_kode']?>"/>
                          </div>
                      </div>
                      </div>
											<div class="form-group row">
                      <div class="col-sm-4 col-form-label">
                          <label for="fak_nama"><strong>Nama Fakultas </strong></label>
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
                                  id="fak_nama"
                                  class="form-control"
                                  name="fak_nama"
                                  placeholder="Isikan dengan nama Fakultas" value="<?= $row['fak_nama']?>"/>
                          </div>
                      </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-sm-4 col-form-label">
                              <label for="fak_ket"><strong> Keterangan </strong></label>
                          </div>
                          <div class="col-sm-8">
                              <div class="input-group input-group">
                                <textarea class="form-control" id="" name="fak_ket" colspan="4" rows="3" placeholder="Keterangan Fakultas"><?= $row['fak_ket']?>
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
<!-- END MODAL EDIT -->

<!-- MODAL HAPUS -->
    <div id="deleteEmployeeModal<?php echo $hasil['id_fak']; ?>" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
        <form method="post" action="fakultas_act.php">
        <?php
          $id = $hasil['id_fak']; 
          $query_edit = mysqli_query($kon, "SELECT * FROM fakultas WHERE id_fak='$id'");
          //$result = mysqli_query($conn, $query);
          while ($row = mysqli_fetch_array($query_edit)) {  
          ?>
          <input type="hidden" class="form-control" value="<?php echo $hasil['id_fak']; ?>" name="id_fak" required>
          
            <div class="modal-header">
              <h4 class="modal-title">Delete</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <p>Apakah Kamu akan menghapus Universitas <?php echo $hasil['fak_nama']; ?>?</p>
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

<!-- MODAL ADD -->
<div class="modal fade text-left modal-success"
		id="tambah_data"
		tabindex="-1"
		role="dialog"
		aria-labelledby="myModalLabel110"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
						<h5 class="modal-title" id="myModalLabel110"><strong>Tambah Data Fakultas</strong></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
						</button>
				</div>
				<div class="modal-body">
					<form class="form form-horizontal" action="fakultas_act.php" method="POST">
						<div class="row">
							<div class="col-12">
							<div div class="form-group row">
                      <div class="col-sm-4 col-form-label">
                          <label for="fak_kode"><strong>Kode Fakultas </strong></label>
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
                                  id="fak_kode"
                                  class="form-control"
                                  name="fak_kode"
                                  placeholder="Isikan dengan Kode Fakultas"/>
                          </div>
                      </div>
                      </div>
											<div class="form-group row">
                      <div class="col-sm-4 col-form-label">
                          <label for="fak_nama"><strong>Nama Fakultas </strong></label>
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
                                  id="fak_nama"
                                  class="form-control"
                                  name="fak_nama"
                                  placeholder="Isikan dengan nama Fakultas"/>
                          </div>
                      </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-sm-4 col-form-label">
                              <label for="fak_ket"><strong> Keterangan </strong></label>
                          </div>
                          <div class="col-sm-8">
                              <div class="input-group input-group">
                                <textarea class="form-control" id="" name="fak_ket" colspan="4" rows="3" placeholder="Keterangan Fakultas">
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
<!-- END MODAL ADD -->
					

		<div class="sidenav-overlay"></div>
		<div class="drag-target"></div>
		<?php include "footer.php";?>
		<script type="text/javascript">

		</script>
</body>
</html>