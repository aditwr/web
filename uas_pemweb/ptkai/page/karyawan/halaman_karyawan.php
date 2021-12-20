<?php 
require_once '../../functions/db_connect.php';
require_once '../../functions/check_remember_me.php';

// cek keberadaan session login
if( !isset( $_SESSION['login'] )){
    header("location: ../../login.php");
    exit;
}

require_once '../../functions/validasi_halaman_karyawan.php';
require_once '../../functions/karyawan/cek_data_diri.php';


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

    <title>Halaman Karyawan</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <!-- sweet alert -->
	<link rel="stylesheet" href="../../css/sweetalert2.min.css">

</head>
<body class="d-flex" style="flex-direction: column">
    <p class="h2 m-auto ">ini adalah halaman karyawan</p>
    <p class="h2 m-auto ">sudah dibuat modular</p>
    <a class="h4 m-auto " href="../../logout.php">Logout</a>

    <script src="../../js/sweetalert2.all.min.js"></script>
</body>
</html>

<?php
if( isset( $_GET["isi_data_diri"] ) ){
    if($_GET["isi_data_diri"] == "success" ){
        echo "
            <script>
                Swal.fire('Isi Data Diri Berhasil!', 'pengisian data diri telah selesai dilakukan. anda bisa mengupdate data diri anda jika diperlukan', 'success');
            </script>
        ";
    }
}

?>