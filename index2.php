<?php 

//when you start work on login. Firstly start session.
session_start();

//include connection file here
include('includes/config.php');

//here i am checking. User logged in or not.
if(!empty($_SESSION['id']))
{
    header("location:login.php");
}

$error = '';  //Initialize error variable

if(isset($_POST['submit'])) 
{

    $username = $_POST['username'];
    $password = md5($_POST['password']); 

    //check query for user and password exist in user table or not
    $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";

    $row = mysqli_query($kon,$sql);
    $count = mysqli_num_rows($row);

    if($count > 0)
    {

        //Here I am fetching user detail
        $rows = mysqli_fetch_object($row);

        // Here I am checking user login enable or disable.. if user status is 1. So it will redirect to welcome page otherwise show error message.
        if($rows->status == '1')
        {
            $_SESSION['id'] = $rows->id;
            $_SESSION['username'] = $rows->username;
            // $_SESSION['login_email'] = $rows->email;
            echo "<script> alert('Berhasil Login..'); location.replace('index.php') </script>";
        }
        else
        {
          echo "<script> alert('Gagal Login, Akun anda Belum Aktif'); location.replace('login.php') </script>";	
        }
        
    }
    else 
    {
      echo "<script> alert('Gagal Login, Pastikan username dan password benar.'); location.replace('login.php') </script>";	
    }
    
 }

?>
