<?php
session_start();

include '../config.php';

if (!isset($_POST['submit'])) {
    header("Location: index.php");
    exit;
}

$email = $_POST['email'];
$password = $_POST['password'];


// cek apakah user sudah terdaftar
$login = mysqli_query($conn, "SELECT * FROM login WHERE email='$email'");
$cek = mysqli_num_rows($login);

if (!$cek) {
    // jika user belum terdaftar
    header("Location: index.php?pesan=User belum terdaftar");
    exit;
}

// ambil data user
$data = mysqli_fetch_assoc($login);


// cek apakah password benar
if ($data['pass'] !== $password) {
    // jika password salah
    header("Location: index.php?pesan=User/Password Salah");
    exit;
}

if ($data['role'] == "Admin") {
    $_SESSION['username'] = $data['name'];
    $_SESSION['role'] = "admin";
    header("location:../Admin_kartar/menu.php");
} else if ($data['role'] == "User") {
    $_SESSION['username'] = $data['name'];
    $_SESSION['role'] = "anggota";
    header("location:halaman_anggota.php");
} else if ($data['role'] == "Warga") {
    $_SESSION['role'] = "warga";
    $_SESSION['username'] = $data['name'];
    header("location:halaman_warga.php");
}

// simpan state ke dalam session
// switch ($data['role']) {
//     case 'Admin':
//         $_SESSION['username'] = $data['name'];
//         $_SESSION['role'] = "admin";
//         header("location:halaman_admin.php");
//         break;
//     case 'User':
//         $_SESSION['username'] = $data['name'];
//         $_SESSION['role'] = "anggota";
//         header("location:halaman_anggota.php");
//         break;
//     case 'Warga':
//         $_SESSION['role'] = "warga";
//         $_SESSION['username'] = $data['name'];
//         header("location:halaman_warga.php");
//         break;

//     default:
//         header("location:index.php?pesan=User belum memiliki role");
//         break;
// }
