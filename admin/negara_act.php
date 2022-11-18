<?php
session_start();
if(empty($_SESSION['username'])){
  echo "<script>alert('Silahkan Login Terlebih Dahulu');window.location='index.php'</script>";
}
error_reporting();
include "config.php";

if (isset($_POST['tambah'])) {
  $tambah = mysqli_query($kon, "INSERT INTO negara (negara_nama) VALUES ('$_POST[negara_nama]')");
//   var_dump($tambah);
// die();
  if ($tambah) {
    echo "<script>alert('Anda Berhasil Menambah Data');
          document.location='negara_data.php';
        </script>";
  }else{
		echo "<script>alert('Anda Gagal  Menambah Data');
          document.location='negara_data.php';
        </script>";
	}
}

if (isset($_POST['ubah'])) {
$id = isset($_GET['id']) ? $_GET['id'] : null;
$id = $_POST['id'];
$negara = $_POST['negara'];
//query update
$query = "UPDATE negara SET negara_nama='$negara' WHERE id='$id' ";
if (mysqli_query($kon,$query)) {
 # credirect ke page index
 echo "<script type='text/javascript'>
			alert('Berhasil Ubah data.'); 
			document.location = 'negara_data.php'; 
		</script>";
//  header("location:negara_data.php"); 
}else{
 echo "ERROR, data gagal diupdate". mysqli_error($kon);
}
}
//mysql_close($host);
if(isset($_POST['delete']))
{
  $id = isset($_GET['id']) ? $_GET['id'] : null;
  $id = $_POST['id'];
	//delete
	$sql = "DELETE FROM negara WHERE id = '$id'";
	if(mysqli_query($kon, $sql))
	{
		echo "<script type='text/javascript'>
			alert('Berhasil Hapus data.'); 
			document.location = 'negara_data.php'; 
		</script>";
	} 
	else
	{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}

}

?>