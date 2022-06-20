<?php
include('./config/config.php');

$id = $_GET["id_surat_kehilangan"];

if (hapusKehilangan($id) > 0) {
  echo "
						<script>
							alert('data suskses di Hapus!');
							document.location.href='kehilangan.php';
						</script>
				";
} else {
  echo "
						<script>
							alert('data suskses di Hapus!');
							document.location.href='kehilangan.php';
						</script>
				";
}
