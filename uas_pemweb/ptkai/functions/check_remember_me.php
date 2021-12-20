<?php
session_start();
// jika cookie ada di client
if( isset( $_COOKIE["key"] ) && isset( $_COOKIE['id'] ) ){

    // dekripsi id_user
    $id_user = base64_decode($_COOKIE["key"]);
    
    // ambil kode unik dari database dengan id_user
    $query_result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'");
    $user = mysqli_fetch_assoc($query_result);
    $kode_unik_dari_database = $user["cookie_remember_me"];

    // ambil kode unik dari cookie browser client 
    $kode_unik_dari_client = $_COOKIE["id"];

    // CATATAN
    // jika kode unik dari database sama dengan kode unik dari client,
    // maka user dianggap mengaktifkan remember me,
    // user dapat langsung login

    // jika tidak sama, paksa redirect ke halaman login
    if( $kode_unik_dari_database !== $kode_unik_dari_client ){
        header("location: login.php");
        exit;
    }

    // buat session login
    $_SESSION["login"] = true;

    // generate username, id_user, user_level dan simpan ke dalam $_SESSION
    // data ini akan digunakan dalam program website di masing-masing halaman
    $_SESSION["id_user"] = $user["id_user"];
    $_SESSION["username"] = $user["username"];
    $_SESSION["user_level"] = $user["user_level"];


}
