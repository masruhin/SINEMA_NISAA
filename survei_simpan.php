<?php

//panggil kon database
include "includes/config.php";

//tampilkan data tikm
$tampil = mysqli_query($kon, "SELECT * from tikm limit 1");
$data = mysqli_fetch_array($tampil);
//tampung data ke dalam variabel
$id_ikm = $data['id_ikm'];
$puas = $data['puas'];
$cukup = $data['cukup'];
$kurang = $data['kurang'];

//ambil nilai keterangan
$keterangan = $_GET['ket'];

//uji jika keterangan tidak kosong
if(isset($keterangan)){
	//uji jika keterangan = simpan
	if($keterangan == "puas")
	{
		//nilai puas di tambah 1
		$puas = $puas + 1;
		//query update nilai puas dalam tabel tikm
		$query = "UPDATE tikm SET puas= '$puas' where id_ikm = '$id_ikm' ";
	}
	elseif($keterangan == "cukup")
	{
		//nilai cukup di tambah 1
		$cukup = $cukup + 1;
		//query update nilai cukup dalam tabel tikm
		$query = "UPDATE tikm SET cukup= '$cukup' where id_ikm = '$id_ikm' ";
	}
	elseif($keterangan == "kurang")
	{
		//nilai kurang di tambah 1
		$kurang = $kurang + 1;
		//query update nilai kurang dalam tabel tikm
		$query = "UPDATE tikm SET kurang= '$kurang' where id_ikm = '$id_ikm' ";
	}

	//update data sesuai query
	mysqli_query($kon, $query);
	echo "<script>alert('Terima kasih, anda berhasil memberikan penilaian.');document.location='survei.php'</script>";
}



?>
