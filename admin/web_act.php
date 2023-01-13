<?php 
session_start();
if(empty($_SESSION['username'])){
  echo "<script>alert('Silahkan Login Terlebih Dahulu');window.location='index.php'</script>";
}
error_reporting();
include "config.php";

if (isset($_POST['upload'])) {

  $date = date('Y-m-d');
  $judul = $_POST['judul'];
  $deskripsi = $_POST['deskripsi'];
  $alamat = $_POST['alamat'];
  $telpon = $_POST['telpon'];
  $email = $_POST['email'];
  $instagram = $_POST['instagram'];

  
  $ekstensi_diperbolehkan    = array('png', 'jpg', 'mp4', 'jpeg');
  $nama = date("Y-m-d").'_'.basename($_FILES['gambar']['name']);
  // $nama    = $_FILES['gambar']['name'];
  $x        = explode('.', $nama);
  $ekstensi    = strtolower(end($x));
  $ukuran        = $_FILES['gambar']['size'];
  $file_tmp    = $_FILES['gambar']['tmp_name']; 
  
  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 304407000){ 
          move_uploaded_file($file_tmp, '../img/' . $nama);
          $query    = mysqli_query($kon, "INSERT INTO web (judul,deskripsi,telpon,email,alamat,instagram,gambar) 
                                          VALUES('$judul','$deskripsi','$telepon','$email','$alamat','$instagram','$nama')");
          var_dump($query);
          die();
          if($query){
            echo "<script type='text/javascript'>
            alert('Berhasil Tambah data.'); 
            document.location = 'web.php'; 
          </script>";
          }
          else{
            echo "<script type='text/javascript'>
            alert('Gagal Insert data.'); 
            document.location = 'web.php'; 
          </script>";
          }
      }
      else{
        echo "<script type='text/javascript'>
        alert('File Terlalu Besar'); 
        document.location = 'web.php'; 
      </script>";
      }
  }
  else{
    echo "<script type='text/javascript'>
    alert('Berhasil'); 
    document.location = 'web.php'; 
  </script>";
  }
}
if (isset($_POST['ubah'])) {
  // $id = isset($_GET['id']) ? $_GET['id'] : null;
  $id = $_POST['id'];
  $judul = $_POST['judul'];
  $deskripsi = $_POST['deskripsi'];
  $alamat = $_POST['alamat'];
  $telpon = $_POST['telpon'];
  $email = $_POST['email'];
  $instagram = $_POST['instagram'];
  $gambar = $_FILES['gambar']['name'];
  if ($gambar != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg', 'mp4', 'jpeg','img');
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $angka_acak = rand(1,999);

    $namabaru = $angka_acak.'-'.$gambar;

    if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
      move_uploaded_file($file_tmp, '../img/'. $namabaru);

      $query = "UPDATE web SET judul='$judul', deskripsi='$deskripsi', alamat='$alamat', telpon='$telpon', email='$email', instagram='$instagram', gambar='$namabaru' WHERE id='$id'";
      $result = mysqli_query($kon, $query); 
      var_dump($result);
      die();
      if (!$result) {
        die ("Query gagal dijalankan: ".mysqli_errno($kon).
                             " - ".mysqli_error($kon));
      }else {
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
      echo "<script>alert('Data berhasil diubah.');window.location='web.php';</script>";
      }
    } else {     
      //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
         echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='web.php';</script>";
     }
    
  }else {
    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
    $query  = "UPDATE web SET judul='$judul',
                              deskripsi='$deskripsi',
                              alamat='$alamat',
                              telpon='$telpon',
                              email='$email', 
                              instagram='$instagram' 
                              WHERE id='$id'";
    // $query .= "WHERE id = '$id'";
    $result = mysqli_query($kon, $query);
    var_dump($result);
    die();
    // periska query apakah ada error
    if(!$result){
          die ("Query gagal dijalankan: ".mysqli_errno($kon).
                           " - ".mysqli_error($kon));
    } else {
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
        echo "<script>alert('Data berhasil diubah.');window.location='web.php';</script>";
    }
  }
} 

if(isset($_POST['delete']))
{
  $id = isset($_GET['id']) ? $_GET['id'] : null;
  $id = $_POST['id'];
	//delete
	$sql = "DELETE FROM web WHERE id = '$id'";
	if(mysqli_query($kon, $sql))
	{
		echo "<script type='text/javascript'>
			alert('Berhasil Hapus data.'); 
			document.location = 'web.php'; 
		</script>";
	} 
	else
	{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($kon);
	}

}

     #parameter
          // $act = empty($_POST['act']) ? $_GET['act'] : $_POST['act'];
          $id = $_POST['id'];
          $judul = $_POST['judul'];
          $deskripsi = $_POST['deskripsi'];
          $alamat = $_POST['alamat'];
          $telpon = $_POST['telpon'];
          $email = $_POST['email'];
          $instagram = $_POST['instagram'];
          // $urls = base_url('konfigurasi');
     #parameter
     if (isset($_POST['tambah'])) {
      $ekstensi_diperbolehkan    = array('png', 'jpg', 'mp4', 'jpeg');
      $nama = date("Y-m-d").'_'.basename($_FILES['gambar']['name']);
      // $nama    = $_FILES['file']['name'];
      $x        = explode('.', $nama);
      $ekstensi    = strtolower(end($x));
      $ukuran        = $_FILES['gambar']['size'];
      $file_tmp    = $_FILES['gambar']['tmp_name']; 
      
      if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
          if($ukuran < 304407000){ 
              move_uploaded_file($file_tmp, '../img/' . $nama);
              $query    = mysqli_query($kon, "INSERT INTO web (judul, deskripsi, telpon, alamat, instagram, gambar) 
                                              VALUES('$judul', 
                                                      '$deskripsi',
                                                      '$alamat',
                                                      '$telpon',
                                                      '$email',
                                                      '$instagram',
                                                      '$nama')");
              var_dump($query);
              die();
              if($query){
                echo "<script type='text/javascript'>
                alert('Berhasil Tambah data.'); 
                document.location = 'web.php'; 
              </script>";
              }
              else{
                echo "<script type='text/javascript'>
                alert('Gagal Insert data.'); 
                document.location = 'web.php'; 
              </script>";
              }
          }
          else{
            echo "<script type='text/javascript'>
            alert('File Terlalu Besar'); 
            document.location = 'web.php'; 
          </script>";
          }
      }
      else{
        echo "<script type='text/javascript'>
        alert('Berhasil'); 
        document.location = 'web.php'; 
      </script>";
      }
    }
    
     
    //  if ( $act == "ubah" ) {

    //       $old_cog = $kon->query(
    //            "select * from konfigurasi limit 1"
    //       )->fetch_object();

    //       if ( !empty($logo) ) {
    //            $result_upload = upload_images( $dir_name, "logo" );
    //            $row = json_decode($result_upload);
    //            $logo_name = $row->data; 
    //            if( $old_cog->logo ) {
    //                 remove_image($dir_name,$old_cog->logo);
    //            }
    //       } else {
    //            $logo_name = $old_cog->logo ? $old_cog->logo : "";
    //       }
          
    //       if( $row->response != 302 ){
    //            $kon->query(
    //                 "UPDATE konfigurasi set 
    //                      judul='$judul',
    //                      deskripsi='$deskripsi',
    //                      alamat='$alamat',
    //                      telpon='$telpon',
    //                      email='$email',
    //                      instagram='$instagram',
    //                      logo='$logo_name' "
    //            ) or die( $kon->error );
    //       } else {
    //            if ( $row->message == "error_size" ){
    //                 alert("Ukuran File Terlalu Besar !");
    //            } else if ( $row->message == "error_ext" ) {
    //                 alert("Ekstension File Tidak Diperbolehkan !");
    //            }
    //       }
    //       redirect($urls);
    //  } 
