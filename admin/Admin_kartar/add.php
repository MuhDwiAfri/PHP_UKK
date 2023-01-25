<?php
include "../config.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
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

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tambah Data </h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <!-- <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                        </button> -->
            </div>
        </div>
        <div class="container">
            <form action="add.php" method="post" enctype="multipart/form-data">

                <label for="nama"><b>Nama</b></label>
                <input type="text" id="nama" name="nama_admin" class="form-control" placeholder="Masukkan Nama Anda" required>
                <br>
                <label for="telp"><b>No. Telp</b></label>
                <input type="text" id="telp" name="telp_admin" class="form-control" placeholder="Masukkan No. Telp Anda" required>
                <br>
                <label for="email"><b>E-mail</b></label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan Alamat E-Mail" required>

                <input class="btn btn-success mt-3" type="submit" name="tambah" value="Tambah">
                <a href="index.php" class="btn btn-danger mt-3">Kembali</a>
            </form>
        </div>
    </main>
    </div>
    </div>

    <?php

    if (isset($_POST['tambah'])) {
        $nama = $_POST['nama_admin'];
        $telp = $_POST['telp_admin'];
        $email = $_POST['email'];

        $sqlInsert = "INSERT INTO admin_kartar ( nama_admin, telp_admin, email )
                      VALUES ( '$nama', '$telp', '$email')";

        $queryInsert = mysqli_query($conn, $sqlInsert);
        echo "<script>location.href='index.php';</script>";
    } else {
        echo "Data Berhasil Ditambah";
    }
    ?>


    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="./assets/hias/dashboard.js"></script>
</body>

</html>