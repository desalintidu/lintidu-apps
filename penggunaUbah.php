<?php
include("./config/config.php");
// ambil data dari url
$id = $_GET['nik'];
// query data mahasiswa berdasarkan id
$pengguna = query("SELECT * FROM tb_user WHERE nik = $id")[0];

//cek apakah tombol tambah suda di tekan
if (isset($_POST["ubahData"])) {
  //cek apakah data berhasil atau tidak
  if (editPengguna($_POST) > 0) {
    echo "
        <script>
          alert('Data pengguna berhasil di ubah!');
          document.location.href='pengguna.php';
        </script>
    ";
  } else {
    echo "
        <script>
          alert('Data pengguna gagal di ubah!');
          document.location.href='pengguna.php';
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
    <h4 class="card-header">Ubah Data Pengguna</h4>
    <div class="card-body" style="font-size: 10px;">


      <form action="" method="POST" enctype="multipart/form-data" style="font-size: 14px;">
        <input type="hidden" name="id" value="<?= $pengguna['nik']; ?>">

        <div class="form-group row">
          <label for="nik" class="col-sm-2 col-form-label">NIK</label>
          <div class="col-sm-10">
            <input type="number" name="nik" class="form-control" autocomplete="off" id="nik" readonly value="<?= $pengguna['nik']; ?>">
          </div>
        </div>

        <div class="form-group row mt-2">
          <label for="kk" class="col-sm-2 col-form-label">KK</label>
          <div class="col-sm-10">
            <input type="number" name="kk" class="form-control" autocomplete="off" id="kk" readonly value="<?= $pengguna['kk']; ?>">
          </div>
        </div>

        <div class="form-group row mt-2">
          <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
          <div class="col-sm-10">
            <input type="text" name="nama" class="form-control" autocomplete="off" id="nama" value="<?= $pengguna['nama']; ?>">
          </div>
        </div>

        <div class="form-group row mt-2">
          <div class="col">
            <div class="row">
              <label for="tempatLahir" class="col-md-4 col-form-label">Tempat Lahir</label>
              <div class="col-md-8">
                <input type="text" name="tempatLahir" class="form-control" autocomplete="off" id="tempatLahir" value="<?= $pengguna['tempat_lahir']; ?>">
              </div>
            </div>
          </div>
          <div class="col">
            <div class="row">
              <label for="ttl" class="col-md-3 col-form-label">Tanggal Lahir</label>
              <div class="col-md-9">
                <input type="text" name="ttl" class="form-control" autocomplete="off" id="ttl" value="<?= $pengguna['tanggal_lahir']; ?>">
              </div>
            </div>
          </div>
        </div>

        <div class="form-group row mt-2">
          <div class="col">
            <div class="row">
              <label for="jenisKelamin" class="col-md-4 col-form-label">Jenis Kelamin</label>
              <div class="col-md-8">
                <select class="form-select" name="jenisKelamin" aria-label="Default select example" id="jenisKelamin">
                  <option selected><?= $pengguna['jenis_kelamin']; ?></option>
                  <option value="Laki - Laki">Laki - Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="row">
              <label for="agama" class="col-md-3 col-form-label">Agama</label>
              <div class="col-md-9">
                <select class="form-select" name="agama" aria-label="Default select example" id="agama">
                  <option selected><?= $pengguna['agama']; ?></option>
                  <option value="Islam">Islam</option>
                  <option value="Kristen">Kristen</option>
                  <option value="Katholik">Katholik</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Budha">Budha</option>
                  <option value="Konghucu">Konghucu</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group row mt-2">
          <div class="col">
            <div class="row">
              <label for="umur" class="col-md-4 col-form-label">Umur </label>
              <div class="col-md-8">
                <input type="text" name="umur" class="form-control" autocomplete="off" id="umur" value="<?= $pengguna['umur']; ?>">
              </div>
            </div>
          </div>
          <div class="col">
            <div class="row">
              <label for="pekerjaan" class="col-md-3 col-form-label">Pekerjaan</label>
              <div class="col-md-9">
                <input type="text" name="pekerjaan" class="form-control" autocomplete="off" id="pekerjaan" value="<?= $pengguna['pekerjaan']; ?>">
              </div>
            </div>
          </div>
        </div>

        <div class="form-group row mt-2">
          <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-10">
            <input type="text" name="alamat" class="form-control" autocomplete="off" id="alamat" value="<?= $pengguna['alamat']; ?>">
          </div>
        </div>

        <div class="form-group row mt-2">
          <label for="nomorHP" class="col-sm-2 col-form-label">Nomor HP</label>
          <div class="col-sm-10">
            <input type="text" name="nomorHP" class="form-control" autocomplete="off" id="nomorHP" value="<?= $pengguna['nomor_hp']; ?>">
          </div>
        </div>

        <div class="form-group row mt-2">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" name="email" class="form-control" autocomplete="off" id="email" value="<?= $pengguna['email']; ?>">
          </div>
        </div>



        <div class="form-group row mt-2">
          <div class="col-sm-2"></div>
          <div class="col-sm-10 mt-2">
            <button type="submit" name="ubahData" class="btn btn-lg font-14 btn-danger" id="btn-new-event">
              <i class="mdi mdi-account-edit-outline" style="font-size: 20px;"></i> Ubah Data Pengguna
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<?php
include("./view/footer.php");
?>