<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require '../../functions.php';
$barang = query("SELECT * FROM barang ");
if(isset($_POST["refresh"])){
    $kd_golongan = $_POST["kd_golongan"];

    $barang = query("SELECT * FROM guru, golongan where golongan.kd_golongan=guru.kd_golongan and guru.kd_golongan = '$kd_golongan'");
}
$user_type = $_SESSION['user_type'] == 'Super Admin';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Barang</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/print.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <section id="data-guru" class="container">
        <div class="top-data">
            <h1><span class="hide-on-print">Cetak</span> Data Barang</h1>
            <div class="pilihkelas hide-on-print" style="width: 60%; float:right;">
                <form action="" method="post">
                    <div class="form-group row">
                    <label for="kd_golongan" class="col-4 col-form-label">Pilih Kode Golongan</label> 
                        <div class="col-2">
                        <select id="kd_golongan" name="kd_golongan" class="custom-select">
                            <option value="1111" <?=$kd_golongan == '1111' ? ' selected="selected"' : '';?>>1111</option>
                            <option value="2222" <?=$kd_golongan == '2222' ? ' selected="selected"' : '';?>>2222</option>
                            <option value="3333" <?=$kd_golongan == '3333' ? ' selected="selected"' : '';?>>3333</option>
                            <option value="4444" <?=$kd_golongan == '4444' ? ' selected="selected"' : '';?>>4444</option>
                        </select>                        
                    </div>
                    <div class="buttons">
                        <button type="button" class="btn btn-danger" style="margin-right:10px;"><a href="data-barang.php" style="color: #fff; text-decoration:none; "> Batal</a></button>
                        <button id="print" onclick="printTable()" class="btn btn-secondary" style="margin-right: 10px;" >Cetak</button>
                        <button id="show-all" class="btn btn-info" style="margin-right: 10px;" >Semua</button>
                        <button name="refresh" type="submit" class="btn btn-success" style="margin-right: 10px;" >Refresh</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="list-guru" id="printIndentTable">
            <table class="table table-bordered table-sm" >
            <thead class="thead-light">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Deskripsi</th>             
                        <th scope="col">Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach( $barang as $row ) : ?>

                    <tr>
                        <td scope="row"><?= $i; ?></td>
                        <td scope="row"><?= $row["id_barang"]; ?></td>
                        <td><?= $row["nama_barang"]; ?></td>
                        <td><?= $row["deskripsi"]; ?></td>
                        <td><?= $row["stock"]; ?></td>
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
    <script src="extensions/print/bootstrap-table-print.js"></script>
    <script src="https://kit.fontawesome.com/7009cf2d19.js " crossorigin="anonymous "></script>
</body>

</html>