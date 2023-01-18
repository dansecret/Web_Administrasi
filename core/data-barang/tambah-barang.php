<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}
require '../../functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( tambahBarang($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'data-barang.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'data-barang.php';
			</script>
		";
	}


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Barang</title>
    <link rel="stylesheet" href="assets/css/form.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header class="container">
        <h3>Tambah Data Barang</h3>
    </header>
    <section id="tambah-data-barang" class="container">

    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group row">
        <label for="nama_barang" class="col-4 col-form-label">Nama Barang</label> 
        <div class="col-8">
        <input id="nama_barang" name="nama_barang" placeholder="Masukan Nama Barang" type="text" class="form-control" required="required">
        </div>
    </div>
    <div class="form-group row">
        <label for="deskripsi" class="col-4 col-form-label">Deskripsi</label> 
        <div class="col-8">
        <input id="deskripsi" name="deskripsi" placeholder="Masukan Deskripsi" type="text" class="form-control" required="required">
        </div>
    </div>
    <div class="form-group row">
        <label for="stock" class="col-4 col-form-label">Stock</label> 
        <div class="col-8">
        <input id="stock" name="stock" placeholder="Masukan Jumlah Stock" type="number" class="form-control" required="required">
        </div>
    </div> 
    <div class="form-group row">
        <div class="offset-4 col-8">
        <button name="submit" type="submit" class="btn btn-success">Submit</button>
        <button name="submit" type="submit" class="btn btn-danger"><a href="data-barang.php" style="color: #fff; text-decoration:none; ">Cancel</a></button>
        </div>
    </div>
    </form>
    </section>
    <script src="https://kit.fontawesome.com/7009cf2d19.js " crossorigin="anonymous "></script>
</body>
</html>