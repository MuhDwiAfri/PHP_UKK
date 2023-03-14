<?php
include "../config.php";

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM login where id=$id");
$data = mysqli_fetch_assoc($result);

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <link rel="icon" href="../gambar/Rt.png">
    <title>Kartar Page</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">


    <!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="./assets/hias/dashboard.css" rel="stylesheet">
</head>

<body>

    <?php include '../sidebar.php' ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 px-3">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Data : <?= $data['name'] ?></h1>
            <div class="btn-toolbar mb-2 mb-md-0">

            </div>
        </div>
        <div class="container">
        </div>
        <form action="" method="post" enctype="multipart/form-data " action="proses_edit.php?id=$_GET['id']">
            <h6>
                <label for="nama"><b>Nama</b></label>
                <input type="text" id="name" name="name" value="<?php echo $data["name"]; ?>" class="form-control">
                <br>
                <label for="username"><b>Username</b></label>
                <input type="text" id="username" name="username" value="<?php echo $data["username"]; ?>" class="form-control">
                <br>
                <label for="email"><b>E-mail</b></label>
                <input type="email" id="email" name="email" value="<?php echo $data["email"]; ?>" class="form-control">
                <br>
                <!-- <label for="password"><b>Password</b></label>
                <input type="text" id="password" name="password" class="form-control">
                <br> -->
                <label for="role"><b>Role</b></label>
                <input type="text" id="role" name="role" class="form-control" value="<?php echo $data['role']; ?>" disabled>
                <br>
                <input class="btn btn-primary mt-3" type="submit" name="submit" value="Submit" onclick="return confirm('Data berhasil di Update')">
                <a href="index.php" class="btn btn-danger mt-3">Kembali</a>
            </h6>
        </form>
    </main>
    </div>
    </div>
    </div>
    </div>

    <?php

    if (isset($_POST['submit'])) {
        // $foto = $_POST['foto'];
        $nama = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];


        $sqlUPDATE = "UPDATE login SET name='$nama', username='$username', email='$email' WHERE id=$id";

        $queryUPDATE = mysqli_query($conn, $sqlUPDATE);

        // header("location: index.php");
        echo "<script>location.href='index.php';</script>";
    }
    ?>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="./assets/hias/dashboard.js"></script>
</body>

</html>