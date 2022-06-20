<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
include("./config/config.php");
// ambil data dari url
$id = $_GET['id_berita'];
// query data mahasiswa berdasarkan id
$berita = query("SELECT * FROM tb_berita WHERE id_berita = $id")[0];
//cek apakah tombol unah suda di tekan
if (isset($_POST["ubah"])) {
  //cek apakah data berhasil atau tidak
  if (ubahBerita($_POST) > 0) {
    echo "
    <script>
      alert('Berita berhasil di ubah!');
      document.location.href='berita.php';
    </script>
";
  } else {
    echo "
    <script>
      alert('Berita gagal di ubah!');
      document.location.href='berita.php';
    </script>
";
  }
}

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
        <h5 class="card-header">Ubah Berita</h5>
        <div class="card-body">

          <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $berita['id_berita']; ?>">
            <input type="hidden" name="gambarLama" value="<?= $berita['img_berita']; ?>">

            <div class="form-group row">
              <label for="judul" class="col-sm-2 col-form-label">Judul Berita</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="judul" name="judul" value="<?= $berita['judul_berita']; ?>">
              </div>
            </div>
            <div class="form-group row mt-2">
              <label for="isi" class="col-sm-2 col-form-label">Isi Berita</label>
              <div class="col-sm-10">
                <textarea name="isi" id="isi" class="form-control" cols="30" rows="8"><?= $berita['isi_berita']; ?></textarea>
              </div>
            </div>
            <div class="form-group row mt-2">
              <label for="gambar" class="col-sm-2 col-form-label">Foto Berita</label>
              <div class="col-sm-10">
                <input class="form-control" name="gambar" type="file" id="gambar">
                <img src="img/<?= $berita['img_berita']; ?>" class="img-thumbnail mt-2" style="width: 100px; height: 100px;">
              </div>
            </div>
            <div class="form-group row mt-2">
              <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Berita</label>
              <div class="col-sm-10">
                <input class="form-control" name="tanggal" type="date" id="tanggal" value="<?= $berita['tanggal_berita']; ?>">
              </div>
            </div>
            <div class="form-group row mt-2">
              <div class="col-sm-2"></div>
              <div class="col-sm-10 mt-2">
                <button type="submit" name="ubah" class="btn btn-lg font-14 btn-danger" id="btn-new-event">
                  <i class="mdi mdi-plus-circle-outline"></i> Ubah Berita
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