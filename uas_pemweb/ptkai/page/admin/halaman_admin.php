<?php 
require_once '../../functions/db_connect.php';
require_once '../../functions/check_remember_me.php';

if( !isset( $_SESSION['login'] )){
    header("location: ../../login.php");
    exit;
}

require_once '../../functions/validasi_halaman_admin.php';

// debuging
echo "login : ". $_SESSION["login"]; echo "<br>";
echo "username : ". $_SESSION["username"]; echo "<br>"; 
echo "id-user : ".$_SESSION["id_user"]; echo "<br>";
echo "user_level : " .$_SESSION["user_level"]; echo "<br>";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Halaman Admin</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

</head>
<body class="d-flex" style="flex-direction: column">
    <p class="h2 m-auto ">ini adalah halaman admin</p>
    <p class="h2 m-auto " >sudah di buat modular</p>
    <a class="h4 m-auto " href="../../logout.php">Logout</a>
</body>
</html>