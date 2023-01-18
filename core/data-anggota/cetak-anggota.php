<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


require '../../functions.php';
$anggota = query("SELECT * FROM anggota");
$jurusan = '';
if (isset($_POST["refresh"])) {
    $jurusan = $_POST["jurusan"];

    $anggota = query("SELECT * FROM anggota where jurusan=jurusan and anggota.jurusan = 'jurusan'");
}


$user_type = $_SESSION['user_type'] == 'Super Admin';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Anggota</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/print.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <section id="data-anggota" class="container">
        <div class="top-data">
            <h1><span class="hide-on-print">Cetak</span> Data Anggota</h1>
            <div class="pilihjurusan hide-on-print" style="width: 60%; float:right;">
                <form action="" method="post">
                    <div class="form-group row">
                        <label for="jurusan" class="col-2 col-form-label">Cari Jurusan</label>
                        <div class="col-4">
                        <input id="jurusan" name="jurusan" placeholder="Search" type="search" class="form-control">
                        </div>
                        <div class="buttons">
                            <button type="button" class="btn btn-danger" style="margin-right:10px;"><a
                                    href="data-anggota.php" style="color: #fff; text-decoration:none; ">
                                    Batal</a></button>
                            <button id="print" onclick="printTable()" class="btn btn-secondary"
                                style="margin-right: 10px;">Cetak</button>
                            <button id="show-all" class="btn btn-info" style="margin-right: 10px;">Semua</button>
                            <button name="refresh" type="submit" class="btn btn-success"
                                style="margin-right: 10px;">Refresh</button>
                        </div>
                </form>
            </div>
        </div>
        <div class="list-anggota" id="printIndentTable">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Jurusan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($anggota as $row) : ?>

                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row["nim"]; ?></td>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["jns_kelamin"]; ?></td>
                        <td><?= $row["alamat"]; ?></td>
                        <td><?= $row["jurusan"]; ?></td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    <script>
    function printTable() {
        window.print();
    }
    </script>
    <script src="https://kit.fontawesome.com/7009cf2d19.js " crossorigin="anonymous "></script>
</body>

</html>