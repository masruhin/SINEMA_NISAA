<?php
session_start();
if(empty($_SESSION['username'])){
  echo "<script>alert('Silahkan Login Terlebih Dahulu');window.location='index.php'</script>";
}
error_reporting();
include "config.php";

if (isset($_POST['tambah'])) {
  $tambah = mysqli_query($kon, "INSERT INTO bentuk_kerjasama (bkerja_nama) VALUES ('$_POST[bkerja_nama]')");
  if ($tambah) {
    echo "<script>alert('Anda Berhasil Menambah Data');
          document.location='bentuk_kerjasama_data.php';
        </script>";
  }else{
		echo "<script>alert('Anda Gagal  Menambah Data');
          document.location='bentuk_kerjasama_data.php';
        </script>";
	}
}

if (isset($_POST['ubah'])) {
$id = isset($_GET['id_bkerja']) ? $_GET['id_bkerja'] : null;
$id = $_POST['id_bkerja'];
$bkerja_nama = $_POST['bkerja_nama'];
//query update
$query = "UPDATE bentuk_kerjasama SET bkerja_nama='$bkerja_nama' WHERE id_bkerja='$id' ";
if (mysqli_query($kon,$query)) {
 # credirect ke page unit
 echo "<script type='text/javascript'>
			alert('Berhasil Ubah data.'); 
			document.location = 'bentuk_kerjasama_data.php'; 
		</script>";
}else{
 echo "ERROR, data gagal diupdate". mysqli_error($kon);
}
}
if(isset($_POST['delete']))
{
  $id = isset($_GET['id_bkerja']) ? $_GET['id_bkerja'] : null;
  $id = $_POST['id_bkerja'];
	//delete
	$sql = "DELETE FROM bentuk_kerjasama WHERE id_bkerja = '$id'";
	if(mysqli_query($kon, $sql))
	{
		echo "<script type='text/javascript'>
			alert('Berhasil Hapus data.'); 
			document.location = 'bentuk_kerjasama_data.php'; 
		</script>";
	} 
	else
	{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($kon);
	}

}

?>