<?php

use Dompdf\Dompdf;

include("config/config.php");
include("api/path.php");
include("phpqrcode/phpqrcode.php");

require_once 'dompdf/autoload.inc.php';
$dompdf = new Dompdf();
$id = $_GET['id'];
$penghasilan = mysqli_query($conn, "SELECT * FROM tb_surat_penghasilan_orang_tua INNER JOIN tb_user ON tb_surat_penghasilan_orang_tua.nik = tb_user.nik AND tb_surat_penghasilan_orang_tua.id_surat_penghasilan_orang_tua ='" . $id . "'");
$row = mysqli_fetch_array($penghasilan);

if (!file_exists('phpqrcode/img/penghasilan_' . $row['id_surat_penghasilan_orang_tua'] . '.png')) {
  clearstatcache();
  QRcode::png($urls . 'pdf_penghasilan.php?id=' . $row['id_surat_penghasilan_orang_tua'], 'phpqrcode/img/penghasilan_' . $row['id_surat_penghasilan_orang_tua'] . '.png');
}

$html = '
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surat Keterangan Penghasilan Orang Tua</title>
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
          <td style="text-align: center; font-weight: bold; font-size: 16px;"><u>SURAT KETERANGAN PEGHASILAN ORANG TUA  </u></td>
        </tr>
        <tr>
          <td style="text-align: center; ">Nomor: ' . $row['nomor_surat_penghasilan_orang_tua'] . ' Pemdes.2022</td>
        </tr>
      </table>
      <!-- end nomor surat -->
      
      <!--Yang bertanda Tangan -->
      <table width="90%" cellspacing="0"  style="margin-top: 30px;">
        <tr>
          <td style="text-align: justify; line-height: 26px; ">Yang bertanda tangan dibawah ini,Pemerintah Desa Lintidu Kecamatan Paleleh, Menerangkan dengan benar kepada :</td>
        </tr>
      </table>
      <!--End yang bertanda Tangan -->

      <!-- Pemilik -->
      <table width="40%"  cellspacing="0"  style="margin-left: 50px; padding-top:15px; line-height: 26px;">
        <tr>
        <td style="width:150px">Nama KK</td>
        <td style="width:30px; text-align:center;">:</td>
        <td style="width:200px">' . $row['nama_ayah'] . '</td>
        </tr>
        <tr>
          <td style="width:150px">Tempat/Tanggal Lahir</td>
          <td style="width:30px; text-align:center;">:</td>
          <td style="width:200px">' . $row['tempat_lahir_ayah'] . ', ' . $row['tanggal_lahir_ayah'] . '</td>
        </tr>
        <tr>
          <td style="width:150px">Agama</td>
          <td style="width:30px; text-align:center;">:</td>
          <td style="width:200px">' . $row['agama_ayah'] . '</td>
        </tr>
        
        <tr>
          <td style="width:150px">Pekerjaan/Jabatan</td>
          <td style="width:30px; text-align:center;">:</td>
          <td style="width:200px">' . $row['pekerjaan_ayah'] . '</td>
        </tr>
        <tr>
          <td style="width:150px">Alamat Domisili</td>
          <td style="width:30px; text-align:center;">:</td>
          <td style="width:400px">' . $row['alamat_ayah'] . ' , Desa Lintidu</td>
        </tr>
        <tr>
          <td style="width:150px">Penghasilan </td>
          <td style="width:30px; text-align:center;">:</td>
          <td style="width:400px">Rp. ' . $row['penghasilan_ayah'] . ' / Bulan</td>
        </tr>
      </table>
      <!-- end pemilik -->

      <!--Yang bertanda Tangan -->
      <table width="90%" cellspacing="0"  style="margin-top: 5px;">
        <tr>
          <td style="text-align: justify; line-height: 26px; ">Bahwa nama yang bersangkutan di atas adalah orang tua kandung dari : </td>
        </tr>
      </table>
      <!--End yang bertanda Tangan -->

      <!-- Pemilik -->
      <table width="40%"  cellspacing="0"  style="margin-left: 50px; padding-top:5px; line-height: 26px;">
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
          <td style="width:150px">Agama</td>
          <td style="width:30px; text-align:center;">:</td>
          <td style="width:200px">' . $row['agama'] . '</td>
        </tr>
        
        <tr>
          <td style="width:150px">Pekerjaan/Jabatan</td>
          <td style="width:30px; text-align:center;">:</td>
          <td style="width:200px;text-transform: capitalize;">' . $row['pekerjaan'] . '</td>
        </tr>
        <tr>
          <td style="width:150px">Alamat Domisili</td>
          <td style="width:30px; text-align:center;">:</td>
          <td style="width:400px;text-transform: capitalize;">' . $row['alamat'] . ' , Desa Lintidu</td>
        </tr>
      </table>
      <!-- end pemilik -->
      
      <!--Isi -->
      <table width="90%" cellspacing="0"  style="margin-top: 10px;">
        <tr>
          <td style="text-align: justify; line-height: 26px; text-indent: 40px; ">Adapun surat keterangan ini dikeluarkan berdasarkan status dan penghasilan yang dimiliki oleh orang tua anak tersebut serta kebenaran dari keterangan ini dapat di pertanggung jawabkan berdasarkan apa yang ada di lapangan.</td>
        </tr>
        <tr>
          <td style="text-align: justify; line-height: 26px; text-indent: 40px; ">Demikian surat keterangan penghasilan ini kami buat dengan benar untuk dapat di pergunakan sebagai mana mestinya.</td>
        </tr>
      </table>
      <!--End Isi -->


    <!-- tanda tangan -->
    <table cellspacing="0"  style="margin-top: 35px; margin-left: auto;">
      <tr>
          <td style="text-align: center; width: 250px;">Lintidu, <span>' . date('d F Y', strtotime($row['tanggal_surat_penghasilan_orang_tua'])) . '</span></td>
      </tr>
      <tr>
      <td style="text-align: center; font-weight: bold;">Kepala Desa Lintidu <br>
      <img src="phpqrcode/img/penghasilan_' . $row['id_surat_penghasilan_orang_tua'] . '.png" />
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
$dompdf->stream('Surat Keterangan Penghasilan ' . $row['nama'] . '' . ".pdf", array("Attachment" => false));
