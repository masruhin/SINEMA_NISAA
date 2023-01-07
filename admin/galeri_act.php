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
          $query    = mysqli_query($kon, "INSERT INTO galeri (judul,deskripsi,gambar) 
                                          VALUES('$judul','$deskripsi','$nama')");
          // var_dump($query);
          // die();
          if($query){
            echo "<script type='text/javascript'>
            alert('Berhasil Tambah data.'); 
            document.location = 'galeri.php'; 
          </script>";
          }
          else{
            echo "<script type='text/javascript'>
            alert('Gagal Insert data.'); 
            document.location = 'galeri.php'; 
          </script>";
          }
      }
      else{
        echo "<script type='text/javascript'>
        alert('File Terlalu Besar'); 
        document.location = 'galeri.php'; 
      </script>";
      }
  }
  else{
    echo "<script type='text/javascript'>
    alert('Berhasil'); 
    document.location = 'galeri.php'; 
  </script>";
  }
}


// Cek apakah galeri ingin mengubah fotonya atau tidak

if(isset($_POST['ubah_foto'])){ // Jika galeri menceklis checkbox yang ada di form ubah, lakukan :

  // Ambil data foto yang dipilih dari form
  $judul = $_POST['judul'];
  $deskripsi = $_POST['deskripsi'];

  $sumber = $_FILES['gambar']['name'];

  $nama_gambar = $_FILES['gambar']['tmp_name'];

  

  // Rename nama fotonya dengan menambahkan tanggal dan jam upload

  $fotobaru = date('dmYHis').$sumber;

  

  // Set path folder tempat menyimpan fotonya

  $path = "../img/".$fotobaru;



  if(move_uploaded_file($nama_gambar, $path)){ // Cek apakah gambar berhasil diupload atau tidak

      // Query untuk menampilkan data galeri berdasarkan id yang dikirim

      $query = "SELECT * FROM galeri WHERE id='".$id."'";

      $sql = mysqli_query($kon, $query); // Eksekusi/Jalankan query dari variabel $query

      $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql



      // Cek apakah file gambar sebelumnya ada di folder foto

      if(is_file("../img/".$data['foto'])) // Jika gambar ada

          unlink("../img/".$data['foto']); // Hapus file gambar sebelumnya yang ada di folder images

      

      // Proses ubah data ke Database

      $query = "update galeri set judul='$judul', deskripsi='$deskripsi', gambar='$fotobaru' where id='$id' ";

      $sql = mysqli_query($kon, $query); // Eksekusi/ Jalankan query dari variabel $query
var_dump($sql);
die();


      if($sql){ // Cek jika proses simpan ke database sukses atau tidak

          // Jika Sukses, Lakukan :

          header("location: index.php"); // Redirect ke halaman index.php

      }else{

          // Jika Gagal, Lakukan :

          echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";

          echo "<br><a href='index.php'>Kembali Ke Form</a>";

      }

  }else{

      // Jika gambar gagal diupload, Lakukan :

      echo   "<script> alert('Maaf, Gambar gagal untuk diupload'); 

              location = 'index.php'; 

              </script>";

  }

}else{ // Jika galeri tidak menceklis checkbox yang ada di form ubah, lakukan :

  // Proses ubah data ke Database

  $query = "update galeri set username='$username' where id='$id' ";

  $sql = mysqli_query($kon, $query); // Eksekusi/ Jalankan query dari variabel $query



  if($sql){ // Cek jika proses simpan ke database sukses atau tidak

      // Jika Sukses, Lakukan :

      header("location: index.php"); // Redirect ke halaman index.php

  }else{

      // Jika Gagal, Lakukan :

      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";

      echo "<br><a href='index.php'>Kembali Ke Form</a>";

  }

}



?>
