<?php 
include "includes/config.php";
  include "includes/header.php";
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(empty($_SESSION)){
  echo "<script>alert('Silahkan Login Terlebih Dahulu');window.location='index.php'</script>";
}
$tampil = mysqli_query($kon, "SELECT * from tikm");
$data      = mysqli_fetch_array($tampil);
?>
<style type="text/css">
.box {
  padding: 30px 40px;
  border-radius: 5px;
}

h1,
h2,
h3,
h4,
h5,
h6,
.h1,
.h2,
.h3,
.h4,
.h5,
.h6 {
  margin-bottom: 0.5rem;
  font-family: inherit;
  font-weight: 500;
  line-height: 1.2;
  color: #000000;
}

</style>
<!-- BEGIN: Content-->
<div class="app-content content ">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper container-xxl p-0">
    <div class="content-body ok">
      <div class="alert alert-warning" role="alert">
        Perhatian!!! untuk memberikan penilaian/poling/suara silahkan klik Icon / Emoji
      </div>
      <div class="row match-height">
        <div class="col-xl-4 col-md-4 col-12">
          <div class="card card-congratulation-medal">
            <div class="card-body" style="background-color:#67edd1;">
              <div class="row">
                <div class="col-md-6">
                  <h3>MEMUASKAN</h3>
                  <h2 id="data-mati"> [ <?=$data['puas']?> ] </h2>
                  <h5>jumlah </h5>
                </div>
                <div class="col-md-4">
                  <a href="survei_simpan.php?ket=puas"
                    title="Jika Anda Merasa Puas dengan Pelayanan kami, Klik Icon ini!">
                    <img src="img/puas.png" style="width: 100px;">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-md-4 col-12">
          <div class="card card-congratulation-medal">
            <div class="card-body" style="background-color:#a3acff;">
              <div class="row">
                <div class="col-md-6">
                  <h3>CUKUP</h3>
                  <h2 id="data-mati"> [ <?=$data['cukup']?> ] </h2>
                  <h5>jumlah </h5>
                </div>
                <div class="col-md-4">
                  <a href="survei_simpan.php?ket=puas"
                    title="Jika Anda Merasa Puas dengan Pelayanan kami, Klik Icon ini!">
                    <img src="img/cukup.png" style="width: 100px;">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-md-4 col-12">
          <div class="card card-congratulation-medal">
            <div class="card-body" style="background-color:#ff0000;">
              <div class="row ok">
                <div class="col-md-6">
                  <h3>KURANG</h3>
                  <h2 id="data-sembuh"> [ <?=$data['kurang']?> ] </h2>
                  <h5>jumlah </h5>
                </div>
                <div class="col-md-4">
                  <a href="survei_simpan.php?ket=kurang"
                    title="Jika Anda Merasa Kurang dengan Pelayanan kami, Klik Icon ini!">
                    <img src="img/kurang.png" style="width: 100px;">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- <div class="col-md-4">
          <div class="bg-primary box text-white">
            <div class="row">
              <div class="col-md-6">
                <h5>MEMUASKAN</h5>
                <h2 id="data-mati"> [ <?=$data['cukup']?> ] </h2>
                <h5>jumlah </h5>
              </div>
              <div class="col-md-4">
                <a href="survei_simpan.php?ket=puas"
                  title="Jika Anda Merasa Puas dengan Pelayanan kami, Klik Icon ini!">
                  <img src="img/puas.png" style="width: 100px;">
                </a>
              </div>
            </div>
          </div>
        </div> -->

        <!-- <div class="col-md-4">
          <div class="bg-success box text-white">
            <div class="row">
              <div class="col-md-6">
                <h5>CUKUP</h5>
                <h2 id="data-mati"> [ <?=$data['cukup']?> ] </h2>
                <h5>suara </h5>
              </div>
              <div class="col-md-4">
                <a href="survei_simpan.php?ket=cukup"
                  title="Jika Anda Merasa Cukup dengan Pelayanan kami, Klik Icon ini!">
                  <img src="img/cukup.png" style="width: 100px;">
                </a>
              </div>
            </div>
          </div>
        </div> -->

        <!-- <div class="col-md-4">
          <div class="bg-danger box text-white">
            <div class="row">
              <div class="col-md-6">
                <h5>KURANG</h5>
                <h2 id="data-sembuh"> [ <?=$data['kurang']?> ] </h2>
                <h5>suara </h5>
              </div>
              <div class="col-md-4">
                <a href="survei_simpan.php?ket=kurang"
                  title="Jika Anda Merasa Kurang dengan Pelayanan kami, Klik Icon ini!">
                  <img src="img/kurang.png" style="width: 100px;">
                </a>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</div>
<!-- END: Content-->
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
<?php include "includes/footer.php";?>
</body>

</html>
