<?php
include("./config/config.php");
$ids = $_GET['ids'];
$gambarPengguna = query("SELECT * FROM tb_surat_usaha WHERE id_surat_usaha='" . $ids . "'");
foreach ($gambarPengguna as $row) :
  $datax = base64_decode($row["img"]);
  $imgs = imagecreatefromstring($datax);
  if (!$imgs) {
    die('Not valid image !');
  } else {
    header("Content-type: image/jpg");
    imagejpeg($imgs);
    imagedestroy($imgs);
  }
endforeach;
