<?php 
// cek remember me
require_once 'functions/check_remember_me.php';

// koneksi ke database
require_once 'functions/db_connect.php';

// jika sudah login / session sudah dibuat, 
// user tidak boleh mengakses halaman login sebelum session dihapus / logout
if( isset( $_SESSION['login'] ) ){
    // redirect ke halaman

    // jika user_level == 1 ( admin ), redirect ke halaman admin
    if( $_SESSION["user_level"] == 1 ){
        header("location: page/admin/halaman_admin.php");
        exit;
    }

    // jika user_level == 2 ( karyawan ), redirect ke halaman karyawan
    if( $_SESSION["user_level"] == 2 ){
        header("location: page/karyawan/halaman_karyawan.php");
        exit;
    }
}

// ketika tombol sign in ditekan, jalankan fungsi login
if(isset($_POST['masuk'])){
    require_once 'functions/login_register/login_function.php';
    $result = login($_POST);
}

// ketika user berhasil mendaftar, jalankan auto login
if( isset( $_GET["auto_login"] )){
    if( isset( $_SESSION["user"] ) && isset( $_SESSION["pass"] ) ){
        require_once 'functions/login_register/login_function.php';
        $data = [];
        $data["username"] = $_SESSION["user"];
        $data["password"] = $_SESSION["pass"];

        $result = login($data);
    }
}

?>


<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
	
    <!-- bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- style -->
	<link rel="stylesheet" href="css/login_register/style.css">
	
    <!-- sweet alert -->
	<link rel="stylesheet" href="css/sweetalert2.min.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">

    


	</head>
	<body>
	<section class="">
    <!-- <section class="ftco-section"> -->
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Selamat Datang di PT Kereta Api Indonesia</h2>
                                <p class="mb-0" >Bagi para karyawan silahkan login</p>
								<p>Belum memiliki akun?</p>
								<a href="register.php" class="btn btn-white btn-outline-white">Daftar</a>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>

                        <div class="w-100">
                            <p class="social-media d-flex justify-content-end">
                                <a href="#" class="social-icon d-flex align-items-center justify-content-center"><i class="fas fa-lock"></i></a>
                                <a href="#" class="social-icon d-flex align-items-center justify-content-center"><i class="fas fa-user"></i></a>
                            </p>
                        </div>

			      	</div>
							<form action="" method="post" class="signin-form">
                                <div class="form-group mb-3">
                                    <label class="label" for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="masuk" value="true" class="form-control btn btn-primary submit px-3">Sign In</button>
                                </div>

                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left d-flex align-items-baseline justify-content-evenly">
                                        
                                        <input type="checkbox" name="remember-me" id="">
                                        <label class="checkbox-wrap checkbox-primary mb-0">    
                                            Remember Me
                                        </label>
                                    </div>

                                    <div class="w-50 text-md-right">
                                        <a href="#">Forgot Password</a>
                                    </div>
                                </div>
                            </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <!-- script for this page -->
    <script src="js/login_register/login.js"></script>

	</body>
</html>

<?php
// jika terjadi kesalahan di function login
if( isset( $result )){
    if( $result == 1 ){
        echo "
            <script>
                Swal.fire('Gagal Login!', 'username tidak ada', 'warning');
            </script>
        ";
    }
    else if ( $result == 2 ){
        echo "
            <script>
                Swal.fire('Gagal Login!', 'password salah', 'error');
            </script>
        ";
    } else if ( $result == 3 ){
        echo "
            <script>
                Swal.fire('Terjadi Kesalahan!', 'fitur remember me gagal dilakukan', 'error');
            </script>
        ";
    } 

}

// jika user berhasil mendaftar, muncul alert success
// if( isset( $_GET["daftar"] )){
//     if( $_GET["daftar"] == "success" ){
//         echo "
//             <script>
//                 Swal.fire('Berhasil Mendaftar', 'pendaftaran akun berhasil dilakukan, anda bisa login sekarang', 'success');
//             </script>
//         ";
//     }
// }



?>