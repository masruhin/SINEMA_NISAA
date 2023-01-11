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
<!-- BEGIN: Content-->
<div class="app-content content ">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
      <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
          <div class="col-12">
            <h2 class="content-header-title float-left mb-0">Informasi</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="content-body">
      <!-- search header -->
      <section id="faq-search-filter">
        <div class="card faq-search" style="background-image: url('../../../app-assets/images/banner/banner.png')">
          <div class="card-body text-center">
            <!-- main title -->
            <h2 class="text-primary">Informasi Kerjasama dan Dokumen Pendukung</h2>

            <!-- subtitle -->
            <span class="badge badge-pill badge-light-success mr-1 lg" style="background-color: rgb(26 179 31 / 43%);
    color: #020202 !important;">Pilih Menu untuk megetahui Informasi lebih
              lengkap!</span>
          </div>
        </div>
      </section>
      <!-- /search header -->

      <!-- frequently asked questions tabs pills -->
      <section id="faq-tabs">
        <!-- vertical tab pill -->
        <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="faq-navigation d-flex justify-content-between flex-column mb-2 mb-md-0">
              <!-- pill tabs navigation -->
              <ul class="nav nav-pills nav-left flex-column" role="tablist">
                <!-- payment -->
                <li class="nav-item">
                  <a class="nav-link active" id="payment" data-toggle="pill" href="#faq-payment" aria-expanded="true"
                    role="tab">
                    <i data-feather="download" class="font-medium-3 mr-1"></i>
                    <span class="font-weight-bold">Panduan Kerjasama</span>
                  </a>
                </li>

                <!-- delivery -->
                <li class="nav-item">
                  <a class="nav-link" id="delivery" data-toggle="pill" href="#faq-delivery" aria-expanded="false"
                    role="tab">
                    <i data-feather="globe" class="font-medium-3 mr-1"></i>
                    <span class="font-weight-bold">Situs Instansi</span>
                  </a>
                </li>

                <!-- cancellation and return -->
                <li class="nav-item">
                  <a class="nav-link" id="cancellation-return" data-toggle="pill" href="#faq-cancellation-return"
                    aria-expanded="false" role="tab">
                    <i data-feather="refresh-cw" class="font-medium-3 mr-1"></i>
                    <span class="font-weight-bold">Cancellation & Return</span>
                  </a>
                </li>

                <!-- my order -->
                <li class="nav-item">
                  <a class="nav-link" id="my-order" data-toggle="pill" href="#faq-my-order" aria-expanded="false"
                    role="tab">
                    <i data-feather="package" class="font-medium-3 mr-1"></i>
                    <span class="font-weight-bold">My Orders</span>
                  </a>
                </li>

                <!-- product and services-->
                <li class="nav-item">
                  <a class="nav-link" id="product-services" data-toggle="pill" href="#faq-product-services"
                    aria-expanded="false" role="tab">
                    <i data-feather="settings" class="font-medium-3 mr-1"></i>
                    <span class="font-weight-bold">Product & Services</span>
                  </a>
                </li>
              </ul>

              <!-- FAQ image -->
              <img src="vendor/app-assets/images/illustration/faq-illustrations.svg" class="img-fluid d-none d-md-block"
                alt="demand img" />
            </div>
          </div>

          <div class="col-lg-9 col-md-8 col-sm-12">
            <!-- pill tabs tab content -->
            <div class="tab-content">
              <!-- payment panel -->
              <div role="tabpanel" class="tab-pane active" id="faq-payment" aria-labelledby="payment"
                aria-expanded="true">
                <!-- icon and header -->
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-tag bg-light-primary mr-1">
                    <i data-feather="download" class="font-medium-4"></i>
                  </div>
                  <div>
                    <h4 class="mb-0">Panduan Kerjasama</h4>
                    <span> Dokumen untuk Informasi Panduan Kerjasama</span>
                  </div>
                </div>

                <!-- frequent answer and question  collapse  -->
                <div class="collapse-margin collapse-icon mt-2" id="faq-payment-qna">
                  <div class="card">
                    <div class="card-header" id="paymentOne" data-toggle="collapse" role="button"
                      data-target="#faq-payment-one" aria-expanded="false" aria-controls="faq-payment-one">
                      <span class="lead collapse-title">Klik & Download Untuk Mengetahui Informasi Dokumen</span>
                    </div>

                    <div id="faq-payment-one" class="collapse" aria-labelledby="paymentOne"
                      data-parent="#faq-payment-qna">
                      <div class="card-body table-responsive">
                        <table id="dataTables" class="table table-striped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Dokumen</th>
                              <th>File</th>
                              <th>Tanggal DI Upload</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
											include "includes/config.php";
											$no = 1;
											$data = mysqli_query($kon, "SELECT * FROM panduan ORDER BY id ASC");
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
                              <td><?php echo $hasil ['dok'];?></td>
                              <td>
                                <?php if ($hasil['dok']!=0) {?>
                                <button
                                  onclick="JavaScript:window.location.href='admin/panduan_download.php?dok=<?php echo $hasil['dok']?>';"
                                  class="btn btn-outline-info round btn-sm">Download</button>
                                <?php }else{ ?>
                                <span class="badge badge-pill badge-light-danger mr-1 lg">Tidak ada file!</span>
                                <?php }
                    ?>
                              <td><?php echo $hasil ['date_created'];?></td>
                              <td style="text-align:center ;">
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

              <!-- delivery panel -->
              <div class="tab-pane" id="faq-delivery" role="tabpanel" aria-labelledby="delivery" aria-expanded="false">
                <!-- icon and header -->
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-tag bg-light-primary mr-1">
                    <i data-feather="globe" class="font-medium-4"></i>
                  </div>
                  <div>
                    <h4 class="mb-0">Situs Instansi</h4>
                    <span>Referensi Situs Web Instansi atau Perusahaan</span>
                  </div>
                </div>

                <!-- frequent answer and question  collapse  -->
                <div class="collapse-margin collapse-icon mt-2" id="faq-delivery-qna">
                  <div class="card">
                    <div class="card-header" id="deliveryOne" data-toggle="collapse" role="button"
                      data-target="#faq-delivery-one" aria-expanded="false" aria-controls="faq-delivery-one">
                      <span class="lead collapse-title">Data Situs Instansi (Silahkan Klik)</span>
                    </div>

                    <div id="faq-delivery-one" class="collapse" aria-labelledby="deliveryOne"
                      data-parent="#faq-delivery-qna">
                      <div class="card-body table-responsive">
                        <table id="dataTables" class="table table-striped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>NAMA INSTANSI</th>
                              <th>NAMA SITUS</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
											include "includes/config.php";
											$no = 1;
											$data = mysqli_query($kon, "SELECT * FROM instansi ORDER BY nama_instansi ASC");
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
                              <td><?php echo $hasil ['nama_instansi'];?></td>
                              <td><a href="<?php echo $hasil ['situs_instansi'];?>"
                                  target="_blank"><strong><?php echo $hasil ['situs_instansi'];?></strong></a>
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

              <!-- cancellation return  -->
              <div class="tab-pane" id="faq-cancellation-return" role="tabpanel" aria-labelledby="cancellation-return"
                aria-expanded="false">
                <!-- icon and header -->
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-tag bg-light-primary mr-1">
                    <i data-feather="refresh-cw" class="font-medium-4"></i>
                  </div>
                  <div>
                    <h4 class="mb-0">Cancellation & Return</h4>
                    <span>Which license do I need?</span>
                  </div>
                </div>

                <!-- frequent answer and question  collapse  -->
                <div class="collapse-margin collapse-icon mt-2" id="faq-cancellation-qna">
                  <div class="card">
                    <div class="card-header" id="cancellationOne" data-toggle="collapse" role="button"
                      data-target="#faq-cancellation-one" aria-expanded="false" aria-controls="faq-cancellation-one">
                      <span class="lead collapse-title">
                        Can my security guard or neighbour receive my shipment if I am not available?
                      </span>
                    </div>

                    <div id="faq-cancellation-one" class="collapse" aria-labelledby="cancellationOne"
                      data-parent="#faq-cancellation-qna">
                      <div class="card-body">
                        Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans gummi bears
                        sweet roll
                        bonbon muffin liquorice. Wafer lollipop sesame snaps. Brownie macaroon cookie muffin cupcake
                        candy
                        caramels tiramisu. Oat cake chocolate cake sweet jelly-o brownie biscuit marzipan. Jujubes donut
                        marzipan chocolate bar. Jujubes sugar plum jelly beans tiramisu icing cheesecake.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="cancellationTwo" data-toggle="collapse" role="button"
                      data-target="#faq-cancellation-two" aria-expanded="false" aria-controls="faq-cancellation-two">
                      <span class="lead collapse-title">How can I get the contact number of my delivery agent?</span>
                    </div>
                    <div id="faq-cancellation-two" class="collapse" aria-labelledby="cancellationTwo"
                      data-parent="#faq-cancellation-qna">
                      <div class="card-body">
                        Sweet pie candy jelly. Sesame snaps biscuit sugar plum. Sweet roll topping fruitcake. Caramels
                        liquorice biscuit ice cream fruitcake cotton candy tart. Donut caramels gingerbread jelly-o
                        gingerbread pudding. Gummi bears pastry marshmallow candy canes pie. Pie apple pie carrot cake.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="cancellationThree" data-toggle="collapse" role="button"
                      data-target="#faq-cancellation-three" aria-expanded="false"
                      aria-controls="faq-cancellation-three">
                      <span class="lead collapse-title">How can I cancel my shipment?</span>
                    </div>
                    <div id="faq-cancellation-three" class="collapse" aria-labelledby="cancellationThree"
                      data-parent="#faq-cancellation-qna">
                      <div class="card-body">
                        Tart gummies dragée lollipop fruitcake pastry oat cake. Cookie jelly jelly macaroon icing jelly
                        beans
                        soufflé cake sweet. Macaroon sesame snaps cheesecake tart cake sugar plum. Dessert jelly-o sweet
                        muffin chocolate candy pie tootsie roll marzipan. Carrot cake marshmallow pastry. Bonbon biscuit
                        pastry topping toffee dessert gummies. Topping apple pie pie croissant cotton candy dessert
                        tiramisu.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="cancellationFour" data-toggle="collapse" role="button"
                      data-target="#faq-cancellation-four" aria-expanded="false" aria-controls="faq-cancellation-four">
                      <span class="lead collapse-title">I have received a defective/damaged product. What do I
                        do?</span>
                    </div>
                    <div id="faq-cancellation-four" class="collapse" aria-labelledby="cancellationFour"
                      data-parent="#faq-cancellation-qna">
                      <div class="card-body">
                        Cheesecake muffin cupcake dragée lemon drops tiramisu cake gummies chocolate cake. Marshmallow
                        tart
                        croissant. Tart dessert tiramisu marzipan lollipop lemon drops. Cake bonbon bonbon gummi bears
                        topping
                        jelly beans brownie jujubes muffin. Donut croissant jelly-o cake marzipan. Liquorice marzipan
                        cookie
                        wafer tootsie roll. Tootsie roll sweet cupcake.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="cancellationFive" data-toggle="collapse" role="button"
                      data-target="#faq-cancellation-five" aria-expanded="false" aria-controls="faq-cancellation-five">
                      <span class="lead collapse-title">How do I change my delivery address?</span>
                    </div>
                    <div id="faq-cancellation-five" class="collapse" aria-labelledby="cancellationFive"
                      data-parent="#faq-cancellation-qna">
                      <div class="card-body">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum
                        dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                        qui
                        officia deserunt mollit anim id est laborum.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="cancellationSix" data-toggle="collapse" role="button"
                      data-target="#faq-cancellation-six" aria-expanded="false" aria-controls="faq-cancellation-six">
                      <span class="lead collapse-title">
                        What documents do I need to carry for self-collection of my shipment?
                      </span>
                    </div>
                    <div id="faq-cancellation-six" class="collapse" aria-labelledby="cancellationSix"
                      data-parent="#faq-cancellation-qna">
                      <div class="card-body">
                        At tempor commodo ullamcorper a lacus vestibulum. Ultrices neque ornare aenean euismod. Dui
                        vivamus
                        arcu felis bibendum. Turpis in eu mi bibendum neque egestas congue. Nullam ac tortor vitae purus
                        faucibus ornare suspendisse sed. Commodo viverra maecenas accumsan lacus vel facilisis volutpat
                        est
                        velit. Tortor consequat id porta nibh. Id aliquet lectus proin nibh nisl condimentum id
                        venenatis a.
                        Faucibus nisl tincidunt eget nullam non nisi. Enim nunc faucibus a pellentesque. Pellentesque
                        diam
                        volutpat commodo sed egestas egestas fringilla phasellus. Nec nam aliquam sem et tortor
                        consequat id.
                        Fringilla est ullamcorper eget nulla facilisi. Morbi tristique senectus et netus et.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="cancellationSeven" data-toggle="collapse" role="button"
                      data-target="#faq-cancellation-seven" aria-expanded="false"
                      aria-controls="faq-cancellation-seven">
                      <span class="lead collapse-title">
                        What are the timings for self-collecting shipments from the Delhivery Branch?
                      </span>
                    </div>
                    <div id="faq-cancellation-seven" class="collapse" aria-labelledby="cancellationSeven"
                      data-parent="#faq-cancellation-qna">
                      <div class="card-body">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et
                        dolore magna aliqua. Euismod lacinia at quis risus sed vulputate odio ut enim. Dictum at tempor
                        commodo ullamcorper a lacus vestibulum.
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- my order -->
              <div class="tab-pane" id="faq-my-order" role="tabpanel" aria-labelledby="my-order" aria-expanded="false">
                <!-- icon and header -->
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-tag bg-light-primary mr-1">
                    <i data-feather="package" class="font-medium-4"></i>
                  </div>
                  <div>
                    <h4 class="mb-0">My Orders</h4>
                    <span>Which license do I need?</span>
                  </div>
                </div>

                <!-- frequent answer and question  collapse  -->
                <div class="collapse-margin collapse-icon mt-2" id="faq-my-order-qna">
                  <div class="card">
                    <div class="card-header" id="myOrderOne" data-toggle="collapse" role="button"
                      data-target="#faq-my-order-one" aria-expanded="false" aria-controls="faq-my-order-one">
                      <span class="lead collapse-title">Can I avail of an open delivery?</span>
                    </div>

                    <div id="faq-my-order-one" class="collapse" aria-labelledby="myOrderOne"
                      data-parent="#faq-my-order-qna">
                      <div class="card-body">
                        Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans gummi bears
                        sweet roll
                        bonbon muffin liquorice. Wafer lollipop sesame snaps. Brownie macaroon cookie muffin cupcake
                        candy
                        caramels tiramisu. Oat cake chocolate cake sweet jelly-o brownie biscuit marzipan. Jujubes donut
                        marzipan chocolate bar. Jujubes sugar plum jelly beans tiramisu icing cheesecake.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="myOrderTwo" data-toggle="collapse" role="button"
                      data-target="#faq-my-order-two" aria-expanded="false" aria-controls="faq-my-order-two">
                      <span class="lead collapse-title">
                        I haven’t received the refund of my returned shipment. What do I do?
                      </span>
                    </div>
                    <div id="faq-my-order-two" class="collapse" aria-labelledby="myOrderTwo"
                      data-parent="#faq-my-order-qna">
                      <div class="card-body">
                        Sweet pie candy jelly. Sesame snaps biscuit sugar plum. Sweet roll topping fruitcake. Caramels
                        liquorice biscuit ice cream fruitcake cotton candy tart. Donut caramels gingerbread jelly-o
                        gingerbread pudding. Gummi bears pastry marshmallow candy canes pie. Pie apple pie carrot cake.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="myOrderThree" data-toggle="collapse" role="button"
                      data-target="#faq-my-order-three" aria-expanded="false" aria-controls="faq-my-order-three">
                      <span class="lead collapse-title"> How can I ship my order to an international location? </span>
                    </div>
                    <div id="faq-my-order-three" class="collapse" aria-labelledby="myOrderThree"
                      data-parent="#faq-my-order-qna">
                      <div class="card-body">
                        Tart gummies dragée lollipop fruitcake pastry oat cake. Cookie jelly jelly macaroon icing jelly
                        beans
                        soufflé cake sweet. Macaroon sesame snaps cheesecake tart cake sugar plum. Dessert jelly-o sweet
                        muffin chocolate candy pie tootsie roll marzipan. Carrot cake marshmallow pastry. Bonbon biscuit
                        pastry topping toffee dessert gummies. Topping apple pie pie croissant cotton candy dessert
                        tiramisu.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="myOrderFour" data-toggle="collapse" role="button"
                      data-target="#faq-my-order-four" aria-expanded="false" aria-controls="faq-my-order-four">
                      <span class="lead collapse-title"> I missed the delivery of my order today. What should I do?
                      </span>
                    </div>
                    <div id="faq-my-order-four" class="collapse" aria-labelledby="myOrderFour"
                      data-parent="#faq-my-order-qna">
                      <div class="card-body">
                        Cheesecake muffin cupcake dragée lemon drops tiramisu cake gummies chocolate cake. Marshmallow
                        tart
                        croissant. Tart dessert tiramisu marzipan lollipop lemon drops. Cake bonbon bonbon gummi bears
                        topping
                        jelly beans brownie jujubes muffin. Donut croissant jelly-o cake marzipan. Liquorice marzipan
                        cookie
                        wafer tootsie roll. Tootsie roll sweet cupcake.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="myOrderFive" data-toggle="collapse" role="button"
                      data-target="#faq-my-order-five" aria-expanded="false" aria-controls="faq-my-order-five">
                      <span class="lead collapse-title"> The delivery of my order is delayed. What should I do? </span>
                    </div>
                    <div id="faq-my-order-five" class="collapse" aria-labelledby="myOrderFive"
                      data-parent="#faq-my-order-qna">
                      <div class="card-body">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum
                        dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                        qui
                        officia deserunt mollit anim id est laborum.
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- product services -->
              <div class="tab-pane" id="faq-product-services" role="tabpanel" aria-labelledby="product-services"
                aria-expanded="false">
                <!-- icon and header -->
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-tag bg-light-primary mr-1">
                    <i data-feather="settings" class="font-medium-4"></i>
                  </div>
                  <div>
                    <h4 class="mb-0">Product & Services</h4>
                    <span>Which license do I need?</span>
                  </div>
                </div>

                <!-- frequent answer and question  collapse  -->
                <div class="collapse-margin collapse-icon mt-2" id="faq-product-qna">
                  <div class="card">
                    <div class="card-header" id="productOne" data-toggle="collapse" role="button"
                      data-target="#faq-product-one" aria-expanded="false" aria-controls="faq-product-one">
                      <span class="lead collapse-title">
                        How can I register a complaint against the courier executive who came to deliver my order?
                      </span>
                    </div>

                    <div id="faq-product-one" class="collapse" aria-labelledby="productOne"
                      data-parent="#faq-product-qna">
                      <div class="card-body">
                        Pastry pudding cookie toffee bonbon jujubes jujubes powder topping. Jelly beans gummi bears
                        sweet roll
                        bonbon muffin liquorice. Wafer lollipop sesame snaps. Brownie macaroon cookie muffin cupcake
                        candy
                        caramels tiramisu. Oat cake chocolate cake sweet jelly-o brownie biscuit marzipan. Jujubes donut
                        marzipan chocolate bar. Jujubes sugar plum jelly beans tiramisu icing cheesecake.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="productTwo" data-toggle="collapse" role="button"
                      data-target="#faq-product-two" aria-expanded="false" aria-controls="faq-product-two">
                      <span class="lead collapse-title">
                        The status for my shipment shows as ‘not picked up’. What do I do?
                      </span>
                    </div>
                    <div id="faq-product-two" class="collapse" aria-labelledby="productTwo"
                      data-parent="#faq-product-qna">
                      <div class="card-body">
                        Sweet pie candy jelly. Sesame snaps biscuit sugar plum. Sweet roll topping fruitcake. Caramels
                        liquorice biscuit ice cream fruitcake cotton candy tart. Donut caramels gingerbread jelly-o
                        gingerbread pudding. Gummi bears pastry marshmallow candy canes pie. Pie apple pie carrot cake.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="productThree" data-toggle="collapse" role="button"
                      data-target="#faq-product-three" aria-expanded="false" aria-controls="faq-product-three">
                      <span class="lead collapse-title">How can I get a proof of delivery for my shipment?</span>
                    </div>
                    <div id="faq-product-three" class="collapse" aria-labelledby="productThree"
                      data-parent="#faq-product-qna">
                      <div class="card-body">
                        Tart gummies dragée lollipop fruitcake pastry oat cake. Cookie jelly jelly macaroon icing jelly
                        beans
                        soufflé cake sweet. Macaroon sesame snaps cheesecake tart cake sugar plum. Dessert jelly-o sweet
                        muffin chocolate candy pie tootsie roll marzipan. Carrot cake marshmallow pastry. Bonbon biscuit
                        pastry topping toffee dessert gummies. Topping apple pie pie croissant cotton candy dessert
                        tiramisu.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="productFour" data-toggle="collapse" role="button"
                      data-target="#faq-product-four" aria-expanded="false" aria-controls="faq-product-four">
                      <span class="lead collapse-title">How can I avail your services?</span>
                    </div>
                    <div id="faq-product-four" class="collapse" aria-labelledby="productFour"
                      data-parent="#faq-product-qna">
                      <div class="card-body">
                        Cheesecake muffin cupcake dragée lemon drops tiramisu cake gummies chocolate cake. Marshmallow
                        tart
                        croissant. Tart dessert tiramisu marzipan lollipop lemon drops. Cake bonbon bonbon gummi bears
                        topping
                        jelly beans brownie jujubes muffin. Donut croissant jelly-o cake marzipan. Liquorice marzipan
                        cookie
                        wafer tootsie roll. Tootsie roll sweet cupcake.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- / frequently asked questions tabs pills -->

      <!-- contact us -->
      <?php 
      include 'includes/config.php';
      $data = mysqli_query($kon, "SELECT * FROM web");
      if (!$data) {
        printf("Error: %s\n", mysqli_error($kon));
        exit();
      }
      while($hasil = mysqli_fetch_array($data)){
      ?>
      <section class="faq-contact">
        <div class="row mt-5 pt-75">
          <div class="col-12 text-center">
            <h2>Masih Memiliki pertanyaan?</h2>
            <p class="mb-3">
              Jika Anda tidak dapat menemukan pertanyaan di FAQ kami, Anda selalu dapat menghubungi kami. Kami akan
              menjawab Anda segera!
            </p>
          </div>
          <div class="col-sm-6">
            <div class="card text-center faq-contact-card shadow-none py-1">
              <div class="card-body">
                <div class="avatar avatar-tag bg-light-primary mb-2 mx-auto">
                  <i data-feather="phone-call" class="font-medium-3"></i>
                </div>
                <h4> <?php echo $hasil['telpon']; ?></h4>
                <span class="text-body">Kami selalu senang membantu!</span>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card text-center faq-contact-card shadow-none py-1">
              <div class="card-body">
                <div class="avatar avatar-tag bg-light-primary mb-2 mx-auto">
                  <i data-feather="mail" class="font-medium-3"></i>
                </div>
                <h4><?php echo $hasil['email']; ?></h4>
                <span class="text-body">Atau bisa hubungi kami melalui email untuk mendapatkan jawaban lebih
                  cepat!</span>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--/ contact us -->

    </div>
  </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<?php include "includes/footer.php";?>

</body>

</html>
<?php } ?>
