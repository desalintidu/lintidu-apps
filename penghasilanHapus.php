<?php
include('./config/config.php');

$id = $_GET["id_surat_penghasilan_orang_tua"];

if (hapusPenghasilan($id) > 0) {
  echo "
						<script>
							alert('data suskses di Hapus!');
							document.location.href='penghasilan.php';
						</script>
				";
} else {
  echo "
						<script>
							alert('data suskses di Hapus!');
							document.location.href='penghasilan.php';
						</script>
				";
}
