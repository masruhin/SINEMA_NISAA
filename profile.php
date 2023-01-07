<?php 
include "includes/header.php";
include "includes/config.php";
?>
<div class="app-content content ">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper container-xxl p-0">
    <div class="content-body">
      <!-- Dashboard Ecommerce Starts -->
      <section id="dashboard-ecommerce">
        <div class="row match-height">
          <div class="col-lg-12 col-md-12">
            <div class="col-lg-4 col-md-4 col-12">
              <div class="card card-developer-meetup">
                <div class="meetup-img-wrapper rounded-top text-center">
                  <img src="vendor/app-assets/images/illustration/email.svg" alt="Meeting Pic" height="170" />
                </div>
                <div class="card-body">
                  <div class="meetup-header d-flex align-items-center">
                    <div class="meetup-day">
                      <h6 class="mb-0"> <?php echo hari_ini(); ?></h6>
                      <h3 class="mb-0"> <?php echo date("j"); ?></h3>
                    </div>
                    <div class="my-auto">
                      <?php 
                      include 'includes/config.php';
                      $data = mysqli_query($kon, "SELECT * FROM web");
                      if (!$data) {
                        printf("Error: %s\n", mysqli_error($kon));
                        exit();
                      }
                      while($hasil = mysqli_fetch_array($data)){
                      ?>
                      <h4 class="card-title mb-25">
                        <?php
                        echo $hasil["judul"];
                        ?>
                      </h4>
                      <p class="card-text mb-0">
                        <?php
                        echo $hasil['deskripsi'];
                        ?>
                      </p>
                    </div>
                  </div>
                  <div class="media">
                    <div class="avatar bg-light-primary rounded mr-1">
                      <div class="avatar-content">
                        <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
                      </div>
                    </div>
                    <div class="media-body">
                      <h6 class="mb-0"><?php echo tanggal_indonesia(date('Y-m-d'));?></h6>
                      <h6><?php echo date("H:i"); ?></h6>
                    </div>
                  </div>
                  <div class="media">
                    <div class="avatar bg-light-primary rounded mr-1">
                      <div class="avatar-content">
                        <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                      </div>
                    </div>
                    <div class="media-body">
                      <h6 class="mb-0">
                      </h6>
                      <small><?php
                        echo $hasil['alamat'];
                        ?></small>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-8">
              <div class="card">
                <div class="card-header">
                  <div class="accordion list-group-item list-group-item-action active" type="button"
                    data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="true"
                    aria-controls="accordionTwo"><span><i data-feather="phone-call"></i> Kontak Kami</span>
                  </div>
                  <div class="card-body list-group-item" id="accordionTwo">
                    <div class="mb-1">
                      <b>UNIVERSITAS BHAMADA SLAWI <br /></b>
                      <hr>
                    </div>
                    <div class="mb-1">
                      Email : <?php
                        echo $hasil['email'];
                        ?> <br />
                      Telephone : <?php
                        echo $hasil['telpon'];
                        ?> <br />
                      Alamat : <?php
                        echo $hasil['alamat'];
                        ?>
                      </p>
                      <hr>
                    </div>
                    <div class="u_row">
                      <div class="vc_row wpb_row vc_row-fluid">
                        <div data-vc-parallax="1.5" data-vc-parallax-o-fade="on"
                          class="wpb_column vc_column_container vc_col-sm-12 vc_col-has-fill vc_general vc_parallax vc_parallax-content-moving-fade js-vc_parallax-o-fade">
                          <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                              <div class="wpb_raw_code wpb_content_element wpb_raw_html">
                                <div class="wpb_wrapper">
                                  <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15840.597139666424!2d109.1204575!3d-6.9916918!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x883656d1325ef066!2sUniversitas%20Bhamada%20Slawi!5e0!3m2!1sid!2sid!4v1656900064820!5m2!1sid!2sid"
                                    width="100%" height="500px" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<?php include "includes/footer.php";?>

</body>

</html>
<?php } ?>
