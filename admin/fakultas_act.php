<?php
session_start();
if(empty($_SESSION['username'])){
  echo "<script>alert('Silahkan Login Terlebih Dahulu');window.location='index.php'</script>";
}
error_reporting();
include "config.php";

if (isset($_POST['tambah'])) {
  $tambah = mysqli_query($kon, "INSERT INTO fakultas (fak_kode, fak_nama, fak_ket) VALUES ('$_POST[fak_kode]','$_POST[fak_nama]','$_POST[fak_ket]')");
  if ($tambah) {
    echo "<script>alert('Anda Berhasil Menambah Data');
          document.location='fakultas_data.php';
        </script>";
  }else{
		echo "<script>alert('Anda Gagal  Menambah Data');
          document.location='fakultas_data.php';
        </script>";
	}
}

if (isset($_POST['ubah'])) {
$id = isset($_GET['id_fak']) ? $_GET['id_fak'] : null;
$id = $_POST['id_fak'];
$fak_kode = $_POST['fak_kode'];
$fak_nama = $_POST['fak_nama'];
$fak_ket = $_POST['fak_ket'];
//query update
$query = "UPDATE fakultas SET fak_kode='$fak_kode', fak_nama='$fak_nama', fak_ket='$fak_ket' WHERE id_fak='$id' ";
if (mysqli_query($kon,$query)) {
 # credirect ke page unit
 echo "<script type='text/javascript'>
			alert('Berhasil Ubah data.'); 
			document.location = 'fakultas_data.php'; 
		</script>";
}else{
 echo "ERROR, data gagal diupdate". mysqli_error($kon);
}
}
if(isset($_POST['delete']))
{
  $id = isset($_GET['id_unit']) ? $_GET['id_unit'] : null;
  $id = $_POST['id_unit'];
	//delete
	$sql = "DELETE FROM unit WHERE id_unit = '$id'";
	if(mysqli_query($kon, $sql))
	{
		echo "<script type='text/javascript'>
			alert('Berhasil Hapus data.'); 
			document.location = 'fakultas_data.php'; 
		</script>";
	} 
	else
	{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($kon);
	}

}

?>