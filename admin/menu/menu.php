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
    </style>


    <!-- Custom styles for this template -->
    <link href="./assets/hias/dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-primary p-0 justify-content-start shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 text-center bg-dark" href="#"><b>Kartar 13</b></a>
        <button class="navbar-toggler d-md-none collapsed mx-2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h6 class="text-white mt-1 col text-center">Selamat Datang, <?= $_SESSION['username'] ?? 'Admin' ?></h6>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-4 text-white" href="../login/index.php" onclick="return confirm('Apakah anda yakin ingin Keluar ?')">Sign out</a>
            </div>
        </div>

    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-primary sidebar collapse" style="box-shadow: 0px 1px 6px 0.5px grey;">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span class="text-white">Menu</span>
                            <a class="link-secondary" href="#" aria-label="Add a new report">
                            </a>
                        </h6>
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="../menu/menu.php">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="btn-group dropend">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span data-feather="users" class="text-white"></span>
                                Pengguna
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="../anggota_kartar/index.php">Anggota</a></li>
                                <li><a class="dropdown-item" href="../warga_kartar/index.php">Warga</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="../Admin_kartar/index.php">Admin</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <span data-feather="clipboard" class="text-white"></span>
                                Kegiatan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">
                                <span data-feather="user" class="text-white"></span>
                                Customers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../menu/kontak.php">
                                <span data-feather="bar-chart-2" class="text-white"></span>
                                Reports
                            </a>
                        </li>
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span class="text-white">Keuangan</span>
                            <a class="link-secondary" href="#" aria-label="Add a new report">
                            </a>
                        </h6>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../keuangan/index.php">
                                <span data-feather="layers" class="text-white"></span>
                                Pemasukkan
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
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
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="bi bi-safe2-fill">
                                                        <?php
                                                        include '../config.php';
                                                        $sql3 = mysqli_query($conn, "SELECT SUM(jumlah) FROM kas_masuk");
                                                        while ($data3 = mysqli_fetch_array($sql3))
                                                            echo "Rp. " . number_format($data3['SUM(jumlah)']); ?> </i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container mb-2"> <a href="../keuangan/index.php" class="text-white" style="text-decoration: none;"> More info</a></div>
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
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="bi bi-safe2-fill">
                                                        <?php
                                                        include '../config.php';
                                                        $sql3 = mysqli_query($conn, "SELECT SUM(jumlah) FROM kas_keluar");
                                                        while ($data3 = mysqli_fetch_array($sql3))
                                                            echo "Rp. " . number_format($data3['SUM(jumlah)']); ?> </i>
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
                            <div class="card text-dark bg-info mb-3">
                                <div class="card border-info mb-1  shadow h-100">
                                    <div class="card-header bg-info text-uppercase text-white mb-1 ">
                                        <h6>Sisa uang</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="bi bi-safe2-fill"> Rp. </i></div>
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
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="bi bi-person-fill"></i> <?php echo mysqli_num_rows($result) ?> Orang</i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container mb-2"> <a href="../Admin_kartar/index.php" class="text-white" style="text-decoration: none;"> More info</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-md-8 mb-4">
                        <div class=" card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><b> Latar Belakang </b></div>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="./assets/hias/dashboard.js"></script>
</body>

</html>