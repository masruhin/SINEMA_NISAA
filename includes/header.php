<?php
session_start();
include 'config.php';
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
    <title>Member</title>
    <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/pages/page-auth.css">
    <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="apple-touch-icon" href="vendor/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="vendor/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
      rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="vendor/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/themes/semi-dark-layout.css">

    <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="vendor/app-assets/css/plugins/charts/chart-apex.css">
    <link rel="stylesheet" type="text/css" href="vendor/assets/css/style.css">
  </head>

  <body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover"
    data-menu="horizontal-menu" data-col="">

    <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center"
      data-nav="brand-center">
      <div class="navbar-header d-xl-block d-none">
        <ul class="nav navbar-nav">
          <li class="nav-item">
            <a href="#loginform" data-toggle="modal" data-dismiss="modal">
              <span class="brand-logo"></span>
              <h2 class="brand-text mb-0"></h2>
            </a>
          </li>
        </ul>
      </div>
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
              <span class="avatar"><img class="round" src="vendor/app-assets//images/portrait/small/avatar-s-11.jpg"
                  alt="avatar" height="40" width="40">
                <span class="avatar-status-online"></span></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
              <?php 
                          if (!empty($_SESSION)) {
                            echo '<a class="dropdown-item" href="#">
                                <i class="mr-50" data-feather="edit"></i>
                                Update Profile</a>
                            <a class="dropdown-item" href="page-auth-login-v2.html">
                                <i class="mr-50" data-feather="key"></i>
                                Update Password</a>
                            <a class="dropdown-item" href="logout.php">
                                <i class="mr-50" data-feather="log-out"></i>
                                Keluar</a> ';
                          }else {
                            echo '<a class="dropdown-item" href="login.php">
                                <i class="mr-50" data-feather="log-in"></i>
                                Login</a>
                                <a class="dropdown-item" href="registration.php">
                                <i class="mr-50" data-feather="file-text"></i>
                                Daftar Akun</a>';
                          }?>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <!-- MENU -->
    <div class="horizontal-menu-wrapper">
      <div
        class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-shadow menu-border container-xxl"
        role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
              <a href="#loginform" data-toggle="modal" data-dismiss="modal">
                <span class="brand-logo">
                  <!-- MASUKAN LOGO PERUSAHAAN -->
                </span>
                <h2 class="brand-text mb-0">SINEMA</h2>
              </a>
            </li>
            <li class="nav-item nav-toggle">
              <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="navbar-container main-menu-content" data-menu="menu-container">
          <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
            <li data-menu="">
              <a class="dropdown-item d-flex align-items-center" href="member-dashboard.php">
                <i data-feather="home"></i>
                <span data-i18n="Documentation">Home</span>
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item d-flex align-items-center" href="profile-bhamada.php">
                <i data-feather="bar-chart-2"></i>
                <span data-i18n="Documentation">Profil</span>
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item d-flex align-items-center" href="">
                <i data-feather="download"></i>
                <span data-i18n="Documentation">Download</span>
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item d-flex align-items-center" href="member-kontak-kami.php">
                <i data-feather="phone-call"></i>
                <span data-i18n="Documentation">Kontak Kami</span>
              </a>
            </li>
            <li data-menu="">
              <a class="dropdown-item d-flex align-items-center" href="member-statistik.php">
                <i data-feather="bar-chart-2"></i>
                <span data-i18n="Documentation">Statistik</span>
              </a>
            </li>
          </ul>

        </div>
      </div>
    </div>
    <!-- END MENU -->
