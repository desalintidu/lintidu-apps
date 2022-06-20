<?php

use Dompdf\Dompdf;

include("config/config.php");
include("api/path.php");
include("phpqrcode/phpqrcode.php");

require_once 'dompdf/autoload.inc.php';
$dompdf = new Dompdf();
$id = $_GET['id'];
$tanah = mysqli_query($conn, "SELECT * FROM  tb_surat_kepemilikan_tanah INNER JOIN tb_user ON  tb_surat_kepemilikan_tanah.nik = tb_user.nik AND  tb_surat_kepemilikan_tanah.id_surat_kepemilikan_tanah='" . $id . "'");
$row = mysqli_fetch_array($tanah);

if (!file_exists('phpqrcode/img/tanah_' . $row['id_surat_kepemilikan_tanah'] . '.png')) {
  clearstatcache();
  QRcode::png($urls . 'pdf_tanah.php?id=' . $row['id_surat_kepemilikan_tanah'], 'phpqrcode/img/tanah_' . $row['id_surat_kepemilikan_tanah'] . '.png');
}

$html = '
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surat Keterangan Kepemilikan Tanah</title>
</head>

<body>
  <div class="container"  style="margin-left: 80px;">

      <!-- kop surat -->
      <table width="90%" style="margin-top: 30px; ">
        <tr>
          <td style="width: 26px;"><img src="./img/logo.png" style="width: 55px;"></td>
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
          <td style="text-align: center; font-weight: bold; font-size: 16px;"><u>SURAT KETERANGAN PENGUASAAN TANAH</u></td>
        </tr>
        <tr>
          <td style="text-align: center; ">Nomor: ' . $row['nomor_surat_kepemilikan_tanah'] . ' Pemdes.2022</td>
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
          <td style="width:200px">' . $row['umur'] . ' Tahun</td>
        </tr>
        <tr>
          <td style="width:150px">Pekerjaan/Jabatan</td>
          <td style="width:30px; text-align:center;">:</td>
          <td style="width:200px;text-transform: capitalize;">' . $row['pekerjaan'] . '</td>
        </tr>
        <tr>
          <td style="width:150px">Alamat </td>
          <td style="width:30px; text-align:center;">:</td>
          <td style="width:400px;text-transform: capitalize;">' . $row['alamat'] . ' , Desa Lintidu</td>
        </tr>
          
      </table>
      <!-- end pemilik -->
      
      <!--Isi -->
      <table width="90%" cellspacing="0"  style="margin-top: 10px;">
        <tr>
          <td style="text-align: justify; line-height: 26px; text-indent: 30px; ">Sesuai dengan keterangan yang bersangkutan dan para saksi – saksi lainnya yang saya kenal dan turut membubuhkan tanda tangan diatas surat keterangan ini, Bahwa nama tersebut diatas benar menguasai sebidang tanah <sapn style="font-weight:bold;">PEKARANGAN</sapn>, Yang berukuran :</td>
        </tr>
        <tr>
          <td style="text-align: center; line-height: 26px; text-indent: 25; padding-top:10px; ">•	Ukuran Tanah : Panjang ' . $row['panjang_tanah'] . ' Meter Dan Lebar ' . $row['lebar_tanah'] . ' Meter</td>
        </tr>
      </table>
      <!--End Isi -->

      <!--Demikian surat -->
      <table width="90%" cellspacing="0">
        <tr>
          <td style="text-align: justify; line-height: 26px; text-indent: 25; padding-top:10px;">Sebidang tanah Pekarangan  yang dimaksut, terletak di <span style="font-weight:bold;text-transform: capitalize;">' . $row['alamat_tanah'] . '</span>, Desa LINTIDU, Kecamatan PALELEH, Dengan status <span style="font-weight:bold;text-transform: capitalize;">' . $row['status_tanah'] . '</span>, Dengan Batas – Batas Sebagai Berikut :</td>
        </tr>
      </table>
      <!--End Demikian surat -->
      
      <!-Batas - batas -->
      <table width="40%"   cellspacing="0"  style=" padding-top:15px; line-height: 26px; margin-left: 30px;">
      <tr>
      <td style="width:250px"><li type="circle">Sebelah Timur Berbatasan Dengan</li></td>
      <td style="width:30px; text-align:center;">:</td>
      <td style="width:250px;text-transform: capitalize;">' . $row['perbatasan_timur'] . '</td>
      </tr>
      <tr>
      <td style="width:250px"><li type="circle">Sebelah Barat Berbatasan Dengan</li></td>
      <td style="width:30px; text-align:center;">:</td>
      <td style="width:250px;text-transform: capitalize;">' . $row['perbatasan_barat'] . '</td>
      </tr>
      <tr>
      <td style="width:250px"><li type="circle">Sebelah Selatan Berbatasan Dengan</li></td>
      <td style="width:30px; text-align:center;">:</td>
      <td style="width:250px;text-transform: capitalize;">' . $row['perbatasan_selatan'] . '</td>
      </tr>
      <tr>
      <td style="width:250px"><li type="circle">Sebelah Utara Berbatasan Dengan </li></td>
      <td style="width:30px; text-align:center;">:</td>
      <td style="width:250px;text-transform: capitalize;">' . $row['perbatasan_utara'] . '</td>
      </tr>
        
    </table>
      <!-End Batas - batas -->

      <!--Demikian surat -->
      <table width="90%" cellspacing="0">
        <tr>
          <td style="text-align: justify; line-height: 26px; text-indent: 25; padding-top:10px;">Diterangkan selanjutnya bahwa status tanah <sapn style="font-weight: bold;text-transform: capitalize;">' . $row['status_tanah'] . '</sapn> tersebut berasal dari <sapn style="font-weight: bold;text-transform: capitalize;">Sdr.' . $row['pemilik_tanah_sebelumnya'] . '</sapn>  Pada Tanggal <sapn style="font-weight: bold;">' . date('d F Y', strtotime($row['tanggal_diberikan_tanah'])) . '</sapn>, Dan menurut penyeledikan dilapangan tanah tersebut sampai akhir ini :</td>
        </tr>
      </table
      <!--End Demikian surat -->

    <table width="90%"   cellspacing="0"  style=" padding-top:10px; line-height: 26px; margin-left: 30px;">
      <tr>
        <td>1. Tidak dalam silang sengketa dengan pihak manapun juga.</td>
      </tr>
      <tr>
        <td>2. Tidak pernah diperjual belikan kepada pihak manapun juga.</td>
      </tr>
      <tr>
        <td>3. Tidak pernah sebagai jaminan/agunan kepada pihak manapun.</td>
      </tr>
      <tr>
        <td>4. Belum pernah diterbitkan surat keterangan selain  surat keterangan tanah yang <span style="margin-left:16px">sekarang ini.</span></td>
      </tr>
    </table>

    <!--Demikian surat -->
    <table width="90%" cellspacing="0">
      <tr>
        <td style="text-align: justify; line-height: 26px; text-indent: 25; padding-top:10px;">Selain itu pengukuran luas tanah tersebut diatas benar – benar disaksikan dilapangan bersama para saksi batas tanah dan saksi lainnya dan sampai saat ini tanah tersebut masi dikuasai oleh Saya sendiri.</td>
      </tr>
    </table
    <!--End Demikian surat -->

    <!--Demikian surat -->
    <table width="90%" cellspacing="0">
      <tr>
        <td style="text-align: justify; line-height: 26px; text-indent: 25;">Apabila terjadi permasalahan dikemudian hari hak atas tanah maupun batas – batasnya, maka saudar(i) <span style="font-weight:bold;">' . strtoupper($row['nama']) . '</span> beserta saksi – saksi batas bertanggung jawab sepenuhnya dan bersedia dituntut sesuai hukum yang berlaku tanpa melibatkan pihak lain.</td>
      </tr>
      <tr>
        <td style="text-align: justify; line-height: 26px; text-indent: 25;">Demikian surat keterangan ini dibuat dengan sebenarnya atas permintaan yang bersangkutan  untuk dapat dipergunakan sebagaimana mestinya.</td>
      </tr>
    </table
    <!--End Demikian surat -->

 

  
 <!-- tanda tangan -->
    <table cellspacing="0"   style="margin-top: 60px;">
      <tr>
          <td style="text-align: center; width: 280px;"></td>
          <td style="text-align: center; width: 250px;">Lintidu, <span>' . date('d F Y', strtotime($row['tanggal_surat_kepemilikan_tanah'])) . '</span></td>
      </tr>
      <tr>
      <td style="text-align: center; font-weight: bold;">Kepala Dusun</td>
        <td style="text-align: center; font-weight: bold;">Pemilik Tanah</td>
    </tr>
    <tr>
      <td style="text-align: center; font-weight: bold; padding-top: 70px;">................................</td>
      <td style="text-align: center; font-weight: bold; padding-top: 70px;"><u>' . $row['nama'] . '</u></td>
    </tr>
    <tr>
  </tr>
  </table>
  <!-- end tanda tangan -->

  <table cellspacing="0"  style="margin-top: 40px;">
  <tr>
    <td>Saksi - Saksi :</td>
    <td></td>
    <td></td>
  </tr>
  <tr">
    <td></td>
    <td style="width:300px; padding-top: 30px;">1. ' . $row['nama_saksi_pertama'] . '</td>
    <td style="width:200px; padding-top: 30px;">1............................</td>
  </tr>
  <tr>
  <td></td>
  <td style="width:300px; padding-top: 30px;">2. ' . $row['nama_saksi_kedua'] . '</td>
  <td style="width:200px; padding-top: 30px;">2............................</td>
</tr>
<tr>
<td></td>
<td style="width:300px; padding-top: 30px;">3. ' . $row['nama_saksi_ketiga'] . '</td>
<td style="width:200px; padding-top: 30px;">3............................</td>
</tr>
</table>

 
<!-- tanda tangan -->
<table cellspacing="0"  style="margin-top: 80px; margin-left: auto;">
  <tr>
      <td style="text-align: center; width: 250px;">Mengetahui</td>
  </tr>
  <tr>
  <td style="text-align: center; font-weight: bold;">Kepala Desa Lintidu <br>
  <img src="phpqrcode/img/tanah_' . $row['id_surat_kepemilikan_tanah'] . '.png" />
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
$dompdf->stream('Surat Keterangan Kepemilikan Tanah' . $row['nama'] . '' . ".pdf", array("Attachment" => false));
