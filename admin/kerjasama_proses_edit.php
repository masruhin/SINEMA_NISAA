<?php
	session_start();
	include 'config.php';
  $id = $_POST['id_kerjasama'];
  // $status = $_POST['status_kerjasama'];
  $status = isset ($array['status_kerjasama']) ? $array['status_kerjasama']:'';
  $tawal = $_POST['tanggal_awal'];
  $takhir = $_POST['tanggal_akhir'];
  $id_dok = $_POST['id_jenis_dok'];
  $judul = $_POST['judul_kerjasama'];
  $deskripsi = $_POST['deskripsi_kerjasama'];
  $ref = $_POST['no_ref_kerjasama'];
  // $unit = $_POST['id_unit'];
  $unit = isset ($array['id_unit']) ? $array['id_unit']:'';

  $fak = $_POST['id_fak'];
  
  $file  = $_FILES['file']['name'];
  $nama = date("Y-m-d").'_'.basename($_FILES['file']['name']);
  date_default_timezone_set('Asia/Jakarta'); 
	
    //jika gambar tidak ada
	if ($file == ''){
		$sql = "UPDATE kerjasama set  id_jenis_dok 			   = '$id_dok',
                                      id_fak            	 = '$fak',
                                      id_unit		           = '$unit',
                                      judul_kerjasama	     = '$judul',
                                      deskripsi_kerjasama  = '$deskripsi',
                                      status_kerjasama     = '$status',
						                          tanggal_awal    	   = '$tawal',
                                      tanggal_akhir        = '$takhir',
                                      no_ref_kerjasama     = '$ref' 
				where id_kerjasama = $id";
				
        // var_dump($sql);
        // die();
		$execute = mysqli_query($kon, $sql);			
		// echo "<Center><h2><br>Data telah diubah</h2></center>
		// <meta http-equiv='refresh' content='2;url=kerjasama.php'>";
	}	
	else{
      $tipe_file 		= $_FILES['file']['type'];
      $ukuran_file 	= $_FILES['file']['size'];
      $tipe_files = array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip', 'png', 'jpg', 'mp4', 'avi');
      if (($tipe_files = array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip', 'png', 'jpg', 'mp4', 'avi')) and ($ukuran_file <= 10340000)){	
      $nama = date("Y-m-d").'_'.basename($_FILES['file']['name']);

			$ext_file		= substr($file, strripos($file, '.'));			
			$tmp_file 		= $_FILES['file']['tmp_name'];
			
			// $nama_baru = $thnNow.'-'. $ext_file;
			// $path = "../dok/".$nama_baru;
      move_uploaded_file($tmp_file, '../dok/' . $nama);
			
			$sql = "UPDATE kerjasama set  id_jenis_dok 			   = '$id_dok',
                                      id_fak            	 = '$fak',
                                      id_unit		           = '$unit',
                                      judul_kerjasama	     = '$judul',
                                      deskripsi_kerjasama  = '$deskripsi',
                                      status_kerjasama     = '$status',
						                          tanggal_awal    	   = '$tawal',
                                      tanggal_akhir        = '$takhir',
                                      no_ref_kerjasama     = '$ref',
                                      file			= '$nama' 
				where id_kerjasama = $id";
				echo '<pre>';
        print_r($sql);
        echo'</pre>';
        var_dump($sql);
              die();
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
