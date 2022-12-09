<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once 'config.php';
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
      content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
      content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Admin</title>

    <link rel="stylesheet" type="text/css" href="../vendor/app-assets/css/pages/page-auth.css">
    <link rel="stylesheet" type="text/css" href="../vendor/app-assets/css/plugins/forms/form-validation.css">
    <link rel="apple-touch-icon" href="../vendor/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../vendor/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
      rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../vendor/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="../vendor/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../vendor/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../vendor/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../vendor/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../vendor/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../vendor/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="../vendor/app-assets/css/themes/semi-dark-layout.css">

    <link rel="stylesheet" type="text/css" href="../vendor/app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="../vendor/app-assets/css/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="../vendor/app-assets/css/plugins/charts/chart-apex.css">
    <link rel="stylesheet" type="text/css" href="../vendor/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../vendor/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="../vendor/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/app-assets/vendors/css/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/app-assets/css/plugins/forms/form-file-uploader.css">
  </head>
  <style>
  .nav-item .nav-link {
    font-size: 14px;
    font-weight: 500;
    font-family: Rubik, sans-serif;
  }

  .navbar-floating,
  .label {
    font-size: 14px;
    font-weight: 400;
    font-family: Rubik, sans-serif;
  }

  </style>

  <body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover"
    data-menu="horizontal-menu" data-col="">

    <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center"
      data-nav="brand-center">
      <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
          <ul class="nav navbar-nav d-xl-none">
            <li class="nav-item">
              <a class="nav-link menu-toggle" href="javascript:void(0);">
                <i class="ficon" data-feather="menu"></i>
              </a>
            </li>
          </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ml-auto">
          <li class="nav-item d-none d-lg-block">
            <a class="nav-link nav-link-style">
              <i class="ficon" data-feather="moon"></i>
            </a>
          </li>
          <li class="nav-item dropdown dropdown-notification mr-25">
            <a class="nav-link" href="javascript:void(0);" data-toggle="dropdown">
              <i class="ficon" data-feather="bell"></i>
              <span class="badge badge-pill badge-danger badge-up">5</span></a>
          </li>
          <li class="nav-item dropdown dropdown-user">
            <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="user-nav d-sm-flex d-none">
                <span class="user-name font-weight-bolder"></span>
                <span class="user-status"></span>
              </div>
              <span class="avatar"><img class="round" src="../vendor/app-assets//images/portrait/small/avatar-s-11.jpg"
                  alt="avatar" height="40" width="40">
                <span class="avatar-status-online"></span></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
              <a class="dropdown-item" href="#">
                <i class="mr-50" data-feather="edit"></i>
                Update Profile</a>
              <a class="dropdown-item" href="page-auth-login-v2.html">
                <i class="mr-50" data-feather="key"></i>
                Update Password</a>
              <a class="dropdown-item" href="logout.php">
                <i class="mr-50" data-feather="log-out"></i>
                Keluar</a>
              <a class="dropdown-item" href="login.php">
                <i class="mr-50" data-feather="check-circle"></i>
                Login</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <?php include 'menu.php';
?>
