<?php
// cek remember me
require_once 'functions/check_remember_me.php';

// koneksi ke database
require_once 'functions/db_connect.php';

// jika sudah login / session sudah dibuat, 
// user tidak boleh mengakses halaman register sebelum session dihapus / logout
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

// ketika tombol daftar di klik 
if(isset($_POST['daftar'])){
    require_once 'functions/login_register/register_function.php';
    $result = register($_POST);
}



?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Daftar Akun</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="css/login_register/style.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">

	</head>
	<body>
	<section class="">
		<div class="container mt-5">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Daftar Akun Karyawan</h2>
                                <p class="mb-0" >Setelah mendaftar akun, anda akan diarahkan untuk mengisi data diri. Mohon isi data diri dengan lengkap dan sesuai.</p>
								<p>Sudah memiliki akun?</p>
								<a href="login.php" class="btn btn-white btn-outline-white">Masuk</a>
							</div>
			      </div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Daftar Akun</h3>
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
                                <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label class="label" for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="label" for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                            </div>

                            <div class="form-group mb-3">
                                <label class="label" for="confirm-password">Confirm Password</label>
                                <input type="password" name="password-confirm" id="confirm-password" class="form-control" placeholder="Confirm Password" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="daftar" value="true" class="form-control btn btn-primary submit px-3">Daftar</button>
                            </div>
                            <!-- <div class="form-group d-md-flex">
                                <div class="w-50 text-left d-flex align-items-baseline justify-content-evenly">
                                    
                                    <input type="checkbox" name="remember-me" id="">
                                    <label class="checkbox-wrap checkbox-primary mb-0">    
                                        Remember Me
                                    </label>
                                </div>

                                <div class="w-50 text-md-right">
                                    <a href="#">Forgot Password</a>
                                </div>
                            </div> -->
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

	</body>
</html>

<?php 

if( isset( $result )){
    if( $result == 1 ){
        echo "
            <script>
                Swal.fire('Gagal Mendaftar!', 'username sudah terpakai', 'warning');
            </script>
        ";
    }
    else if ( $result == 2 ){
        echo "
            <script>
                Swal.fire('Gagal Mendaftar!', 'username mengandung spasi', 'error');
            </script>
        ";
    } else if ( $result == 3 ){
        echo "
            <script>
                Swal.fire('Gagal Mendaftar!', 'password konfirmasi tidak sesuai', 'warning');
            </script>
        ";
    } else if ( $result == 4 ){
        echo "
            <script>
                Swal.fire('Terjadi Kesalahan!', 'terjadi kesalahan sistem saat mendaftar', 'warning');
            </script>
        ";
    } 
};

?>

