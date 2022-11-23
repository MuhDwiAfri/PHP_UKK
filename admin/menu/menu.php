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

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 text-center" href="#"><b>Kartar 13</b></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <h6 class="text-white">Selamat Datang, <?php echo $_SESSION['username']; ?></h6>
        <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3 text-white" href="../login/index.php" onclick="return confirm('Apakah anda yakin ingin Keluar ?')">Sign out</a>
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
                <div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <div class="row ">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-8 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pendapatan (Hari Ini)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="bi bi-safe2-fill"></i></div>
                                        </div>
                                    </div>
                                </div> &nbsp Mingguan : Rp.
                                <!-- <?php
                                        echo number_format($jumlahmasuk, 2, ',', '.');
                                        ?> -->
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-8 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pengeluaran</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="bi bi-box-arrow-left"></i></div>
                                        </div>
                                    </div>
                                </div> &nbsp Mingguan : Rp.
                                <!-- <?php
                                        echo number_format($jumlahmasuk, 2, ',', '.');
                                        ?> -->
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-8 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sisa Uang</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.</div>
                                        </div>
                                    </div>
                                </div> &nbsp Mingguan : Rp.
                                <!-- <?php
                                        echo number_format($jumlahmasuk, 2, ',', '.');
                                        ?> -->
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-8 mb-4">
                            <div class=" card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Admin</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="bi bi-people-fill"></i></div>
                                        </div>
                                    </div>
                                </div> &nbsp Mingguan : Rp.
                                <!-- <?php
                                        echo number_format($jumlahmasuk, 2, ',', '.');
                                        ?> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-md-8 mb-4">
                    <div class=" card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tentang</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="bi bi-people-fill"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-md-8 mb-4">
                    <div class=" card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kontak</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><i class="bi bi-people-fill"></i></div>
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