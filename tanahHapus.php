<?php
include('./config/config.php');

$id = $_GET["id_surat_kepemilikan_tanah"];

if (hapusTanah($id) > 0) {
  echo "
						<script>
							alert('data suskses di Hapus!');
							document.location.href='tanah.php';
						</script>
				";
} else {
  echo "
						<script>
							alert('data suskses di Hapus!');
							document.location.href='tanah.php';
						</script>
				";
}
