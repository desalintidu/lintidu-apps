<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
include("./config/config.php");

$pengguna = query("SELECT * FROM  tb_user ORDER BY status_user  ASC");

include("./view/header.php");
include("./view/sidebar.php");
include("./view/topbar.php");
?>

<!-- Start Content-->
<div class="container-fluid">
  <div class="card mt-3">
    <div class="card-header">
      <h5 class="card-title">Data Pengguna Aplikasi Lintidu Apps</h5>
    </div>
    <div class="card-body" style="font-size: 12px;">
      <!-- <a href="penggunaAdd.php" class="btn btn-danger mb-3"><i class="mdi mdi-plus-circle me-2"></i> Tambah Pengguna</a> -->
      <div class="table-responsive">
        <table class="mdl-data-table" style="width:100%" id="example">
          <thead>
            <tr class="text-center">
              <th scope="col">#</th>
              <th scope="col">Aksi</th>
              <th scope="col">Nik</th>
              <th scope="col">KK</th>
              <th scope="col">Nama</th>
              <th scope="col">Tempat Lahir</th>
              <th scope="col">Tanggal Lahir</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Agama</th>
              <th scope="col">Umur</th>
              <th scope="col">Pekerjaan</th>
              <th scope="col">Alamat</th>
              <th scope="col">Nomor Hp</th>
              <th scope="col">Email</th>
              <th scope="col">Foto KTP</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php $i = 1; ?>
            <?php foreach ($pengguna as $row) : ?>
              <tr>
                <th scope="row"><?= $i; ?></th>



                <td class="table-action text-center" style="font-size: 25px; padding: 8px;">
                  <?php
                  if ($row["status_user"] == 1) {
                    echo "<a href='penggunaUbah.php?nik=$row[nik]'><i class='mdi mdi-account-edit text-primary'></i></a>";
                  } else {
                    echo "<a href='penggunaValidasi.php?nik=$row[nik]'><i class='mdi mdi-check-circle'></i></a>";

                    echo "<a href='penggunaHapus.php?nik=$row[nik]'><i class='mdi mdi-delete-circle text-danger'></i></a>";
                  }
                  ?>
                </td>

                <td><?= $row["nik"]; ?></td>
                <td><?= $row["kk"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td style="text-transform: capitalize;"><?= $row["tempat_lahir"]; ?></td>
                <td><?= $row["tanggal_lahir"]; ?></td>
                <td><?= $row["jenis_kelamin"]; ?></td>
                <td><?= $row["agama"]; ?></td>
                <td><?= $row["umur"]; ?></td>
                <td style="text-transform: capitalize;"><?= $row["pekerjaan"]; ?></td>
                <td style="text-transform: capitalize;"><?= $row["alamat"]; ?></td>
                <td><?= $row["nomor_hp"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><a href="imageView.php?nik=<?php echo $row["nik"]; ?>" target="blank"><img src="imageView.php?nik=<?php echo $row["nik"]; ?>" width="100px" height="100px" /></a></td>
                <td>
                  <?php
                  if ($row["status_user"] == 1) {
                    echo "<span class='badge bg-success'>Suda Di Cek</span>";
                  } else {
                    echo "<span class='badge bg-danger'>Belum Di Cek</span>";
                  }
                  ?>
                </td>
              </tr>
              <?php $i++ ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>


<?php
include("./view/footer.php");
?>