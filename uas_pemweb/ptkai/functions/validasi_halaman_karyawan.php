<?php 

// jika user level bukan 2, tidak boleh akses
if ( $_SESSION["user_level"] != 2 ){
    header("location: ../../login.php");
};