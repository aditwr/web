<?php 
require_once 'functions/db_connect.php';
require_once 'functions/check_remember_me.php';
require_once 'functions/check_session.php';

// hapus kode unik cookie di database
$id_user = $_SESSION["id_user"];
mysqli_query($conn, "UPDATE user SET cookie_remember_me = '' WHERE id_user = '$id_user'");


// hapus kode unik cookie di browser client
setcookie("key", NULL, time() - 3600);
setcookie("id", NULL, time() - 3600);

// hapus session
$_SESSION = [];
session_unset();
session_destroy();

// redirect ke halaman login 
header("location: login.php");
exit;