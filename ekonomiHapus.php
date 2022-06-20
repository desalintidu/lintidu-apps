<?php
include('./config/config.php');

$id = $_GET["id_surat_ekonomi_lemah"];

if (hapusEkonomi($id) > 0) {
  echo "
						<script>
							alert('data suskses di Hapus!');
							document.location.href='ekonomi.php';
						</script>
				";
} else {
  echo "
						<script>
							alert('data suskses di Hapus!');
							document.location.href='ekonomi.php';
						</script>
				";
}
