<?php 
include 'config.php';

$query = mysqli_query($kon, "UPDATE users SET status='".$_POST['val']."' where id='".$_POST['id']."' ");

if ($q) {
  $q = mysqli_query($kon, "SELECT * FROM users where id='".$_POST['id']."' ");
  $data = mysqli_fetch_assoc($query);
  echo $data['$status'];
}
?>
