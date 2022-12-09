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

if (!function_exists('tanggal_indonesia')) {
function tanggal_indonesia($tanggal){
  $bulan = array (
  1 =>   'Januari',
  'Februari',
  'Maret',
  'April',
  'Mei',
  'Juni',
  'Juli',
  'Agustus',
  'September',
  'Oktober',
  'November',
  'Desember'
  );
  
  $pecahkan = explode('-', $tanggal);
   
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

}
?>
