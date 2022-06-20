<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
include("./config/config.php");
$pengguna       = mysqli_query($conn, "SELECT * FROM  tb_user WHERE status_user = '1'");
$berita         = mysqli_query($conn, "SELECT * FROM  tb_berita");
$domisili       = mysqli_query($conn, "SELECT * FROM  tb_surat_domisili WHERE status = '1'");
$kehilangan     = mysqli_query($conn, "SELECT * FROM  tb_surat_kehilangan WHERE status = '1'");
$usaha          = mysqli_query($conn, "SELECT * FROM  tb_surat_usaha WHERE status = '1'");
$ekonomi        = mysqli_query($conn, "SELECT * FROM  tb_surat_ekonomi_lemah WHERE status = '1'");
$tanah          = mysqli_query($conn, "SELECT * FROM  tb_surat_kepemilikan_tanah WHERE status = '1'");
$penghasilan    = mysqli_query($conn, "SELECT * FROM  tb_surat_penghasilan_orang_tua WHERE status = '1'");

// pengguna Baru
$penggunaBaru       = mysqli_query($conn, "SELECT * FROM  tb_user WHERE status_user = '0' ");
$domisiliBaru       = mysqli_query($conn, "SELECT * FROM  tb_surat_domisili WHERE status = '0' ");
$kehilanganBaru     = mysqli_query($conn, "SELECT * FROM  tb_surat_kehilangan WHERE status = '0'");
$usahaBaru          = mysqli_query($conn, "SELECT * FROM  tb_surat_usaha WHERE status = '0'");
$ekonomiBaru        = mysqli_query($conn, "SELECT * FROM  tb_surat_ekonomi_lemah WHERE status = '0'");
$tanahBaru          = mysqli_query($conn, "SELECT * FROM  tb_surat_kepemilikan_tanah WHERE status = '0'");
$penghasilanBaru    = mysqli_query($conn, "SELECT * FROM  tb_surat_penghasilan_orang_tua WHERE status = '0'");

$jmlPengguna      = mysqli_num_rows($pengguna);
$jmlBerita        = mysqli_num_rows($berita);
$jmlDomisili      = mysqli_num_rows($domisili);
$jmlKehilangan    = mysqli_num_rows($kehilangan);
$jmlUsaha         = mysqli_num_rows($usaha);
$jmlEkonomi       = mysqli_num_rows($ekonomi);
$jmlTanah         = mysqli_num_rows($tanah);
$jmlPenghasilan   = mysqli_num_rows($penghasilan);
// pengguna baru
$jmlPenggunaBaru = mysqli_num_rows($penggunaBaru);
$jmlDomisiliBaru = mysqli_num_rows($domisiliBaru);
$jmlKehilanganBaru    = mysqli_num_rows($kehilanganBaru);
$jmlUsahaBaru         = mysqli_num_rows($usahaBaru);
$jmlEkonomiBaru       = mysqli_num_rows($ekonomiBaru);
$jmlTanahBaru         = mysqli_num_rows($tanahBaru);
$jmlPenghasilanBaru   = mysqli_num_rows($penghasilanBaru);



include("./view/header.php");
include("./view/sidebar.php");
include("./view/topbar.php");
?>

<!-- Start Content-->
<div class="container-fluid">

  <div class="row mt-3">
    <!-- data pengguna -->
    <div class="col-md-6">
      <div class="card ribbon-box alert-secondary text-secondary bg-white">
        <div class="card-body" style="padding-bottom:130px;">
          <a href="pengguna.php">
            <div class="ribbon ribbon-secondary float-end"><i class="mdi mdi-account-reactivate me-1"></i> <span style="padding: 1px 4px; font-size: 10px;">Baru <sup><?= $jmlPenggunaBaru; ?></sup></span></div>
          </a>
          <div class="ribbon-content text-center" style="position: absolute; margin-left: 50px;">
            <i class="dripicons-user-group" style="font-size: 62px; "></i>
            <h3><span><?= $jmlPengguna; ?></span></h3>
            <p class="font-18 mb-0">Jumlah Pengguna</p>
          </div>
        </div>
      </div>
    </div>
    <!-- end data pengguna -->

    <!-- data berita -->
    <div class="col-md-6">
      <div class="card ribbon-box  alert-secondary text-secondary bg-white">
        <div class="card-body" style="padding-bottom:130px;">
          <a href="berita.php">
            <div class="ribbon ribbon-secondary float-end"><i class="mdi mdi-newspaper-variant-multiple me-1"></i> <span style="padding: 1px 4px; font-size: 10px;">Berita Desa</span></div>
          </a>
          <div class="ribbon-content text-center" style="position: absolute; margin-left: 50px;">
            <i class="mdi mdi-newspaper-variant-multiple" style="font-size: 62px; "></i>
            <h3><span><?= $jmlBerita; ?></span></h3>
            <p class="font-18 mb-0">Jumlah Berita Desa</p>
          </div>
        </div>
      </div>
    </div>
    <!-- end data berita -->
  </div>

  <div class="row">

    <div class="col-md-2">
      <div class="card ribbon-box  alert-secondary text-danger bg-white" style="border: 1px solid  white;">
        <div class="card-body">
          <a href="domisili.php">
            <div class="ribbon ribbon-danger float-start"><i class="mdi mdi-file-document-multiple me-1"></i> <span style="padding: 1px 4px; font-size: 12px;">Baru <sup><?= $jmlDomisiliBaru; ?></sup></span></div>
          </a>
          <div class="ribbon-content text-center">
            <i class="mdi mdi-file-document-multiple" style="font-size: 32px; "></i>
            <h3><span><?= $jmlDomisili; ?></span></h3>
            <p class="font-15 mb-0">Jumlah Pengajuan Surat Keterangan Domisili</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-2">
      <div class="card ribbon-box  alert-secondary text-danger bg-white" style="border: 1px solid  white;">
        <div class="card-body">
          <a href="kehilangan.php">
            <div class="ribbon ribbon-danger float-start"><i class="mdi mdi-file-document-multiple me-1"></i> <span style="padding: 1px 4px; font-size: 12px;">Baru <sup><?= $jmlKehilanganBaru; ?></sup></span></div>
          </a>
          <div class="ribbon-content text-center">
            <i class="mdi mdi-file-document-multiple" style="font-size: 32px; "></i>
            <h3><span><?= $jmlKehilangan; ?></span></h3>
            <p class="font-15 mb-0">Jumlah Pengajuan Surat Keterangan Kehilangan</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-2">
      <div class="card ribbon-box  alert-secondary text-danger bg-white" style="border: 1px solid  white;">
        <div class="card-body">
          <a href="usaha.php">
            <div class="ribbon ribbon-danger float-start"><i class="mdi mdi-file-document-multiple me-1"></i> <span style="padding: 1px 4px; font-size: 12px;">Baru <sup><?= $jmlUsahaBaru; ?></sup></span></div>
          </a>
          <div class="ribbon-content text-center">
            <i class="mdi mdi-file-document-multiple" style="font-size: 32px; "></i>
            <h3><span><?= $jmlUsaha; ?></span></h3>
            <p class="font-15 mb-0">Jumlah Pengajuan Surat Keterangan Usaha</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-2">
      <div class="card ribbon-box  alert-secondary text-danger bg-white" style="border: 1px solid  white;">
        <div class="card-body">
          <a href="ekonomi.php">
            <div class="ribbon ribbon-danger float-start"><i class="mdi mdi-file-document-multiple me-1"></i> <span style="padding: 1px 4px; font-size: 12px;">Baru <sup><?= $jmlEkonomiBaru; ?></sup></span></div>
          </a>
          <div class="ribbon-content text-center">
            <i class="mdi mdi-file-document-multiple" style="font-size: 32px; "></i>
            <h3><span><?= $jmlEkonomi; ?></span></h3>
            <p class="font-15 mb-0">Jumlah Pengajuan Surat Keterangan Ekonomi Lemah</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-2">
      <div class="card ribbon-box  alert-secondary text-danger bg-white" style="border: 1px solid  white;">
        <div class="card-body">
          <a href="tanah.php">
            <div class="ribbon ribbon-danger float-start"><i class="mdi mdi-file-document-multiple me-1"></i> <span style="padding: 1px 4px; font-size: 12px;">Baru <sup><?= $jmlTanahBaru; ?></sup></span></div>
          </a>
          <div class="ribbon-content text-center">
            <i class="mdi mdi-file-document-multiple" style="font-size: 32px; "></i>
            <h3><span><?= $jmlTanah; ?></span></h3>
            <p class="font-15 mb-0">Jumlah Pengajuan Surat Keterangan Kepemilikan Tanah</p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-2">
      <div class="card ribbon-box  alert-secondary text-danger bg-white" style="border: 1px solid  white;">
        <div class="card-body">
          <a href="penghasilan.php">
            <div class="ribbon ribbon-danger float-start"><i class="mdi mdi-file-document-multiple me-1"></i> <span style="padding: 1px 4px; font-size: 12px;">Baru <sup><?= $jmlPenghasilanBaru; ?></sup></span></div>
          </a>
          <div class="ribbon-content text-center">
            <i class="mdi mdi-file-document-multiple" style="font-size: 32px; "></i>
            <h3><span><?= $jmlPenghasilan; ?></span></h3>
            <p class="font-15 mb-0">Jumlah Pengajuan Surat Keterangan Penghasilan Orang Tua</p>
          </div>
        </div>
      </div>
    </div>










  </div>
  <?php
  include("./view/footer.php");
  ?>