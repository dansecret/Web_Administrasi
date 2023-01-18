<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require '../../functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    // cek apakah data berhasil di tambahkan atau tidak
    if (tambahAnggota($_POST) > 0) {
        echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'data-anggota.php';
			</script>
		";
    } else {
        echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'data-anggota.php';
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
    <title>Tambah Data Anggota</title>
    <link rel="stylesheet" href="../../assets/css/form.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header class="container">
        <h3>Tambah Data Anggota</h3>
    </header>
    <section id="tambah-data-Anggota" class="container">

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="nim" class="col-4 col-form-label">NIM</label>
                <div class="col-8">
                    <input id="nim" name="nim" placeholder="Masukan Nim Anggota" type="text" class="form-control"
                        required="required">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama</label>
                <div class="col-8">
                    <input id="nama" name="nama" placeholder="Masukan Nama Anggota" type="text" class="form-control"
                        required="required">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Jenis Kelamin</label>
                <div class="col-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="jns_kelamin" id="jns_kelamin_0" type="radio" class="custom-control-input"
                            value="Laki-laki" required="required">
                        <label for="jns_kelamin_0" class="custom-control-label">Laki-laki</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="jns_kelamin" id="jns_kelamin_1" type="radio" class="custom-control-input"
                            value="Perempuan" required="required">
                        <label for="jns_kelamin_1" class="custom-control-label">Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-4 col-form-label">Alamat</label>
                <div class="col-8">
                    <textarea id="alamat" name="alamat" cols="40" rows="3" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="kd_kelas" class="col-4 col-form-label">Program Studi</label>
                <div class="col-8">
                    <input id="jurusan" name="jurusan" placeholder="Masukan Jurusan Anggota" type="text" class="form-control"
                        required="required">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-success">Submit</button>
                    <button name="submit" type="submit" class="btn btn-danger"><a href="data-anggota.php"
                            style="color: #fff; text-decoration:none; ">Cancel</a></button>
                </div>
            </div>
        </form>
    </section>
    <script src="https://kit.fontawesome.com/7009cf2d19.js " crossorigin="anonymous "></script>
</body>

</html>