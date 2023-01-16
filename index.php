<?php 
include "includes/header.php";
include "includes/config.php";
$data = mysqli_query($kon, "SELECT * FROM web ORDER BY id ASC");
$galeri = mysqli_query($kon, "SELECT * FROM galeri ORDER BY id ASC");

$q_univ = $kon->query("SELECT * FROM universitas");
$d_univ = mysqli_num_rows($q_univ);
//total  data fakultas
$q_fakultas = $kon->query("SELECT * FROM fakultas");
$d_fakultas = mysqli_num_rows($q_fakultas);
//total data Unit
$q_unit = $kon->query("SELECT * FROM unit  WHERE status='Y' ");
$d_unit = mysqli_num_rows($q_unit);
//total data Negara
$q_negara = $kon->query("SELECT * FROM negara");
$d_negara = mysqli_num_rows($q_negara);
?>


<div class="app-content content ">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper container-xxl p-0">
    <div class="content-body">
      <!-- Dashboard Ecommerce Starts -->
      <section id="dashboard-ecommerce">
        <div class="row match-height">
          <div class="col-lg-4 col-12">
            <div class="row match-height">
              <!-- Bar Chart - Orders -->
              <div class="col-lg-6 col-md-3 col-6">
                <div class="card card-congratulation-medal">
                  <div class="card-body">
                    <img src="img/universitas.png" class="rounded" width="50" height="50" alt="Medal Pic" />
                    <h3 class="mb-75 mt-2 pt-50">
                      <a href="javascript:void(0);">Universitas</a>
                    </h3>
                    <h6 class="mb-75 mt-2 pt-50">
                      <a href="javascript:void(0);">Jumlah <span></span><?php echo $d_univ?></a>
                    </h6>
                  </div>
                </div>
              </div>
              <!--/ Bar Chart - Orders -->

              <!-- Bar Chart - Orders -->
              <div class="col-lg-6 col-md-3 col-6">
                <div class="card card-congratulation-medal">
                  <div class="card-body">
                    <img src="img/fakultas.png" class="rounded" width="50" height="50" alt="Medal Pic" />
                    <h3 class="mb-75 mt-2 pt-50">
                      <a href="javascript:void(0);">Fakultas</a>
                    </h3>
                    <h6 class="mb-75 mt-2 pt-50">
                      <a href="javascript:void(0);">Jumlah <?php echo $d_fakultas?></a>
                    </h6>
                  </div>
                </div>
              </div>
              <!--/ Bar Chart - Orders -->
              <!-- Bar Chart - Orders -->
              <div class="col-lg-6 col-md-3 col-6">
                <div class="card card-congratulation-medal">
                  <div class="card-body">
                    <img src="img/unit.png" class="rounded" width="50" height="50" alt="Medal Pic" />
                    <h3 class="mb-75 mt-2 pt-50">
                      <a href="javascript:void(0);">Unit</a>
                    </h3>
                    <h6 class="mb-75 mt-2 pt-50">
                      <a href="javascript:void(0);">Jumlah <?php echo $d_unit?></a>
                    </h6>
                  </div>
                </div>
              </div>
              <!--/ Bar Chart - Orders -->

              <!-- Line Chart - Profit -->
              <div class="col-lg-6 col-md-3 col-6">
                <div class="card card-congratulation-medal">
                  <div class="card-body">
                    <img src="img/negara.png" class="rounded" width="50" height="50" alt="Medal Pic" />
                    <h3 class="mb-75 mt-2 pt-50">
                      <a href="javascript:void(0);">Negara</a>
                    </h3>
                    <h6 class="mb-75 mt-2 pt-50">
                      <a href="javascript:void(0);">Jumlah <?php echo $d_negara?></a>
                    </h6>
                  </div>
                </div>
              </div>
              <!--/ Line Chart - Profit -->
            </div>
          </div>
          <!-- Revenue Report Card -->

          <div id="carousel-wrap" class="carousel slide col-lg-8 col-12" data-ride="carousel">
            <ol class="carousel-indicators">
              <?php
              for($i=0; $i<$galeri->num_rows;$i++){
                  echo '<li gale$galeri-target="#carousel-wrap" gale$galeri-slide-to="'.$i.'"';
                  if($i==0){echo'class="active"';}echo'></li>';
              }?>
            </ol>
            <div class="card">
              <div class="card-body">
                <div class="carousel-inner"
                  style="height:500px;background-size:cover;background-position: center center;">
                  <?php
            if($galeri->num_rows > 0){
              while ($row = $galeri->fetch_assoc()) {
              if($row['id'] == 1){
                echo'<div class="carousel-item active" style="height:500px;background-size:cover;background-position: center center;">';}else{echo'<div class="carousel-item">';}
                echo'
                  <img src="img/'.$row['gambar'].'" alt="'.$row['judul'].'" style="height:500px;background-size:cover;background-position: center center;">
                  <div class="carousel-caption d-none d-md-block">
                      <h3 class="text-white">'.$row['judul'].'</h3>
                      <p class="text-white">'.$row['deskripsi'].'</p>
                  </div>  
                </div>';
            }}?>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carousel-wrap" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-wrap" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>

      </section>

      <div class="row match-height">
        <div class="col-lg-12" id="kerjasama">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Kerjasama</h4>
            </div>
            <div class="card-body table-responsive">
              <table id="dataTables" class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Jenis</th>
                    <th>Judul</th>
                    <!-- <th>File</th> -->
                    <th>Status</th>
                    <th>Masa Berlaku</th>
                    <th>No Ref</th>
                    <th>Tanggal Dibuat</th>
                    <th style="text-align:center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
											include "includes/config.php";
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
											?>
                  <tr>
                    <td>
                      <?php echo $no++; ?>
                    </td>
                    <td><?php echo $hasil ['jenis_dok'];?></td>
                    <td><?php echo $hasil ['judul_kerjasama'];?></td>
                    <!-- <td>
                      <?php if ($hasil['file']!=0) {?>
                      <button
                        onclick="JavaScript:window.location.href='kerjasama_download.php?file=<?php echo $hasil['file']?>';"
                        class="btn btn-outline-info round btn-sm">Download</button>
                      <?php }else{ ?>
                      <span class="badge badge-pill badge-light-danger mr-1 lg">Tidak ada file!</span>
                      <?php }
                    ?>
                    </td> -->
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
                      <a href="#" type="button" class="open_modal btn btn-outline-info round btn-sm" data-toggle="modal"
                        data-target="#view<?php echo $hasil['id_kerjasama']; ?>">Lihat</a>
                    </td>
                  </tr>

                  <!-- MODAL VIEW -->
                  <div class="modal fade text-left" id="view<?php echo $hasil['id_kerjasama']; ?>" tabindex="-1"
                    role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
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
                                          <!-- <div class="col-12">
                                            <div class="mb-1">
                                              <P class="form-label" for="fak_nama">File Dokumen
                                                Kerjasama</P>
                                              <div class="input-group ">
                                                <span class="input-group-text"><i data-feather="file"></i></span>
                                                <input type="text" id="file" class="form-control"
                                                  value="<?php echo $hasil['file'];?>" name="file" readonly />
                                              </div>
                                            </div>
                                          </div> -->
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
  </div>
</div>

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
<?php include "includes/footer.php";?>

</body>

</html>
