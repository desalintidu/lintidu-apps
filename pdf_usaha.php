<?php

use Dompdf\Dompdf;

include("config/config.php");
include("api/path.php");
include("phpqrcode/phpqrcode.php");

require_once 'dompdf/autoload.inc.php';
$dompdf = new Dompdf();
$id = $_GET['id'];
$usaha = mysqli_query($conn, "SELECT * FROM   tb_surat_usaha INNER JOIN tb_user ON   tb_surat_usaha.nik = tb_user.nik AND   tb_surat_usaha.id_surat_usaha ='" . $id . "'");
$row = mysqli_fetch_array($usaha);

if (!file_exists('phpqrcode/img/usaha_' . $row['id_surat_usaha'] . '.png')) {
  clearstatcache();
  QRcode::png($urls . 'pdf_usaha.php?id=' . $row['id_surat_usaha'], 'phpqrcode/img/usaha_' . $row['id_surat_usaha'] . '.png');
}


$html = '
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surat Keterangan Usaha</title>
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
          <td style="text-align: center; ">Nomor: 140 /' . $row['nomor_surat_usaha'] . '/ Kesra.2022</td>
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
        <td style="width:150px">Nik</td>
        <td style="width:30px; text-align:center;">:</td>
        <td style="width:200px;text-transform: capitalize;">' . $row['nik'] . '</td>
        </tr>
        <tr>
        <td style="width:150px">Umur</td>
        <td style="width:30px; text-align:center;">:</td>
        <td style="width:200px;text-transform: capitalize;">' . $row['umur'] . ' Tahun</td>
        </tr>
        <tr>
        <td style="width:150px">Pekerjaan</td>
        <td style="width:30px; text-align:center;">:</td>
        <td style="width:200px;text-transform: capitalize;">' . $row['pekerjaan'] . '</td>
        </tr>
        <tr>
        <td style="width:150px">Alamat</td>
        <td style="width:30px; text-align:center;">:</td>
        <td style="width:200px;text-transform: capitalize;">' . $row['alamat'] . '</td>
        </tr>
      
          
      </table>
      <!-- end pemilik -->
      
      <!--Isi -->
      <table width="90%" cellspacing="0"  style="margin-top: 10px;">
        <tr>
          <td style="text-align: justify; line-height: 26px; text-indent: 40px; ">Bahwa yang namanya tersebut di atas benar – benar memiliki usaha <span style="font-weight: bold;text-transform: capitalize;">  ' . $row['jenis_usaha'] . ' </span> yang sudah jalan selama  Lebih dari <span> ' . $row['lama_usaha'] . ' </span>Tahun. yang terletak di <span style="text-transform: capitalize;">' . $row['alamat_usaha'] . '</span> Desa Lintidu Kecamatan Paleleh kabupaten Buol.</td>
        </tr>
      </table>
      <!--End Isi -->

      <!--Demikian surat -->
      <table width="90%" cellspacing="0">
        <tr>
          <td style="text-align: justify; line-height: 26px; text-indent: 40px; ">Demikian surat keterangan ini dibuat dengan benar dan diberikan kepada yang bersangkutan untuk dipergunakan sebagaimana mestinya.</td>
        </tr>
      </table>
      <!--End Demikian surat -->

    <!-- tanda tangan -->
    <table cellspacing="0"  style="margin-top: 60px; margin-left: auto;">
      <tr>
          <td style="text-align: center; width: 250px;">Lintidu, <span>' . date('d F Y', strtotime($row['tanggal_surat_usaha'])) . '</span></td>
      </tr>
      <tr>
      <td style="text-align: center; font-weight: bold;">Kepala Desa Lintidu <br>
      <img src="phpqrcode/img/usaha_' . $row['id_surat_usaha'] . '.png" />
      </td>
  </tr>
    <tr>
      <td style="text-align: center; font-weight: bold;"><u>Agus Abjulu S.Sos</u></td>
    </tr>
  </table>
  <!-- end tanda tangan -->
  

  
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
$dompdf->stream('Surat Keterangan Usaha ' . $row['nama'] . ' ' . ".pdf", array("Attachment" => false));
