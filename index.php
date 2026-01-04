<!DOCTYPE html>
<html lang="id">
<head>
    <title>Form Login</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- ===== MAIN CONTENT ===== -->
    <main class="flex-grow-1 d-flex align-items-center">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center align-items-center">

                <!-- Image -->
                <div class="col-md-9 col-lg-6 col-xl-5 mb-4 mb-lg-0">
                    <img src="foto/mmm.jpeg" class="img-fluid" alt="Login Image">
                </div>

                <!-- Login Form -->
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <h3 class="mb-4">Selamat Datang di Laman Login Gudang PT MMM</h3>

                    <form method="POST" action="login_admin_proses.php">

                        <!-- Username -->
                        <div class="form-outline mb-4">
                            <input type="text" name="username_admin" class="form-control form-control-lg" />
                            <label class="form-label">Username</label>
                        </div>

                        <!-- Password -->
                        <div class="form-outline mb-3">
                            <input type="password" name="password_admin" class="form-control form-control-lg" />
                            <label class="form-label">Password</label>
                        </div>

                        <!-- Remember -->
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="remember">
                            <label class="form-check-label" for="remember">Ingat saya</label>
                        </div>

                        <!-- Button -->
                        <button class="btn btn-info btn-lg w-100 mb-3" type="submit" name="login">
                            Masuk
                        </button>

                        <!-- Message -->
                        <div class="text-danger mb-3">
                            <?php 
                                if (isset($_GET['message'])) {
                                    if ($_GET['message'] == "gagal") {
                                        echo "Username atau password salah!";
                                    } elseif ($_GET['message'] == "logout") {
                                        echo "Berhasil logout!";
                                    } elseif ($_GET['message'] == "belum_login") {
                                        echo "Silakan login terlebih dahulu!";
                                    }
                                }
                            ?>
                        </div>

                        <!-- Links -->
                        <p class="small">
                            Silahkan login menggunakan akun yang terdaftar.
                        </p>
                        <a href="login_staffgudang.php" class="link-danger d-block">Login Staff Gudang</a>
                        <a href="login_stafflain.php" class="link-danger d-block">Login Staff Lain</a>

                    </form>
                </div>

            </div>
        </div>
    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="bg-primary text-white py-3">
        <div class="container-fluid d-flex flex-column flex-md-row justify-content-between align-items-center">

            <div class="text-center mb-2 mb-md-0">
                © 2023 <a class="text-white" href="https://kontraktor-mmmandiri.co.id/">PT. Muara Mitra Mandiri</a>
            </div>

            <div>
                <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-whatsapp"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-youtube"></i></a>
                <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
            </div>

        </div>
    </footer>

</body>
</html>
