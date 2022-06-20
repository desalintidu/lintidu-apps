<?php
include("./config/config.php");

if (isset($_POST["daftar"])) {
  if (daftar($_POST) > 0) {
    echo "	<script>
            alert('Anda berhasil daftar !');
            document.location.href='login.php';
          </script>";
  } else {
    mysqli_error($conn);
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Sig in| Lintidu Apps</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="assets/images/icon.ico">

  <!-- App css -->
  <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
  <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

</head>

<body class="pb-0" data-layout-config='{"darkMode":false}'>

  <div class="auth-fluid" style="background-image: url(./assets/images/img/daftar.png);">
    <!--Auth fluid left content -->
    <div class="auth-fluid-form-box">
      <div class="card-body">
        <div class="container">
          <div class="text-center text-lg-start mb-3">
            <img src="./assets/images/img/ic_logo11.png" class="align-items-center" height="80px" alt="">
          </div>
          <div class="">
            <h4 class="mt-0">Pendaftaran gratis</h4>
            <p class="text-muted">Tidak punya akun? Buat akun Anda, dibutuhkan kurang dari satu menit.</p>
          </div>
          <!-- form -->
          <form action="" method="POST">


            <div class="mb-3">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input class="form-control" type="text" autocomplete="off" name="nama" id="nama" required="" placeholder="Masukkan nama lengkap anda">
            </div>

            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input class="form-control" type="text" autocomplete="off" name="username" id="username" required="" placeholder="Masukkan username anda">
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input class="form-control" type="password" autocomplete="off" name="password" required="" id="password" placeholder="Masukkan password anda">
            </div>

            <div class="mb-3">
              <label for="password2" class="form-label">Konfirmasi Password</label>
              <input class="form-control" type="password" autocomplete="off" name="password2" required="" id="password2" placeholder="Masukkan konfirmasi password anda">
            </div>

            <div class="d-grid mb-0 text-center mb-2">
              <button class="btn btn-danger" name="daftar" type="submit"><i class="mdi mdi-login"></i> Daftar </button>
            </div>
            <!-- social-->


          </form>
          <!-- end form-->
          <!-- Footer-->
          <footer class="footer footer-alt">
            <p class="text-muted">Already have account? <a href="login.php" class="text-muted ms-1"><b>Log In</b></a></p>
          </footer>
        </div>

      </div>
    </div>
  </div>

  <!-- Auth fluid right content -->

  <!-- end Auth fluid right content -->
  </div>
  <!-- end auth-fluid-->

  <!-- bundle -->
  <script src="assets/js/vendor.min.js"></script>
  <script src="assets/js/app.min.js"></script>

</body>

</html>