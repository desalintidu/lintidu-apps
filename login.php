x`<?php
session_start();
include("./config/config.php");
// cek cookie
if (isset($_COOKIE['no']) && isset($_COOKIE['key'])) {
  $no = $_COOKIE['no'];
  $key = $_COOKIE['key'];

  // ambil username berdasarkan id
  $res = mysqli_query($conn, "SELECT username FROM tb_admin WHERE id_admin = $no ");
  $roww = mysqli_fetch_assoc($res);

  // cek cookie dan username
  if ($key === hash('sha256', $roww['username'])) {
    $_SESSION['login'] = true;
  }
}
if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}

// ------prosedur login---------
if (isset($_POST['login'])) { //jika tombol login ditekan

  // deklarasi variabel
  $usr = $_POST['user'];
  $pwd = ($_POST['pass']);

  // cek data di tb_user yang memiliki user name dan password yang sama dengan yang di inputkan user
  $result  = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$usr' AND password = '$pwd'");
  $cek = mysqli_num_rows($result);

  //cek user name
  if ($cek === 1) {
    // set session
    header("Location: index.php");
    $_SESSION["login"] = true;

    // cek ingat saya
    if (isset($_POST['ingat'])) {
      // buat cookie
      setcookie('no', $cek['id_admin'], time() + 60);
      setcookie('key', hash('sha256', $cek['username']), time() + 60);
    }
    header("Location: index.php");
  } else {
    $error = true;
  }
}
// end prosedur login

// ----------------end prosedur login------------------




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Log In | Lintidu Apps</title>
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

  <div class="auth-fluid" style="background-image: url(./assets/images/img/ok.png);">
    <!--Auth fluid left content -->
    <div class="auth-fluid-form-box">
      <div class="card-body">
        <div class="container">
          <div class="text-center text-lg-start mb-3">
            <img src="./assets/images/img/ic_logo11.png" class="align-items-center" height="80px" alt="">
          </div>
          <div class="">
            <h4 class="mt-0">Sign In</h4>
            <p class="text-muted">Masukkan username dan password Anda untuk mengakses akun.</p>
          </div>
          <!-- form -->
          <form action="" method="POST">


            <?php if (isset($error)) : ?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Username dan password salah !</i></strong>
              </div>
            <?php endif ?>

            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input class="form-control" type="text" autocomplete="off" name="user" id="username" required="" placeholder="Masukkan username anda">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input class="form-control" type="password" autocomplete="off" name="pass" required="" id="password" placeholder="Masukkan password anda">
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input type="checkbox" name="ingat" class="form-check-input" id="checkbox-signin">
                <label class="form-check-label" for="checkbox-signin">Ingat saya</label>
              </div>
            </div>
            <div class="d-grid mb-0 text-center">
              <button class="btn btn-danger" name="login" type="submit"><i class="mdi mdi-login"></i> Masuk </button>
            </div>
            <!-- social-->

          </form>
          <!-- end form-->

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