<?php 
session_start();
if(empty($_SESSION['username'])){
  echo "<script>alert('Silahkan Login Terlebih Dahulu');window.location='index.php'</script>";
}
error_reporting();
include "config.php";

if (isset($_POST['upload'])) {

  $date = date('Y-m-d');
  $judul = $_POST['judul'];
  $deskripsi = $_POST['deskripsi'];
  $alamat = $_POST['alamat'];
  $telpon = $_POST['telpon'];
  $email = $_POST['email'];
  $instagram = $_POST['instagram'];

  
  $ekstensi_diperbolehkan    = array('png', 'jpg', 'mp4', 'jpeg');
  $nama = date("Y-m-d").'_'.basename($_FILES['gambar']['name']);
  // $nama    = $_FILES['gambar']['name'];
  $x        = explode('.', $nama);
  $ekstensi    = strtolower(end($x));
  $ukuran        = $_FILES['gambar']['size'];
  $file_tmp    = $_FILES['gambar']['tmp_name']; 
  
  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 304407000){ 
          move_uploaded_file($file_tmp, '../img/' . $nama);
          $query    = mysqli_query($kon, "INSERT INTO web (judul,deskripsi,telpon,email,alamat,instagram,gambar) 
                                          VALUES('$judul','$deskripsi','$alamat','$telpon','$email','$instagram','$nama')");
          // var_dump($query);
          // die();
          if($query){
            echo "<script type='text/javascript'>
            alert('Berhasil Tambah data.'); 
            document.location = 'web.php'; 
          </script>";
          }
          else{
            echo "<script type='text/javascript'>
            alert('Gagal Insert data.'); 
            document.location = 'web.php'; 
          </script>";
          }
      }
      else{
        echo "<script type='text/javascript'>
        alert('File Terlalu Besar'); 
        document.location = 'web.php'; 
      </script>";
      }
  }
  else{
    echo "<script type='text/javascript'>
    alert('Berhasil'); 
    document.location = 'web.php'; 
  </script>";
  }
}
if (isset($_POST['ubah'])) {
  $id = isset($_GET['id_kerjasama']) ? $_GET['id_kerjasama'] : null;
  $id = $_POST['id_kerjasama'];
  $status = $_POST['status_kerjasama'];
  $tawal = $_POST['tanggal_awal'];
  $takhir = $_POST['tanggal_akhir'];
  $fak = $_POST['id_fak'];
  $id_dok = $_POST['id_jenis_dok'];
  $judul = $_POST['judul_kerjasama'];
  $deskripsi = $_POST['deskripsi_kerjasama'];
  $ref = $_POST['no_ref_kerjasama'];
  $unit = $_POST['id_unit'];

  $ekstensi_diperbolehkan    = array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip', 'png', 'jpg', 'mp4', 'avi');
  $nama = date("Y-m-d").'_'.basename($_FILES['file']['name']);
  $x        = explode('.', $nama);
  $ekstensi    = strtolower(end($x));
  $ukuran        = $_FILES['file']['size'];
  $file_tmp    = $_FILES['file']['tmp_name']; 
  
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
  $id = isset($_GET['id_kerjasama']) ? $_GET['id_kerjasama'] : null;
  $id = $_POST['id_kerjasama'];
	//delete
	$sql = "DELETE FROM kerjasama WHERE id_kerjasama = '$id'";
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

     #parameter
          // $act = empty($_POST['act']) ? $_GET['act'] : $_POST['act'];
          $id = $_POST['id'];
          $judul = $_POST['judul'];
          $deskripsi = $_POST['deskripsi'];
          $alamat = $_POST['alamat'];
          $telpon = $_POST['telpon'];
          $email = $_POST['email'];
          $instagram = $_POST['instagram'];
          // $urls = base_url('konfigurasi');
     #parameter
     if (isset($_POST['tambah'])) {
      $ekstensi_diperbolehkan    = array('png', 'jpg', 'mp4', 'jpeg');
      $nama = date("Y-m-d").'_'.basename($_FILES['gambar']['name']);
      // $nama    = $_FILES['file']['name'];
      $x        = explode('.', $nama);
      $ekstensi    = strtolower(end($x));
      $ukuran        = $_FILES['gambar']['size'];
      $file_tmp    = $_FILES['gambar']['tmp_name']; 
      
      if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
          if($ukuran < 304407000){ 
              move_uploaded_file($file_tmp, '../img/' . $nama);
              $query    = mysqli_query($kon, "INSERT INTO web (judul, deskripsi, telpon, alamat, instagram, gambar) 
                                              VALUES('$judul', 
                                                      '$deskripsi',
                                                      '$alamat',
                                                      '$telpon',
                                                      '$email',
                                                      '$instagram',
                                                      '$nama')");
              var_dump($query);
              die();
              if($query){
                echo "<script type='text/javascript'>
                alert('Berhasil Tambah data.'); 
                document.location = 'web.php'; 
              </script>";
              }
              else{
                echo "<script type='text/javascript'>
                alert('Gagal Insert data.'); 
                document.location = 'web.php'; 
              </script>";
              }
          }
          else{
            echo "<script type='text/javascript'>
            alert('File Terlalu Besar'); 
            document.location = 'web.php'; 
          </script>";
          }
      }
      else{
        echo "<script type='text/javascript'>
        alert('Berhasil'); 
        document.location = 'web.php'; 
      </script>";
      }
    }
    
     
    //  if ( $act == "ubah" ) {

    //       $old_cog = $kon->query(
    //            "select * from konfigurasi limit 1"
    //       )->fetch_object();

    //       if ( !empty($logo) ) {
    //            $result_upload = upload_images( $dir_name, "logo" );
    //            $row = json_decode($result_upload);
    //            $logo_name = $row->data; 
    //            if( $old_cog->logo ) {
    //                 remove_image($dir_name,$old_cog->logo);
    //            }
    //       } else {
    //            $logo_name = $old_cog->logo ? $old_cog->logo : "";
    //       }
          
    //       if( $row->response != 302 ){
    //            $kon->query(
    //                 "UPDATE konfigurasi set 
    //                      judul='$judul',
    //                      deskripsi='$deskripsi',
    //                      alamat='$alamat',
    //                      telpon='$telpon',
    //                      email='$email',
    //                      instagram='$instagram',
    //                      logo='$logo_name' "
    //            ) or die( $kon->error );
    //       } else {
    //            if ( $row->message == "error_size" ){
    //                 alert("Ukuran File Terlalu Besar !");
    //            } else if ( $row->message == "error_ext" ) {
    //                 alert("Ekstension File Tidak Diperbolehkan !");
    //            }
    //       }
    //       redirect($urls);
    //  } 
