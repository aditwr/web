<?php
// session_start() sudah dilakukan di file sebelumnya

if( !isset( $_SESSION['login'] )){
    header("location: login.php");
    exit;
}
