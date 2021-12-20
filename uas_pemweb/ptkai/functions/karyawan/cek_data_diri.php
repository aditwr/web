<?php
// koneksi ke database sudah dilakukan sebelumnya
$id_user = $_SESSION["id_user"];
$query_result = mysqli_query($conn, "SELECT * FROM data_diri WHERE id_user = '$id_user'");
if( mysqli_num_rows($query_result) === 0 ){
    header("location: isi_data_diri/");
    exit;
}