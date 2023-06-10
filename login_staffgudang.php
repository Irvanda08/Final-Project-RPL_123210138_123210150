<html>
<title>Form Login</title>
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-80">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="foto/mmm.jpeg" class="img-fluid" alt="Sample image">
                </div>

                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <h3>Selamat Datang di Laman Login Staff Gudang PT MMM</h3>
                    <form method="POST" action="login_staff_proses.php">
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        </div>

                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0"></p>
                        </div>

                        <!-- Username input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="username_staff" id="form3Example3"
                                class="form-control form-control-lg" placeholder="Enter a valid email address" />
                            <label class="form-label" for="form3Example3">Username</label>
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" name="password_staff" id="form3Example4"
                                class="form-control form-control-lg" placeholder="Enter password" />
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Ingat saya.
                                </label>
                            </div>
                        </div>
                        <div class="pt-1 mb-4">
                            <button class="btn btn-info btn-lg btn-block" type="submit" name="login"
                                style="width: 100%;">Masuk</button>
                        </div>
                        <div class="pesan">
                            <?php 
                      if (isset($_GET['message'])) {
                          if ($_GET['message'] == "gagal") {
                              echo "Username atau password yang anda masukan salah!";
                          }
                          elseif ($_GET['message'] == "logout") {
                              echo "Anda Berhasil logout!";
                          }
                          elseif ($_GET['message'] == "belum_login") {
                              echo "Anda Belum login!";
                          }
                      }
                  ?>
                        </div>
                        <div class="text-center text-lg-start mt-4 pt-2">
                        Silahkan login dengan memasukan kombinasi Username dan password yang sudah terdaftar untuk masuk ke halaman selanjutnya, 
                        jika ingin login ke akun lain silahkan pilih opsi dibawah ini. <br>
                        <a href="index.php" class="link-danger">Login Admin</a></p>
                        <a href="login_stafflain.php" class="link-danger">Login Staff Lain</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-1 px-1 px-xl-2 bg-primary">
            <!-- Copyright -->
            <div class="text-center text-white p-3 mb-3 mb-md-0">
                <a class="text-white" href="https://kontraktor-mmmandiri.co.id/">© 2023 Copyright: PT. Muara Mitra Mandiri All rights reserved.</a>
            </div>
            <!-- Copyright -->
            <!-- Right -->
            <div class="mt-3 me-5">
                <a href="https://www.facebook.com/snpmb.bppp?mibextid=ZbWKwL" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://api.whatsapp.com/send/?phone=6281391718847&text=Hallo+Muara+Mitra+Mandiri+Saya+Ingin+Bertanya&type=phone_number&app_absent=0" class="text-white me-4">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="https://www.youtube.com/@snpmbbppp" class="text-white me-4">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="https://instagram.com/_snpmbbppp?igshid=YmMyMTA2M2Y=" class="text-white">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
            <!-- Right -->
        </div>
    </section>
</body>

</html>