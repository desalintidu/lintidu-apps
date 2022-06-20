<?php

use Dompdf\Dompdf;

include("config/config.php");
include("api/path.php");
include("phpqrcode/phpqrcode.php");

require_once 'dompdf/autoload.inc.php';
$dompdf = new Dompdf();
$id = $_GET['id'];
$domisili = mysqli_query($conn, "SELECT * FROM tb_surat_domisili INNER JOIN tb_user ON tb_surat_domisili.nik = tb_user.nik AND tb_surat_domisili.id_surat_domisili='" . $id . "'");
$row = mysqli_fetch_array($domisili);

if (!file_exists('phpqrcode/img/domisili_' . $row['id_surat_domisili'] . '.png')) {
  clearstatcache();
  QRcode::png($urls . 'pdf_domisili.php?id=' . $row['id_surat_domisili'], 'phpqrcode/img/domisili_' . $row['id_surat_domisili'] . '.png');
}

$html = '
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surat Keterangan Domisili</title>
</head>

<body>
  <div class="container"  style="margin-left: 80px;">

      <!-- kop surat -->
      <table width="90%" style="margin-top: 30px; ">
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
          <td style="text-align: center; font-weight: bold; font-size: 16px;"><u>SURAT KETERANGAN DOMISILI</u></td>
        </tr>
        <tr>
          <td style="text-align: center; ">Nomor: ' . $row['nomor_surat_domisili'] . ' Pemdes.2022</td>
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
        <td style="width:200px; text-transform: capitalize;">' . $row['nama'] . '</td>
        </tr>
        <tr>
          <td style="width:150px">Tempat/Tanggal Lahir</td>
          <td style="width:30px; text-align:center;">:</td>
          <td style="width:200px;; text-transform: capitalize;">' . $row['tempat_lahir'] . ', ' . $row['tanggal_lahir'] . '</td>
        </tr>
        <tr>
          <td style="width:150px">Pekerjaan/Jabatan</td>
          <td style="width:30px; text-align:center;">:</td>
          <td style="width:200px; text-transform: capitalize;">' . $row['pekerjaan'] . '</td>
        </tr>
        <tr>
          <td style="width:150px">Agama</td>
          <td style="width:30px; text-align:center;">:</td>
          <td style="width:200px">' . $row['agama'] . '</td>
        </tr>
        <tr>
          <td style="width:150px">Alamat Domisili</td>
          <td style="width:30px; text-align:center;">:</td>
          <td style="width:400px; text-transform: capitalize;">' . $row['alamat'] . ' , Desa Lintidu</td>
        </tr>
          
      </table>
      <!-- end pemilik -->
      
      <!--Isi -->
      <table width="90%" cellspacing="0"  style="margin-top: 10px;">
        <tr>
          <td style="text-align: justify; line-height: 26px; text-indent: 40px; ">Diterangkan dengan benar, bahwa yang bersangkutann tersebut  diatas adalah  penduduk <span style="font-weight: bold;">' . $row['nama_desa_sebelumnya'] . ',</span> <span style="font-weight: bold;">Kecamatan Paleleh, Kabupaten Buol</span> yang berdomisili di Desa Lintidu, Kec,Paleleh Kab.Buol, Adapun keterangan ini dikeluarkan merupakan kejelasan tentang status Tempat tinggal bagi yang bersangkutan. Demikian Surat Keterangan ini dibuat untuk perlunya.</td>
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
    <table cellspacing="0"  style="margin-top: 35px; margin-left: auto;">
      <tr>
          <td style="text-align: center; width: 250px;">Lintidu, <span>' . date('d F Y', strtotime($row['tanggal_surat_domisili'])) . '</span></td>
      </tr>
      <tr>
        <td style="text-align: center; font-weight: bold;">Kepala Desa Lintidu <br>
        <img src="phpqrcode/img/domisili_' . $row['id_surat_domisili'] . '.png" />
        </td>
    </tr>
    <tr>
      <td style="text-align: center; font-weight: bold; "><u>Agus Abjulu S.Sos</u></td>
    </tr>
  </table>
  <!-- end tanda tangan -->
  
  <!-- end keterangan -->
  <table width="625px"  cellspacing="0"  style="margin-top: 120px;" >
    <tr>
      <td style="font-weight: bold;">Keterangan :</td>
    </tr>
</table>

<table cellspacing="0"  style="margin-top: 10px;">
  <tr>
      <td width="400px">1. Surat Ket. Domisili ini Berlaku 6 Bulan.</td>
  </tr>
  <tr>
      <td width="400px">2. Surat Ket. Domisili Tidak Berlaku Untuk Keperluan 
        <span style="margin-left: 16px;">Lainnya / Selain Untuk Keterangan
        Kependudukan.</span>
        </td>
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
$dompdf->stream('Surat Keterangan Domisili ' . $row['nama'] . '' . ".pdf", array("Attachment" => false));
