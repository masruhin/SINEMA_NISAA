<?php
session_start();
if(empty($_SESSION['username'])){
  echo "<script>alert('Silahkan Login Terlebih Dahulu');window.location='index.php'</script>";
}
error_reporting();
include "config.php";

if (isset($_POST['tambah'])) {
  $tambah = mysqli_query($kon, "INSERT INTO universitas (univ_nama, 
                                                        univ_alamat, 
                                                        univ_telp, 
                                                        univ_wa, 
                                                        univ_email, 
                                                        univ_fax) 
                                    VALUES ('$_POST[univ_nama]',
                                            '$_POST[univ_alamat]',
                                            '$_POST[univ_telp]',
                                            '$_POST[univ_wa]',
                                            '$_POST[univ_email]',
                                            '$_POST[univ_fax]')");
  if ($tambah) {
    echo "<script>alert('Anda Berhasil Menambah Data');
          document.location='universitas_data.php';
        </script>";
  }else{
		echo "<script>alert('Anda Gagal  Menambah Data');
          document.location='universitas_data.php';
        </script>";
	}
}

if (isset($_POST['ubah'])) {
$id = isset($_GET['id_univ']) ? $_GET['id_univ'] : null;
$id = $_POST['id_univ'];
$univ_nama    = $_POST['univ_nama'];
$univ_alamat  = $_POST['univ_alamat'];
$univ_telp    = $_POST['univ_telp'];
$univ_wa      = $_POST['univ_wa'];
$univ_email   = $_POST['univ_email'];
$univ_fax     = $_POST['univ_fax'];

//query update
$query = "UPDATE universitas SET univ_nama='$univ_nama',
                                univ_alamat='$univ_alamat',
                                univ_telp='$univ_telp',
                                univ_wa='$univ_wa',
                                univ_email='$univ_email',
                                univ_fax='$univ_fax'
                          WHERE id_univ='$id'";
                          // echo"<pre>";
                          // var_dump($query);
                          // echo "</pre>";
                          // die();
if (mysqli_query($kon,$query)) {
 # credirect ke page unit
 echo "<script type='text/javascript'>
			alert('Berhasil Ubah data.'); 
			document.location = 'universitas_data.php'; 
		</script>";
}else{
 echo "ERROR, data gagal diupdate". mysqli_error($kon);
}
}
if(isset($_POST['delete']))
{
  $id = isset($_GET['id_univ']) ? $_GET['id_univ'] : null;
  $id = $_POST['id_univ'];
	//delete
	$sql = "DELETE FROM universitas WHERE id_univ = '$id'";
  // var_dump($sql);
  // die();
	if(mysqli_query($kon, $sql))
	{
		echo "<script type='text/javascript'>
			alert('Berhasil Hapus data.'); 
			document.location = 'universitas_data.php'; 
		</script>";
	} 
	else
	{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($kon);
	}

}

?>