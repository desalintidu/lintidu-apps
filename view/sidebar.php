<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

  <!-- LOGO -->
  <a href="index.html" class="logo text-center logo-light">
    <span class="logo-lg">
      <h3 class="mt-4  text-white">Lintidu Apps</h3>
    </span>
    <span class="logo-sm">
      <h5 class="mt-4 text-white">Lintidu Apps</h5>
    </span>
  </a>

  <!-- LOGO -->
  <a href="" class="logo text-center logo-dark">
    <span class="logo-lg">
      <img src="assets/images/logo-dark.png" alt="" height="16">
    </span>
    <span class="logo-sm">
      <img src="assets/images/logo_sm_dark.png" alt="" height="16">
    </span>
  </a>

  <div class="h-100" id="leftside-menu-container" data-simplebar="">

    <!--- Sidemenu -->
    <ul class="side-nav">

      <li class="side-nav-title side-nav-item">Menu</li>

      <!-- ------------------------------BERANDA--------------------------- -->
      <li class="side-nav-item">
        <a href="index.php" class="side-nav-link">
          <i class="uil-home-alt activate-select"></i>
          <span> Beranda </span>
        </a>
      </li>
      <!-- -----------------------------END BERANDA------------------------ -->

      <!-- -------------------PENGAJUAN SURAT--------------------------- -->
      <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarProjects" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
          <i class=" dripicons-document-new"></i>
          <span> Pengajuan Surat</span>
          <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarProjects">
          <ul class="side-nav-second-level">
            <li>
              <a href="domisili.php">Domisili</a>
            </li>
            <li>
              <a href="kehilangan.php">Kehilangan</a>
            </li>
            <li>
              <a href="usaha.php">Usaha</a>
            </li>
            <li>
              <a href="ekonomi.php">Ekonomi Lemah</a>
            </li>
            <li>
              <a href="tanah.php">Kepemilikan Tanah</a>
            </li>
            <li>
              <a href="penghasilan.php">Penghasilan Orang Tua</a>
            </li>
          </ul>
        </div>
      </li>
      <!-- -------------------END PENGAJUAN SURAT----------------------- -->

      <li class="side-nav-item">
        <a href="berita.php" class="side-nav-link">
          <i class="dripicons-article"></i>
          <span> Berita </span>
        </a>
      </li>

      <li class="side-nav-item">
        <a href="pengguna.php" class="side-nav-link">
          <i class="dripicons-user"></i>
          <span> Pengguna </span>
        </a>
      </li>

      <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarForms" aria-expanded="false" aria-controls="sidebarForms" class="side-nav-link">
          <i class="mdi mdi-file-document-edit"></i>
          <span> Laporan Surat </span>
          <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarForms">
          <ul class="side-nav-second-level">
            <li>
              <a href="laporan_domisili.php">Domisili</a>
            </li>
            <li>
              <a href="laporan_kehilangan.php">Kehilangan</a>
            </li>
            <li>
              <a href="laporan_usaha.php">Usaha</a>
            </li>
            <li>
              <a href="laporan_ekonomi.php">Ekonomi Lemah</a>
            </li>
            <li>
              <a href="laporan_tanah.php">Kepemilikan Tanah</a>
            </li>
            <li>
              <a href="laporan_penghasilan.php">Penghasilan Orang Tua</a>
            </li>

          </ul>
        </div>
      </li>

      <li class="side-nav-item">
        <a href="logout.php" onclick=" return confirm('Anda yakin ingin Keluar ?')" class="side-nav-link">
          <i class="mdi mdi-logout"></i>
          <span>Log out</span>
        </a>
      </li>

      <!-- End Sidebar -->
      <div class="clearfix"></div>
  </div>
  <!-- Sidebar -left -->
</div>
<!-- Left Sidebar End -->