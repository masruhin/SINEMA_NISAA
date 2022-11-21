<?php
include "../../layout/header.php";
?>
<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center" data-nav="brand-center">
        <div class="navbar-header d-xl-block d-none">
        </div>
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="horizontal-menu-wrapper">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-shadow menu-border container-xxl" role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="../../vendor/html/ltr/horizontal-menu-template/index.html"><span class="brand-logo">
                                <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
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
                                                <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                                <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                                <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                                <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                                <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                            </g>
                                        </g>
                                    </g>
                                </svg></span>
                            <h2 class="brand-text mb-0">Vuexy</h2>
                        </a></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i></a></li>
                </ul>
            </div>
            <div class="shadow-bottom"></div>
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content" data-menu="menu-container">
                <!-- include ../../vendor/includes/mixins-->
                <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                    <li data-menu="">
                        <a class="dropdown-item d-flex align-items-center" href="member-dashboard.php">
                            <i data-feather="home"></i><span data-i18n="Documentation">Home</span>
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
                    <li data-menu="">
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i data-feather="log-in"></i>
                            <span data-i18n="Documentation">Log In</span>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Basic Carousel And Optional Carousel start -->
                <section id="basic-carousel">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div id="carousel-example-caption" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-example-caption" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-example-caption" data-slide-to="1"></li>
                                            <li data-target="#carousel-example-caption" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active">
                                                <img class="img-fluid" src="../../vendor/app-assets/images/slider/09.jpg" alt="First slide" />
                                                <div class="carousel-caption">
                                                    <h3 class="text-white">First Slide Label</h3>
                                                    <p class="text-white">
                                                        Donut jujubes I love topping I love sweet. Jujubes I love brownie gummi bears I love donut sweet
                                                        chocolate. Tart chocolate marshmallow.Tart carrot cake muffin.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img class="img-fluid" src="../../vendor/app-assets/images/slider/08.jpg" alt="Second slide" />
                                                <div class="carousel-caption">
                                                    <h3 class="text-white">Second Slide Label</h3>
                                                    <p class="text-white">
                                                        Tart macaroon marzipan I love soufflé apple pie wafer. Chocolate bar jelly caramels jujubes
                                                        chocolate cake gummies. Cupcake cake I love cake danish carrot cake.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img class="img-fluid" src="../../vendor/app-assets/images/slider/10.jpg" alt="Third slide" />
                                                <div class="carousel-caption">
                                                    <h3 class="text-white">Third Slide Label</h3>
                                                    <p class="text-white">
                                                        Pudding sweet pie gummies. Chocolate bar sweet tiramisu cheesecake chocolate cotton candy pastry
                                                        muffin. Marshmallow cake powder icing.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carousel-example-caption" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-example-caption" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- <div class="row"> -->
                            <div class="row match-height">
                                <!-- Medal Card -->
                                <div class="col-xl-6 col-md-6 col-12">
                                    <div class="card card-congratulation-medal">
                                        <div class="card-body">
                                            <!-- <h5>Universitas</h5> -->
                                            <h3 class="mb-75 mt-2 pt-50">
                                                <a href="javascript:void(0);">Universitas</a>
                                            </h3>
                                            <p class="card-text font-small-3">Lihat untuk mengetahui lebih lanjut</p>
                                            <h3 class="mb-75 mt-2 pt-50">
                                                <a href="javascript:void(0);">20</a>
                                            </h3>
                                            <button type="button" class="btn btn-primary">Lihat</button>
                                            <img src="../../vendor/app-assets/images/illustration/badge.svg" class="congratulation-medal" alt="Medal Pic" />
                                        </div>
                                    </div>
                                </div>
                                <!--/ Medal Card -->

                                <!-- Medal Card -->
                                <div class="col-xl-6 col-md-6 col-12">
                                    <div class="card card-congratulation-medal">
                                        <div class="card-body">
                                            <h3 class="mb-75 mt-2 pt-50">
                                                <a href="javascript:void(0);">Fakultas</a>
                                            </h3>
                                            <p class="card-text font-small-3">Lihat untuk mengetahui lebih lanjut</p>
                                            <h3 class="mb-75 mt-2 pt-50">
                                                <a href="javascript:void(0);">151</a>
                                            </h3>
                                            <button type="button" class="btn btn-primary">Lihat</button>
                                            <img src="../../vendor/app-assets/images/illustration/badge.svg" class="congratulation-medal" alt="Medal Pic" />
                                        </div>
                                    </div>
                                </div>
                                <!--/ Medal Card -->
                                <!-- Medal Card -->
                                <div class="col-xl-6 col-md-6 col-12">
                                    <div class="card card-congratulation-medal">
                                        <div class="card-body">
                                            <h3 class="mb-75 mt-2 pt-50">
                                                <a href="javascript:void(0);">Unit</a>
                                            </h3>
                                            <p class="card-text font-small-3">Lihat untuk mengetahui lebih lanjut</p>
                                            <h3 class="mb-75 mt-2 pt-50">
                                                <a href="javascript:void(0);">151</a>
                                            </h3>
                                            <button type="button" class="btn btn-primary">Lihat</button>
                                            <img src="../../vendor/app-assets/images/illustration/badge.svg" class="congratulation-medal" alt="Medal Pic" />
                                        </div>
                                    </div>
                                </div>
                                <!--/ Medal Card -->

                                <!-- Medal Card -->
                                <div class="col-xl-6 col-md-6 col-12">
                                    <div class="card card-congratulation-medal">
                                        <div class="card-body">
                                            <h3 class="mb-75 mt-2 pt-50">
                                                <a href="javascript:void(0);">Negara</a>
                                            </h3>
                                            <p class="card-text font-small-3">Lihat untuk mengetahui lebih lanjut</p>
                                            <h3 class="mb-75 mt-2 pt-50">
                                                <a href="javascript:void(0);">50</a>
                                            </h3>
                                            <button type="button" class="btn btn-primary">Lihat</button>
                                            <img src="../../vendor/app-assets/images/illustration/badge.svg" class="congratulation-medal" alt="Medal Pic" />
                                        </div>
                                    </div>
                                </div>
                                <!--/ Medal Card -->
                            </div>
                            <!-- </div> -->
                        </div>
                    </div>
                </section>
                <!-- Basic Carousel And Optional Carousel start end -->
                <!-- Basic Tables start -->
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Info Kerjasama</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Kerjasama</th>
                                            <th>Judul Kerjasama</th>
                                            <th>Unit Pengajuan</th>
                                            <th>Status</th>
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
                                            <td><span class="badge badge-pill badge-light-primary mr-1">Fakultas Ekonomi Bisnis</span></td>
                                            <td><span class="badge badge-pill badge-light-primary mr-1">Active</span></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow">
                                                        <i data-feather="more-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                            <i data-feather="edit-2" class="mr-50"></i>
                                                            <span>Edit</span>
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0);">
                                                            <i data-feather="trash" class="mr-50"></i>
                                                            <span>Delete</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Basic Tables end -->


                <!-- Dashboard Ecommerce ends -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <?php
    include "../../layout/footer.php";
    ?>

</body>
<!-- END: Body-->

</html>