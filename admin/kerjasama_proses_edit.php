<?php
	session_start();
	include 'config.php';
  // $id	= $_POST['id_suratmasuk'];
  $id = $_POST['id_kerjasama'];
  $status = $_POST['status_kerjasama'];
  $tawal = $_POST['tawal'];
  $takhir = $_POST['takhir'];
  $id_fak = $_POST['id_fak'];
  $id_u = $_POST['id_u'];
  $id_dok = $_POST['id_dok'];
  $judul = $_POST['judul'];
  $deskripsi = $_POST['deskripsi'];
  $no_ref = $_POST['no_ref'];
  $unit = $_POST['id_u'];
  
  $nama_file    = $_FILES['file']['name'];
  $lokasi_file  = $_FILES['file']['tmp_name'];
  $tipe_file    = $_FILES['file']['type'];
	
  if($lokasi_file==""){
    $simpan = mysqli_query($kon, "UPDATE kerjasama SET id_jenis_dok='$id_dok', id_fak='$id_fak', id_unit='$unit', judul_kerjasama='$judul', deskripsi_kerjasama='$deskripsi', status_kerjasama='$status', tanggal_awal='$tawal', tanggal_akhir='$takhir', no_ref_kerjasama='$no_ref' WHERE id_kerjasama='$id'") or die(mysqli_error($kon));
    echo '<pre>';
    var_dump($simpan);
    echo'</pre>';

    die();
   }
   else {
      $data=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM kerjasama WHERE id_kerjasama='$_POST[id_kerjasama]'"));
        if($data['file'] != "") unlink("../dok/$data[file]");
      
      move_uploaded_file($lokasi_file,"../dok/$nama_file");
       $simpan =  mysqli_query($kon, "UPDATE kerjasama SET id_jenis_dok='$id_dok', id_fak='$id_fak', id_unit='$unit', judul_kerjasama='$judul', deskripsi_kerjasama='$deskripsi', status_kerjasama='$status', tanggal_awal='$tawal', tanggal_akhir='$takhir', no_ref_kerjasama='$no_ref', file= '$nama_file' WHERE id_kerjasama='$_POST[id_kerjasama]'") 
      or die(mysqli_error($kon));
   }
   
  
  if($simpan)
    {
      echo "<script>alert('Data Berhasil disimpan ')</script>";
      echo '<script type="text/javascript">window.location="kerjasama.php"</script>';    
    }
  else
    {
    echo "<script>alert('Gagal Menyimpan Data ')</script>";
    echo '<script type="text/javascript">window.location="kerjasama.php"</script>'; 
    }
  
  ?>
