<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}
include('./config/config.php');
$id = $_GET["id_berita"];

if (hapusBerita($id) > 0) {
	echo "
						<script>
							alert('Berita berhasil di Hapus!');
							document.location.href='berita.php';
						</script>
				";
} else {
	echo "
						<script>
							alert('Berita gagal di Hapus!');
							document.location.href='berita.php';
						</script>
				";
}
