<?php
error_reporting(0);
ini_set('display_errors', '0');
date_default_timezone_set("Asia/Makassar");
require_once("../plugin/iObject/iobject.php");
require_once("../path.php");

$op = new iquery();
$response = array();
$param = $_POST['PARAM'];
$json = '{"DATA":[';

if (isset($param)) {

	if ($param == "getBerita") {

		$q2 = $op->select("tb_config", "*", " ORDER BY id_config");
		while ($row2 = mysqli_fetch_array($q2)) {
			$configx .= $row2['value_config'] . ",";
		}

		$data_penduduk = substr($configx, 0, strlen($configx) - 1);

		$q = $op->select("tb_berita", "*", " ORDER BY id_berita DESC");
		if (mysqli_num_rows($q) > 0) {
			while ($row = mysqli_fetch_array($q)) {
				$json .= '{"CHECK":"TRUE","ID_BERITA":"' . $row['id_berita'] . '","JUDUL_BERITA":"' . $row['judul_berita'] . '","ISI_BERITA":"' . $row['isi_berita'] . '","GAMBAR_BERITA":"' . $row['img_berita'] . '" ,"TANGGAL_BERITA":"' . $row['tanggal_berita'] . '" ,"DATA_PENDUDUK":"' . $data_penduduk . '"},';
			}
		} else {
			$json .= '{"CHECK":"FALSE"},';
		}
	} else if ($param == "getHistori") {

		$nik = $_POST['NIK'];

		//surat domisili
		$q1 = $op->select("tb_surat_domisili", "*", " WHERE nik='" . $nik . "' ORDER BY tanggal_surat_domisili");
		if (mysqli_num_rows($q1) > 0) {
			while ($r1 = mysqli_fetch_array($q1)) {
				$res1 .= '{"CHECK":"TRUE", "KET1":"Surat Domisili" , "ID_SURAT_DOMISILI":"' . $r1['id_surat_domisili'] . '", "NO_SURAT_DOMISILI":"' . $r1['nomor_surat_domisili'] . '",  "TGL_SURAT_DOMISILI":"' . $r1['tanggal_surat_domisili'] . '",  "STATUS":"' . $r1['status'] . '" ,  "URL":"' . $urls . 'pdf_domisili.php?id=' . $r1['id_surat_domisili'] . '" },';
			}
		} else {
			$res1 .= '{"CHECK":"FALSE", "KET1":"Surat Domisili" , "ID_SURAT_DOMISILI":"-", "NO_SURAT_DOMISILI":"-",  "TGL_SURAT_DOMISILI":"-",  "STATUS":"-" ,  "URL":"-" },';
		}

		//surat ekonomi lemah
		$q2 = $op->select("tb_surat_ekonomi_lemah", "*", " WHERE nik='" . $nik . "' ORDER BY tanggal_surat_ekonomi_lemah");
		if (mysqli_num_rows($q2) > 0) {
			while ($r2 = mysqli_fetch_array($q2)) {
				$res2 .= '{"CHECK":"TRUE", "KET2":"Surat Ekonomi Lemah", "ID_SURAT_EKONOMI_LEMAH":"' . $r2['id_surat_ekonomi_lemah'] . '", "NO_SURAT_EKONOMI_LEMAH":"' . $r2['nomor_surat_ekonomi_lemah'] . '",  "TGL_SURAT_EKONOMI_LEMAH":"' . $r2['tanggal_surat_ekonomi_lemah'] . '",  "STATUS":"' . $r2['status'] . '" ,  "URL":"' . $urls . 'pdf_ekonomi.php?id=' . $r2['id_surat_ekonomi_lemah'] . '"},';
			}
		} else {
			$res2 .= '{"CHECK":"FALSE", "KET2":"Surat Ekonomi Lemah", "ID_SURAT_EKONOMI_LEMAH":"-", "NO_SURAT_EKONOMI_LEMAH":"-",  "TGL_SURAT_EKONOMI_LEMAH":"-",  "STATUS":"-" ,  "URL":"-"},';
		}

		//surat kehilangan
		$q3 = $op->select("tb_surat_kehilangan", "*", " WHERE nik='" . $nik . "' ORDER BY tanggal_surat_kehilangan");
		if (mysqli_num_rows($q3) > 0) {
			while ($r3 = mysqli_fetch_array($q3)) {
				$res3 .= '{"CHECK":"TRUE", "KET3":"Surat Kehilangan", "ID_SURAT_KEHILANGAN":"' . $r3['id_surat_kehilangan'] . '", "NO_SURAT_KEHILANGAN":"' . $r3['nomor_surat_kehilangan'] . '",  "TGL_SURAT_KEHILANGAN":"' . $r3['tanggal_surat_kehilangan'] . '",  "STATUS":"' . $r3['status'] . '",  "URL":"' . $urls . 'pdf_kehilangan.php?id=' . $r3['id_surat_kehilangan'] . '" },';
			}
		} else {
			// $res3 .= '{"CHECK":"FALSE", "KET3":"Surat Kehilangan"},';
			$res3 .= '{"CHECK":"FALSE", "KET3":"Surat Kehilangan", "ID_SURAT_KEHILANGAN":"-", "NO_SURAT_KEHILANGAN":"-",  "TGL_SURAT_KEHILANGAN":"-",  "STATUS":"-" ,  "URL":"-"},';
		}

		//surat kepemilikan tanah
		$q4 = $op->select("tb_surat_kepemilikan_tanah", "*", " WHERE nik='" . $nik . "' ORDER BY tanggal_surat_kepemilikan_tanah");
		if (mysqli_num_rows($q4) > 0) {
			while ($r4 = mysqli_fetch_array($q4)) {
				$res4 .= '{"CHECK":"TRUE", "KET4":"Surat Kepemilikan Tanah", "ID_SURAT_TANAH":"' . $r4['id_surat_kepemilikan_tanah'] . '", "NO_SURAT_TANAH":"' . $r4['nomor_surat_kepemilikan_tanah'] . '",  "TGL_SURAT_TANAH":"' . $r4['tanggal_surat_kepemilikan_tanah'] . '",  "STATUS":"' . $r4['status'] . '",  "URL":"' . $urls . 'pdf_tanah.php?id=' . $r4['id_surat_kepemilikan_tanah'] . '" },';
			}
		} else {
			// $res4 .= '{"CHECK":"FALSE", "KET4":"Surat Kepemilikan Tanah"},';
			$res4 .= '{"CHECK":"FALSE", "KET4":"Surat Kepemilikan Tanah", "ID_SURAT_TANAH":"-", "NO_SURAT_TANAH":"-",  "TGL_SURAT_TANAH":"-",  "STATUS":"-" ,  "URL":"-"},';
		}

		//surat penghasilan orang tua
		$q5 = $op->select("tb_surat_penghasilan_orang_tua", "*", " WHERE nik='" . $nik . "' ORDER BY tanggal_surat_penghasilan_orang_tua");
		if (mysqli_num_rows($q5) > 0) {
			while ($r5 = mysqli_fetch_array($q5)) {
				$res5 .= '{"CHECK":"TRUE", "KET5":"Surat Penghasilan Orang Tua", "ID_SURAT_PENGHASILAN":"' . $r5['id_surat_penghasilan_orang_tua'] . '", "NO_SURAT_PENGHASILAN":"' . $r5['nomor_surat_penghasilan_orang_tua'] . '",  "TGL_SURAT_PENGHASILAN":"' . $r5['tanggal_surat_penghasilan_orang_tua'] . '",  "STATUS":"' . $r5['status'] . '", "URL":"' . $urls . 'pdf_penghasilan.php?id=' . $r5['id_surat_penghasilan_orang_tua'] . '" },';
			}
		} else {
			// $res5 .= '{"CHECK":"FALSE", "KET5":"Surat Penghasilan Orang Tua"},';
			$res5 .= '{"CHECK":"FALSE", "KET5":"Surat Penghasilan Orang Tua", "ID_SURAT_PENGHASILAN":"-", "NO_SURAT_PENGHASILAN":"-",  "TGL_SURAT_PENGHASILAN":"-",  "STATUS":"-" ,  "URL":"-"},';
		}

		//surat usaha
		$q6 = $op->select("tb_surat_usaha", "*", " WHERE nik='" . $nik . "' ORDER BY tanggal_surat_usaha");
		if (mysqli_num_rows($q6) > 0) {
			while ($r6 = mysqli_fetch_array($q6)) {
				$res6 .= '{"CHECK":"TRUE", "KET6":"Surat Usaha", "ID_SURAT_USAHA":"' . $r6['id_surat_usaha'] . '", "NO_SURAT_USAHA":"' . $r6['nomor_surat_usaha'] . '",  "TGL_SURAT_USAHA":"' . $r6['tanggal_surat_usaha'] . '",  "STATUS":"' . $r6['status'] . '",  "URL":"' . $urls . 'pdf_usaha.php?id=' . $r6['id_surat_usaha'] . '" },';
			}
		} else {
			// $res6 .= '{"CHECK":"FALSE", "KET6":"Surat Usaha"},';
			$res6 .= '{"CHECK":"FALSE", "KET6":"Surat Usaha", "ID_SURAT_USAHA":"-", "NO_SURAT_USAHA":"-",  "TGL_SURAT_USAHA":"-",  "STATUS":"-" ,  "URL":"-"},';
		}

		$res1 = substr($res1, 0, strlen($res1) - 1);
		$res2 = substr($res2, 0, strlen($res2) - 1);
		$res3 = substr($res3, 0, strlen($res3) - 1);
		$res4 = substr($res4, 0, strlen($res4) - 1);
		$res5 = substr($res5, 0, strlen($res5) - 1);
		$res6 = substr($res6, 0, strlen($res6) - 1);

		$json .= '{"CHECK":"TRUE","RES1":[' . $res1 . '], "RES2":[' . $res2 . '], "RES3":[' . $res3 . '], "RES4":[' . $res4 . '], "RES5":[' . $res5 . '], "RES6":[' . $res6 . ']},';
	}
}

//parse result
$json = substr($json, 0, strlen($json) - 1);
$json .= ']}';

echo $json;
