<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

include("config/config.php");
//ambil data dari tabel berita / query
$berita = query("SELECT * FROM tb_berita ORDER BY tanggal_berita DESC");
include("./view/header.php");
include("./view/sidebar.php");
include("./view/topbar.php");
?>

<!-- Start Content-->
<div class="container-fluid">
  <div class="card mt-3">
    <div class="card-header">
      <h4 class="card-title mt-2">Berita Desa Lintidu</h4>
    </div>
    <div class="card-body">
      <div class="col-sm-4 mb-3">
        <a href="beritaTambah.php" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Tambah Berita</a>
      </div>
      <div class="table-responsive">
        <table class="mdl-data-table" style="width: 100%;" id="example">
          <thead>
            <tr class="text-center">
              <th scope="col">#</th>
              <th scope="col">Aksi</th>
              <th scope="col">Judul Berita</th>
              <th scope="col">Isi Berita</th>
              <th scope="col">Foto Berita</th>
              <th scope="col">Tanggal Berita</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php $i = 1; ?>
              <?php foreach ($berita as $row) : ?>
                <th scope="row"><?= $i; ?></th>
                <td class="table-action text-center">
                  <a href="beritaUbah.php?id_berita=<?= $row["id_berita"]; ?>" onclick=" return confirm('Anda yakin ingin mengubah berita ini?')" class="action-icon"> <i class="mdi mdi-check-circle"></i> </a>
                  <a href="beritaHapus.php?id_berita=<?= $row["id_berita"]; ?>" onclick=" return confirm('Anda yakin ingin menghapus berita ini?')" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                </td>
                <td><?= $row["judul_berita"]; ?></td>
                <td><?= $row["isi_berita"]; ?></td>
                <td>
                  <img src="img/<?= $row['img_berita']; ?>" class="img-thumbnail mt-2" style="width: 600px;">
                </td>
                <td style="width: 120px;"><?= $row["tanggal_berita"]; ?></td>
            </tr>
            <?php $i++ ?>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
</div>


<?php
include("./view/footer.php");
?>