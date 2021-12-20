<?php 
require_once '../../../functions/db_connect.php';
require_once '../../../functions/check_remember_me.php';
require_once '../../../functions/check_session.php';
require_once '../../../functions/validasi_halaman_karyawan.php';
require_once '../../../functions/karyawan/mengisi_data_diri.php';

if( isset( $_POST["submit"] )){
    //jalankan fungsi mengisi data diri
    $result = mengisi_data_diri($_POST);
    // kalau isi data diri
    if( $result == 0 ){
        // redirect ke halaman karyawan
        header("location: ../halaman_karyawan.php?isi_data_diri=success");
        exit;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Isi Data Diri</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- sweet alert -->
	<link rel="stylesheet" href="../../../css/sweetalert2.min.css">

</head>
<body>
    <div class="container">
        <div class="signup-content">
            <div class="signup-img">
                <img src="images/form-img.jpg" alt="" style="height: 650px; width: 400px;">
                <div class="signup-img-content">
                    <h2>PT Kereta Api Indonesia </h2>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid eveniet natus nobis tempora repudiandae ea accusamus ad, debitis ab temporibus!</p>
                </div>
            </div>
            <div class="signup-form">
                <form method="POST" class="register-form" id="register-form">
                    <div class="form-row">
                        <div class="form-group">

                            <div class="form-input">
                                <label for="nama_lengkap" class="required" >Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" required />
                            </div>

                            <div class="form-input">
                                <label for="email" class="required">Email</label>
                                <input type="email" name="email" id="email" required/>
                            </div>

                            <div class="form-input">
                                <label for="alamat" class="required">Alamat</label>
                                <input type="text" name="alamat" id="alamat" required/>
                            </div>

                            
                            <div class="form-input">
                                <label for="no_telepon" class="required">No. Telepon</label>
                                <input type="number" name="no_telepon" id="no_telepon" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-input">
                                <label for="tgl_lahir" class="required">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" id="tgl_lahir" />
                            </div>

                            <div class="form-radio">
                                <div class="label-flex">
                                    <label for="payment">Jenis Kelamin</label>
                                </div>
                                <div class="form-radio-group">            
                                    <div class="form-radio-item">
                                        <input type="radio" name="jenis_kelamin" value="laki-laki" id="cash" checked>
                                        <label for="cash">Laki-laki</label>
                                        <span class="check"></span>
                                    </div>
                                    <div class="form-radio-item">
                                        <input type="radio" name="jenis_kelamin" value="perempuan" id="cheque">
                                        <label for="cheque">Perempuan</label>
                                        <span class="check"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-submit">
                        <input type="submit" value="Submit" class="submit" id="submit" name="submit" />
                        <input type="submit" value="Reset" class="submit" id="reset" name="reset" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script src="vendor/wnumb/wNumb.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="../../../js/sweetalert2.all.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        Swal.fire("Isi Data Diri","Silahkan mengisi data diri anda", "info");
    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

<?php
if( isset( $result )){
    if( $result == 1 ){
        echo "
            <script>
                Swal.fire('Isi Data Diri Gagal!', 'terjadi kesalahan', 'error');
            </script>
        ";
    }
}