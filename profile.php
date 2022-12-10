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
          <!-- Developer Meetup Card -->
          <div class="col-lg-4 col-md-6 col-12">
            <div class="card card-developer-meetup">
              <div class="meetup-img-wrapper rounded-top text-center">
                <img src="vendor/app-assets/images/illustration/email.svg" alt="Meeting Pic" height="170" />
              </div>
              <div class="card-body">
                <div class="meetup-header d-flex align-items-center">
                  <div class="meetup-day">
                    <h6 class="mb-0"> <?php echo date("D"); ?></h6>
                    <h3 class="mb-0"> <?php echo date("j"); ?></h3>
                  </div>
                  <div class="my-auto">
                    <h4 class="card-title mb-25">SINEMA</h4>
                    <p class="card-text mb-0">Sistem Informasi Kerjasama</p>
                  </div>
                </div>
                <div class="media">
                  <div class="avatar bg-light-primary rounded mr-1">
                    <div class="avatar-content">
                      <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
                    </div>
                  </div>
                  <div class="media-body">
                    <?php date("F j, Y, g:i a"); ?>
                    <h6 class="mb-0"><?php echo date("F j, Y"); ?></h6>
                    <small><?php echo date("g:i a"); ?></small>
                  </div>
                </div>
                <div class="media">
                  <div class="avatar bg-light-primary rounded mr-1">
                    <div class="avatar-content">
                      <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                    </div>
                  </div>
                  <div class="media-body">
                    <h6 class="mb-0">Central Park</h6>
                    <small>Manhattan, New york City</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--/ Developer Meetup Card -->
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
