<?php 
include "includes/header.php";
include "config.php";
$data = mysqli_query($kon, "SELECT * FROM web ORDER BY id ASC");
?>
	<div class="app-content content ">
			<div class="content-overlay"></div>
			<div class="header-navbar-shadow"></div>
			<div class="content-wrapper container-xxl p-0">
					<div class="content-header row"></div>
					<div class="content-body">
															<!-- Dashboard Ecommerce Starts -->
					<section id="dashboard-ecommerce">
							<div class="row match-height">
									<div class="col-lg-6 col-12">
											<div class="row match-height">
													<!-- Bar Chart - Orders -->
													<div class="col-lg-6 col-md-3 col-6">
															<div class="card card-congratulation-medal">
																	<div class="card-body">
																			<h3 class="mb-75 mt-2 pt-50">
																					<a href="javascript:void(0);">Universitas</a>
																			</h3>
																			<h3 class="mb-75 mt-2 pt-50">
																					<a href="javascript:void(0);">151</a>
																			</h3>
																			<button type="button" class="btn btn-primary">Lihat</button>
																			<img
																					src="vendor/app-assets/images/illustration/badge.svg"
																					class="congratulation-medal"
																					alt="Medal Pic"/>
																	</div>
															</div>
													</div>
													<!--/ Bar Chart - Orders -->
													
													<!-- Bar Chart - Orders -->
													<div class="col-lg-6 col-md-3 col-6">
															<div class="card card-congratulation-medal">
																			<div class="card-body">
																					<h3 class="mb-75 mt-2 pt-50">
																							<a href="javascript:void(0);">Fakultas</a>
																					</h3>
																					<h3 class="mb-75 mt-2 pt-50">
																							<a href="javascript:void(0);">151</a>
																					</h3>
																					<button type="button" class="btn btn-primary">Lihat</button>
																					<img
																							src="vendor/app-assets/images/illustration/badge.svg"
																							class="congratulation-medal"
																							alt="Medal Pic"/>
																			</div>
																	</div>
													</div>
													<!--/ Bar Chart - Orders -->
													<!-- Bar Chart - Orders -->
													<div class="col-lg-6 col-md-3 col-6">
															<div class="card card-congratulation-medal">
																			<div class="card-body">
																					<h3 class="mb-75 mt-2 pt-50">
																							<a href="javascript:void(0);">Unit</a>
																					</h3>
																					<h3 class="mb-75 mt-2 pt-50">
																							<a href="javascript:void(0);">151</a>
																					</h3>
																					<button type="button" class="btn btn-primary">Lihat</button>
																					<img
																							src="vendor/app-assets/images/illustration/badge.svg"
																							class="congratulation-medal"
																							alt="Medal Pic"/>
																			</div>
																	</div>
													</div>
													<!--/ Bar Chart - Orders -->

													<!-- Line Chart - Profit -->
													<div class="col-lg-6 col-md-3 col-6">
															<div class="card card-congratulation-medal">
																			<div class="card-body">
																					<h3 class="mb-75 mt-2 pt-50">
																							<a href="javascript:void(0);">Negara</a>
																					</h3>
																					<h3 class="mb-75 mt-2 pt-50">
																							<a href="javascript:void(0);">151</a>
																					</h3>
																					<button type="button" class="btn btn-primary">Lihat</button>
																					<img
																							src="vendor/app-assets/images/illustration/badge.svg"
																							class="congratulation-medal"
																							alt="Medal Pic"/>
																			</div>
																	</div>
													</div>
													<!--/ Line Chart - Profit -->
											</div>
									</div>

									<!-- Revenue Report Card -->
<div class="col-lg-6 col-12" id="basic-carousel" style="background-color:black ;" >
	<div class="card">
		<div class="card-body">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
				<?php
						for($i=0; $i<$data->num_rows;$i++){
								echo '
								<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'"';
								if($i==0){echo'class="active"';}echo'></li>';
						}?>
					</ol>
					<div class="carousel-inner">
							<?php
							if($data->num_rows > 0){
								while ($row = $data->fetch_assoc()) {
								if($row['id'] == 1){
									echo'<div class="carousel-item active">';}else{echo'<div class="carousel-item">';}
									echo'
										<img src="img/'.$row['gambar'].'" alt="'.$row['judul'].'">
										<div class="carousel-caption d-none d-md-block">
												<h5>'.$row['judul'].'</h5>
												<p>'.$row['deskripsi'].'</p>
										</div>  
									</div>';
							}}?>
		
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
	</div>
									<!-- <div class="col-lg-6 col-12" id="basic-carousel">
												<div class="card">
															<div class="card-body">
																	<div id="carousel-example-caption" class="carousel slide" data-ride="carousel">
																			<ol class="carousel-indicators">
																				<?php 
																					for ($i=0; $i<$data->num_rows; $i++) { 
																					}
																				?>
																			</ol>
																			<div class="carousel-inner" role="listbox">
																					<div class="carousel-item active">
																							<img
																									class="img-fluid"
																									src="vendor/app-assets/images/slider/09.jpg"
																									alt="First slide"/>
																							<div class="carousel-caption">
																									<h3 class="text-white">First Slide Label</h3>
																									<p class="text-white">
																											Donut jujubes I love topping I love sweet. Jujubes I love brownie gummi bears I
																											love donut sweet chocolate. Tart chocolate marshmallow.Tart carrot cake muffin.
																									</p>
																							</div>
																					</div>
																			</div>
																			<a
																					class="carousel-control-prev"
																					href="#carousel-example-caption"
																					role="button"
																					data-slide="prev">
																					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
																					<span class="sr-only">Previous</span>
																			</a>
																			<a
																					class="carousel-control-next"
																					href="#carousel-example-caption"
																					role="button"
																					data-slide="next">
																					<span class="carousel-control-next-icon" aria-hidden="true"></span>
																					<span class="sr-only">Next</span>
																			</a>
																	</div>
															</div>
													</div>
									</div> -->
									<!--/ Revenue Report Card -->
							</div>

					</section>
					<!-- Dashboard Ecommerce ends -->
					<div class="row match-height">
		<!-- Basic Tables start -->
							<div class="col-lg-12">
									<div class="card">
											<div class="card-header">
													<h4 class="card-title">Data Negara</h4>
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
					</div>
			</div>
	</div>

	<div class="sidenav-overlay"></div>
	<div class="drag-target"></div>

	<?php include "includes/footer.php";?>
	
	</body>
</html>