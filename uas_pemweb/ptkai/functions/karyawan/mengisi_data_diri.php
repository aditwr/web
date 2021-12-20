<?php

function mengisi_data_diri($data){
    // dianggap sudah terkoneksi ke database
    global $conn;

    // ambil nilai
    $nama_lengkap = $data["nama_lengkap"];
    $jenis_kelamin = $data["jenis_kelamin"];
    $tgl_lahir = $data["tgl_lahir"];
    $email = $data["email"];
    $no_telepon = $data["no_telepon"];
    $alamat = $data["alamat"];
    $id_user = $_SESSION["id_user"];

    $query = "INSERT INTO data_diri
    ( id_user, nama_lengkap, jenis_kelamin, tgl_lahir, email, no_telepon, alamat )
    VALUES ('$id_user','$nama_lengkap','$jenis_kelamin','$tgl_lahir','$email','$no_telepon','$alamat')";
    $query_result = mysqli_query($conn, $query);

    if( !$query_result ){
        // query gagal
        return 1;
    }
    // success
    return 0;
}

