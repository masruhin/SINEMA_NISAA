<?php
session_start();
if(empty($_SESSION['username'])){
  echo "<script>alert('Silahkan Login Terlebih Dahulu');window.location='index.php'</script>";
}
error_reporting();
include "config.php";

if (isset($_POST['tambah'])) {
  $tambah = mysqli_query($kon, "INSERT INTO jenis_dok (Jenis_dok, jenis_ket) VALUES ('$_POST[jenis_dok]','$_POST[jenis_ket]')");
  if ($tambah) {
    echo "<script>alert('Anda Berhasil Menambah Data');
          document.location='jenis_dok_data.php';
        </script>";
  }else{
		echo "<script>alert('Anda Gagal  Menambah Data');
          document.location='jenis_dok_data.php';
        </script>";
	}
}

if (isset($_POST['ubah'])) {
$id = isset($_GET['id_jenis_dok']) ? $_GET['id_jenis_dok'] : null;
$id = $_POST['id_jenis_dok'];
$jenis_dok = $_POST['jenis_dok'];
$jenis_ket = $_POST['jenis_ket'];
//query update
$query = "UPDATE jenis_dok SET jenis_dok='$jenis_dok', jenis_ket='$jenis_ket' WHERE id_jenis_dok='$id' ";
if (mysqli_query($kon,$query)) {
 # credirect ke page unit
 echo "<script type='text/javascript'>
			alert('Berhasil Ubah data.'); 
			document.location = 'jenis_dok_data.php'; 
		</script>";
}else{
 echo "ERROR, data gagal diupdate". mysqli_error($kon);
}
}
if(isset($_POST['delete']))
{
  $id = isset($_GET['id_jenis_dok']) ? $_GET['id_jenis_dok'] : null;
  $id = $_POST['id_jenis_dok'];
	//delete
	$sql = "DELETE FROM jenis_dok WHERE id_jenis_dok = '$id'";
	if(mysqli_query($kon, $sql))
	{
		echo "<script type='text/javascript'>
			alert('Berhasil Hapus data.'); 
			document.location = 'jenis_dok_data.php'; 
		</script>";
	} 
	else
	{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($kon);
	}

}

?>
