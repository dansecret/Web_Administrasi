<?php 
require '../../functions.php';

$id_barang = $_GET["id_barang"];

if( hapusBarang($id_barang) > 0 ) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'data-barang.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal dihapus!');
			document.location.href = 'data-barang.php';
		</script>
	";
}
?>