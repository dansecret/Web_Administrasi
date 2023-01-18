<?php 
require '../../functions.php';

$nim = $_GET["nim"];

if( hapusAnggota($nim) > 0 ) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'data-anggota.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal dihapus!');
			document.location.href = 'data-anggota.php';
		</script>
	";
}
?>