<?php
session_start();
if(empty($_SESSION['username'])){
  echo "<script>alert('Silahkan Login Terlebih Dahulu');window.location='index.php'</script>";
}
error_reporting();
include "config.php";

if (isset($_POST['tambah'])) {
  $tambah = mysqli_query($kon, "INSERT INTO unit (unit_nama) VALUES ('$_POST[unit_nama]')");
  if ($tambah) {
    echo "<script>alert('Anda Berhasil Menambah Data');
          document.location='unit_data.php';
        </script>";
  }else{
		echo "<script>alert('Anda Gagal  Menambah Data');
          document.location='unit_data.php';
        </script>";
	}
}

if (isset($_POST['ubah'])) {
$id = isset($_GET['id_unit']) ? $_GET['id_unit'] : null;
$id = $_POST['id_unit'];
$unit_nama = $_POST['unit_nama'];
//query update
$query = "UPDATE unit SET unit_nama='$unit_nama' WHERE id_unit='$id' ";
if (mysqli_query($kon,$query)) {
 # credirect ke page unit
 echo "<script type='text/javascript'>
			alert('Berhasil Ubah data.'); 
			document.location = 'unit_data.php'; 
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
			document.location = 'unit_data.php'; 
		</script>";
	} 
	else
	{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($kon);
	}

}

?>