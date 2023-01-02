<?php
session_start();
include  "../config.php";
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
        <h6 class="text-white mt-1 col text-center"></h6>
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
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="../menu/menu.php">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span data-feather="users" class="text-white"></span>
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
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"><b>CONTACT</b></h1>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-md-8 mb-4">
                        <div class=" card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            <!-- <?php $orang = mysqli_query($conn, "SELECT * FROM admin_kartar where id_admin= 5");
                                                    $orang = mysqli_fetch_array($orang);
                                                    echo $orang['admin_kartar']; ?> -->
                                            <b> ADMIN : Muhammad Dwi Afriza
                                            </b>
                                        </div>
                                        <p>Klik icon jika ada yang ditanyakan</p>
                                        <div class="text-center">
                                            <a class="h5 mb-0 font-weight-bold text-gray-800" href="https://wa.me/6283853779281"><i class="bi bi-whatsapp"></i></a>
                                            <a class="h5 mb-0 font-weight-bold text-gray-800" href="https://www.instagram.com/mdwiafri/"><i class="bi bi-instagram"></i></a>
                                            <a class="h5 mb-0 font-weight-bold text-gray-800" href="mailto: muhammaddwiafriza30@gmail.com"> <i class="bi bi-envelope-at"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-8 mb-4">
                        <div class=" card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            <b>ADMIN : Reynaldo Dwi Syaputra</b>
                                        </div>
                                        <p>Klik icon jika ada yang ditanyakan</p>
                                        <div class="text-center">
                                            <a class="h5 mb-0 font-weight-bold text-gray-800" href="https://wa.me/6283853779281"><i class="bi bi-whatsapp"></i></a>
                                            <a class="h5 mb-0 font-weight-bold text-gray-800" href="https://www.instagram.com/mdwiafri/"><i class="bi bi-instagram"></i></a>
                                            <a class="h5 mb-0 font-weight-bold text-gray-800" href="mailto: muhammaddwiafriza30@gmail.com"> <i class="bi bi-envelope-at"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-8 mb-4">
                        <div class=" card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            <b>ADMIN : Bambang Yulistino Fu</b>
                                        </div>
                                        <p>Klik icon jika ada yang ditanyakan</p>
                                        <div class="text-center">
                                            <a class="h5 mb-0 font-weight-bold text-gray-800" href="https://wa.me/6283853779281"><i class="bi bi-whatsapp"></i></a>
                                            <a class="h5 mb-0 font-weight-bold text-gray-800" href="https://www.instagram.com/mdwiafri/"><i class="bi bi-instagram"></i></a>
                                            <a class="h5 mb-0 font-weight-bold text-gray-800" href="mailto: muhammaddwiafriza30@gmail.com"> <i class="bi bi-envelope-at"></i></a>
                                        </div>
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