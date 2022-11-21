<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>
    <?
    session_start();

    if ($_SESSION['role'] == "") {
        header("location:../Admin_kartar/menu.php?pesan=gagal");
    }

    ?>
    <h1>Halaman Admin</h1>
    <p>Halo
        <b><?php echo $_SESSION['username'] ?></b>
        Anda Login Sebagai
        <b>
            <?php echo $_SESSION['role']; ?>
        </b>
    </p>
    <a href="logout.php">LogOut</a>
</body>

</html>