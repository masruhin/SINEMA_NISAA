<?php
	session_start();
	unset($_SESSION['username']);

	session_destroy();

	echo "<script> alert('Anda Telah Berhasil Logout'); location.replace('index.php') </script>";
?>