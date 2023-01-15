<?php
session_start();
include "../koneksi.php";
$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

if ($_POST["captcha_code"] == $_SESSION["captcha_code"]) {
    $login = mysqli_query($con, $sql);
    $ketemu = mysqli_num_rows($login);
    $r = mysqli_fetch_array($login);

    if ($ketemu > 0) {
        $_SESSION['username'] = $r['username'];
        $_SESSION['level'] = $r['level'];

        echo "USER BERHASIL LOGIN<br>";
        echo "Username =", $_SESSION['username'], "<br>";
        echo "Level =", $_SESSION['level'], "<br><br>";

        echo "<a href=logout.php><b>LOGOUT</b></a></center>";
    } else {
        echo "<center>Login gagal! username & password tidak benar<br>";
        echo "<a href=../form_login.php><b>ULANGI LAGI</b></a></center>";
    }
} else {
    echo "<center>Login gagal! Captcha tidak sesuai<br>";
    echo "<a href=../form_login.php><b>ULANGI LAGI</b></a></center>";
}

mysqli_close($conn);
