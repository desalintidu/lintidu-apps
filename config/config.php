<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_kependudukan");
if (mysqli_connect_error()) {
  echo "Koneksi Ke database gagal" . mysqli_connect_error();
}

// ----------------------FUNCTIO TAMPIL DATA BERITA-------------------------------
function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
// ----------------------END FUNCTIO TAMPIL DATA BERITA--------------------------

// ----------------------FUNCTIO TAMBAH BERITA-----------------------------------
function tambahBerita($data)
{
  global $conn;
  $judul       = htmlspecialchars($data["judul"]);
  $isi         = htmlspecialchars($data["isi"]);

  // uplod gambar dulu
  $gambar  = upload();
  if (!$gambar) {
    // jika gambar gagal di upload fungsi di berentikan
    return false;
  }

  $tanggal     = htmlspecialchars($data["tanggal"]);

  $query = "INSERT INTO tb_berita
                VALUES
            ('','$judul', '$isi', '$gambar', '$tanggal')
            ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}
// ----------------------END FUNCTIO TAMBAH BERITA-------------------------------

// ----------------------FUNCTIO UPLOAD GAMBAR DATA-----------------------------
function upload()
{
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  // cek apakah tida ada gambar yang di upload
  if ($error === 4) {
    echo "
            <script>
                alert('Pilih gambar terlebih dahulu');
            </script>
        ";
    return false;
  }
  // cek apakah yang di upload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "
            <script>
                alert('Yang anda upload bukan gambar !');
            </script>
        ";
    return false;
  }

  // cek jika ukuran terlalu besar
  if ($ukuranFile > 5000000) {
    echo "
            <script>
                alert('Ukuran gambar yang di upload terlalu besar !');
            </script>
        ";
    return false;
  }
  // lolos pengecekan, gambar siap diupload
  // generet nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;
  move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
  return $namaFileBaru;
}
// ----------------------END FUNCTIO UPLOAD GAMBAR DATA-------------------------

// -------------------------FUNCTIO UBAH BERITA------------------------------------
function ubahBerita($data)
{
  global $conn;
  $id          = $data['id'];
  $judul       = htmlspecialchars($data["judul"]);
  $isi         = htmlspecialchars($data["isi"]);
  $gambarLama      = htmlspecialchars($data["gambarLama"]);

  // cek apaka user pilih gambar baru atau tidak
  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    $gambar      = upload();
  }
  $tanggal     = htmlspecialchars($data["tanggal"]);

  $query = "UPDATE tb_berita SET
                judul_berita    = '$judul',
                isi_berita      = '$isi',
                img_berita      = '$gambar',
                tanggal_berita  = '$tanggal'
                    WHERE id_berita = $id
            ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}
// -------------------------END FUNCTIO UBAH BERITA--------------------------------

// ----------------------------FUNCTIO HAPUS BERITA-------------------------------
function hapusBerita($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM tb_berita WHERE id_berita = $id");
  return mysqli_affected_rows($conn);
}
// -------------------------End FUNCTIO HAPUS BERITA-------------------------------

// ---------------------------FUNCTION EDIT PENGGUNA----------------------------
function editPengguna($data)
{
  global $conn;
  $nik       = htmlspecialchars($data["nik"]);
  $kk       = htmlspecialchars($data["kk"]);
  $nama       = htmlspecialchars($data["nama"]);
  $tempatLahir       = htmlspecialchars($data["tempatLahir"]);
  $ttl       = htmlspecialchars($data["ttl"]);
  $jenisKelamin       = htmlspecialchars($data["jenisKelamin"]);
  $agama       = htmlspecialchars($data["agama"]);
  $umur       = htmlspecialchars($data["umur"]);
  $pekerjaan       = htmlspecialchars($data["pekerjaan"]);
  $alamat       = htmlspecialchars($data["alamat"]);
  $nomorHp       = htmlspecialchars($data["nomorHP"]);
  $email       = htmlspecialchars($data["email"]);


  $query = "UPDATE tb_user SET
                nik           = '$nik',
                kk            = '$kk',
                nama          = '$nama',
                tempat_lahir  = '$tempatLahir',
                tanggal_lahir = '$ttl',
                jenis_kelamin = '$jenisKelamin',
                agama         = '$agama',
                umur          = '$umur',
                pekerjaan     = '$pekerjaan',
                alamat        = '$alamat',
                nomor_hp      = '$nomorHp',
                email         = '$email'
                    WHERE nik = $nik
            ";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
// -------------------------END FUNCTION EDIT PENGGUNA--------------------------

// ---------------------------FERIFIKASI DATA PENGGUNA----------------------------------
function verifikasiPengguna($data)
{
  global $conn;
  $nik          = htmlspecialchars($data["nik"]);
  $query = "UPDATE tb_user SET
                nik           = '$nik',
                status_user      = '1'
                    WHERE nik = $nik
            ";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
// -------------------------END FERIFIKASI DATA PENGGUNA--------------------------------

// ----------------------------FUNCTIO HAPUS DATA PENGGUNA-------------------------------
function hapusPengguna($nik)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM tb_user WHERE nik = $nik");
  return mysqli_affected_rows($conn);
}
// -------------------------END FUNCTIO HAPUS DATA PENGGUNA-------------------------------



// --------------------------FUNCTION VERIFIKASI SURAT DOMISILI--------------------
function validasiDomisili($data)
{
  global $conn;
  $id               = $data['id'];
  $nomorSurat       = htmlspecialchars($data["nomorSurat"]);
  $tanggalSurat     = htmlspecialchars($data["tanggalSurat"]);

  $query = "UPDATE tb_surat_domisili SET
                nomor_surat_domisili      = '$nomorSurat',
                tanggal_surat_domisili    = '$tanggalSurat',
                status                    = '1'
                    WHERE id_surat_domisili  = $id
            ";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
// -----------------------END FUNCTION VERIFIKASI SURAT DOMISILI-------------------

// --------------------------FUNCTION VERIFIKASI SURAT KEHILANGAN--------------------
function validasiKehilangan($data)
{
  global $conn;
  $id               = $data['id'];
  $nomorSurat       = htmlspecialchars($data["nomorSurat"]);
  $tanggalSurat     = htmlspecialchars($data["tanggalSurat"]);

  $query = "UPDATE tb_surat_kehilangan SET
                nomor_surat_kehilangan      = '$nomorSurat',
                tanggal_surat_kehilangan    = '$tanggalSurat',
                status                    = '1'
                    WHERE id_surat_kehilangan = $id
            ";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
// -----------------------END FUNCTION VERIFIKASI SURAT KEHILANGAN-------------------


// --------------------------FUNCTION VERIFIKASI SURAT USAHA--------------------
function validasiUsaha($data)
{
  global $conn;
  $id               = $data['id'];
  $nomorSurat       = htmlspecialchars($data["nomorSurat"]);
  $tanggalSurat     = htmlspecialchars($data["tanggalSurat"]);

  $query = "UPDATE  tb_surat_usaha SET
                nomor_surat_usaha      = '$nomorSurat',
                tanggal_surat_usaha    = '$tanggalSurat',
                status                    = '1'
                    WHERE id_surat_usaha  = $id
            ";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
// -----------------------END FUNCTION VERIFIKASI SURAT USAHA-------------------

// --------------------------FUNCTION VERIFIKASI SURAT EKONOMI LEMAH--------------------
function validasiEkonomi($data)
{
  global $conn;
  $id               = $data['id'];
  $nomorSurat       = htmlspecialchars($data["nomorSurat"]);
  $tanggalSurat     = htmlspecialchars($data["tanggalSurat"]);

  $query = "UPDATE   tb_surat_ekonomi_lemah SET
                nomor_surat_ekonomi_lemah      = '$nomorSurat',
                tanggal_surat_ekonomi_lemah    = '$tanggalSurat',
                status                    = '1'
                    WHERE id_surat_ekonomi_lemah   = $id
            ";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
// -----------------------END FUNCTION VERIFIKASI SURAT EKONOMI LEMAH-------------------

// --------------------------FUNCTION VERIFIKASI SURAT KEPEMILIKAN TANAH--------------------
function validasiTanah($data)
{
  global $conn;
  $id               = $data['id'];
  $nomorSurat       = htmlspecialchars($data["nomorSurat"]);
  $tanggalSurat     = htmlspecialchars($data["tanggalSurat"]);

  $query = "UPDATE   tb_surat_kepemilikan_tanah SET
                nomor_surat_kepemilikan_tanah      = '$nomorSurat',
                tanggal_surat_kepemilikan_tanah    = '$tanggalSurat',
                status                    = '1'
                    WHERE id_surat_kepemilikan_tanah   = $id
            ";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
// -----------------------END FUNCTION VERIFIKASI SURAT KEPEMILIKAN TANAH-------------------

// --------------------------FUNCTION VERIFIKASI SURAT KEPEMILIKAN PENGHASILAN--------------------
function validasiPenghasilan($data)
{
  global $conn;
  $id               = $data['id'];
  $nomorSurat       = htmlspecialchars($data["nomorSurat"]);
  $tanggalSurat     = htmlspecialchars($data["tanggalSurat"]);

  $query = "UPDATE   tb_surat_penghasilan_orang_tua SET
                nomor_surat_penghasilan_orang_tua      = '$nomorSurat',
                tanggal_surat_penghasilan_orang_tua    = '$tanggalSurat',
                status                    = '1'
                    WHERE id_surat_penghasilan_orang_tua   = $id
            ";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
// -----------------------END FUNCTION VERIFIKASI SURAT KEPEMILIKAN PENGHASILAN-------------------

// -------------------------------------------DAFTAR----------------------------------------
function daftar($data)
{
  global $conn;

  $nama = $data["nama"];
  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);

  // cek username
  $result = mysqli_query($conn, "SELECT username FROM tb_admin WHERE username = '$username'");
  if (mysqli_fetch_assoc($result)) {
    echo "<script>
            alert('Username suda terdaftar !');
          </script>";
    return false;
  }

  if ($password !== $password2) {
    echo "<script>
            alert('Konfirmasi password tidak sesuai !');
          </script>";
    return false;
  }

  // enskripsi password

  mysqli_query($conn, "INSERT INTO tb_admin VALUES ('', '$nama', '$username', '$password')");
  return mysqli_affected_rows($conn);
}

// ----------------------HAPUS DOMISILI------------------------
function hapusDomisili($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM tb_surat_domisili WHERE id_surat_domisili = $id");
  return mysqli_affected_rows($conn);
}
// ----------------------END HAPUS DOMISILI---------------------

// ----------------------------HAPUS KEHILANGAN-------------------------
function hapusKehilangan($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM tb_surat_kehilangan WHERE id_surat_kehilangan = $id");
  return mysqli_affected_rows($conn);
}
// ------------------------END HAPUS KEHILANGAN-------------------------

// ----------------------------HAPUS USAHA-------------------------
function hapusUsaha($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM tb_surat_usaha WHERE id_surat_usaha = $id");
  return mysqli_affected_rows($conn);
}
// ------------------------END HAPUS USAHA-------------------------

// ----------------------------HAPUS EKONOMI-------------------------
function hapusEkonomi($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM tb_surat_ekonomi_lemah WHERE id_surat_ekonomi_lemah = $id");
  return mysqli_affected_rows($conn);
}
// ------------------------END HAPUS EKONOMI-------------------------

// ----------------------------HAPUS TANAH-------------------------
function hapusTanah($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM tb_surat_kepemilikan_tanah WHERE id_surat_kepemilikan_tanah = $id");
  return mysqli_affected_rows($conn);
}
// ------------------------END HAPUS TANAH-------------------------

// ----------------------------HAPUS PENGHASILAN-------------------------
function hapusPenghasilan($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM tb_surat_penghasilan_orang_tua WHERE id_surat_penghasilan_orang_tua = $id");
  return mysqli_affected_rows($conn);
}
// ------------------------END HAPUS PENGHASILAN-------------------------
