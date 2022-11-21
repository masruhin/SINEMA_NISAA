<?php
session_start();
if(empty($_SESSION['username'])){
  echo "<script>alert('Silahkan Login Terlebih Dahulu');window.location='index.php'</script>";
}
error_reporting();
include "config.php";

if (isset($_POST['tambah'])) {
  $tambah = mysqli_query($kon, "INSERT INTO lembaga (lembaga_kode, lembaga_nama, lembaga_ket) VALUES ('$_POST[lembaga_kode]','$_POST[lembaga_nama]','$_POST[lembaga_ket]')");
  if ($tambah) {
    echo "<script>alert('Anda Berhasil Menambah Data');
          document.location='lembaga_data.php';
        </script>";
  }else{
		echo "<script>alert('Anda Gagal  Menambah Data');
          document.location='lembaga_data.php';
        </script>";
	}
}

if (isset($_POST['ubah'])) {
$id = isset($_GET['id_lembaga']) ? $_GET['id_lembaga'] : null;
$id = $_POST['id_lembaga'];
$lembaga_kode = $_POST['lembaga_kode'];
$lembaga_nama = $_POST['lembaga_nama'];
$lembaga_ket = $_POST['lembaga_ket'];
//query update
$query = "UPDATE lembaga SET lembaga_kode='$lembaga_kode', lembaga_nama='$lembaga_nama', lembaga_ket='$lembaga_ket' WHERE id_lembaga='$id' ";
if (mysqli_query($kon,$query)) {
 # credirect ke page unit
 echo "<script type='text/javascript'>
			alert('Berhasil Ubah data.'); 
			document.location = 'lembaga_data.php'; 
		</script>";
}else{
 echo "ERROR, data gagal diupdate". mysqli_error($kon);
}
}
if(isset($_POST['delete']))
{
  $id = isset($_GET['id_lembaga']) ? $_GET['id_lembaga'] : null;
  $id = $_POST['id_lembaga'];
	//delete
	$sql = "DELETE FROM lembaga WHERE id_lembaga = '$id'";
	if(mysqli_query($kon, $sql))
	{
		echo "<script type='text/javascript'>
			alert('Berhasil Hapus data.'); 
			document.location = 'lembaga_data.php'; 
		</script>";
	} 
	else
	{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($kon);
	}

}

?>