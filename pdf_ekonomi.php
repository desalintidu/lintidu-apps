<?php

use Dompdf\Dompdf;

include("config/config.php");
include("api/path.php");
include("phpqrcode/phpqrcode.php");

require_once 'dompdf/autoload.inc.php';
$dompdf = new Dompdf();
$id = $_GET['id'];
$ekonomi = mysqli_query($conn, "SELECT * FROM   tb_surat_ekonomi_lemah INNER JOIN tb_user ON   tb_surat_ekonomi_lemah.nik = tb_user.nik AND   tb_surat_ekonomi_lemah.id_surat_ekonomi_lemah ='" . $id . "'");
$row = mysqli_fetch_array($ekonomi);

if (!file_exists('phpqrcode/img/ekonomi_' . $row['id_surat_ekonomi_lemah'] . '.png')) {
  clearstatcache();
  QRcode::png($urls . 'pdf_ekonomi.php?id=' . $row['id_surat_ekonomi_lemah'], 'phpqrcode/img/ekonomi_' . $row['id_surat_ekonomi_lemah'] . '.png');
}

$html = '
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surat Keterngan Ekonomi Lemah</title>
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
          <td style="text-align: center; font-weight: bold; font-size: 16px;"><u>SURAT KETERANGAN EKONOMI LEMAH</u></td>
        </tr>
        <tr>
          <td style="text-align: center; ">Nomor: 140 /' . $row['nomor_surat_ekonomi_lemah'] . '/ Pemdes.2022</td>
        </tr>
      </table>
      <!-- end nomor surat -->
      
      <!--Yang bertanda Tangan -->
      <table width="90%" cellspacing="0"  style="margin-top: 30px;">
        <tr>
          <td style="text-align: justify; line-height: 26px; ">Yang bertanda tangan dibawah ini Pemerintah Desa Lintidu Kecamatan Paleleh Kabupaten Buol, meneragkan dengan benar kepada :</td>
        </tr>
      </table>
      <!--End yang bertanda Tangan -->

      <!-- Pemilik -->
      <table width="40%" cellspacing="0"  style="margin-left: 20px; padding-top:15px; line-height: 22px;">
        <tr>
        <td style="width:30px; text-align:center;">I</td>
        <td style="width:150px">Nama Suami</td>
        <td style="width:30px; text-align:center;">:</td>
        <td style="width:300px;text-transform: capitalize;">' . $row['nama_ayah'] . '</td>
        </tr>
        <tr>
        <td style="width:30px; text-align:center;"></td>
        <td style="width:150px">Umur</td>
        <td style="width:30px; text-align:center;">:</td>
        <td style="width:300px">' . $row['umur_ayah'] . ' Tahun</td>
        </tr>
        <tr>
        <td style="width:30px; text-align:center;"></td>
        <td style="width:150px">Agama</td>
        <td style="width:30px; text-align:center;">:</td>
        <td style="width:300px">' . $row['agama_ayah'] . '</td>
        </tr>
        <tr>
        <td style="width:30px; text-align:center;"></td>
        <td style="width:150px">Pekerjaan</td>
        <td style="width:30px; text-align:center;">:</td>
        <td style="width:300px;text-transform: capitalize;">' . $row['pekerjaan_ayah'] . '</td>
        </tr>
        <tr>
        <td style="width:30px; text-align:center;"></td>
        <td style="width:150px">Alamat</td>
        <td style="width:30px; text-align:center;">:</td>
        <td style="width:300px;text-transform: capitalize;">' . $row['alamat_ayah'] . ' Desa Lintidu</td>
        </tr>
        <tr>
        <td style="width:30px; text-align:center; padding-top:10px"></td>
        <td style="width:150px"></td>
        <td style="width:30px; text-align:center;"></td>
        <td style="width:300px"></td>
        </tr>
        <tr>
        <td style="width:30px; text-align:center;">II</td>
        <td style="width:150px">Nama Istri</td>
        <td style="width:30px; text-align:center;">:</td>
        <td style="width:300px;text-transform: capitalize;">' . $row['nama_ibu'] . '</td>
        </tr>
        <tr>
        <td style="width:30px; text-align:center;"></td>
        <td style="width:150px">Umur</td>
        <td style="width:30px; text-align:center;">:</td>
        <td style="width:300px">' . $row['umur_ibu'] . ' Tahun</td>
        </tr>
        <tr>
        <td style="width:30px; text-align:center;"></td>
        <td style="width:150px">Agama</td>
        <td style="width:30px; text-align:center;">:</td>
        <td style="width:300px">' . $row['agama_ibu'] . ' Tahun</td>
        </tr>
        <tr>
        <td style="width:30px; text-align:center;"></td>
        <td style="width:150px">Pekerjaan</td>
        <td style="width:30px; text-align:center;">:</td>
        <td style="width:300px;text-transform: capitalize;">' . $row['pekerjaan_ibu'] . '</td>
        </tr>
        <tr>
        <td style="width:30px; text-align:center;"></td>
        <td style="width:150px">Alamat</td>
        <td style="width:30px; text-align:center;">:</td>
        <td style="width:300px;text-transform: capitalize;">' . $row['alamat_ibu'] . ' Desa Lintidu</td>
        </tr>
      </table>
      <!-- end pemilik -->
      
      <!--Isi -->
      <table width="90%" cellspacing="0"  style="margin-top: 10px;">
        <tr>
          <td style="text-align: justify; line-height: 26px; text-indent: 40px; ">Diterangkan bahwa nama tersebut diatas adalah orang tua kandung dari <span style="font-weight: bold;text-transform: capitalize;">An. ' . $row['nama'] . ' </span>dan merupakan termasuk Kategori Keluarga Ekonomi Lemah/Tidak Mampu.  Adapun keterangan ini dikeluarkan guna untuk menerangkan status Ekonomi  masyarakat serta diperuntukan bagi kepentingan yang bersangkutan tersebut diatas. </td>
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
    <table cellspacing="0"   style="margin-top: 60px;">
      <tr>
          <td style="text-align: center; width: 280px;">Mengetahui</span><br><span style="font-weight: bold;">Camat Paleleh</span></td>
          <td style="text-align: center; width: 250px;">Lintidu, <span>' . date('d F Y', strtotime($row['tanggal_surat_ekonomi_lemah'])) . '</span> <br><span style="font-weight: bold;">Kepala Desa Lintidu</span> </td>
      </tr>
      <tr>
      <td style="text-align: center; font-weight: bold;"></td>
      <td style="text-align: center; font-weight: bold; margin-top:20px;"><br>
      <img src="phpqrcode/img/ekonomi_' . $row['id_surat_ekonomi_lemah'] . '.png" />
      </td>
    </tr>
    <tr>
      <td style="text-align: center; font-weight: bold;"><u>Lukman, S.Pt</u></td>
      <td style="text-align: center; font-weight: bold;"><u>Agus Abjulu, S.Sos</u></td>
    </tr>
    <tr>
    <td style="text-align: center;">Nip : 19741111 200312 100</td>
    <td style="text-align: center; font-weight: bold; "></td>
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
$dompdf->stream('Surat Keterangan Ekonomi Lemah ' . $row['nama'] . '' . ".pdf", array("Attachment" => false));
