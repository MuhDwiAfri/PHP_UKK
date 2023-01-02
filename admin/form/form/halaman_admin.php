<!DOCTYPE html>
<html>

<head>
    <title>Halaman admin - www.malasngoding.com</title>
</head>

<body>
    <?php
    session_start();

    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['role'] == "") {
        header("location:index.php?pesan=gagal");
    }

    ?>
    <h1>Halaman Admin</h1>

    <p>Halo <b><?php echo $_SESSION['email']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['role']; ?></b>.</p>
    <a href="logout.php">LOGOUT</a>

    <br />
    <br />

    <a><a href="https://www.malasngoding.com/membuat-login-multi-user-Role-dengan-php-dan-mysqli">Membuat Login Multi Role Dengan PHP</a> - www.malasngoding.com</a>
</body>

</html>