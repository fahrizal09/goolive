<!DOCTYPE html>
<html lang="en">

<head>
    <title>Toko Pupuk</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <!-- site icons -->
    <link rel="icon" href="<?= base_url() ?>assets/customer/images/fevicon/fevicon.png" type="image/gif" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/customer/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/customer/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/customer/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/customer/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/customer/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/customer/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/customer/login/vendor/select2/select2.min.css">
    <!--=========================================<?= base_url() ?>assets/customer/login/======================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/customer/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/customer/login/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(<?= base_url() ?>assets/customer/login/images/pupuk3.jpg);">
                    <span class="login100-form-title-1">
                        Daftar
                    </span>
                    <p style="color: white;">Untuk bertransaksi dengan kami</p>
                </div>

                <form class="login100-form validate-form" action="<?= base_url() ?>Customer/Customer/daftar" method="post">
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Nama</span>
                        <input class="input100" type="text" name="nama" placeholder="Masukkan nama">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Alamat</span>
                        <textarea class="input100" style="height: 100px;" type="text" name="alamat" placeholder="Masukkan alamat"></textarea>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Kode Pos</span>
                        <input class="input100" type="text" name="kode_pos" placeholder="Masukkan kode pos">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">No HP</span>
                        <input class="input100" type="text" name="no_hp" placeholder="Masukkan no hp">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="text" name="email" placeholder="Masukkan email">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" name="username" placeholder="Enter username">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Enter password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="flex-sb-m w-full p-b-30">
                        <div>
                            <a href="<?= base_url()?>Customer/Customer" class="txt1">
                                Sudah punya akun?
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Daftar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets/customer/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets/customer/login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets/customer/login/vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url() ?>assets/customer/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets/customer/login/vendor/select2/select2.min.js"></script>
    <!--=========<?= base_url() ?>assets/customer/login/======================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/customer/login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets/customer/login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets/customer/login/js/main.js"></script>

</body>

</html>