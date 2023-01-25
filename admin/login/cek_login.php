<?php
session_start();

include '../config.php';

$username = $_POST['username'];
$password = $_POST['password'];

// cari user
$user = mysqli_query($conn, "SELECT * FROM login WHERE username='$username'");

if (mysqli_num_rows($user)) {
    // cek password
    $row = mysqli_fetch_assoc($user);
    if (password_verify($password, $row['password'])) {
        if ($row['role'] == "admin") {
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = "admin";
            header("location:halaman_admin.php");
        } else if ($row['role'] == "anggota") {
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = "anggota";
            header("location:halaman_anggota.php");
        } else if ($row['role'] == "warga") {
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = "warga";
            header("location:halaman_warga.php");
        } else {
            header("location:index.php?pesan=gagal");
        }
    } else {
        header("location:index.php?pesan=password tidak sesuai");
    }
} else {
    header("location:index.php?pesan=username tidak ditemukan");
}
