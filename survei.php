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
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <div class="accordion list-group-item list-group-item-action active" type="button"
                  data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="true"
                  aria-controls="accordionTwo"><span><i data-feather="phone-call"></i> Kontak Kami</span>
                </div>
                <form method='POST' action='aksi_kuosioner.php'>
                  <table class="table">
                    <tr>
                      <td>
                        <div class="form-horizontal"
                          style="margin-top:20px;background-color:#fff;padding-top:20px;padding-bottom:20px;">
                          <div class="page-header" style="margin-left:30px;">
                            <h3>Informasi Pelanggan</h3>
                          </div>
                          <div class="form-group">
                            <label for="nama_pelanggan" class="control-label col-sm-2">Nama Pelanggan</label>
                            <div class="col-sm-3">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <span class="glyphicon glyphicon-user"></span>
                                </div>
                                <input type="text" id="nama_pelanggan" class="form-control" name="companyName"
                                  placeholder="Nama Pelanggan">
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="alamat_pelanggan" class="control-label col-sm-2">Alamat</label>
                            <div class="col-sm-3">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <span class="glyphicon glyphicon-bookmark"></span>
                                </div>
                                <input type="text" id="alamat_pelanggan" class="form-control" name="companyAddress1"
                                  placeholder="Alamat">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">

                            <label for="produk" class="control-label col-sm-2">Produk</label>
                            <div class="col-sm-3">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <span class="glyphicon glyphicon-tags"></span>
                                </div>
                                <select name="companyProduct" id="produk" class="form-control">
                                  <option value="Kartu Halo">Kartu Halo</option>
                                  <option value="Kartu AS">Kartu AS</option>
                                  <option value="Kartu Simpati">Kartu Simpati</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="hp" class="control-label col-sm-2">Telepon</label>
                            <div class="col-sm-3">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <span class="glyphicon glyphicon-phone"></span>
                                </div>
                                <input type="text" id="hp" class="form-control" name="companyHp"
                                  placeholder="No Handphone">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="tgl" class="control-label col-sm-2">Tanggal</label>
                            <div class="col-sm-3">
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <span class="glyphicon glyphicon-calender"></span>
                                </div>
                                <?php
                                                          include "includes/config.php";
                                                          $tanggal = date('Y-m-d');
                                                          $tglFinal = tanggal_indonesia($tanggal);
                                                          ?>
                                <input type="text" id="tgl" class="form-control" disabled="" name="companyName"
                                  value="<?php echo $tglFinal; ?>">
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td width="97%" valign="top" align="center" colspan="5"
                        style="border-style: none; border-width: medium">
                        <font face="Arial" size="1"><b>Mohon kesediaan Anda untuk memberikan
                            penilaian dan masukan kepada GraPari Telkomsel, dimana hal ini sangat bermanfaat
                            untuk meningkatkan kualitas layanan kami.<br>
                          </b><i>Silahkan diisi dengan mengklik option radio
                            serta keterangan sesuai dengan penilaian Anda
                            pada kolom yang telah disediakan</i></font>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="9">
                        <table class="table table-striped table-bordered">
                          <thead>
                            <th width='3%'><b>
                                <font face='Tahoma' size='2'>No</font>
                              </b></th>
                            <th colspan='2'>
                              <p align='center'><b>
                                  <font face='Tahoma' size='2'>DESKRIPSI</font>
                                </b>
                            </th>
                            <th colspan="5" bgcolor='#FFFF00'>
                              <p align='center'>
                                <font face='Tahoma' size='2'>KUALITAS</font>
                            </th>
                          </thead>
                          <tbody>
                            <?php
                                              include "includes/config.php";
                                              error_reporting(0);
                                              $no = 1;
                                              $sql = mysqli_query($kon, "SELECT * FROM tgroup");
                                              while($data = mysqli_fetch_array($sql)){
                                                  $id = $data['groupId'];
                                                  echo "<tr valign='top'>
                                                          <td><font face='Tahoma' size='2' colspan='1'><b> $no</b></font></td>
                                                          <td colspan='2'><font face='Tahoma' size='2'><b>$data[groupName]</b></font></td>
                                                          
                                                          <td height='25' width='8%' bgcolor='#000000'><p align='center'><font face='Tahoma' size='1' color='white'>A<br>(Sangat Baik)</font></td>
                                                          <td height='25' width='8%' bgcolor='#000000'><p align='center'><font face='Tahoma' size='1' color='white'>B<br>(Baik)</font></td>
                                                          <td height='25' width='8%' bgcolor='#000000'><p align='center'><font face='Tahoma' size='1' color='white'>C<br>(Cukup)</font></td>
                                                          <td height='25' width='8%' bgcolor='#000000'><p align='center'><font face='Tahoma' size='1' color='white'>D<br>(Buruk)</font></td>
                                                          <td height='25' width='8%' bgcolor='#000000'><p align='center'><font face='Tahoma' size='1' color='white'>E<br>(Sangat Buruk)</font></td>
                                                      </tr>";
                                                      
                                                  $hasil = mysqli_query($kon, "SELECT * FROM tdescription, tgroup WHERE tdescription.groupId = '$id' AND tdescription.groupId = tgroup.groupId ORDER BY tgroup.groupId");
                                                  $i = 1;
                                                  while ($r = mysqli_fetch_array($hasil)){
                                                  
                                                      echo "<tr>
                                                              <td colspan='1'></td>
                                                             
                                                              <td colspan='2'><font face='Tahoma' size='2'> $r[description]</font></td>
                                                              <td align='center'> <input type='radio' name='asfa$i$data[groupId]' value='A'> </td>
                                                              <td align='center'> <input type='radio' name='asfa$i$data[groupId]' value='B'> </td>
                                                              <td align='center'> <input type='radio' name='asfa$i$data[groupId]' value='C'> </td>
                                                              <td align='center'> <input type='radio' name='asfa$i$data[groupId]' value='D'> </td>
                                                              <td align='center'> <input type='radio' name='asfa$i$data[groupId]' value='E'> </td>
                                                              </tr>";
                                                      $i++;
                                                  }
                                                  echo "<br>";
                                                  $no++;
                                              }
                                              ?>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="8">
                        <div class="well">
                          <h4>Komentar / Saran...</h4>

                          <div class="form-group">
                            <textarea name='suggestion' class="form-control" rows="3"
                              placeholder="Tulis Komentar dan Saran..."></textarea>
                          </div>

                        </div>
                        <hr>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="8">
                        <center><button type="submit" class="btn btn-primary btn-lg">Submit</button></center>
                      </td>
                    </tr>
                    <tr>
                      <td width="97%" valign="top" align="center" colspan="5"
                        style="border-style: none; border-width: medium">
                        <center class="well">
                          <font face="Arial" size="1"><b>Terima Kasih Atas Waktu dan Masukan yang anda berikan,Semua
                              masukan yang anda berikan </b> </i></font>
                          <font face="Arial" size="1"><b>akan kami terima sebagai sarana bagi kami untuk meningkatkan
                              kulaitas pelanan kami</b> </i></font>
                        </center>
                      </td>
                    </tr>
                  </table>
                </form>
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
