<?php 
session_start();
if(empty($_SESSION['username'])){
  echo "<script>alert('Silahkan Login Terlebih Dahulu');window.location='index.php'</script>";
}
error_reporting();
include "config.php";

if($_POST['upload']){

  $status_kerjasama = $_POST['status_kerjasama'];
  $tanggal_awal = date('Y-m-d');
  $tanggal_akhir = date('Y-m-d');
  $id_jenis_dok     = $_POST['id_jenis_dok'];
  $judul_kerjasama  = $_POST['judul_kerjasama'];
  $deskripsi_kerjasama = $_POST['deskripsi_kerjasama'];
  $no_ref_kerjasama    = $_POST['no_ref_kerjasama'];

  
  $ekstensi_diperbolehkan    = array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip', 'png', 'jpg', 'mp4', 'avi');
  $nama    = $_FILES['file_ijazah']['name'];
  $x        = explode('.', $nama);
  $ekstensi    = strtolower(end($x));
  $ukuran        = $_FILES['file_ijazah']['size'];
  $file_tmp    = $_FILES['file_ijazah']['tmp_name']; 


  
  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 304407000){ 
          move_uploaded_file($file_tmp, 'aset/'.$nama);
          $query    = mysqli_query($kon, "INSERT INTO tb_ijazah VALUES(NULL, '$nomor', '$nama')");
          if($query){
              echo 'FILE BERHASIL DI UPLOAD!';
          }
          else{
              echo 'FILE GAGAL DI UPLOAD!';
          }
      }
      else{
          echo 'UKURAN FILE TERLALU BESAR!';
      }
  }
  else{
      echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!';
  }
}

?>
