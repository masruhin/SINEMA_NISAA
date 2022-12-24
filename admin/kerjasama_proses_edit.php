<?php 
session_start();
if(empty($_SESSION['username'])){
  echo "<script>alert('Silahkan Login Terlebih Dahulu');window.location='index.php'</script>";
}
error_reporting();
include "config.php";
// Mengecek apakah ID ada datanya atau tidak
if (isset($_POST['ubah'])) {
    if ($_POST['ubah'] != "") {
        // Mengambil data dari form lalu ditampung didalam variabel
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
        
        $foto_nama = $_FILES['file']['name'];
        $foto_size = $_FILES['file']['size'];

    }else{
        header("location:kerjasama.php");
    }

    // Mengecek apakah file lebih besar 2 MB atau tidak
    if ($foto_size > 2097152) {
	   // Jika File lebih dari 2 MB maka akan gagal mengupload File
       header("location:kerjasama.php?pesan=size");

    }else{

	   // Mengecek apakah Ada file yang diupload atau tidak
       if ($foto_nama != "") {

		  // Ekstensi yang diperbolehkan untuk diupload boleh diubah sesuai keinginan
          $ekstensi_izin = array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip', 'png', 'jpg', 'mp4', 'avi');
		  // Memisahkan nama file dengan Ekstensinya
          $pisahkan_ekstensi = explode('.', $foto_nama); 
          $ekstensi = strtolower(end($pisahkan_ekstensi));
		  // Nama file yang berada di dalam direktori temporer server
          $file_tmp = $_FILES['file']['tmp_name'];   
		  // Membuat angka/huruf acak berdasarkan waktu diupload
          $tanggal = md5(date('Y-m-d h:i:s'));
		  // Menyatukan angka/huruf acak dengan nama file aslinya
          $foto_nama_new = $tanggal.'-'.$foto_nama; 

		  // Mengecek apakah Ekstensi file sesuai dengan Ekstensi file yg diuplaod
          if(in_array($ekstensi, $ekstensi_izin) === true)  {

            // Mengambil data file didalam table siswa
            $get_foto = "SELECT file FROM kerjasama WHERE id_kerjasama = '$id'";
            $data_foto = mysqli_query($kon, $get_foto); 
            // Mengubah data yang diambil menjadi Array
            $foto_lama = mysqli_fetch_array($data_foto);

            // Menghapus Foto lama didalam folder FOTO
            unlink("aset/".$foto_lama['file']);    

			// Memindahkan File kedalam Folder "FOTO"
            move_uploaded_file($file_tmp, 'aset/'.$foto_nama_new);

            // Query untuk memasukan data kedalam table SISWA
            $query = mysqli_query($kon, "UPDATE kerjasama set id_jenis_dok='$id_dok',
                                                              id_fak='$fak',
                                                              id_unit='$unit',
                                                              judul_kerjasama='$judul',
                                                              deskripsi_kerjasama='$deskripsi',status_kerjasama='$status',
                                                              tanggal_awal='$tawal',
                                                              tanggal_akhir='$takhir',
                                                              no_ref_kerjasama='$ref',
                                                              file='$filebaru' 
                                                        WHERE id_kerjasama='$id'");
echo "<pre>" . print_r($query,true) . "</pre>";
            // Mengecek apakah data gagal diinput atau tidak
            if($query){
            	header("location:kerjasama.php?pesan=berhasil");
            } else {
                header("location:kerjasama.php?pesan=gagal");
            }

        } else { 
        	// Jika ekstensinya tidak sesuai dengan apa yg kita tetapkan maka error
        	header("location:kerjasama.php?pesan=ekstensi");        }

        }else{

    	// Apabila tidak ada file yang diupload maka akan menjalankan code dibawah ini
          $query = mysqli_query($kon, "UPDATE kerjasama set id_jenis_dok='$id_dok',id_fak='$fak',id_unit='$unit',judul_kerjasama='$judul',deskripsi_kerjasama='$deskripsi',status_kerjasama='$status',tanggal_awal='$tawal',tanggal_akhir='$takhir',no_ref_kerjasama='$ref' WHERE id_kerjasama='$id'");

            // Mengecek apakah data gagal diinput atau tidak
            if($query){
                header("location:kerjasama.php?pesan=berhasil");
            }else {
                header("location:kerjasama.php?pesan=gagal");
            }
        }

    }
}else{
    // Apabila ID tidak ditemukan maka akan dikembalikan ke halaman index
    header("location:kerjasama.php");
}
?>
