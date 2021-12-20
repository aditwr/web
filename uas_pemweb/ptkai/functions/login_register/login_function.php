<?php 
function login($data){
    global $conn;
    
    $username = mysqli_real_escape_string($conn, $data["username"]);
    $password = $data["password"];

    
    // cek keberadaan username di database
    $query1 = "SELECT * FROM user WHERE username = '$username'";
    $query_result = mysqli_query($conn, $query1);

    // jika username yang ditemukan
    if( mysqli_num_rows($query_result) === 1 ){
        $user = mysqli_fetch_assoc($query_result);

        // cek passwrod 
        if ( password_verify($password, $user["password"]) ){

            // set SESSION 
            $_SESSION["login"] = true;
            $_SESSION["username"] = $user["username"];
            $_SESSION["id_user"] = $user["id_user"];
            $_SESSION["user_level"] = $user["user_level"];

            // jika remember-me di checklist
            if( isset( $_POST['remember-me']) ){

                // generate kode unik / unique id
                $kode_unik = uniqid();
                // enkripsi id_user 
                $id_user_terenkripsi = base64_encode($user["id_user"]);

                $id_user = $user["id_user"];
                
                // query update untuk insert kode unik di database tabel user
                $query_rm = "UPDATE user 
                SET cookie_remember_me = '$kode_unik' WHERE id_user = '$id_user'";
                $result_rm = mysqli_query($conn, $query_rm);

                if( !$result_rm ){
                    // return 3 jika query fitur remember me gagal
                    return 3;
                }

                // buat cookie yang berisi data username dan id_user terenkripsi
                setcookie("id", $kode_unik, time() + 3600*24*7);
                setcookie("key", $id_user_terenkripsi, time() + 3600*24*7);
                

               
            }
            
            // redirect ke halaman

            // jika user level == 1 ( admin ), maka redirect ke halaman admin
            if( $user["user_level"] == 1 ){
                header("location: page/admin/halaman_admin.php");
                exit;
            }

            // jika user level == 2 ( karyawan ), maka redirect ke halaman karyawan
            if ( $user["user_level"] == 2 ) {
                header("location: page/karyawan/halaman_karyawan.php");
            }
        }
        else {
            // return 2 jika password tidak sesuai
            return 2;
        }
    }
    else {
        // return 1 jika username tidak ada
        return 1;
    }
}
/*
ERROR CODE
1 : username tidak ada
2 : password salah
3 : query fitur remember me gagal dilakukan
*/


?>