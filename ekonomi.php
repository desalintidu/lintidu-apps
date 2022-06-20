<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
include("./config/config.php");
$ekonomi = query("SELECT * FROM  tb_surat_ekonomi_lemah INNER JOIN tb_user ON  tb_surat_ekonomi_lemah.nik = tb_user.nik ORDER BY id_surat_ekonomi_lemah DESC");

include("./view/header.php");
include("./view/sidebar.php");
include("./view/topbar.php");
?>

<!-- Start Content-->
<div class="container-fluid">
  <div class="card mt-3">
    <div class="card-header">
      <h5 class="card-title">Data Pengajuan Surat Keterangan Ekonomi Lemah</h5>
    </div>
    <div class="card-body" style="font-size: 12px;">
      <div class="table-responsive">
        <div class="container">
          <table class="mdl-data-table" style="width:100%" id="example">
            <thead>
              <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Aksi</th>
                <th scope="col">Nik</th>
                <th scope="col">Nama</th>
                <th scope="col">Nama Ayah</th>
                <th scope="col">Nama Ibu</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor Surat</th>
                <th scope="col">Tanggal Surat</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <?php $i = 1; ?>
              <?php foreach ($ekonomi as $row) : ?>

                <tr>
                  <th scope="row"><?= $i; ?></th>

                  <td class="table-action text-center" style="font-size: 25px; padding: 8px;">
                    <?php
                    if ($row["status"] == 1) {
                      echo "<a href='pdf_ekonomi.php?id=$row[id_surat_ekonomi_lemah]' target='_blank'><i class='mdi mdi-printer text-success'></i></a>";
                    } else {
                      echo "<a href='ekonomiValidasi.php?id_surat_ekonomi_lemah=$row[id_surat_ekonomi_lemah]'><i class='mdi mdi-check-circle'></i></a>";
                      echo "<a href='ekonomiHapus.php?id_surat_ekonomi_lemah=$row[id_surat_ekonomi_lemah]'><i class='mdi mdi-delete-circle text-danger'></i></a>";
                    }
                    ?>
                  </td>
                  <td><?= $row["nik"]; ?></td>
                  <td><?= $row["nama"]; ?></td>
                  <td style="text-transform: capitalize;"><?= $row["nama_ayah"]; ?></td>
                  <td style="text-transform: capitalize;"><?= $row["nama_ibu"]; ?></td>
                  <td style="text-transform: capitalize;"><?= $row["alamat"]; ?></td>
                  <td><?= $row["nomor_surat_ekonomi_lemah"]; ?></td>
                  <td><?= $row["tanggal_surat_ekonomi_lemah"]; ?></td>
                  <td>
                    <?php
                    if ($row["status"] == 1) {
                      echo "<span class='badge bg-success'>Selesai</span>";
                    } else {
                      echo "<span class='badge bg-danger'>Belum Diproses</span>";
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
</div>


<?php
include("./view/footer.php");
?>