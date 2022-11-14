<?php
	
$server   = "localhost";
$username = "root";
$password = "";
$database = "sinema";

// koneksi database
$kon = new mysqli($server, $username, $password, $database);
// cek koneksi
if ($kon->connect_error) {
    die('Koneksi Database Gagal : '.$kon->connect_error);
}
date_default_timezone_set('Asia/Jakarta');
?>