<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
include("./config/config.php");
// ambil data dari url
$id = $_GET['id_surat_domisili'];

// query data mahasiswa berdasarkan id
$domisili = query("SELECT * FROM tb_surat_domisili INNER JOIN tb_user ON tb_surat_domisili.nik = tb_user.nik WHERE id_surat_domisili = $id")[0];

// cek apak tombol verifikasi suda di tekan
if (isset($_POST["verifikasi"])) {
  // cek apakah surat berhasil di verifikasi atau tidak
  if (validasiDomisili($_POST) > 0) {
    echo "
						<script>
							alert('Surat berhasil di verifikasi !');
							document.location.href='domisili.php';
						</script>
				";
  } else {
    echo "
						<script>
							alert('Surat gagal di verifikasi !');
							document.location.href='domisili.php';
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
    <h4 class="card-header">Verifikasi surat keterangan domisili</h4>
    <div class="card-body" style="font-size: 10px;">

      <div class="container">
        <form action="" method="POST" enctype="multipart/form-data" style="font-size: 14px;">
          <input type="hidden" name="id" value="<?= $domisili['id_surat_domisili']; ?>">

          <div class="container pt-3">

            <div class="form-group row">
              <label for="nik" class="col-sm-2 col-form-label">NIK</label>
              <div class="col-sm-6">
                <input type="number" name="nik" class="form-control" autocomplete="off" id="nik" readonly value="<?= $domisili['nik']; ?>">
              </div>
            </div>

            <div class="form-group row mt-2">
              <label for="nama" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-6">
                <input type="text" name="nama" class="form-control" autocomplete="off" id="nama" readonly value="<?= $domisili['nama']; ?>">
              </div>
            </div>


            <div class="form-group row mt-2">
              <label for="desaSebelmunya" class="col-sm-2 col-form-label">Nama Desa Sebelumnya</label>
              <div class="col-sm-6">
                <input type="text" name="desaSebelmunya" class="form-control" autocomplete="off" id="desaSebelmunya" readonly value="<?= $domisili['nama_desa_sebelumnya']; ?>">
              </div>
            </div>

            <div class="form-group row mt-2">
              <label for="nomorSurat" class="col-sm-2 col-form-label">Nomor Surat</label>
              <div class="col-sm-6">
                <input type="text" name="nomorSurat" class="form-control" autocomplete="off" id="nomorsurat" required value="<?= $domisili['nomor_surat_domisili']; ?>">
              </div>
            </div>

            <div class="form-group row mt-2">
              <label for="tanggalSurat" class="col-sm-2 col-form-label">Tanggal Surat</label>
              <div class="col-sm-6">
                <input type="date" name="tanggalSurat" class="form-control" autocomplete="off" id="tanggalSurat" required value="<?= $domisili['tanggal_surat_domisili']; ?>">
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