<?php

use Dompdf\Dompdf;

include("../config/config.php");
require '../dompdf/autoload.inc.php';
$dompdf = new Dompdf();



if (isset($_POST["cetak"])) {
  $tglAwal  = mysqli_real_escape_string($conn, $_POST["tglAwal"]);
  $tglAkhir = mysqli_real_escape_string($conn, $_POST["tglAkhir"]);
  $laporanPenghasilan = mysqli_query($conn, "SELECT * FROM tb_surat_penghasilan_orang_tua INNER JOIN tb_user ON tb_surat_penghasilan_orang_tua.nik = tb_user.nik WHERE tanggal_surat_penghasilan_orang_tua BETWEEN '$tglAwal' AND '$tglAkhir'");
} else {
  $laporanPenghasilan = mysqli_query($conn, "SELECT * FROM tb_surat_penghasilan_orang_tua");
}




$html = '
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Pengajuan Surat Keterangan Penghasilan Orang Tua</title>
</head>

<body>


  <div class="container">
  
      <!-- kop surat -->
      <table width="100%%">
        <tr>
          <td style="width: 20px;"><img src="../img/logo.png" style="width: 55px;"></td>
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
      <table width="100%%" cellspacing="0">
        <tr>
          <td style="text-align: center; font-weight: bold; font-size: 16px;"><u>LAPORAN PENGAJUAN SURAT PENGHASILAN ORANG TUA</u></td>
        </tr>
      </table>
      <!-- end nomor surat -->
      <table width="100%%" border="1" cellspacing="0" cellpadding="5" style="font: size 12px; margin-top:20px;">
        <tr>
          <th>No</th>
          <th>Nomor Surat</th>
          <th>Nik</th>
          <th>Nama</th>
          <th>Tempat Tanggal Lahir</th>
          <th>Agama</th>
          <th>Pekerjaan</th>
          <th>Alamat</th>
          <th>Nama Ayah</th>
          <th>Pekerjaan Ayah</th>
          <th>Penghasilan Ayah</th>
          <th>Tanggal Surat</th>
        </tr>';


$no = 1;
while ($row = mysqli_fetch_array($laporanPenghasilan)) {
  $html .= "<tr style='text-align:center;'>
        <td>" . $no . "</td>
        <td>" . $row['nomor_surat_penghasilan_orang_tua'] . "</td>
        <td>" . $row['nik'] . "</td>
        <td>" . $row['nama'] . "</td>
        <td>" . $row['tempat_lahir'] . ", " . $row['tanggal_lahir'] . "</td>
        <td>" . $row['agama'] . "</td>
        <td>" . $row['pekerjaan'] . "</td>
        <td>" . $row['alamat'] . "</td>
        <td>" . $row['nama_ayah'] . "</td>
        <td>" . $row['pekerjaan_ayah'] . "</td>
        <td> Rp. " . $row['penghasilan_ayah'] . "</td>
        <td>" . date('d F Y', strtotime($row['tanggal_surat_penghasilan_orang_tua'])) . "</td>
        </tr>";
  $no++;
}




$html .= '  <table cellspacing="0"  style="margin-top: 35px; margin-left: auto;">
      <tr>
          <td style="text-align: center; width: 250px;">Lintidu, ......./.................../2022</td>
      </tr>
      <tr>
        <td style="text-align: center; font-weight: bold;">Kepala Desa Lintidu</td>
    </tr>
    <tr>
      <td style="text-align: center; font-weight: bold; padding-top: 70px;"><u>Agus Abjulu S.Sos</u></td>
    </tr>
  </table>
  <!-- end tanda tangan -->
  
  </div>
</body>
</html>
';


$dompdf->load_html($html);
$dompdf->setPaper('A4', 'landscape');


// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('Laporan Pengajuan Surat Penghasilan Orang Tua' . ".pdf", array("Attachment" => false));
