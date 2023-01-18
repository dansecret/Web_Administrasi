<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require '../../functions.php';

// ambil data di URL
$nim = $_GET["nim"];

// query data mahasiswa berdasarkan id
$anggota = query("SELECT * FROM anggota WHERE nim = $nim")[0];


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    // cek apakah data berhasil diubah atau tidak
    if (ubahAnggota($_POST) > 0) {
        echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'data-anggota.php';
			</script>
		";
    } else {
        echo "
			<script>
				alert('data gagal diubah!');
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
    <title>Ubah Data Anggota</title>
    <link rel="stylesheet" href="assets/css/form.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header class="container">
        <h3>Ubah Data Anggota</h3>
    </header>
    <section id="edit-data-anggota" class="container">

        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="nim" class="col-4 col-form-label">NIM</label>
                <div class="col-8">
                    <input id="nim" name="nim" placeholder="Masukan Nim Anggota" type="text" class="form-control"
                        required="required" value="<?= $anggota["nim"]; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama</label>
                <div class="col-8">
                    <input id="nama" name="nama" placeholder="Masukan Nama Anggota" type="text" class="form-control"
                        required="required" value="<?= $anggota["nama"]; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4">Jenis Kelamin</label>
                <div class="col-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="jns_kelamin" id="jns_kelamin_0" type="radio" class="custom-control-input"
                            value="Laki-laki" required="required"
                            <?php echo ($anggota['jns_kelamin'] == 'Laki-laki') ? 'checked' : '' ?>>
                        <label for="jns_kelamin_0" class="custom-control-label">Laki-laki</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="jns_kelamin" id="jns_kelamin_1" type="radio" class="custom-control-input"
                            value="Perempuan" required="required"
                            <?php echo ($anggota['jns_kelamin'] == 'Perempuan') ? 'checked' : '' ?>>
                        <label for="jns_kelamin_1" class="custom-control-label">Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-4 col-form-label">Alamat</label>
                <div class="col-8">
                    <textarea id="alamat" name="alamat" cols="40" rows="3"
                        class="form-control"><?php echo $anggota["alamat"]; ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="jurusan" class="col-4 col-form-label">Program Studi</label>
                <div class="col-8">
                    <input id="jurusan" name="jurusan" placeholder="Masukan Jurusan Anggota" type="text" class="form-control"
                        required="required" value="<?= $anggota["jurusan"]; ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-success">Submit</button>
                    <a class="btn btn-danger" href="data-anggota.php"
                        style="color: #fff; text-decoration:none; ">Cancel</a>
                </div>
            </div>
        </form>
    </section>
    <script src="https://kit.fontawesome.com/7009cf2d19.js " crossorigin="anonymous "></script>
</body>

</html>