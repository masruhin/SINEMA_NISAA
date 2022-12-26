<?php
	session_start();
	include 'config.php';
  // $id	= $_POST['id_suratmasuk'];
  $id = $_POST['id_kerjasama'];
  $status = $_POST['status_kerjasama'];
  $tawal = $_POST['tanggal_awal'];
  $takhir = $_POST['tanggal_akhir'];
  $id_dok = $_POST['id_jenis_dok'];
  $judul = $_POST['judul_kerjasama'];
  $deskripsi = $_POST['deskripsi_kerjasama'];
  $ref = $_POST['no_ref_kerjasama'];
  $unit = $_POST['id_unit'];
  $fak = $_POST['id_fak'];

	$file_suratmasuk			            = $_FILES['file']['name'];
    date_default_timezone_set('Asia/Jakarta'); 
		$tanggal_entry  = date("Y-m-d H:i:s");
    $thnNow = date("Y");

	$sql  		= "SELECT * FROM kerjasama where id_kerjasama='".$id."'";                        
	$query  	= mysqli_query($kon, $sql);
	$data 		= mysqli_fetch_array($query);
	
    //jika gambar tidak ada
	if ($file_suratmasuk == ''){
		$ext			= substr($data['file'], strripos($data['file'], '.'));	
		$nama_b  		= $thnNow.'-'.$nomorurut_suratmasuk. $ext;
		rename("aset/".$data['file_suratmasuk'], "../surat_masuk/".$nama_b);
		$sql = "UPDATE tb_suratmasuk set 
						tanggalmasuk_suratmasuk     = '$tgl_masuk',
						kode_suratmasuk    		    = '$kode_suratmasuk',
                        nomorurut_suratmasuk        = '$nomorurut_suratmasuk',
						nomor_suratmasuk 			= '$nomor_suratmasuk',
						tanggalsurat_suratmasuk	    = '$tgl_surat',
                        pengirim                    = '$pengirim',
						kepada_suratmasuk           = '$kepada_suratmasuk',
						perihal_suratmasuk		    = '$perihal_suratmasuk',
                        operator            	    = '$operator',
                        tanggal_entry               = '$tanggal_entry',
                        disposisi1                  = '$disposisi1',
                        tanggal_disposisi1          = '$tgl_disp1',
                        disposisi2                  = '$disposisi2',
                        tanggal_disposisi2          = '$tgl_disp2',
                        disposisi3                  = '$disposisi3',
                        tanggal_disposisi3          = '$tgl_disp3',
						file_suratmasuk			= '$nama_b' 
				where id_suratmasuk = $id";
				
		$execute = mysqli_query($db, $sql);			
						
		echo "<Center><h2><br>Data Surat masuk telah diubah</h2></center>
		<meta http-equiv='refresh' content='2;url=../detail-suratmasuk.php?id_suratmasuk=".$id."'>";
	}	
	else{
		
        $tipe_file 		= $_FILES['file_suratmasuk']['type'];
        $ukuran_file 	= $_FILES['file_suratmasuk']['size'];
		if (($tipe_file == "application/pdf") and ($ukuran_file <= 10340000)){	
			unlink("../surat_masuk/".$data['file_suratmasuk']);
			$ext_file		= substr($file_suratmasuk, strripos($file_suratmasuk, '.'));			
			$tmp_file 		= $_FILES['file_suratmasuk']['tmp_name'];
			
			$nama_baru = $thnNow.'-'.$nomorurut_suratmasuk. $ext_file;
			$path = "../surat_masuk/".$nama_baru;
			move_uploaded_file($tmp_file, $path);
			
			$sql = "UPDATE tb_suratmasuk set 
						tanggalmasuk_suratmasuk     = '$tgl_masuk',
						kode_suratmasuk    		    = '$kode_suratmasuk',
                        nomorurut_suratmasuk        = '$nomorurut_suratmasuk',
						nomor_suratmasuk 			= '$nomor_suratmasuk',
						tanggalsurat_suratmasuk	    = '$tgl_surat',
                        pengirim                    = '$pengirim',
						kepada_suratmasuk           = '$kepada_suratmasuk',
						perihal_suratmasuk		    = '$perihal_suratmasuk',
                        operator            	    = '$operator',
                        tanggal_entry               = '$tanggal_entry',
                        disposisi1                  = '$disposisi1',
                        tanggal_disposisi1          = '$tgl_disp1',
                        disposisi2                  = '$disposisi2',
                        tanggal_disposisi2          = '$tgl_disp2',
                        disposisi3                  = '$disposisi3',
                        tanggal_disposisi3          = '$tgl_disp3',
						file_suratmasuk			= '$nama_baru' 
				where id_suratmasuk = $id";
				
			$execute = mysqli_query($db, $sql);			
		
			echo "<Center><h2><br>Data Surat masuk telah diubah</h2></center>
				<meta http-equiv='refresh' content='2;url=../detail-suratmasuk.php?id_suratmasuk=".$id."'>";			
		}
		else{
			echo "<Center><h2><br>File yang anda masukkan tidak sesuai ketentuan<br>Silahkan Ulangi</h2></center>
				<meta http-equiv='refresh' content='2;url=../editsuratmasuk.php?id_suratmasuk=".$id."'>";
		}
	
	}
	?>
