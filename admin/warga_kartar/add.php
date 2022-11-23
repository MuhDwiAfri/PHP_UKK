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

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 text-center" href="#"><b>Kartar 13</b></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3 text-white" href="../login/index.php">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="box-shadow: 0px 1px 6px 0.5px grey;">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span data-feather="users"></span>
                                Pengguna
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="../anggota_kartar/index.php">Anggota</a></li>
                                <li><a class="dropdown-item" href="../warga_kartar/index.php">Warga</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../Admin_kartar/index.php">Admin</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="clipboard"></span>
                                Kegiatan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="user"></span>
                                Customers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="bar-chart-2"></span>
                                Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="layers"></span>
                                Integrations
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

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
                        <input type="text" id="nama" name="nama_admin" class="form-control" placeholder="Masukkan Nama Anda">
                        <br>
                        <label for="number"><b>No. KTP</b></label>
                        <input type="number" id="ktp" name="ktp" class="form-control" placeholder="Masukkan No. KTP Anda">
                        <br>
                        <label for="email"><b>E-mail</b></label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan Alamat E-Mail">
                        <br>
                        <label for="telp"><b>No. Telp</b></label>
                        <input type="text" id="telp" name="telp_admin" class="form-control" placeholder="Masukkan No. Telp Anda">
                        <br>
                        <label for="text"><b>Alamat</b></label>
                        <textarea type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukkan Alamat Anda"></textarea>

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
        $ktp = $_POST['ktp'];
        $email = $_POST['email'];
        $telp = $_POST['telp_admin'];
        $alamat = $_POST['alamat'];


        $sqlInsert = "INSERT INTO warga ( nama, ktp, email, telp, alamat)
                      VALUES ( '$nama', '$ktp', '$email', '$telp', '$alamat' )";

        $queryInsert = mysqli_query($conn, $sqlInsert);


        // header("location: index.php");
        echo "<script>location.href='index.php';</script>";
    }
    ?>

</body>

</html>