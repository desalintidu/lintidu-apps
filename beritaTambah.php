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
  <!-- start page title -->
  <div class="row">
    <div class="col-10">
      <div class="card mt-3">
        <h5 class="card-header">Tambah Berita</h5>
        <div class="card-body">
          <!-- --------KODE PHP--------- -->
          <?php
          // cek apakah tombol tambah suda di tekan
          if (isset($_POST["tambah"])) {
            // cek apakah berita berhasil di tambahkan atau tidak
            if (tambahBerita($_POST) > 0) {
              echo "
              <script>
                alert('Berita berhasil di tambahkan!');
                document.location.href='berita.php';
              </script>
          ";
            } else {
              echo "
              <script>
                alert('Berita gagal di tambahkan!');
                document.location.href='berita.php';
              </script>
          ";
            }
          }

          ?>
          <!-- --------END KODE PHP ------->
          <form action="" method="POST" enctype="multipart/form-data" style="font-size: 14px;">

            <div class="form-group row">
              <label for="judul" class="col-sm-2 col-form-label">Judul Berita</label>
              <div class="col-sm-10">
                <input type="text" name="judul" class="form-control" id="judul" required>
              </div>
            </div>
            <div class="form-group row mt-2">
              <label for="isi" class="col-sm-2 col-form-label">Isi Berita</label>
              <div class="col-sm-10">
                <textarea name="isi" id="isi" class="form-control" cols="30" rows="8" required></textarea>
              </div>
            </div>
            <div class="form-group row mt-2">
              <label for="gambar" class="col-sm-2 col-form-label">Foto Berita</label>
              <div class="col-sm-10">
                <input class="form-control" name="gambar" type="file" id="gambar" required>
              </div>
            </div>
            <div class="form-group row mt-2">
              <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Berita</label>
              <div class="col-sm-10">
                <input class="form-control" name="tanggal" type="date" id="tanggal" required>
              </div>
            </div>
            <div class="form-group row mt-2">
              <div class="col-sm-2"></div>
              <div class="col-sm-10 mt-2">
                <button type="submit" name="tambah" class="btn btn-lg font-14 btn-danger" id="btn-new-event">
                  <i class="mdi mdi-plus-circle-outline"></i> Tambah Berita
                </button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
include("./view/footer.php");
?>