<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
include("./config/config.php");
include("./view/header.php");
include("./view/sidebar.php");
include("./view/topbar.php");
?>

<!-- Start Content-->
<div class="container-fluid">
  <div class="card mt-3">
    <div class="card-header">
      <h5 class="card-title">Laporan Pengajuan Surat Keterangan Kepemilikan Tanah</h5>
    </div>
    <div class="card-body" style="font-size: 12px;">
      <div class="form-group row mb-2">

        <form action="surat/tanah_cetak.php" method="POST" target="_blank">

          <div class="row" style="font-size: 16px;">
            <label for="dari" class="col-md-2 col-form-label">Dari Tanggal</label>
            <div class="col-md-4">
              <input type="date" name="tglAwal" class="form-control" id="dari">
            </div>
          </div>

          <div class="row mt-2" style="font-size: 16px;">
            <label for="dari" class="col-md-2 col-form-label">Sampai Tanggal</label>
            <div class="col-md-4">
              <input type="date" name="tglAkhir" class="form-control" id="dari">
            </div>
          </div>

          <div class="row mt-2" style="font-size: 16px;">
            <label for="dari" class="col-md-2 col-form-label"></label>
            <div class="col-md-4">
              <div class="col-md-2">
                <button type="submit" name="cetak" class="btn btn-primary">Cetak</button>
              </div>
            </div>
          </div>

      </div>
      </form>



    </div>
  </div>
</div>


<?php
include("./view/footer.php");
?>