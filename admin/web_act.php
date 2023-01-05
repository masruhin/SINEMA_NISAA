<?php
     session_start();
  include 'config.php';
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
      $ukuran        = $_FILES['file']['size'];
      $file_tmp    = $_FILES['file']['tmp_name']; 
      
      if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
          if($ukuran < 304407000){ 
              move_uploaded_file($file_tmp, '../img/' . $nama);
              $query    = mysqli_query($kon, "INSERT INTO kerjasama (status_kerjasama,
                                                                      tanggal_awal,
                                                                      tanggal_akhir,
                                                                      id_jenis_dok,
                                                                      id_fak,
                                                                      id_unit,
                                                                      judul_kerjasama,
                                                                      deskripsi_kerjasama,
                                                                      no_ref_kerjasama,
                                                                      file ) 
                                              VALUES('$status_kerjasama', 
                                                      '$tanggal_awal',
                                                      '$tanggal_akhir',
                                                      '$id_jenis_dok',
                                                      '$id_fak',
                                                      '$id_unit',
                                                      '$judul_kerjasama',
                                                      '$deskripsi_kerjasama',
                                                      '$no_ref_kerjasama',
                                                      '$nama')");
              // var_dump($query);
              // die();
              if($query){
                echo "<script type='text/javascript'>
                alert('Berhasil Tambah data.'); 
                document.location = 'kerjasama.php'; 
              </script>";
              }
              else{
                echo "<script type='text/javascript'>
                alert('Gagal Insert data.'); 
                document.location = 'kerjasama.php'; 
              </script>";
              }
          }
          else{
            echo "<script type='text/javascript'>
            alert('File Terlalu Besar'); 
            document.location = 'kerjasama.php'; 
          </script>";
          }
      }
      else{
        echo "<script type='text/javascript'>
        alert('Berhasil'); 
        document.location = 'kerjasama.php'; 
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
