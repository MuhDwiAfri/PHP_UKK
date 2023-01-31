<?php
include "../config.php";

$id_keluar = $_GET['id_keluar'] ?? null;
if (!$id_keluar) header('Location:kas_keluar.php');

$result = mysqli_query($conn, "SELECT * FROM kas_keluar where id_keluar=$id_keluar");
$data = mysqli_fetch_assoc($result);

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
            <h1 class="h2">Edit Data : <?= $data['sumber'] ?></h1>
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
        </div>
        <form action="" method="post" enctype="multipart/form-data" action="proses_keluar.php?id_keluar=$_GET['id_keluar']">
            <h6>
                <label for="sumber"><b>Nama</b></label>
                <input type="text" id="sumber" name="sumber" value="<?php echo $data["sumber"]; ?>" class="form-control">
                <br>
                <label for="number"><b>Jumlah</b></label>
                <input type="number" id="jumlah" name="jumlah" value="<?php echo $data["jumlah"]; ?>" class="form-control">
                <br>
                <label for="date"><b>Tanggal</b></label>
                <input type="date" id="date" name="tanggal_keluar" value="<?php echo $data["tanggal_keluar"]; ?>" class="form-control">
                <br>
                <label for="text"><b>Keterangan</b></label>
                <textarea type="text" id="keterangan" name="keterangan" value="" class="form-control"><?php echo $data["keterangan"]; ?>
            </textarea>

                <input class="btn btn-primary mt-3" type="submit" name="submit" value="Submit" onclick="return confirm('Data berhasil di Update')">
                <a href="kas_keluar.php" class="btn btn-danger mt-3">Kembali</a>
            </h6>
        </form>
    </main>
    </div>
    </div>
    </div>
    </div>

    <?php

    if (isset($_POST['submit'])) {
        $sumber = $_POST['sumber'];
        $jumlah = $_POST['jumlah'];
        $date = $_POST['tanggal_keluar'];
        $keterangan = $_POST['keterangan'];

        $sqlUPDATE = "UPDATE kas_keluar SET sumber='$sumber', jumlah='$jumlah', tanggal_keluar='$date', keterangan='$keterangan' WHERE id_keluar=$id_keluar";

        $queryUPDATE = mysqli_query($conn, $sqlUPDATE);

        echo "<script>location.href='kas_keluar.php';</script>";
    }
    ?>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="./assets/hias/dashboard.js"></script>
</body>

</html>