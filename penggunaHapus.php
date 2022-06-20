<?php
include('./config/config.php');

$nik = $_GET["nik"];

if (hapusPengguna($nik) > 0) {
	echo "
						<script>
							alert('Pengguna berhasil di Hapus!');
							document.location.href='pengguna.php';
						</script>
				";
} else {
	echo "
						<script>
							alert('Pengguna gagal di Hapus!');
							document.location.href='pengguna.php';
						</script>
				";
}
