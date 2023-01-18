<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require '../../functions.php';
$anggota = query("SELECT * FROM anggota");

$user_type = $_SESSION['user_type'] == 'Super Admin';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="welcome">
            <h1>Administrasi R-SCUAD</h1>
            <p>Selamat datang,
                <?php
                echo $_SESSION['username'];
                ?>
            </p>
        </div>
        <nav>
            <ul>
                <li><a href="../../index.php">Menu Utama</a></li>
                <?php if ($user_type) {
                ?>
                <li id="list-admin"><a href="data-admin.php">List Admin</a></li>
                <?php } ?>
            </ul>
        </nav>
        <a href="../../logout.php"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></a>
    </header>
    <section id="data-anggota" class="container">
        <div class="top-data">
            <h1>Data Anggota</h1>
            <button type="button" class="btn btn-primary"><a href="tambah-anggota.php"
                    style="color: #fff; text-decoration:none; "> + Tambah Data</a></button>
            <button type="button" class="btn btn-secondary" style="margin-right:20px;"><a href="cetak-anggota.php"
                    style="color: #fff; text-decoration:none; "> Cetak Data</a></button>
        </div>
        <div class="list-anggota">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Program Studi</th>
                        <?php if($user_type){
                        ?>
                            <th scope="col">Aksi</th> 
                        <?php } ?>  
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($anggota as $row) : ?>

                    <tr>
                        <td scope="row"><?= $i; ?></td>
                        <td scope="row"><?= $row["nim"]; ?></td>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["jns_kelamin"]; ?></td>
                        <td><?= $row["alamat"]; ?></td>
                        <td><?= $row["jurusan"]; ?></td>
                        <?php if($user_type){
                        ?>
                        <td class="button-action">
                            <a href="ubah-anggota.php?nim=<?= $row["nim"]; ?>"><button type="button"
                                    class="btn btn-warning">Edit</button></a>
                            <a href="hapus-anggota.php?nim=<?= $row["nim"]; ?>"><button type="button"
                                    class="btn btn-danger">Delete</button></a>
                        </td>
                        <?php } ?>  
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
    <script src="https://kit.fontawesome.com/7009cf2d19.js " crossorigin="anonymous "></script>
</body>

</html>