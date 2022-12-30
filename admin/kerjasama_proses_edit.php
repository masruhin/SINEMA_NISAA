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
        $tgl_masuk                  = date('Y-m-d H:i:s', strtotime($tanggalmasuk_suratmasuk));
        $tgl_surat                  = date('Y-m-d', strtotime($tanggalsurat_suratmasuk));
        $tgl_disp1                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi1));
        $tgl_disp2                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi2));
        $tgl_disp3                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi3));
	
	$sql  		= "SELECT * FROM kerjasama where id_kerjasama='".$id."'";                        
	$query  	= mysqli_query($kon, $sql);
	$data 		= mysqli_fetch_array($query);
	
    //jika gambar tidak ada
	if ($file_suratmasuk == ''){
		$ext			= substr($data['file'], strripos($data['file'], '.'));	
		$nama_b  		= $thnNow.'-'. $ext;
		rename("aset/".$data['file'], "aset/".$ext);
		$sql = "UPDATE kerjasama set  id_jenis_dok 			   = '$id_dok',
                                      id_fak            	 = '$fak',
                                      id_unit		           = '$unit',
                                      judul_kerjasama	     = '$judul',
                                      deskripsi_kerjasama  = '$deskripsi',
                                      status_kerjasama     = '$status',
						                          tanggal_awal    	   = '$tawal',
                                      tanggal_akhir        = '$takhir',
                                      no_ref_kerjasama     = '$ref',
                                      date_created         = '$date_created',
						                          file			= '$ext' 
				where id_kerjasama = $id";
				
		$execute = mysqli_query($kon, $sql);			
						var_dump($execute);
            die();
		echo "<Center><h2><br>Data telah diubah</h2></center>
		<meta http-equiv='refresh' content='2;url=kerjasama.php'>";
	}	
	else{
        $tipe_file 		= $_FILES['file']['type'];
        $ukuran_file 	= $_FILES['file']['size'];
        $tipe_file = array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip', 'png', 'jpg', 'mp4', 'avi');
		if (($tipe_file = array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip', 'png', 'jpg', 'mp4', 'avi')) and ($ukuran_file <= 10340000)){	
			unlink("aset/".$data['file']);
			$ext_file		= substr($file_suratmasuk, strripos($file_suratmasuk, '.'));			
			$tmp_file 		= $_FILES['file']['tmp_name'];
			
			$nama_baru = $thnNow.'-'. $ext_file;
			$path = "aset/".$nama_baru;
			move_uploaded_file($tmp_file, $path);
			
			$sql = "UPDATE kerjasama set  id_jenis_dok 			   = '$id_dok',
                                      id_fak            	 = '$fak',
                                      id_unit		           = '$unit',
                                      judul_kerjasama	     = '$judul',
                                      deskripsi_kerjasama  = '$deskripsi',
                                      status_kerjasama     = '$status',
						                          tanggal_awal    	   = '$tawal',
                                      tanggal_akhir        = '$takhir',
                                      no_ref_kerjasama     = '$ref',
                                      date_created         = '$date_created',
                                      file			= '$nama_baru' 
				where id_kerjasama = $id";
				
			$execute = mysqli_query($kon, $sql);			
		
			echo "<Center><h2><br>Data  telah diubah</h2></center>
				<meta http-equiv='refresh' content='2;url=kerjasama.php'>";			
		}
		else{
			echo "<Center><h2><br>File yang anda masukkan tidak sesuai ketentuan<br>Silahkan Ulangi</h2></center>
      <meta http-equiv='refresh' content='2;url=kerjasama.php'>";			
		}
	
	}
	?>
