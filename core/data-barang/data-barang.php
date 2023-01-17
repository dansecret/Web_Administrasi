<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require '../../functions.php';
$guru = query("SELECT * FROM guru, golongan where golongan.kd_golongan=guru.kd_golongan");

$user_type = $_SESSION['user_type'] == 'Super Admin';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
            <?php if($user_type){
            ?>
            <li id="list-admin"><a href="data-admin.php">List Admin</a></li>
            <?php } ?>
        </ul>
        </nav>
        <a href="logout.php"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></a>
    </header>
    <section id="data-guru" class="container">
        <div class="top-data">
            <h1>Data Barang</h1>
                        <!-- Navbar Search-->
            <!-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form> -->
            <button type="button" class="btn btn-primary"><a href="tambah-barang.php" style="color: #fff; text-decoration:none;"> + Tambah Data</a></button>
            <button type="button" class="btn btn-secondary" style="margin-right:20px;"><a href="cetak-barang.php" style="color: #fff; text-decoration:none; "> Cetak Data</a></button>

        </div>
        <div class="list-guru">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">ID Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Deskripsi</th>   
                        <th scope="col">Stock</th>
                        <?php if($user_type){
                        ?>  
                        <th scope="col">Aksi</th> 
                        <?php } ?>                                 
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach( $guru as $row ) : ?>

                    <tr>
                        <td scope="row"><?= $i; ?></td>
                        <td scope="row"><?= $row["nip"]; ?></td>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["jns_kelamin"]; ?></td>
                        <td><?= $row["tgl_lahir"]; ?></td>
                        <?php if($user_type){
                        ?>
                        <td class="button-action">
                        <a href="ubah-barang.php?nip=<?= $row["nip"]; ?>" ><button type="button" class="btn btn-warning">Edit</button></a>
                        <a href="hapus-barang.php?nip=<?= $row["nip"]; ?>" ><button type="button" class="btn btn-danger">Delete</button></a>
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