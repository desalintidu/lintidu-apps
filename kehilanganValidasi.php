<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
include("./config/config.php");
// ambil data dari url
$id = $_GET['id_surat_kehilangan'];

// query data mahasiswa berdasarkan id
$kehilangan = query("SELECT * FROM tb_surat_kehilangan INNER JOIN tb_user ON tb_surat_kehilangan.nik = tb_user.nik WHERE id_surat_kehilangan = $id")[0];

// cek apak tombol verifikasi suda di tekan
if (isset($_POST["verifikasi"])) {
  // cek apakah surat berhasil di verifikasi atau tidak
  if (validasiKehilangan($_POST) > 0) {
    echo "
						<script>
							alert('Surat berhasil di verifikasi !');
							document.location.href='kehilangan.php';
						</script>
				";
  } else {
    echo "
						<script>
							alert('Surat gagal di verifikasi !');
							document.location.href='kehilangan.php';
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
  <div class="card mt-3">
    <h4 class="card-header">Verifikasi surat keterangan Kehilangan</h4>
    <div class="card-body" style="font-size: 10px;">

      <div class="container">
        <form action="" method="POST" enctype="multipart/form-data" style="font-size: 14px;">
          <input type="hidden" name="id" value="<?= $kehilangan['id_surat_kehilangan']; ?>">

          <div class="container pt-3">
            <div class="form-group row">
              <label for="nik" class="col-sm-2 col-form-label">NIK</label>
              <div class="col-sm-6">
                <input type="number" name="nik" class="form-control" autocomplete="off" id="nik" readonly value="<?= $kehilangan['nik']; ?>">
              </div>
            </div>

            <div class="form-group row mt-2">
              <label for="nama" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-6">
                <input type="text" name="nama" class="form-control" autocomplete="off" id="nama" readonly value="<?= $kehilangan['nama']; ?>">
              </div>
            </div>


            <div class="form-group row mt-2">
              <label for="jenisKehilangan" class="col-sm-2 col-form-label">Jenis Kehilangan</label>
              <div class="col-sm-6">
                <input type="text" name="jenisKehilangan" class="form-control" autocomplete="off" id="jenisKehilangan" readonly value="<?= $kehilangan['jenis_kehilangan']; ?>">
              </div>
            </div>

            <div class="form-group row mt-2">
              <label for="nomorSurat" class="col-sm-2 col-form-label">Nomor Surat</label>
              <div class="col-sm-6">
                <input type="text" name="nomorSurat" class="form-control" autocomplete="off" id="nomorsurat" required value="<?= $kehilangan['nomor_surat_kehilangan']; ?>">
              </div>
            </div>

            <div class="form-group row mt-2">
              <label for="tanggalSurat" class="col-sm-2 col-form-label">Tanggal Surat</label>
              <div class="col-sm-6">
                <input type="date" name="tanggalSurat" class="form-control" autocomplete="off" id="tanggalSurat" required value="<?= $kehilangan['tanggal_surat_kehilangan']; ?>">
              </div>
            </div>

            <div class="form-group row mt-2">
              <div class="col-sm-2"></div>
              <div class="col-sm-6 mt-2">
                <button type="submit" name="verifikasi" class="btn btn-lg font-14 btn-danger" id="btn-new-event">
                  <i class="mdi mdi-check-underline"></i> Verifikasi
                </button>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>


<?php
include("./view/footer.php");
?>