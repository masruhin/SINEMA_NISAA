<?php 
session_start();
if(empty($_SESSION['username'])){
  echo "<script>alert('Silahkan Login Terlebih Dahulu');window.location='index.php'</script>";
}
error_reporting();
include "config.php";

if (isset($_POST['upload'])) {

  $status_kerjasama = $_POST['status_kerjasama'];
  $date = date('Y-m-d');
  $tanggal_awal = $_POST['tanggal_awal'];
  $tanggal_akhir = $_POST['tanggal_akhir'];
  $id_jenis_dok     = $_POST['id_jenis_dok'];
  $id_fak     = $_POST['id_fak'];
  $id_unit     = $_POST['id_unit'];
  $judul_kerjasama  = $_POST['judul_kerjasama'];
  $deskripsi_kerjasama = $_POST['deskripsi_kerjasama'];
  $no_ref_kerjasama    = $_POST['no_ref_kerjasama'];

  
  $ekstensi_diperbolehkan    = array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip', 'png', 'jpg', 'mp4', 'avi');
  $nama = date("Y-m-d").'_'.basename($_FILES['file']['name']);
  // $nama    = $_FILES['file']['name'];
  $x        = explode('.', $nama);
  $ekstensi    = strtolower(end($x));
  $ukuran        = $_FILES['file']['size'];
  $file_tmp    = $_FILES['file']['tmp_name']; 
  
  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 304407000){ 
          move_uploaded_file($file_tmp, 'aset/' . 'PERANGKAT_' . $nama);
          $query    = mysqli_query($kon, "INSERT INTO kerjasama (status_kerjasama,
                                                                  tanggal_awal,
                                                                  tanggal_akhir,
                                                                  id_jenis_dok,
                                                                  id_fak,
                                                                  id_unit,
                                                                  judul_kerjasama,
                                                                  deskripsi_kerjasama,
                                                                  no_ref_kerjasama,
                                                                  file ) 
                                          VALUES('$status_kerjasama', 
                                                  '$tanggal_awal',
                                                  '$tanggal_akhir',
                                                  '$id_jenis_dok',
                                                  '$id_fak',
                                                  '$id_unit',
                                                  '$judul_kerjasama',
                                                  '$deskripsi_kerjasama',
                                                  '$no_ref_kerjasama',
                                                  '$nama')");
          // var_dump($query);
          // die();
          if($query){
            echo "<script type='text/javascript'>
            alert('Berhasil Tambah data.'); 
            document.location = 'kerjasama.php'; 
          </script>";
          }
          else{
            echo "<script type='text/javascript'>
            alert('Gagal Insert data.'); 
            document.location = 'kerjasama.php'; 
          </script>";
          }
      }
      else{
        echo "<script type='text/javascript'>
        alert('File Terlalu Besar'); 
        document.location = 'kerjasama.php'; 
      </script>";
      }
  }
  else{
    echo "<script type='text/javascript'>
    alert('Berhasil'); 
    document.location = 'kerjasama.php'; 
  </script>";
  }
}

?>
