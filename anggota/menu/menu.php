<?php
session_start();

include "../config.php";

$query = "SELECT * FROM admin_kartar ORDER BY id_admin DESC";

if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];

    $query = "SELECT * FROM admin_kartar WHERE 
                nama_admin LIKE '%$cari%' OR
                telp_admin LIKE '%$cari%' OR
                email LIKE '%$cari%'
            ";
}


$result = mysqli_query($conn, $query);
$rows = [];

while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

// Sisa 
$result_pemasukan = mysqli_query($conn, "SELECT SUM(jumlah) AS 'total' FROM kas_masuk");
$pemasukan = mysqli_fetch_assoc($result_pemasukan);

$result_pengeluaran = mysqli_query($conn, "SELECT SUM(jumlah) AS 'total' FROM kas_keluar");
$pengeluaran = mysqli_fetch_assoc($result_pengeluaran);

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">


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

        .btn {}
    </style>


    <!-- Custom styles for this template -->
    <link href="./assets/hias/dashboard.css" rel="stylesheet">
</head>

<body>

    <!-- <div class="container" href="../login/index.php"></div> -->
    <?php include '../sidebar.php' ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h5 class="center" style="text-transform: uppercase;">Selamat Datang, <?= $_SESSION['role']; ?> <?php echo $_SESSION['username']; ?> <? ?></h5>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2"></div>
            </div>
            <div class="btn-group me-2">
                <a href="export_all.php" class="btn btn-sm btn-outline-secondary"><i class="fas fa-download fa-sm text-white-50"></i> Export Data</a>
            </div>
        </div>
        <div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-3 mb-3 border-bottom">
            <div class="row ">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-8 mb-4">
                    <div class="card text-dark bg-success mb-3">
                        <div class="card border-success mb-1  shadow h-100">
                            <div class="card-header bg-success text-uppercase text-white mb-1 ">
                                <h6>Pendapatan</h6>
                            </div>
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <i class="bi bi-cash"></i>
                                            <b>
                                                <?php
                                                include '../config.php';
                                                $sql3 = mysqli_query($conn, "SELECT SUM(jumlah) FROM kas_masuk");
                                                while ($data3 = mysqli_fetch_array($sql3))
                                                    echo "Rp. " . number_format($data3['SUM(jumlah)']); ?>
                                            </b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container mb-2"> <a href="../keuangan/kas_masuk.php" class="text-white" style="text-decoration: none;"> More info</a></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-8 mb-4">
                    <div class="card text-dark bg-danger mb-3">
                        <div class="card border-danger mb-1  shadow h-100">
                            <div class="card-header bg-danger text-uppercase text-white mb-1 ">
                                <h6>Pengeluaran</h6>
                            </div>
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <i class="bi bi-safe2-fill"></i>
                                            <b>
                                                <?php
                                                include '../config.php';
                                                $sql3 = mysqli_query($conn, "SELECT SUM(jumlah) FROM kas_keluar");
                                                while ($data3 = mysqli_fetch_array($sql3))
                                                    echo "Rp. " . number_format($data3['SUM(jumlah)']); ?>
                                            </b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container mb-2"> <a href="../keluaran/kas_keluar.php" class="text-white" style="text-decoration: none;"> More info</a></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-8 mb-4">
                    <div class="card text-dark bg-info mb-3">
                        <div class="card border-info mb-1  shadow h-100">
                            <div class="card-header bg-info text-uppercase text-white mb-1 ">
                                <h6>Sisa uang</h6>
                            </div>
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <i class="bi bi-safe2-fill"></i>
                                            <b>
                                                <?= "Rp. " . number_format($pemasukan['total'] - $pengeluaran['total']); ?>
                                            </b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container mb-2 text-white">&nbsp Mingguan : Rp.</div>
                        <!-- <?php
                                echo number_format($jumlahmasuk, 2, ',', '.');
                                ?> -->
                    </div>
                </div>
                <div class="col-xl-3 col-md-8 mb-4">
                    <div class="card text-dark bg-secondary mb-3">
                        <div class="card border-secondary mb-1  shadow h-100">
                            <div class="card-header bg-secondary text-uppercase text-white mb-1 ">
                                <h6>Pengurus</h6>
                            </div>
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <i class="bi bi-person-fill"></i>
                                            <b>
                                                <?php echo mysqli_num_rows($result) ?> Orang</i>
                                            </b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container mb-2"> <a href="../Admin_kartar/index.php" class="text-white" style="text-decoration: none;"> More info</a></div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include '../config.php';

        $query = "SELECT * FROM laporan where id=2";
        $result = mysqli_query($conn, $query);
        $rows = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        ?>

        <?php

        if (isset($_POST['submit'])) {
            $info = $_POST['info'];
            $tgl_laporan = $_POST['tgl_laporan'];

            $sqlInsert = "INSERT INTO laporan ( info, tgl_laporan)
                  VALUES ( '$info', '$tgl_laporan')";

            $queryInsert = mysqli_query($conn, $sqlInsert);


            // header("location: index.php");
            echo "<script>location.href='menu.php';</script>";
        }

        ?>
        <h5 style="text-transform: uppercase; font-weight:bold;">Informasi Kegiatan</h5>

        <div class="col-lg-6 mt-3">
            <?php foreach ($rows as $key => $laporan) : ?>
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h6 class="d-flex justify-content-between">
                            <span>Laporan <?= $key + 1 ?></span>
                            <span><?= $laporan['tgl_laporan'] ?></span>
                        </h6>
                    </div>
                    <div class="card-body">
                        <p class="m-0"><?= $laporan['info'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="./assets/hias/dashboard.js"></script>
</body>

</html>