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
							<h4 class="card-title">Data Unit</h4>
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
													<th>Kode Unit</th>
													<th>Nama Unit</th>
													<th>Tanggal dibuat</th>
													<th>Tanggal di upadate</th>
													<th style="text-align:center ;">Aksi</th>
											</tr>
									</thead>
										<tbody>
											<?php 
											include "config.php";
											$no = 1;
											$data = mysqli_query($kon, "SELECT * FROM unit ORDER BY unit_nama ASC");
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
														<td><?php echo $hasil ['unit_kode'];?></td>
														<td><?php echo $hasil ['unit_nama'];?></td>
														<td><?php echo $hasil ['date_created'];?></td>
														<td><?php echo $hasil ['date_updated'];?></td>
														<td style="text-align:center ;">
															<a href="#" type="button" class="open_modal btn btn-outline-info round btn-sm" data-toggle="modal" data-target="#edit<?php echo $hasil['id_unit']; ?>">Edit</a> |
															<a href="#" type="button" class="open_modal btn btn-outline-danger round btn-sm" data-toggle="modal" data-target="#deleteEmployeeModal<?php echo $hasil['id_unit']; ?>">Hapus</a>
														</td>
												</tr>
											<!-- MODAL EDIT -->
										<div
												class="modal fade text-left modal-success"
												id="edit<?php echo $hasil['id_unit']; ?>"
												tabindex="-1"
												role="dialog"
												aria-labelledby="myModalLabel110"
												aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
																<h5 class="modal-title" id="myModalLabel110">Edit Unit</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																</button>
														</div>
															<div class="modal-body">
																<form class="form form-horizontal" action="unit_act.php" method="POST">
																<?php
																	$id = $hasil['id_unit']; 
																	$query_edit = mysqli_query($kon, "SELECT * FROM unit WHERE id_unit='$id'");
																	while ($row = mysqli_fetch_array($query_edit)) {  
																	?>
																	<input type="hidden" name="id_unit" value="<?= $row['id_unit']?>">
																		<div class="row">
																			<div class="col-12">
																					<div class="form-group row">
																							<div class="col-sm-3 col-form-label">
																									<label for="unit_nama">Nama Unit</label>
																							</div>
																							<div class="col-sm-9">
																									<div class="input-group input-group-merge">
																											<div class="input-group-prepend">
																													<span class="input-group-text">
																															<i data-feather="git-pull-request"></i>
																													</span>
																											</div>
																											<input
																													type="text"
																													class="form-control"
																													name="unit_nama" value="<?= $row['unit_nama']?>"
																													placeholder="Isikan dengan nama Unit"/>
																									</div>
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-sm-3 col-form-label">
																									<label for="unit_kode">Kode Unit</label>
																							</div>
																							<div class="col-sm-9">
																									<div class="input-group input-group-merge">
																											<div class="input-group-prepend">
																													<span class="input-group-text">
																															<i data-feather="git-pull-request"></i>
																													</span>
																											</div>
																											<input
																													type="text"
																													class="form-control"
																													name="unit_kode" value="<?= $row['unit_kode']?>"
																													placeholder="Isikan dengan nama Unit"/>
																									</div>
																							</div>
																					</div>
																					<div class="form-group row">
																							<div class="col-sm-3 col-form-label">
																									<label for="date_created">Tanggal diBuat</label>
																							</div>
																							<div class="col-sm-9">
																									<div class="input-group input-group-merge">
																											<div class="input-group-prepend">
																													<span class="input-group-text">
																															<i data-feather="git-pull-request"></i>
																													</span>
																											</div>
																											<input
																													type="text"
																													class="form-control"
																													name="date_created" value="<?= $row['date_created']?>"
																													disabled/>
																									</div>
																							</div>
																					</div>
																			</div>
																				<div class="col-sm-9 offset-sm-3">
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
									<div id="deleteEmployeeModal<?php echo $hasil['id_unit']; ?>" class="modal fade">
										<div class="modal-dialog">
											<div class="modal-content">
											<form method="post" action="unit_act.php">
											<?php
												$id = $hasil['id_unit']; 
												$query_edit = mysqli_query($kon, "SELECT * FROM unit WHERE id_unit='$id'");
												//$result = mysqli_query($conn, $query);
												while ($row = mysqli_fetch_array($query_edit)) {  
												?>
												<input type="hidden" class="form-control" value="<?php echo $hasil['id_unit']; ?>" name="id_unit" required>
												
													<div class="modal-header">
														<h4 class="modal-title">Delete</h4>
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													</div>
													<div class="modal-body">
														<p>Apakah Kamu akan menghapus Data Unit <?php echo $hasil['unit_nama']; ?>?</p>
													</div>
													<div class="modal-footer">
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
						<h5 class="modal-title" id="myModalLabel110">Tambah Unit</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
						</button>
				</div> 
				<div class="modal-body">
					<form class="form form-horizontal" action="unit_act.php" method="POST">
						<div class="row">
							<div class="col-12">
								<div class="form-group row">
										<div class="col-sm-3 col-form-label">
												<label for="unit_nama">Nama Unit</label>
										</div>
										<div class="col-sm-9">
												<div class="input-group input-group-merge">
														<div class="input-group-prepend">
																<span class="input-group-text">
																		<i data-feather="git-pull-request"></i>
																</span>
														</div>
														<input
																type="text"
																id="unit_nama"
																class="form-control"
																name="unit_nama"
																placeholder="Isikan dengan nama Unit"/>
												</div>
										</div>
								</div>
								<div class="form-group row">
										<div class="col-sm-3 col-form-label">
												<label for="unit_kode">Kode Unit</label>
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
																id="unit_kode"
																class="form-control"
																name="unit_kode"
																placeholder="Isikan dengan kode Unit"/>
												</div>
										</div>
								</div>
							</div>
							<div class="col-sm-9 offset-sm-3">
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