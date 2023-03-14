<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "ukk";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $statement = $pdo->prepare("SELECT * FROM login WHERE email=:email");
    $statement->execute(['email' => $email]);
    $user = $statement->fetch();

    if ($user) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $statement = $pdo->prepare("UPDATE login SET password=:password WHERE email=:email");
        $statement->execute(['password' => $hashed_password, 'email' => $email]);

        echo "<script>alert('Password berhasil diubah.')</script>";
    } else {
        echo "<script>alert('Email tidak ditemukan ')</script>";
    }
}
