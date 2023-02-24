<?php
include "../config.php";

$query = "SELECT * FROM warga ORDER BY id DESC";

if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];

    $query = "SELECT * FROM warga WHERE 
                nama LIKE '%$cari%' OR
                ktp LIKE '%$cari%' OR
                email LIKE '%$cari%' OR
                telp LIKE '%$cari%' OR
                alamat LIKE '%$cari%'
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

    <?php include '../sidebar.php' ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 px-3">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h5 class="center" style="text-transform: uppercase;">Data Warga</h5>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2"></div>
            </div>
        </div>
        <p class="text-center">Warga RT 13</p>
        <div class="bd-highlight mb-3 row">
            <div class="col-12 col-md-auto p-2 bd-highlight">
                <a href="add.php" class="btn btn-primary btn-md "><i class="bi bi-plus"></i> Tambah <i class="bi bi-plus"></i></a>
            </div>
            <div class="col-12 col-md-7 col-xl-5 ms-auto p-2 bd-highlight">
                <form method="GET" action="index.php" class="d-flex">
                    <input type="text" name="cari" id="cari" value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>" class="form-control" placeholder="Search">
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
                    <th class="text-center">KTP</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Telp</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Aksi</th>
                </thead>
                <tbody>
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
                    $sql = "select * from warga WHERE 
                        nama LIKE '%" . @$cari . "%' OR
                        ktp LIKE '%" . @$cari . "%' OR
                        email LIKE '%" . @$cari . "%' OR
                        telp LIKE '%" . @$cari . "%' OR
                        alamat LIKE '%" . @$cari . "%'
                        '%" . @$cari . "%' 
                        order by id desc limit $posisi,$batas";
                    $hasil = mysqli_query($conn, $sql);
                    $i = 0;
                    while ($orang = mysqli_fetch_array($hasil)) {
                    ?>
                        <tr>
                            <td align="center"><?= $posisi + $i + 1 ?></td>
                            <td align=""><?= $orang['nama'] ?></td>
                            <td align=""><?= $orang['ktp'] ?></td>
                            <td align=""><?= $orang['email'] ?></td>
                            <td align="center"><?= $orang['telp'] ?></td>
                            <td align=""><?= $orang['alamat'] ?></td>
                            <td class="but">
                                <div class="d-flex flex-nowrap gap-2 justify-content-center">
                                    <!-- Detail Modal-->
                                    <!-- Modal Start -->
                                    <button type="button" class="btn btn-outline-primary bi bi-info-circle" data-bs-toggle="modal" data-bs-target="#ModalViewData<?php echo $orang['id'] ?>"></button>
                                    <div class="modal fade" id="ModalViewData<?php echo $orang['id'] ?>" tabindex="-1" aria-labelledby="ModalViewDataLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h1 class="modal-title fs-5 fw-bold text-white" id="ModalViewDataLabel">
                                                        <i class="bi bi-list-ul"></i> Detail Info
                                                        <?= $orang['nama'] ?>
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row text-start justify-content-center">
                                                        <div class="col-3">
                                                            Nama <br>
                                                            KTP <br>
                                                            E-mail <br>
                                                            No. Telp<br>
                                                            Alamat <br>
                                                        </div>
                                                        <div class="col-7">
                                                            : <?php echo $orang['nama'] ?><br>
                                                            : <?php echo $orang['ktp'] ?><br>
                                                            : <?php echo $orang['email'] ?><br>
                                                            : <?php echo $orang['telp'] ?><br>
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
                                    <a class='btn btn-outline-warning' href='update.php?id=<?= $orang['id'] ?>'>
                                        <i class='bi bi-pencil-square'></i>
                                    </a>
                                    <div class="vr mx-2 bg-dark" style="width:1px;"></div>
                                    <a class='btn btn-outline-danger' href='delete.php?id=<?= $orang['id'] ?>' onclick="return confirm('Apakah anda yakin ingin menghapus ini ?')">
                                        <i class='bi bi-trash'></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
            <hr>
        </div>
        <?php

        $query2     = mysqli_query($conn, "select * from warga");
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