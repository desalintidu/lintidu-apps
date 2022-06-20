<?php
$conn = mysqli_connect("localhost", "root", "", "db_kependudukan");
$admin       = mysqli_query($conn, "SELECT * FROM  tb_admin ");
$namaAdmin = mysqli_fetch_array($admin);



?>
<div class="content-page">
  <div class="content">
    <!-- Topbar Start -->
    <div class="navbar-custom">
      <ul class="list-unstyled topbar-menu float-end mb-0">
        <li class="side-nav-item">
          <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <span class="account-user-avatar">
              <img src="assets/images/user.png" alt="user-image" class="rounded-circle">
            </span>
            <span>
              <span class="account-user-name" style="font-size: 18px;"><?= $namaAdmin["nama"]; ?></span>
            </span>
          </a>
      </ul>



      <button class="button-menu-mobile open-left">
        <i class="mdi mdi-menu"></i>
      </button>

    </div>
    <!-- end Topbar -->