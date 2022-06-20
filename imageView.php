<?php
include("./config/config.php");
$nik = $_GET['nik'];
$gambarPengguna = query("SELECT * FROM  tb_user WHERE nik='" . $nik . "'");
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
