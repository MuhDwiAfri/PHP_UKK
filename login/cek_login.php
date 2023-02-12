<?php
session_start();

include '../config.php';

$username = $_POST['username'];
$password = $_POST['password'];

// cari user
$user = mysqli_query($conn, "SELECT * FROM login WHERE username='$username'");

if (mysqli_num_rows($user)) {
    $row = mysqli_fetch_assoc($user);
    if (password_verify($password, $row['password'])) {
        if ($row['role'] == "admin") {
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = "admin";
            header("location:../admin/menu/menu.php");
        } else if ($row['role'] == "anggota") {
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = "anggota";
            header("location:../anggota/menu/menu.php");
        } else if ($row['role'] == "warga") {
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = "warga";
            header("location:../warga/menu/menu.php");
        } else {
            header("location:index.php?pesan=gagal");
        }
    } else {
        header("location:index.php?pesan=password tidak sesuai");
    }
} else {
    header("location:index.php?pesan=username tidak ditemukan");
}
?>
<div class="href" href="../warga/menu/menu.php"></div>