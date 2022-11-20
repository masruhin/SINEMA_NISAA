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
							<h4 class="card-title">Data Universitas</h4>
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
													<th>NAMA UNIVERSITAS</th>
													<th>ALAMAT</th>
													<th>TELPON</th>
													<th>WHATSAPP</th>
													<th>EMAIL</th>
													<th>FAX</th>
													<th>TGL DIBUAT</th>
													<th>TGL DIUBAH</th>
													<th>Aksi</th>
											</tr>
									</thead>
										<tbody>
											<?php 
											include "config.php";
											$no = 1;
											$data = mysqli_query($kon, "SELECT * FROM universitas ORDER BY id_univ ASC");
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
														<td><?php echo $hasil ['univ_nama'];?></td>
														<td><?php echo $hasil ['univ_alamat'];?></td>
														<td><?php echo $hasil ['univ_telp'];?></td>
														<td><?php echo $hasil ['univ_wa'];?></td>
														<td><?php echo $hasil ['univ_email'];?></td>
														<td><?php echo $hasil ['univ_fax'];?></td>
														<td><?php echo $hasil ['date_created'];?></td>
														<td><?php echo $hasil ['date_updated'];?></td>
														<td>
															<a href="#" type="button" class="open_modal btn btn-flat-info btn-sm" data-toggle="modal" data-target="#edit<?php echo $hasil['id_univ']; ?>">Edit</a>
																	<button
																	type="button"
																	class="btn btn-flat-danger btn-sm"
																	data-toggle="modal"
																	data-target="#deleteEmployeeModal<?php echo $hasil['id_univ']; ?>">Hapus</button>
														</td>
												</tr>

<!-- MODAL EDIT -->
    <div
        class="modal fade text-left modal-success"
        id="edit<?php echo $hasil['id_univ']; ?>"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel110"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel110">Edit Data Universitas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
              <div class="modal-body">
                <form class="form form-horizontal" action="universitas_act.php" method="POST">
                <?php
                  $id = $hasil['id_univ']; 
                  $query_edit = mysqli_query($kon, "SELECT * FROM universitas WHERE id_univ='$id'");
                  while ($row = mysqli_fetch_array($query_edit)) {  
                  ?>
                  <input type="hidden" name="id_univ" value="<?= $row['id_univ']?>">
                    <div class="row">
                      <div class="col-12">
                      <div class="form-group row">
                      <div class="col-sm-4 col-form-label">
                          <label for="univ_nama"><strong> Nama Universitas </strong></label>
                      </div>
                      <div class="col-sm-8">
                          <div class="input-group input-group-merge">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i data-feather="award"></i>
                                  </span>
                              </div>
                              <input
                                  type="text"
                                  id="univ_nama"
                                  class="form-control"
                                  name="univ_nama"
                                  placeholder="Isikan dengan nama Universitas" value="<?= $row['univ_nama']?>"/>
                          </div>
                      </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-sm-4 col-form-label">
                              <label for="univ_alamat"><strong> Alamat </strong></label>
                          </div>
                          <div class="col-sm-8">
                              <div class="input-group input-group">
                                <textarea class="form-control" id="" name="univ_alamat" colspan="4" rows="3" placeholder="Alamat Universitas"><?= $row['univ_alamat']?>
                              </textarea>
                              </div>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-sm-4 col-form-label">
                              <label for="univ_telp"><strong> Telpon </strong></label>
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
                                      id="univ_telp"
                                      class="form-control"
                                      name="univ_telp"
                                      placeholder="Masukan No Telpon" value="<?= $row['univ_telp']?>"/>
                              </div>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-sm-4 col-form-label">
                              <label for="univ_wa"><strong> Whatsapp </strong></label>
                          </div>
                          <div class="col-sm-8">
                              <div class="input-group input-group-merge">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i data-feather="message-square"></i>
                                      </span>
                                  </div>
                                  <input
                                      type="text"
                                      id="univ_wa"
                                      class="form-control"
                                      name="univ_wa"
                                      placeholder="Masukan No Whatsapp" value="<?= $row['univ_wa']?>"/>
                              </div>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-sm-4 col-form-label">
                              <label for="univ_email"><strong> E-mail </strong></label>
                          </div>
                          <div class="col-sm-8">
                              <div class="input-group input-group-merge">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i data-feather="mail"></i>
                                      </span>
                                  </div>
                                  <input
                                      type="text"
                                      id="univ_email"
                                      class="form-control"
                                      name="univ_email"
                                      placeholder="Masukan Alamat Email" value="<?= $row['univ_email']?>"/>
                              </div>
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-sm-4 col-form-label">
                              <label for="univ_fax"><strong> Fax </strong></label>
                          </div>
                          <div class="col-sm-8">
                              <div class="input-group input-group-merge">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i data-feather="file-text"></i>
                                      </span>
                                  </div>
                                  <input
                                      type="text"
                                      id="univ_fax"
                                      class="form-control"
                                      name="univ_fax"
                                      placeholder="Masukan Alamat Fax" value="<?= $row['univ_fax']?>"/>
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
    <div id="deleteEmployeeModal<?php echo $hasil['id_univ']; ?>" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
        <form method="post" action="universitas_act.php">
        <?php
          $id = $hasil['id_univ']; 
          $query_edit = mysqli_query($kon, "SELECT * FROM universitas WHERE id_univ='$id'");
          //$result = mysqli_query($conn, $query);
          while ($row = mysqli_fetch_array($query_edit)) {  
          ?>
          <input type="hidden" class="form-control" value="<?php echo $hasil['id_univ']; ?>" name="id_univ" required>
          
            <div class="modal-header">
              <h4 class="modal-title">Delete</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <p>Apakah Kamu akan menghapus Universitas <?php echo $hasil['univ_nama']; ?>?</p>
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
						<h5 class="modal-title" id="myModalLabel110"><strong>Tambah Data Universitas</strong></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
						</button>
				</div>
				<div class="modal-body">
					<form class="form form-horizontal" action="universitas_act.php" method="POST">
						<div class="row">
							<div class="col-12">
										<div class="form-group row">
												<div class="col-sm-4 col-form-label">
														<label for="univ_nama"><strong> Nama Universitas </strong></label>
												</div>
												<div class="col-sm-8">
														<div class="input-group input-group-merge">
																<div class="input-group-prepend">
																		<span class="input-group-text">
																				<i data-feather="award"></i>
																		</span>
																</div>
																<input
																		type="text"
																		id="univ_nama"
																		class="form-control"
																		name="univ_nama"
																		placeholder="Isikan dengan nama Universitas"/>
														</div>
												</div>
										</div>
                    <div class="form-group row">
												<div class="col-sm-4 col-form-label">
														<label for="univ_alamat"><strong> Alamat </strong></label>
												</div>
												<div class="col-sm-8">
														<div class="input-group input-group">
                              <textarea class="form-control" id="" name="univ_alamat" colspan="4" rows="3" placeholder="Alamat Universitas"></textarea>
														</div>
												</div>
										</div>
                    <div class="form-group row">
												<div class="col-sm-4 col-form-label">
														<label for="univ_telp"><strong> Telpon </strong></label>
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
																		id="univ_telp"
																		class="form-control"
																		name="univ_telp"
																		placeholder="Masukan No Telpon"/>
														</div>
												</div>
										</div>
                    <div class="form-group row">
												<div class="col-sm-4 col-form-label">
														<label for="univ_wa"><strong> Whatsapp </strong></label>
												</div>
												<div class="col-sm-8">
														<div class="input-group input-group-merge">
																<div class="input-group-prepend">
																		<span class="input-group-text">
																				<i data-feather="message-square"></i>
																		</span>
																</div>
																<input
																		type="text"
																		id="univ_wa"
																		class="form-control"
																		name="univ_wa"
																		placeholder="Masukan No Whatsapp"/>
														</div>
												</div>
										</div>
                    <div class="form-group row">
												<div class="col-sm-4 col-form-label">
														<label for="univ_email"><strong> E-mail </strong></label>
												</div>
												<div class="col-sm-8">
														<div class="input-group input-group-merge">
																<div class="input-group-prepend">
																		<span class="input-group-text">
																				<i data-feather="mail"></i>
																		</span>
																</div>
																<input
																		type="text"
																		id="univ_email"
																		class="form-control"
																		name="univ_email"
																		placeholder="Masukan Alamat Email"/>
														</div>
												</div>
										</div>
                    <div class="form-group row">
												<div class="col-sm-4 col-form-label">
														<label for="univ_fax"><strong> Fax </strong></label>
												</div>
												<div class="col-sm-8">
														<div class="input-group input-group-merge">
																<div class="input-group-prepend">
																		<span class="input-group-text">
																				<i data-feather="file-text"></i>
																		</span>
																</div>
																<input
																		type="text"
																		id="univ_fax"
																		class="form-control"
																		name="univ_fax"
																		placeholder="Masukan Alamat Fax"/>
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