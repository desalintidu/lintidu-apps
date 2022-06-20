<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
include("./config/config.php");

$penghasilan = query("SELECT * FROM  tb_surat_penghasilan_orang_tua INNER JOIN tb_user ON  tb_surat_penghasilan_orang_tua.nik = tb_user.nik ORDER BY id_surat_penghasilan_orang_tua DESC");

include("./view/header.php");
include("./view/sidebar.php");
include("./view/topbar.php");
?>

<!-- Start Content-->
<div class="container-fluid">
  <div class="card mt-3">
    <div class="card-header">
      <h5 class="card-title">Data Pengajuan Surat Keterangan Penghasilan Orang Tua</h5>
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
                <th scope="col">Tempat Lahir</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Agama</th>
                <th scope="col">Pekerjaan</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nama Ayah</th>
                <th scope="col">Pekerjaan Ayah</th>
                <th scope="col">Penghasilan Ayah</th>
                <th scope="col">Nomor Surat</th>
                <th scope="col">Tanggal Surat</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <?php $i = 1; ?>
              <?php foreach ($penghasilan as $row) : ?>

                <tr>
                  <th scope="row"><?= $i; ?></th>

                  <td class="table-action text-center" style="font-size: 19px;">
                    <?php
                    if ($row["status"] == 1) {
                      echo "<a href='pdf_penghasilan.php?id=$row[id_surat_penghasilan_orang_tua]' target='_blank'><i class='mdi mdi-printer text-success'></i></a>";
                    } else {
                      echo "<a href='penghasilanValidasi.php?id_surat_penghasilan_orang_tua=$row[id_surat_penghasilan_orang_tua]'><i class='mdi mdi-check-circle'></i></a>";


                      echo "<a href='penghasilanHapus.php?id_surat_penghasilan_orang_tua=$row[id_surat_penghasilan_orang_tua]'><i class='mdi mdi-delete-circle text-danger'></i></a>";
                    }
                    ?>

                  <td><?= $row["nik"]; ?></td>
                  <td><?= $row["nama"]; ?></td>
                  <td style="text-transform: capitalize;"><?= $row["tempat_lahir"]; ?></td>
                  <td><?= $row["tanggal_lahir"]; ?></td>
                  <td><?= $row["agama"]; ?></td>
                  <td style="text-transform: capitalize;"><?= $row["pekerjaan"]; ?></td>
                  <td style="text-transform: capitalize;"><?= $row["alamat"]; ?></td>
                  <td style="text-transform: capitalize;"><?= $row["nama_ayah"]; ?></td>
                  <td style="text-transform: capitalize;"><?= $row["pekerjaan_ayah"]; ?></td>
                  <td>Rp. <?= $row["penghasilan_ayah"]; ?></td>
                  <td><?= $row["nomor_surat_penghasilan_orang_tua"]; ?></td>
                  <td><?= $row["tanggal_surat_penghasilan_orang_tua"]; ?></td>
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