<?php
include('./config/config.php');

$id = $_GET["id_surat_domisili"];

if (hapusDomisili($id) > 0) {
  echo "
						<script>
							alert('data suskses di Hapus!');
							document.location.href='domisili.php';
						</script>
				";
} else {
  echo "
						<script>
							alert('data suskses di Hapus!');
							document.location.href='domisili.php';
						</script>
				";
}
