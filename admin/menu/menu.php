<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: ../../login/index.php');
}
include "../config.php";

if (isset($_POST['submit'])) {
    $tgl_laporan = $_POST['tgl_laporan'];
    $info = $_POST['info'];

    $query = "INSERT INTO laporan VALUES('', '$info', '$tgl_laporan')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Success insert data')</script>";
    } else {
        echo "<script>alert('Success insert data')</script>";
    }
}

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

// $sisa = $pemasukan['total'] - $pengeluaran['total'];
// $jumlahminggu = 4;
// $sisa_keuangan_perminggu = $sisa / $jumlahminggu;
// echo  "Rp. " . number_format($sisa_keuangan_perminggu,  0, ".", ".");
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
    </style>


    <!-- Custom styles for this template -->
    <link href="./assets/hias/dashboard.css" rel="stylesheet">
</head>

<body>

    <!-- <div class="container" href="../login/index.php"></div> -->
    <?php include '../sidebar.php' ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 px-3">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h5 style="text-transform: uppercase;">Selamat Datang, <?= $_SESSION['role']; ?> <?php echo $_SESSION['username']; ?> <? ?></h5>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2"></div>
            </div>
            <!-- <div class="btn-group me-2">
                <a href="export_all.php" class="btn btn-sm btn-outline-secondary"><i class="fas fa-download fa-sm text-white-50"></i> Export Data</a>
            </div> -->
            <!-- <div class="dropdown">
                <button class="btn btn-outline-secondary " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Export data
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="export_all.php"><i class="bi bi-file-earmark-word"></i> Ms. Word</a></li>
                    <li><a class="dropdown-item" href="export_excel.php"><i class="bi bi-file-earmark-spreadsheet"></i> Ms. Excel</a></li>
                    <hr>
                    <li><a class="dropdown-item" href="cetak.php"><i class="bi bi-printer-fill"></i> Cetak Print</a></li>
                </ul>
            </div> -->
        </div>
        <div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-3 mb-3 border-bottom">
            <div class="row ">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-12 mb-4">
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
                <div class="col-xl-3 col-md-12 mb-4">
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
                <div class="col-xl-3 col-md-12 mb-4">
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
                        <!-- <div class="container mb-2 text-white">&nbsp Mingguan : Rp.</div> -->
                        <div class="container mb-2 text-white">SISA UANG KESELURUHAN </div>

                    </div>
                </div>
                <div class="col-xl-3 col-md-12 mb-4">
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

        // $query = "SELECT * FROM laporan where id=3";
        $query = "SELECT * FROM laporan order by id desc limit 1";
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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Laporan ke Database
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="">
                        <div class="modal-header bg-primary text-white">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-journal-bookmark"></i> Menambahkan Laporan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="input-info">Tanggal Kegiatan : </label>
                                <input type="date" class="form-control" id="input-nama" name="tgl_laporan" required>
                            </div>
                            <div class="form-group">
                                <label for="input-tgl_laporan">Informasi Kegiatan : </label>
                                <textarea type="text" class="form-control" id="input-email" name="info" required></textarea>
                            </div>
                            <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary" name="submit">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- <a class="btn btn-primary" href="http://localhost/phpmyadmin/index.php?route=/database/structure&db=ukk">Menambahkan Ke database</a> -->

        <div class="row gx-3">
            <div class="col-xl-5 col-md-12 mb-4 mt-3">
                <?php foreach ($rows as $key => $laporan) : ?>
                    <div class="card shadow mb-4">
                        <div class="card-header bg-success text-white">
                            <h6 class="d-flex justify-content-between">
                                <span>Kegiatan <?= $key + 1 ?></span>
                                <span><?= $laporan['tgl_laporan'] ?></span>
                            </h6>
                        </div>
                        <div class="card-body">
                            <p class="m-0"><?= $laporan['info'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="./assets/hias/dashboard.js"></script>
</body>

</html>