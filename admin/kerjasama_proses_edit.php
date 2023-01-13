<?php 
session_start();
if(empty($_SESSION['username'])){
  echo "<script>alert('Silahkan Login Terlebih Dahulu');window.location='index.php'</script>";
}
error_reporting();
include "config.php";

if (isset($_POST['ubah'])) {
  $id       = $_POST['id_kerjasama'];
  $jenis_dok = $_POST['id_jenis_dok'];
  $fak      = $_POST['id_fak'];
  $unit     = $_POST['id_unit'];
  $judul    = $_POST['judul_kerjasama'];
  $deskripsi = $_POST['deskripsi_kerjasama'];
  $status    = $_POST['status'];
  $tanggal_awal   = $_POST['tawal'];
  $tanggal_akhir  = $_POST['takhir'];
  $noref          = $_POST['no_ref_kerjasama'];
  // $file         = $data['file'];
  
  $gambar = $_FILES['file']['name'];
  if ($gambar != "") {
    $ekstensi_diperbolehkan = array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip');
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['file']['tmp_name'];
    $angka_acak = rand(1,999);

    $namabaru = $angka_acak.'-'.$gambar;

    if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
      move_uploaded_file($file_tmp, '../dok/'. $namabaru);

      $query = "UPDATE kerjasama SET id_jenis_dok='$jenis_dok',
                                          id_fak='$fak',
                                          id_unit='$unit',
                                          judul_kerjasama='$judul',
                                          deskripsi_kerjasama='$deskripsi',
                                          status_kerjasama='$status',
                                          tanggal_awal='$tanggal_awal',
                                          tanggal_akhir='$tanggal_akhir',
                                          no_ref_kerjasama='$noref',
                                          file ='$namabaru' WHERE id_kerjasama='$id'";
      $result = mysqli_query($kon, $query); 
      // echo '<pre>';
      // print_r($result);
      // die();
      // echo '</pre>';
      if (!$result) {
        die ("Query gagal dijalankan: ".mysqli_errno($kon).
                             " - ".mysqli_error($kon));
      }else {
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
      echo "<script>alert('Data berhasil diubah.');window.location='kerjasama.php';</script>";
      }
    } else {     
      //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
         echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='kerjasama_edit.php';</script>";
     }
    
  }else {
    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
    $query  = "UPDATE kerjasama SET id_jenis_dok='$jenis_dok', id_fak='$fak', id_unit='$unit', 	judul_kerjasama='$judul', deskripsi_kerjasama='$deskripsi', status_kerjasama='$status', tanggal_awal='$tanggal_awal', tanggal_akhir='$tanggal_akhir', no_ref_kerjasama='$noref' WHERE id_kerjasama='$id'";
    // $query .= "WHERE id = '$id'";
    $result = mysqli_query($kon, $query);
    // periska query apakah ada error
    if(!$result){
          die ("Query gagal dijalankan: ".mysqli_errno($kon).
                           " - ".mysqli_error($kon));
    } else {
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
        echo "<script>alert('Data berhasil diubah.');window.location='kerjasama.php';</script>";
    }
  }
} 

?>
