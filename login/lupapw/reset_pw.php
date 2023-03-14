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
        header("Location: ../index.php");
    } else {
        echo "<script>alert('Email tidak ditemukan ')</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="../gambar/Rt.png">
    <title>Kartar Page | Lupa Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="css.css">
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
        <form class="border shadow p-3 rounded" action="" method="post" style="width: 450px;">

            <h1 class="text_login">Reset Password</h1>

            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" required><br>

            <label for="password">Password Baru:</label>
            <input type="password" name="password" class="form-control" required><br>

            <input type="submit" name="submit" class="tombol_login" value="Reset Password">
        </form>
    </div>

</body>

</html>