<?php

use Dompdf\Dompdf;

include("config/config.php");
include("api/path.php");
include("phpqrcode/phpqrcode.php");


require_once 'dompdf/autoload.inc.php';
$dompdf = new Dompdf();
$id = $_GET['id'];
$kehilangan = mysqli_query($conn, "SELECT * FROM  tb_surat_kehilangan INNER JOIN tb_user ON  tb_surat_kehilangan.nik = tb_user.nik AND  tb_surat_kehilangan.id_surat_kehilangan='" . $id . "'");
$row = mysqli_fetch_array($kehilangan);

if (!file_exists('phpqrcode/img/kehilangan_' . $row['id_surat_kehilangan'] . '.png')) {
  clearstatcache();
  QRcode::png($urls . 'pdf_kehilangan.php?id=' . $row['id_surat_kehilangan'], 'phpqrcode/img/kehilangan_' . $row['id_surat_kehilangan'] . '.png');
}


$html = '
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surat Keterngan Kehilangan KTP</title>
</head>

<body>


  <div class="container" style="margin-left: 80px;">
  
      <!-- kop surat -->
      <table width="90%">
        <tr>
          <td style="width: 20px;"><img src="./img/logo.png" style="width: 55px;"></td>
          <td>
            <center>
              <font style="font-weight: bold;" size="4">PEMERINTAH KABUPATEN BUOL</font><br>
              <font style="font-weight: bold;" size="4">KECAMATAN PALELEH</font><br>
              <font style="font-weight: bold;" size="4">DESA LINTIDU</font><br>
              <font size="2" style="font-style: italic;">Alamat ; Jln : Rotty Dusun II Desa Lintidu. Kode Pos : 94568
              </font>
            </center>
          </td>
          <td style="width: 50px;"></td>
        </tr>
        <tr>
          <td colspan="3">
            <hr style="border: 3px double black;">
          </td>
        </tr>
      </table>
      <!-- end kop surat -->

      <!-- nomor surat -->
      <table width="90%" cellspacing="0">
        <tr>
          <td style="text-align: center; font-weight: bold; font-size: 16px;"><u>SURAT KETERANGAN KEHILANGAN</u></td>
        </tr>
        <tr>
          <td style="text-align: center; ">Nomor: 140 /' . $row['nomor_surat_kehilangan'] . '/ Pemdes.2022</td>
        </tr>
      </table>
      <!-- end nomor surat -->
      
      <!--Yang bertanda Tangan -->
      <table width="90%" cellspacing="0"  style="margin-top: 30px;">
        <tr>
          <td style="text-align: justify; line-height: 26px; ">Yang bertandatangan dibawah ini Pemerintah Desa Lintidu Kecamatan Paleleh Kabupaten Buol, meneragkan dengan benar kepada :</td>
        </tr>
      </table>
      <!--End yang bertanda Tangan -->

      <!-- Pemilik -->
      <table width="40%"  cellspacing="0"  style="margin-left: 50px; padding-top:15px; line-height: 26px;">
        <tr>
        <td style="width:150px">Nama</td>
        <td style="width:30px; text-align:center;">:</td>
        <td style="width:200px;text-transform: capitalize;">' . $row['nama'] . '</td>
        </tr>
        <tr>
          <td style="width:150px">Tempat/Tanggal Lahir</td>
          <td style="width:30px; text-align:center;">:</td>
          <td style="width:200px;text-transform: capitalize;">' . $row['tempat_lahir'] . ', ' . $row['tanggal_lahir'] . '</td>
        </tr>
        <tr>
          <td style="width:150px">Pekerjaan/Jabatan</td>
          <td style="width:30px; text-align:center;">:</td>
          <td style="width:200px;text-transform: capitalize;">' . $row['pekerjaan'] . '</td>
        </tr>
        <tr>
          <td style="width:150px">Nomor KK/KTP</td>
          <td style="width:30px; text-align:center;">:</td>
          <td style="width:200px">' . $row['kk'] . '</td>
        </tr>
          
      </table>
      <!-- end pemilik -->
      
      <!--Isi -->
      <table width="90%" cellspacing="0"  style="margin-top: 10px;">
        <tr>
          <td style="text-align: justify; line-height: 26px; text-indent: 40px; ">Dengan Ini Di terangkan Bahwa  <span style="font-weight: bold;">Bahwa  ' . $row['jenis_kehilangan'] . ' </span> <span style="font-weight: bold;">Yang Bersangkutan Hilang/tercecer.</span> adapun  Keterangan ini dikeluarkan guna Kepentingan Yang bersangkutan Dalam membuat KTP yang Baru.</td>
        </tr>
      </table>
      <!--End Isi -->

      <!--Demikian surat -->
      <table width="90%" cellspacing="0">
        <tr>
          <td style="text-align: justify; line-height: 26px; text-indent: 40px; ">Demikian Surat Keterangan ini dibuat untuk perlunya.</td>
        </tr>
      </table>
      <!--End Demikian surat -->

    <!-- tanda tangan -->
    <table cellspacing="0"  style="margin-top: 60px; margin-left: auto;">
      <tr>
          <td style="text-align: center; width: 250px;">Lintidu, <span>' . date('d F Y', strtotime($row['tanggal_surat_kehilangan'])) . '</span></td>
      </tr>
      <tr>
        <td style="text-align: center; font-weight: bold;">Kepala Desa Lintidu <br>
        <img src="phpqrcode/img/kehilangan_' . $row['id_surat_kehilangan'] . '.png" />
        </td>
    </tr>
    <tr>
      <td style="text-align: center; font-weight: bold;"><u>Agus Abjulu S.Sos</u></td>
    </tr>
  </table>
  <!-- end tanda tangan -->
  
  <!-- end keterangan -->
  <table width="625px"  cellspacing="0"  style="margin-top: 160px;" >
    <tr>
      <td style="font-weight: bold;">Tembusan Yth :</td>
    </tr>
</table>

<table cellspacing="0"  style="margin-top: 10px;">
  <tr>
      <td width="400px">1. Camat Paleleh</td>
  </tr>
  <tr>
      <td width="400px">2. Arsip</td>
  </tr>
</table>
  <!-- end keterangan -->
  
  </div>
</body>
</html>

';

$dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');
// Render the HTML as PDF
$dompdf->render();
// Output the generated PDF to Browser
$dompdf->stream('Surat Keterangan Kehilangan ' . $row['nama'] . '' . ".pdf", array("Attachment" => false));
