<?php
include "../config.php";

$query = "SELECT * FROM anggota ORDER BY id_anggota DESC";

if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];

    $query = "SELECT * FROM anggota WHERE 
                nama_anggota LIKE '%$cari%' OR
                telp_anggota LIKE '%$cari%' OR
                email LIKE '%$cari%'
                '%$cari'
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
                            <a class="nav-link active" aria-current="page" href="../menu.php">
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
                    <h1 class="h2">Data Anggota</h1>
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
                <p class="text-center">Warga RT 13</p>
                <div class="bd-highlight mb-3 row">
                    <div class="col-12 col-md-auto p-2 bd-highlight">
                        <a href="add.php" class="btn btn-primary btn-md "><i class="bi bi-plus"></i> Tambah <i class="bi bi-plus"></i></a>
                    </div>
                    <div class="col-12 col-md-7 col-xl-5 ms-auto p-2 bd-highlight">
                        <form method="GET" action="index.php" class="d-flex">
                            <input type="text" name="cari" id="cari" value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>" class="form-control">
                            <button type="submit" class="btn btn-primary btn-sm ms-3"><i class="bi bi-search px-2"></i></button>
                        </form>
                    </div>
                </div>
                <p class="text-center"><b>Total Data : </b><?php echo mysqli_num_rows($result) ?></p>

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered  table-sm" style="box-shadow: 0px 1px 6px 0.5px black;">
                        <thead class="">
                            <th class="text-center">No.</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Telp</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Aksi</th>
                        </thead>
                        <?php

                        include "../config.php";
                        $batas   = 10;
                        $halaman = @$_GET['halaman'];
                        if (empty($halaman)) {
                            $posisi  = 0;
                            $halaman = 1;
                        } else {
                            $posisi  = ($halaman - 1) * $batas;
                        }

                        $no = $posisi + 1;
                        $sql = "select * from anggota WHERE 
                        nama_anggota LIKE '%" . @$cari . "%' OR
                        telp_anggota LIKE '%" . @$cari . "%' OR
                        email LIKE '%" . @$cari . "%'
                        '%" . @$cari . "%' 
                        order by id_anggota desc limit $posisi,$batas";
                        $hasil = mysqli_query($conn, $sql);
                        $i = 0;
                        while ($orang = mysqli_fetch_array($hasil)) {
                        ?>
                            <tbody>
                                <?php // foreach ($rows as $i => $orang) : 
                                ?>
                                <tr>
                                    <td align="center"><?= $posisi + $i + 1 ?></td>
                                    <td align=""><?= $orang['nama_anggota'] ?></td>
                                    <td align="center"><?= $orang['telp_anggota'] ?></td>
                                    <td align=""><?= $orang['email'] ?></td>
                                    <td align=""><?= $orang['alamat'] ?></td>
                                    <td class="but">
                                        <div class="d-flex flex-nowrap gap-2">
                                            <!-- Detail Modal-->
                                            <!-- Modal Start -->
                                            <button type="button" class="btn btn-outline-primary bi bi-info-circle" data-bs-toggle="modal" data-bs-target="#ModalViewData<?php echo $orang['id_anggota'] ?>"></button>
                                            <div class="modal fade" id="ModalViewData<?php echo $orang['id_anggota'] ?>" tabindex="-1" aria-labelledby="ModalViewDataLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success">
                                                            <h1 class="modal-title fs-5 fw-bold text-white" id="ModalViewDataLabel">
                                                                <i class="bi bi-list-ul"></i> Detail Info
                                                                <?= $orang['nama_anggota'] ?>
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row text-start justify-content-center">
                                                                <div class="col-3">
                                                                    Nama <br>
                                                                    No. Telp<br>
                                                                    E-mail <br>
                                                                    Alamat
                                                                </div>
                                                                <div class="col-7">
                                                                    : <?php echo $orang['nama_anggota'] ?><br>
                                                                    : <?php echo $orang['telp_anggota'] ?><br>
                                                                    : <?php echo $orang['email'] ?><br>
                                                                    : <?php echo $orang['alamat'] ?><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x"></i> Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal End -->

                                            <div class="vr mx-2 bg-dark" style="width:1px;"></div>
                                            <a class='btn btn-outline-warning' href='update.php?id=<?= $orang['id_anggota'] ?>'>
                                                <i class='bi bi-pencil-square'></i>
                                            </a>
                                            <div class="vr mx-2 bg-dark" style="width:1px;"></div>
                                            <a class='btn btn-outline-danger' href='delete.php?id=<?= $orang['id_anggota'] ?>' onclick="return confirm('Apakah anda yakin ingin menghapus ini ?')">
                                                <i class='bi bi-trash'></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php //endforeach; 
                                ?>
                            </tbody>
                        <?php
                            $i++;
                        }
                        ?>
                    </table>
                    <hr>
                    <?php

                    $query2     = mysqli_query($conn, "select * from anggota");
                    $jmldata    = mysqli_num_rows($query2);
                    $jmlhalaman = ceil($jmldata / $batas);
                    ?>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">

                            <?php
                            for ($i = 1; $i <= $jmlhalaman; $i++) {
                                if ($i != $halaman) {
                                    echo "<li class='page-item'><a class='page-link' href='index.php?halaman=$i' >$i</a></li>";
                                } else {
                                    echo "<li class='page-item active'><a class='page-link' href='index.php'>$i</a></li>";
                                }
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
                <!-- Button trigger modal -->
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