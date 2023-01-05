<?php 
include "includes/header.php";
include "includes/config.php";
$data = mysqli_query($kon, "SELECT * FROM web ORDER BY id ASC");

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
      <div class="row match-height">
        <div class="col-lg-12" id="kerjasama">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Kerjasama</h4>
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
