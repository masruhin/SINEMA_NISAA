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
											$data = mysqli_query($kon, "SELECT * FROM kerjasama ORDER BY id_kerjasama ASC");
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
                      data-toggle="modal" data-target="#edit<?php echo $hasil['id_jenis_dok']; ?>"
                      data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat"><i data-feather="eye"></i></a>
                    <a href="#" type="button" class="open_modal btn btn-outline-danger round btn-sm" data-toggle="modal"
                      data-target="#edit<?php echo $hasil['id_jenis_dok']; ?>" data-bs-toggle="tooltip"
                      data-bs-placement="top" title="Hapus"><i data-feather="trash"></i></a>
                    <a href="#" type="button" class="open_modal btn btn-outline-info round btn-sm" data-toggle="modal"
                      data-target="#deleteEmployeeModal<?php echo $hasil['id_jenis_dok']; ?>" data-bs-toggle="tooltip"
                      data-bs-placement="top" title="Edit"><i data-feather="edit"></i></a>
                  </td>
                </tr>
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
