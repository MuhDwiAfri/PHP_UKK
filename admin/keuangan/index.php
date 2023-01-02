<?php
include "../config.php";

$query = "SELECT * FROM Kas_masuk ORDER BY id_masuk DESC";

if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];

    $query = "SELECT * FROM kas_masuk WHERE 
                sumber LIKE '%$cari%' OR
                jumlah LIKE '%$cari%' OR
                tanggal_masuk LIKE '%$cari%' OR
                keterangan LIKE '%$cari%'
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
                                <i class="bi bi-house-door"></i>
                                Dashboard
                            </a>
                        </li>
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted">
                            <i class="bi bi-plus-circle text-white"></i>
                            <span class="text-white" style="margin-right: 5rem;"> Pengguna</span>
                            <a class="link-secondary" href="#" aria-label="Add a new report">
                            </a>
                        </h6>
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="../Admin_kartar/index.php">
                                <i class="bi bi-person-add"></i>
                                Admin
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="../anggota_kartar/index.php">
                                <i class="bi bi-person"></i>
                                Anggota
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="../warga_kartar/index.php">
                                <i class="bi bi-people"></i>
                                Warga
                            </a>
                        </li>
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted">
                            <i class="bi bi-plus-circle text-white"></i>
                            <span class="text-white" style="margin-right: 5rem;"> Keuangan</span>
                            <a class="link-secondary" href="#" aria-label="Add a new report">
                            </a>
                        </h6>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="./index.php">
                                <i class="bi bi-layers"></i>
                                Pemasukkan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="./kas_keluar.php">
                                <i class="bi bi-wallet2"></i>
                                Pengeluaran
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h5 class="center" style="text-transform: uppercase;">Dana Masuk</h5>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <span id="jam"></span>
                            </button>
                        </div>
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                    </div>
                </div>
                <p class="text-center">Warga RT 13</p>
                <?php
                include '../config.php';
                $sql3 = mysqli_query($conn, "SELECT SUM(jumlah) FROM kas_masuk");
                while ($data3 = mysqli_fetch_array($sql3)) {
                ?><tr>
                        <h3>Total Pendapatan

                        </h3></a>
                        <h6 style="color: green;"><?php echo "Rp. " . number_format($data3['SUM(jumlah)']); ?></h6 style="color: green;">
                    </tr>
                <?php
                }
                ?>
                <br>
                <div class="bd-highlight mb-3 row">
                    <div class="col-12 col-md-auto p-2 bd-highlight">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambah">
                            <i class="bi bi-plus"></i> Tambah <i class="bi bi-plus"></i>
                        </button>
                    </div>
                    <div class="col-12 col-md-7 col-xl-5 ms-auto p-2 bd-highlight">
                        <form method="GET" action="index.php" class="d-flex">
                            <input type="text" name="cari" id="cari" value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>" class="form-control" placeholder="Search">
                            <button type="submit" class="btn btn-primary btn-sm ms-3"><i class="bi bi-search px-2"></i></button>
                        </form>
                    </div>
                </div>
                <!-- <h3>Total : </h3> -->
                <p class="text-center"><b>Total Data : </b><?php echo mysqli_num_rows($result) ?></p>

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered  table-sm" style="box-shadow: 0px 1px 6px 0.5px black;">
                        <thead class="">
                            <th class="text-center">No.</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">keterangan</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Aksi</th>
                        </thead>

                        <?php

                        include "../config.php";
                        $batas   = 5;
                        $halaman = @$_GET['halaman'];
                        if (empty($halaman)) {
                            $posisi  = 0;
                            $halaman = 1;
                        } else {
                            $posisi  = ($halaman - 1) * $batas;
                        }
                        $no = $posisi + 1;
                        $sql = "select * from kas_masuk WHERE 
                        sumber LIKE '%" . @$cari . "%' OR
                        keterangan LIKE '%" . @$cari . "%' OR
                        jumlah LIKE '%" . @$cari . "%' 
                        '%" . @$cari . "%' 
                        order by id_masuk desc limit $posisi,$batas";
                        $hasil = mysqli_query($conn, $sql);
                        $i = 0;
                        while ($orang = mysqli_fetch_array($hasil)) {
                        ?>
                            <tbody>
                                <?php // foreach ($rows as $i => $orang) : 
                                ?>
                                <tr>
                                    <td align="center"><?= $posisi + $i + 1 ?></td>
                                    <td align=""><?= $orang['sumber'] ?></td>
                                    <td align=""><?= $orang['keterangan'] ?></td>
                                    <td align="center"><?= $orang['tanggal_masuk'] ?></td>
                                    <td align="center"> Rp. <?= number_format($orang['jumlah'], 0, ',', '.') ?></td>
                                    <td class="button">
                                        <div class="d-flex flex-nowrap gap-2">
                                            <!-- Detail Modal-->
                                            <!-- Modal Start -->
                                            <button type="button" class="btn btn-outline-primary bi bi-info-circle" data-bs-toggle="modal" data-bs-target="#ModalViewData<?php echo $orang['id_masuk'] ?>"></button>
                                            <div class="modal fade" id="ModalViewData<?php echo $orang['id_masuk'] ?>" tabindex="-1" aria-labelledby="ModalViewDataLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success">
                                                            <h1 class="modal-title fs-5 fw-bold text-white" id="ModalViewDataLabel">
                                                                <i class="bi bi-list-ul"></i> Detail Info
                                                                <?= $orang['sumber'] ?>
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row text-start justify-content-center">
                                                                <div class="col-3">
                                                                    Nama <br>
                                                                    Jumlah<br>
                                                                    Tanggal <br>
                                                                    keterangan
                                                                </div>
                                                                <div class="col-7">
                                                                    : <?php echo $orang['sumber'] ?><br>
                                                                    : <?php echo $orang['keterangan'] ?><br>
                                                                    : Rp. <?php echo  number_format($orang['jumlah']) ?><br>
                                                                    : <?php echo $orang['tanggal_masuk'] ?><br>
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
                                            <a class='btn btn-outline-warning' href='update.php?id=<?= $orang['id_masuk'] ?>'>
                                                <i class='bi bi-pencil-square'></i>
                                            </a>
                                            <div class="vr mx-2 bg-dark" style="width:1px;"></div>
                                            <a class='btn btn-outline-danger' href='delete.php?id=<?= $orang['id_masuk'] ?>' onclick="return confirm('Apakah anda yakin ingin menghapus ini ?')">
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

                    $query2     = mysqli_query($conn, "select * from kas_masuk");
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


                <!-- Modal Penambahan-->
                <?php
                include '../config.php';
                if (isset($_POST['submit'])) {
                    $sumber = $_POST['sumber'];
                    $tanggal_masuk = $_POST['tanggal_masuk'];
                    $keterangan = $_POST['keterangan'];
                    $jumlah = $_POST['jumlah'];
                    $sql = "INSERT INTO kas_masuk (sumber,tanggal_masuk,keterangan,jumlah)
	                        VALUES ('$sumber','$tanggal_masuk','$keterangan','$jumlah')";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully !";
                    } else {
                        echo "Error: " . $sql . "" . mysqli_error($conn);
                    }
                    mysqli_close($conn);
                }
                ?>
                <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="ModalTambah" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h1 class="modal-title fs-5 fw-bold text-white" id="ModalViewDataTambah">
                                    <i class="bi bi-database-fill-add"></i> Tambah Pengeluaran
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="index.php" method="post">
                                    <label for="tanggal"><b>Tanggal</b></label>
                                    <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="form-control">
                                    <br>
                                    <label for="nama"><b>Nama</b></label>
                                    <input type="text" id="sumber" name="sumber" class="form-control" placeholder="Masukkan Nama Anda">
                                    <br>
                                    <label for="keterangan"><b>Keterangan</b></label>
                                    <textarea type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Masukkan Nama Anda"></textarea>
                                    <br>
                                    <label for="jumlah"><b>Nominal</b></label>
                                    <input type="text" id="jumlah" name="jumlah" class="form-control" placeholder="Masukkan Nominal yang Ingin Anda Inginkan">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ModalEnd -->
            </main>
        </div>
    </div>


    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="./assets/hias/dashboard.js"></script>
    <script>
        setInterval(() => {
            const waktu = new Date();
            const jam = waktu.getHours();
            const menit = waktu.getMinutes();
            document.getElementById("jam").innerHTML = jam + " : " + menit;
        }, 1000);
    </script>
</body>

</html>