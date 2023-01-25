<?php
session_start();
include '../config.php';

$email = $_POST['email'];
$password = $_POST['password'];

$login = mysqli_query($conn, "SELECT * FROM login WHERE email = '$email', and password = '$password'");
$cek = mysqli_num_rows($login);
if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);

    if ($data['role'] == "admin") {
        $_SESSION['email'] = $email;
        $_SESSION['role'] = "admin";
        header("location: ../Admin_kartar/index.php");
    } else if ($data['role'] == "anggota") {
        $_SESSION['email'] = $email;
        $_SESSION['role'] = "anggota";
        header("location:halaman_anggota.php");
    } else if ($data['role'] == "warga") {
        $_SESSION['email'] = $email;
        $_SESSION['role'] = "warga";
        header("location:halaman_warga.php");
    } else {

        // alihkan ke halaman login kembali
        header("location:signin.php?pesan=gagal");
    }
} else {
    header("location:signin.php?pesan=gagal");
}
