<?php
// REGISTER
function register($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $email = mysqli_real_escape_string($conn, $data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password_confirm = mysqli_real_escape_string($conn, $data["password-confirm"]);


    // Cek username ada di database belum, ga boleh ada username yang sama
    $user_exist = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($user_exist) ){
        // return 1 jika username telah terpakai
        return 1;
    }

    // username tidak boleh mengandung spasi
    for ($i=0; $i < strlen($username)-1; $i++) { 
        if($username[$i] == " " ){
            // return 2 jika username mengandung spasi, username tidak boleh mengandung spasi
            return 2;
        }
    }
    
    // Cek Konfirmasi Password
    if ( $password !== $password_confirm ){
        // return 3 jika password confirm tidak sesuai
        return 3;
    }
    
    // Enkripsi Password
    // password dienkripsi dulu sebelum di masukan ke database
    $password_terenkripsi = password_hash($password, PASSWORD_DEFAULT);

    // jika sudah benar semua, lakukan query 
    $default_user_level = 2;
    $query = "INSERT INTO user(username, email, password, user_level) 
    VALUES 
    ('$username', '$email', '$password_terenkripsi', '$default_user_level')";

    mysqli_query($conn, $query);

    // cek affected rows, jika ada baris yg ter-efek maka query berhasil dilakukan
    if( mysqli_affected_rows($conn) < 0 ){
        // return 4 jika query untuk mendaftar gagal
        return 4;
    }

    // jika user berhasil mendaftar jalankan fitur auto login
    $_SESSION["user"] = $username;
    $_SESSION["pass"] = $password;
    header("Location: login.php?auto_login=true");
    exit;
}
/* 
ERROR CODE 
1 : username sudah terpakai ( username harus unik )
2 : kesalahan username mengandung karakter spasi
3 : password konfirmasi tidak sesuai
4 : proses pendaftaran mengalami kesalahan
*/