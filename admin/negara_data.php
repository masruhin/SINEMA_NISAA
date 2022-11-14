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
      <!-- <div class="content-body"> -->
        <div class="row match-height">
          <!-- Basic Tables start -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Negara</h4>
                                <button type="button" class="btn btn-outline-success round btn-sm" data-toggle="modal" data-target="#negara">Tambah</button>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="dataTables" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NAMA NEGARA</th>
                                            <th>DIBUAT PADA TANGGAL</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="font-weight-bold">1</span>
                                            </td>
                                            <td>Memorandum of Agreement (MoA)</td>
                                            <td>
                                                <p>PERJANJIAN KERJA SAMA ANTARA PROGRAM STUDI S1</p>
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- Basic Tables end -->
        </div>
    <!-- </div> -->
  </div>
  <!-- END: Content-->
	<div class="modal fade text-left modal-success" id="negara" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
						<div class="modal-header">
								<h5 class="modal-title" id="myModalLabel110">Tambah Negara</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<div class="modal-body">
								<form class="form form-horizontal">
										<div class="row">
												<div class="col-12">
														<div class="form-group row">
																<div class="col-sm-3 col-form-label">
																		<label for="negara">Nama Negara</label>
																</div>
																<div class="col-sm-9">
																		<div class="input-group input-group-merge">
																				<div class="input-group-prepend">
																						<span class="input-group-text"><i data-feather="flag"></i></span>
																				</div>
																				<input type="text" id="negara" class="form-control" name="negara" placeholder="Isikan dengan nama Negara" />
																		</div>
																</div>
														</div>
												</div>
												<div class="col-sm-9 offset-sm-3">
														<button type="reset" class="btn btn-info mr-1 btn-sm">Simpan</button>
														<button type="reset" class="btn btn-outline-danger btn-sm">Reset</button>
												</div>
										</div>
								</form>
						</div>
				</div>
		</div>
</div>
  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>
  <?php include "footer.php";?>
  </body>
</html>