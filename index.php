<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

$user_type = $_SESSION['user_type'] == 'Super Admin';
// $namaadmin = $_SESSION['username']
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Utama</title>
    <link rel="stylesheet" href="assets/css/mains.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body style="background-color: #23346c;">
    <header>
        <div class="welcome">
            <h1>Administrasi Sekolah</h1>
            <p>Selamat datang,
                <?php 
                echo $_SESSION['username'];
                ?>
            </p>
        </div>
        <nav>
        <ul>
            <li><a class="active" href="">Menu Utama</a></li>
            <?php if($user_type){
            ?>
            <li id="list-admin"><a href="data-admin.php">List Admin</a></li>
            <?php } ?>
        </ul>
        </nav>
        <a href="logout.php"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></a>
    </header>
    <section id="main-menu">
        <div class="menu" style="margin-top: 100px;">
            <div class="data-siswa">
                <a href="data-siswa.php">
                    <img src="assets/img/graduates.png" alt="">
                    <p>Data Siswa</p>
                </a>
            </div>
            <div class="data-guru">
                <a href="data-guru.php">
                    <img src="assets/img/teacher.png" alt="">
                    <p>Data Guru</p>
                </a>
            </div>
            <div class="data-spp">
                <a href="data-spp.php">
                    <img src="assets/img/receipt.png" alt="">
                    <p>Pembayaran SPP</p>
                </a>
            </div>
            <!-- <div class="data-gaji">
                <a href="">
                    <img src="assets/img/calendar.png" alt="">
                    <p>Penyaluran Gaji</p>
                </a>
            </div> -->
            <div class="jadwal-pelajaran">
                <a href="data-jadwal.php">
                    <img src="assets/img/schedule.png" alt="">
                    <p>Jadwal Pelajaran</p>
                </a>
            </div>
            <div class="robot1">
                <a href="#">
                    <img src="assets/img/robot-active.png" alt="">
                    <p>Robot 1 - Ahmad</p>
                </a>
            </div>
            <div class="robot2">
                <a href="#">
                    <img src="assets/img/robot-active.png" alt="">
                    <p>Robot 2 - Dahlan</p>
                </a>
            </div>
            <div class="robot3">
                <a href="#">
                    <img src="assets/img/robot-active.png" alt="">
                    <p>Robot 3 - Darwis</p>
                </a>
            </div>
            <div class="robot4">
                <a href="#">
                    <img src="assets/img/robot-active.png" alt="">
                    <p>Robot 4 <br> Botis</p>
                </a>
            </div>
            <div class="robot5">
                <a href="#">
                    <img src="assets/img/robot-active.png" alt="">
                    <p>Robot 5  Dummy</p>
                </a>
            </div>
            <div class="robot6">
                <a href="#">
                    <img src="assets/img/robot-active.png" alt="">
                    <p>Robot 6 - Fabio</p>
                </a>
            </div>
        </div>

    </section>

    <script src="https://kit.fontawesome.com/7009cf2d19.js " crossorigin="anonymous "></script>

</body>

</html>