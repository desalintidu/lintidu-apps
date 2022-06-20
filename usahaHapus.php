<?php
include('./config/config.php');

$id = $_GET["id_surat_usaha"];

if (hapusUsaha($id) > 0) {
  echo "
						<script>
							alert('data suskses di Hapus!');
							document.location.href='usaha.php';
						</script>
				";
} else {
  echo "
						<script>
							alert('data suskses di Hapus!');
							document.location.href='usaha.php';
						</script>
				";
}
