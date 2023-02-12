<?php
include '../config.php';

$query = "SELECT * FROM admin_kartar LIMIT 3";
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

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"><b>CONTACT</b></h1>
        </div>
        <div class="row">
            <?php foreach ($rows as $kontak) : ?>
                <div class="col-xl-4 col-md-8 mb-4">
                    <div class=" card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        <b>Hubungi Admin</b>
                                    </div>
                                    <label class="bold" style="text-transform: uppercase;">Nama : <?= $kontak['nama_admin'] ?></label>
                                    <label class="bold" style=" margin-top: 4px; ">E-mail : <?= $kontak['email'] ?></label>
                                    <label class="bold" style="text-transform: uppercase; margin-top: 4px; ">Telp / WA : <?= $kontak['telp_admin'] ?></label>
                                    <div class="text-center" style="margin-top: 8px; ">
                                        <a class="h5 mb-0 font-weight-bold text-gray-800" href="https://wa.me/6283853779281"><i class="bi bi-whatsapp"></i></a>
                                        <a class="h5 mb-0 font-weight-bold text-gray-800" href="https://www.instagram.com/mdwiafri/"><i class="bi bi-instagram"></i></a>
                                        <a class="h5 mb-0 font-weight-bold text-gray-800" href="mailto: muhammaddwiafriza30@gmail.com"> <i class="bi bi-envelope-at"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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