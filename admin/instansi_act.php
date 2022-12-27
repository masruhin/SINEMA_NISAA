<?php
session_start();
if(empty($_SESSION['username'])){
  echo "<script>alert('Silahkan Login Terlebih Dahulu');window.location='index.php'</script>";
}
error_reporting();
include "config.php";

if (isset($_POST['tambah'])) {
  $tambah = mysqli_query($kon, "INSERT INTO instansi (instansi_nama, situs_nama) VALUES ('$_POST[instansi_nama]','$_POST[situs_nama]')");
  if ($tambah) {
    echo "<script>alert('Anda Berhasil Menambah Data');
          document.location='kerjasama.php';
        </script>";
  }else{
		echo "<script>alert('Anda Gagal  Menambah Data');
          document.location='kerjasama.php';
        </script>";
	}
}

if (isset($_POST['ubah'])) {
$id = isset($_GET['id_instansi']) ? $_GET['id_instansi'] : null;
$id = $_POST['id_instansi'];
$instansi_nama = $_POST['instansi_nama'];
$situs_nama = $_POST['situs_nama'];
//query update
$query = "UPDATE instansi SET instansi_nama='$instansi_nama', situs_nama='$situs_nama' WHERE id_instansi='$id' ";
if (mysqli_query($kon,$query)) {
 # credirect ke page unit
 echo "<script type='text/javascript'>
			alert('Berhasil Ubah data.'); 
			document.location = 'kerjasama.php'; 
		</script>";
}else{
 echo "ERROR, data gagal diupdate". mysqli_error($kon);
}
}
if(isset($_POST['delete']))
{
  $id = isset($_GET['id_instansi']) ? $_GET['id_instansi'] : null;
  $id = $_POST['id_instansi'];
	//delete
	$sql = "DELETE FROM instansi WHERE id_instansi = '$id'";
	if(mysqli_query($kon, $sql))
	{
		echo "<script type='text/javascript'>
			alert('Berhasil Hapus data.'); 
			document.location = 'kerjasama.php'; 
		</script>";
	} 
	else
	{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($kon);
	}

}

?>
