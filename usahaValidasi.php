<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
include("./config/config.php");
// ambil data dari url
$id = $_GET['id_surat_usaha'];

// query data mahasiswa berdasarkan id
$usaha = query("SELECT * FROM tb_surat_usaha INNER JOIN tb_user ON tb_surat_usaha.nik = tb_user.nik WHERE id_surat_usaha = $id")[0];

// cek apak tombol verifikasi suda di tekan
if (isset($_POST["verifikasi"])) {
  // cek apakah surat berhasil di verifikasi atau tidak
  if (validasiUsaha($_POST) > 0) {
    echo "
						<script>
							alert('Surat berhasil di verifikasi !');
							document.location.href='usaha.php';
						</script>
				";
  } else {
    echo "
						<script>
							alert('Surat gagal di verifikasi !');
							document.location.href='usaha.php';
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
    <h4 class="card-header">Verifikasi surat keterangan Usaha</h4>
    <div class="card-body" style="font-size: 10px;">

      <div class="container">
        <form action="" method="POST" enctype="multipart/form-data" style="font-size: 14px;">
          <input type="hidden" name="id" value="<?= $usaha['id_surat_usaha']; ?>">
          <div class="container pt-3">
            <div class="form-group row">
              <label for="nik" class="col-sm-2 col-form-label">NIK</label>
              <div class="col-sm-6">
                <input type="number" name="nik" class="form-control" autocomplete="off" id="nik" readonly value="<?= $usaha['nik']; ?>">
              </div>
            </div>

            <div class="form-group row mt-2">
              <label for="nama" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-6">
                <input type="text" name="nama" class="form-control" autocomplete="off" id="nama" readonly value="<?= $usaha['nama']; ?>">
              </div>
            </div>

            <div class="form-group row mt-2">
              <label for="desaSebelmunya" class="col-sm-2 col-form-label">Jenis Usaha</label>
              <div class="col-sm-6">
                <input type="text" name="desaSebelmunya" class="form-control" autocomplete="off" id="desaSebelmunya" readonly value="<?= $usaha['jenis_usaha']; ?>">
              </div>
            </div>

            <div class="form-group row mt-2">
              <label for="nomorSurat" class="col-sm-2 col-form-label">Nomor Surat</label>
              <div class="col-sm-6">
                <input type="text" name="nomorSurat" class="form-control" autocomplete="off" id="nomorsurat" required value="<?= $usaha['nomor_surat_usaha']; ?>">
              </div>
            </div>

            <div class="form-group row mt-2">
              <label for="tanggalSurat" class="col-sm-2 col-form-label">Tanggal Surat</label>
              <div class="col-sm-6">
                <input type="date" name="tanggalSurat" class="form-control" autocomplete="off" id="tanggalSurat" required value="<?= $usaha['tanggal_surat_usaha']; ?>">
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