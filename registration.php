<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
  <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="PIXINVENT">
  <title>Register</title>
  <link rel="apple-touch-icon" href="vendor/app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="vendor/app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

  <!-- BEGIN: Vendor CSS-->
  <link rel="stylesheet" type="text/css" href="vendor/app-assets/vendors/css/vendors.min.css">
  <!-- END: Vendor CSS-->

  <!-- BEGIN: Theme CSS-->
  <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/bootstrap-extended.css">
  <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/colors.css">
  <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/components.css">
  <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/themes/dark-layout.css">
  <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/themes/bordered-layout.css">
  <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/themes/semi-dark-layout.css">

  <!-- BEGIN: Page CSS-->
  <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/core/menu/menu-types/horizontal-menu.css">
  <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/plugins/forms/form-validation.css">
  <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/pages/page-auth.css">
  <!-- END: Page CSS-->

  <!-- BEGIN: Custom CSS-->
  <link rel="stylesheet" type="text/css" href="vendor/assets/css/style.css">
  <!-- END: Custom CSS-->
  <style>
      .errorWrap {
      padding: 10px;
      margin: 0 0 20px 0;
      background: #fff;
      border-left: 4px solid #dd3d36;
      -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
      box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
  }
  .succWrap{
      padding: 10px;
      margin: 0 0 20px 0;
      background: #fff;
      border-left: 4px solid #5cb85c;
      -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
      box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
  }
  </style>
  <script type="text/javascript">
  function checkLetter(theform)
  {
      pola_nama=/^[a-zA-Z .]*$/;
      if (!pola_nama.test(theform.fullname.value)){
      alert ('Hanya huruf yang diperbolehkan untuk Nama!');
      theform.fullname.focus();
      return false;
      }
      
      if(theform.pass.value!= thform.conf.value)
      {
        alert("New Password and Confirm Password Field do not match!");
        theform.conf.focus();
        return false;
      }
      return (true);
  }
  
  </script>

  <script type="text/javascript">
    function checkAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
      url: "check_availability.php",
      data:'emailid='+$("#emailid").val(),
      type: "POST",
      success:function(data){
        $("#user-availability-status").html(data);
        $("#loaderIcon").hide();
      },
      error:function (){}
    });
    }
  </script>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="blank-page">
  <!-- BEGIN: Content-->
  <div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <div class="auth-wrapper auth-v2">
          <div class="auth-inner row m-0">
            <!-- Brand logo--><a class="brand-logo" href="javascript:void(0);">
              <svg viewBox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="28">
                <defs>
                  <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                    <stop stop-color="#000000" offset="0%"></stop>
                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                  </lineargradient>
                  <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                    <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                  </lineargradient>
                </defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                    <g id="Group" transform="translate(400.000000, 178.000000)">
                      <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill: currentColor"></path>
                      <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                      <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                      <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                      <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                    </g>
                  </g>
                </g>
              </svg>
              <h2 class="brand-text text-primary ml-1">Vuexy</h2>
            </a>
            <!-- /Brand logo-->
            <!-- Left Text-->
            <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
              <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="vendor/app-assets/images/pages/register-v2.svg" alt="Register V2" /></div>
            </div>
            <!-- /Left Text-->
            <!-- Register-->
            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
              <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                <h2 class="card-title font-weight-bold mb-1">Silahkan Registrasi 🚀</h2>
                <form  method="post" name="theform" action="registration_act.php" id="theform" onSubmit="return checkLetter(this);" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="form-label" for="username">Username</label>
                    <input class="form-control" id="username" type="text" name="username" placeholder="Masukan username" aria-describedby="username" autofocus="" tabindex="1" />
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="fullname">Nama Lengkap</label>
                    <input class="form-control" id="fullname" type="text" name="fullname" placeholder="Isi nama lengkap anda" aria-describedby="fullname" autofocus="" tabindex="1" />
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group input-group-merge form-password-toggle">
                      <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required="required">
                      <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="conf">Ulangi Password</label>
                    <div class="input-group input-group-merge form-password-toggle">
                       <input type="password" class="form-control" id="conf" name="conf" placeholder="Konfirmasi Password" required="required">
                      <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" id="register-privacy-policy" type="checkbox" tabindex="4" />
                      <label class="custom-control-label" for="register-privacy-policy">Saya setuju<a href="javascript:void(0);">&nbsp;dengan Syarat dan ketentuan yang berlaku</a></label>
                    </div>
                  </div>
                  <button class="btn btn-primary btn-block" tabindex="5">Daftar</button>
                </form>
                <p class="text-center mt-2"><span>Already have an account?</span><a href="login.php"><span>&nbsp;Sign in instead</span></a></p>
                <div class="divider my-2">
                  <div class="divider-text">atau</div>
                </div>
              </div>
            </div>
            <!-- /Register-->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END: Content-->
<?php include('includes/registration_act.php');?>

  <!-- BEGIN: Vendor JS-->
  <script src="vendor/app-assets/vendors/js/vendors.min.js"></script>
  <!-- BEGIN Vendor JS-->

  <!-- BEGIN: Page Vendor JS-->
  <script src="vendor/app-assets/vendors/js/ui/jquery.sticky.js"></script>
  <script src="vendor/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
  <!-- END: Page Vendor JS-->

  <!-- BEGIN: Theme JS-->
  <script src="vendor/app-assets/js/core/app-menu.js"></script>
  <script src="vendor/app-assets/js/core/app.js"></script>
  <!-- END: Theme JS-->

  <!-- BEGIN: Page JS-->
  <script src="vendor/app-assets/js/scripts/pages/page-auth-register.js"></script>
  <!-- END: Page JS-->

  <script>
    $(window).on('load', function() {
      if (feather) {
        feather.replace({
          width: 14,
          height: 14
        });
      }
    })
  </script>
</body>
<!-- END: Body-->

</html>