
<?php
session_start();
include '../config/config.php';

$email = $_POST['email'];
$password = $_POST['password'];


$login = mysqli_query($conn, "select * from login where email='$email' and password='$password'");
$cek = mysqli_num_rows($login);
if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);

    if ($data['role'] == "Admin") {
        $_SESSION['email'] = $email;
        $_SESSION['role'] = "Admin";
        header("location:../../menu/menu.php");
    } else if ($data['role'] == "Anggota") {
        $_SESSION['email'] = $email;
        $_SESSION['role'] = "Anggota";
        header("location:halaman_anggota.php");
    } else if ($data['role'] == "Warga") {
        $_SESSION['email'] = $email;
        $_SESSION['role'] = "Warga";
        header("location:halaman_warga.php");
    } else {

        header("location:index.php?pesan=gagal");
    }
} else {
    header("location:index.php?pesan=gagal");
}
