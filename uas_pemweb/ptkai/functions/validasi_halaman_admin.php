<?php 

// jika user level bukan 1, tidak boleh akses,
if ( $_SESSION["user_level"] != "1" ){
    header("location: ../../login.php");
    exit;
};
