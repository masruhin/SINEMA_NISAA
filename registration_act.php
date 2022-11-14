<?php
session_start();
error_reporting(0);
include('includes/config.php');
$username=$_POST['username'];
$fname=$_POST['fullname'];
$pass = $_POST['pass'];
$conf = $_POST['conf'];
if($conf!=$pass){
	echo "<script>alert('Password tidak sama!');</script>";
	header('location : registration.php');			
}else{
	$sqlcek = "SELECT username, nama_user, password FROM users WHERE username='$username'";
	$querycek = mysqli_query($kon,$sqlcek);
		if(mysqli_num_rows($querycek)>0){
		// echo "<script>alert('Email sudah terdaftar, silahkan gunakan email lain!');</script>";
			echo "<script type='text/javascript'> document.location = registration.php'; </script>";
		// var_dump($querycek); die();			
		}else{
			$password= $_POST['pass'];
			$sql1="INSERT INTO users(username, nama_user, password) VALUES('$username','$fname',md5('$password'))";
			$lastInsertId = mysqli_query($kon, $sql1);
      // var_dump($lastInsertId);
      // die();
				if($lastInsertId){
					echo "<script>alert('Registrasi berhasil. Sekarang anda bisa login.');</script>";
					echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
				}else {
					echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
					echo "<script type='text/javascript'> document.location = registration.php'; </script>";
				}
				// var_dump($sqlcek);
				// die();
		}	
}
?>