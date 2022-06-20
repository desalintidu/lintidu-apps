<?php
error_reporting(1);
ini_set('display_errors', '1');
date_default_timezone_set("Asia/Makassar");
require_once("../plugin/iObject/iobject.php");

$op = new iquery();
$json = '{"DATA":[';

$param = $_POST['PARAM'];
if (isset($param)) {

	//------------------------------ SET DAFTAR -------------------------------------------/
	if ($param == "setRegistrasi") {

		$nik = $_POST['NIK'];
		$kk = $_POST['KK'];
		$nama = $_POST['NAMA'];
		$tempat_lahir = $_POST['TEMPAT_LAHIR'];
		$tanggal_lahir = $_POST['TANGGAL_LAHIR'];
		$jenis_kelamin = $_POST['JENIS_KELAMIN'];
		$agama = $_POST['AGAMA'];
		$umur = $_POST['UMUR'];
		$pekerjaan = $_POST['PEKERJAAN'];
		$alamat = $_POST['ALAMAT'];
		$nomor_HP = $_POST['NOMOR_HP'];
		$email = $_POST['EMAIL'];
		$foto = $_POST['ENCODE'];

		$q = $op->select("tb_user", "nik", " WHERE nik='" . $nik . "'");
		if (mysqli_num_rows($q) < 1) {
			//insert to user
			$ins = $op->save(
				"tb_user",
				"nik, kk, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, umur, pekerjaan, alamat, nomor_hp, email, img",
				"'" . $nik . "','" . $kk . "','" . $nama . "','" . $tempat_lahir . "','" . $tanggal_lahir . "','" . $jenis_kelamin . "','" . $agama . "','" . $umur . "','" . $pekerjaan . "','" . $alamat . "','" . $nomor_HP . "','" . $email . "','" . $foto . "'"
			);

			if ($ins) {
				$json .= '{"CHECK":"TRUE","MSG":"Data baru berhasil ditambahkan, Terima kasih."},';
			} else {
				$json .= '{"CHECK":"FALSE","MSG":"Data gagal disimpan !"},';
			}
		} else {
			$json .= '{"CHECK":"FALSE","MSG":"Data telah terinput sebelumnya !"},';
		}
	}
	//------------------------------ SET DAFTAR -------------------------------------------/
	// dari sini
	// -----------------------------SURAT DOMISILI-----------------------------------------
	else if ($param == "setDomisili") {
		// tangkap parameter
		$nik = $_POST['NIK'];
		$namaDesaSebelumnya = $_POST['NAMA_DESA_SEBELUMNYA'];

		//insert to user
		$ins = $op->save(
			"tb_surat_domisili",
			"nik, nama_desa_sebelumnya",
			"'" . $nik . "','" . $namaDesaSebelumnya . "'"
		);

		if ($ins) {
			$json .= '{"CHECK":"TRUE","MSG":"Surat keterangan domisili berhasil di ajukan, Terima kasih."},';
		} else {
			$json .= '{"CHECK":"FALSE","MSG":"Surat keterangan domisili gagal di ajukan !"},';
		}
		//sampe sini
		// --------------------------END SURAT DOMISILI---------------------------

		// dari sini
		// -----------------------------SURAT KEHILANGAN-----------------------------------------
	} else if ($param == "setKehilangan") {
		// tangkap parameter
		$nik = $_POST['NIK'];
		$jenisKehilangan = $_POST['JENIS_KEHILANGAN'];

		//insert to user
		$ins = $op->save(
			"tb_surat_kehilangan",
			"nik, jenis_kehilangan",
			"'" . $nik . "','" . $jenisKehilangan . "'"
		);

		if ($ins) {
			$json .= '{"CHECK":"TRUE","MSG":"Surat keterangan kehilangan Berhasil di ajukan, Terima kasih."},';
		} else {
			$json .= '{"CHECK":"FALSE","MSG":"Surat keterangan kehilangan gagal di ajukan !"},';
		}
		//sampe sini
		// --------------------------END SURAT KEHILANGAN---------------------------

		// dari sini
		// -----------------------------SURAT USAHA-----------------------------------------
	} else if ($param == "setUsaha") {
		// tangkap parameter
		$nik = $_POST['NIK'];
		$jenisUsaha = $_POST['JENIS_USAHA'];
		$lamaUsaha = $_POST['LAMA_USAHA'];
		$alamatUsaha = $_POST['ALAMAT_USAHA'];
		$foto = $_POST['ENCODE'];

		//insert to user
		$ins = $op->save(
			"tb_surat_usaha",
			"nik, jenis_usaha, lama_usaha, alamat_usaha, img",
			"'" . $nik . "','" . $jenisUsaha . "','" . $lamaUsaha . "','" . $alamatUsaha . "','" . $foto . "'"
		);

		if ($ins) {
			$json .= '{"CHECK":"TRUE","MSG":"Surat keterangan usaha berhasil di ajukan, Terima kasih."},';
		} else {
			$json .= '{"CHECK":"FALSE","MSG":"Surat keterangan usaha gagal di ajukan !"},';
		}
		//sampe sini
		// --------------------------END SURAT USAHA---------------------------

		// dari sini
		// -----------------------------SURAT EKONOMI LEMAH----------------------------------------
	} else if ($param == "setEkonomiLemah") {
		// tangkap parameter
		$nik = $_POST['NIK'];
		$namaAyah = $_POST['NAMA_AYAH'];
		$umurAyah = $_POST['UMUR_AYAH'];
		$agamaAyah = $_POST['AGAMA_AYAH'];
		$pekerjaanAyah = $_POST['PEKERJAAN_AYAH'];
		$alamatAyah = $_POST['ALAMAT_AYAH'];
		$namaIbu = $_POST['NAMA_IBU'];
		$umurIbu = $_POST['UMUR_IBU'];
		$agamaIbu = $_POST['AGAMA_IBU'];
		$pekerjaanIbu = $_POST['PEKERJAAN_IBU'];
		$alamatIbu = $_POST['ALAMAT_IBU'];


		//insert to user
		$ins = $op->save(
			"tb_surat_ekonomi_lemah",
			"nik, nama_ayah, umur_ayah, agama_ayah, pekerjaan_ayah, alamat_ayah, nama_ibu, umur_ibu, agama_ibu, pekerjaan_ibu, alamat_ibu",
			"'" . $nik . "','" . $namaAyah . "','" . $umurAyah . "','" . $agamaAyah . "','" . $pekerjaanAyah . "','" . $alamatAyah . "','" . $namaIbu . "','" . $umurIbu . "','" . $agamaIbu . "','" . $pekerjaanIbu . "','" . $alamatIbu . "'"
		);

		if ($ins) {
			$json .= '{"CHECK":"TRUE","MSG":"Surat keterangan ekonomi lemah Berhasil di ajukan, Terima kasih."},';
		} else {
			$json .= '{"CHECK":"FALSE","MSG":"Surat keterangan ekonomi lemah gagal di ajukan !"},';
		}
		//sampe sini
		// --------------------------END SURAT EKONOMI LEMAH---------------------------

		// dari sini
		// -----------------------------SURAT KEPEMILIKAN TANAH-----------------------------------------
	} else if ($param == "setKepemilikanTanah") {
		// tangkap parameter
		$nik = $_POST['NIK'];
		$panjangTanah = $_POST['PANJANG_TANAH'];
		$lebarTanah = $_POST['LEBAR_TANAH'];
		$alamatTanah = $_POST['ALAMAT_TANAH'];
		$statusTanah = $_POST['STATUS_TANAH'];
		$sebelahTimur = $_POST['SEBELAH_TIMUR'];
		$sebelahBarat = $_POST['SEBELAH_BARAT'];
		$sebelahSelatan = $_POST['SEBELAH_SELATAN'];
		$sebelahUtara = $_POST['SEBELAH_UTARA'];
		$pemilikTanahSebelumnya = $_POST['PEMILIK_SEBELUMNYA'];
		$tanggalDiberikanTanah = $_POST['TANGGAL_DIBERIKAN_TANAH'];
		$saksiPertama = $_POST['SAKSI_PERTAMA'];
		$saksiKedua = $_POST['SAKSI_KEDUA'];
		$saksiKetiga = $_POST['SAKSI_KETIGA'];
		$foto = $_POST['ENCODE'];

		//insert to user
		$ins = $op->save(
			"tb_surat_kepemilikan_tanah",
			"nik,  panjang_tanah, lebar_tanah,	alamat_tanah,	status_tanah,	perbatasan_timur,	perbatasan_barat,	perbatasan_selatan,	perbatasan_utara,	pemilik_tanah_sebelumnya,	tanggal_diberikan_tanah,	nama_saksi_pertama,	nama_saksi_kedua,	nama_saksi_ketiga, img",
			"'" . $nik . "','" . $panjangTanah . "','" . $lebarTanah . "','" . $alamatTanah . "','" . $statusTanah . "','" . $sebelahTimur . "','" . $sebelahBarat . "','" . $sebelahSelatan . "','" . $sebelahUtara . "','" . $pemilikTanahSebelumnya . "','" . $tanggalDiberikanTanah . "','" . $saksiPertama . "','" . $saksiKedua . "','" . $saksiKetiga . "','" . $foto . "'"
		);

		if ($ins) {
			$json .= '{"CHECK":"TRUE","MSG":"Surat keterangan kepemilikan tanah berhasil di ajukan, Terima kasih."},';
		} else {
			$json .= '{"CHECK":"FALSE","MSG":"Surat keterangan kepemilikan tanah gagal di ajukan !"},';
		}
		//sampe sini
		// --------------------------END SURAT KEPEMILIKAN TANAH---------------------------

		// dari sini
		// -----------------------------SURAT PENGHASILAN ORANG TUA----------------------------------------
	} else if ($param == "setPenghasilanOrtu") {
		// tangkap parameter
		$nik = $_POST['NIK'];
		$namaOrtu = $_POST['NAMA_AYAH'];
		$tempatLahirOrtu = $_POST['TEMPAT_LAHIR_AYAH'];
		$tanggalLahirOrtu = $_POST['TANGGAL_LAHIR_AYAH'];
		$agamaOrtu = $_POST['AGAMA_AYAH'];
		$pekerjaanOrtu = $_POST['PEKERJAAN_AYAH'];
		$alamatOrtu = $_POST['ALAMAT_AYAH'];
		$penghasilanOrtu = $_POST['PENGHASILAN_AYAH'];



		//insert to user
		$ins = $op->save(
			"tb_surat_penghasilan_orang_tua",
			"nik, nama_ayah,	tempat_lahir_ayah,	tanggal_lahir_ayah,	agama_ayah,	pekerjaan_ayah,	alamat_ayah,	penghasilan_ayah",
			"'" . $nik . "','" . $namaOrtu . "','" . $tempatLahirOrtu . "','" . $tanggalLahirOrtu . "','" . $agamaOrtu . "','" . $pekerjaanOrtu . "','" . $alamatOrtu . "','" . $penghasilanOrtu .  "'"
		);

		if ($ins) {
			$json .= '{"CHECK":"TRUE","MSG":"Surat keterangan penghasilan orang tua Berhasil di ajukan, Terima kasih."},';
		} else {
			$json .= '{"CHECK":"FALSE","MSG":"Surat keterangan penghasilan orang tua gagal di ajukan !"},';
		}
		//sampe sini
		// --------------------------END SURAT PENGHASILAN ORANG TUA---------------------------


	} else if ($param == "setLogin") {
		// tangkap parameter
		$nik = $_POST['NIK'];
		$password = $_POST['PASSWORD'];

		//insert to user
		$ins = $op->select(
			"tb_user",
			"*",
			" WHERE nik = '" . $nik . "' AND nama = '" . $password . "'"
		);

		if (mysqli_num_rows($ins) > 0) {

			$data = mysqli_fetch_array($ins);
			$json .= '{"CHECK":"TRUE","MSG":"Anda berhasil login, Terima kasih.",
				"NIK":"' . $data['nik'] . '","NAMA":"' . $data['nama'] . '"},';
		} else {
			$json .= '{"CHECK":"FALSE","MSG":"Login gagal, username dan password salah !"},';
		}
	}


	$json = substr($json, 0, strlen($json) - 1);
	$json .= ']}';

	echo $json;
}
