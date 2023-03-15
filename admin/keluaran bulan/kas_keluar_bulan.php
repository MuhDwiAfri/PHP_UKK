<?php
include "../config.php";

$query = "SELECT * FROM kas_keluar ORDER BY id_keluar DESC";

if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];

    $query = "SELECT * FROM kas_keluar WHERE 
                sumber LIKE '%$cari%' OR
                jumlah LIKE '%$cari%' OR
                tanggal_keluar LIKE '%$cari%' OR
                keterangan LIKE '%$cari%'
                '%$cari'
            ";
}


$result = mysqli_query($conn, $query);
$rows = [];

while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

// if (isset($_POST['submit'])) {
//     $bulan = $_POST['bulan'];
//     $tahun = $_POST['tahun'];

//     // buat url cetak
//     $url_cetak = "export_keluar.php?bulan=" . $bulan . "&tahun=" . $tahun . "&filter=true";

//     $koneksi = mysqli_connect('localhost', 'root', '', 'ukk');

//     if (!$koneksi) {
//         die('Koneksi gagal: ' . mysqli_connect_error());
//     }

//     $format_tanggal_awal = date('Y-m-d', strtotime($tanggal_awal));
//     $format_tanggal_akhir = date('Y-m-d', strtotime($tanggal_akhir));

//     $query = "SELECT *
//           FROM kas_keluar
//           WHERE tanggal_keluar BETWEEN '$format_tanggal_awal 00:00:00' AND '$format_tanggal_akhir 23:59:59'";

//     $result = mysqli_query($koneksi, $query);

//     mysqli_close($koneksi);
if (isset($_POST['filter'])) {
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];

    $url_cetak = "export_keluar.php?bulan=" . $bulan . "&tahun=" . $tahun;
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
            <h5 class="center" style="text-transform: uppercase;">Dana pengeluaran</h5>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <span id="jam"></span>
                    </button>
                </div>
                <div class="btn-group me-2">
                    <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Share</button> -->
                    <div class="btn-group me-2">
                        <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Share</button> -->
                        <a href="<?= $url_cetak ?? 'export_keluar.php' ?>" class="btn btn-sm btn-outline-secondary"><i class="fas fa-download fa-sm text-white-50"></i> Export Data</a>
                    </div>
                </div>
            </div>
        </div>
        <p class="text-center">Warga RT 13</p>
        <?php
        include '../config.php';
        $sql3 = mysqli_query($conn, "SELECT SUM(jumlah) FROM kas_keluar");
        while ($data3 = mysqli_fetch_array($sql3)) {
        ?><tr>
                <h3>Total Pengeluaran

                </h3></a>
                <h6 style="color: red;"><?php echo "Rp. " . number_format($data3['SUM(jumlah)']); ?></h6>
            </tr>
        <?php
        }
        ?>
        <br>
        <?php
        if (isset($_POST['submit'])) {
            if (mysqli_num_rows($result) > 0) {

                $total_uang = 0;

                while ($row = mysqli_fetch_array($result)) {
                    $total_uang += $row['jumlah'];
                }

                echo "<h6 style='justify-content: start;'>Total Uang dari tanggal " . $tanggal_awal . " s/d " . $tanggal_akhir . "</h6>";
                echo "<p class='text-'>Rp. " .  number_format($total_uang)  . "</p>";
            } else {
                echo "<div class='text-center'>Tidak ada data yang ditemukan.</div>";
            }
        }

        ?>
        <div class="bd-highlight mb-3 row">
            <div class="col-12 col-md-auto p-2 bd-highlight">
                <a href="./add.php" class="btn btn-primary btn-md "><i class="bi bi-plus"></i> Tambah <i class="bi bi-plus"></i></a>
            </div>
            <div class="col-12 col-md-7 col-xl-5 ms-auto p-2 bd-highlight">
                <form method="GET" action="kas_keluar_bulan.php" class="d-flex">
                    <input type="text" name="cari" id="cari" value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>" class="form-control" placeholder="Search">
                    <button type="submit" class="btn btn-primary btn-sm ms-3"><i class="bi bi-search px-2"></i></button>
                </form>
            </div>
        </div>
        <!-- <h3>Total : </h3> -->
        <p class="text-center"><b>Total Data : </b><?php echo mysqli_num_rows($result) ?></p>

        <form method="post" action="kas_keluar_bulan.php">
            <div class="input-group mb-3">
                <span for="bulan" class="input-group-text">Bulan</span>
                <select name="bulan" id="bulan" class="form-control" style="">
                    <?php
                    $bulan_sekarang = date('F');
                    $nama_bulan = array(
                        'Januari',
                        'Februari',
                        'Maret',
                        'April',
                        'Mei',
                        'Juni',
                        'Juli',
                        'Agustus',
                        'September',
                        'Oktober',
                        'November',
                        'Desember'
                    );
                    foreach ($nama_bulan as $key => $value) {
                        $index = $key + 1;
                        $bulan = $_POST['bulan'] ?? null;
                        $selected = $index ==  $bulan ? 'selected' : '';
                        echo '<option value="' . $index . '" ' . $selected . '>' . $value . '</option>';
                    }
                    ?>
                </select>
                <span for="tahun" class="input-group-text">Tahun</span>
                <select type="text" name="tahun" id="tahun" class="form-control">
                    <?php
                    $mulai = date('Y') - 50;
                    for ($i = $mulai; $i < $mulai + 100; $i++) {
                        $tahun = $_POST['tahun'] ?? date('Y');
                        $sel = $i == $tahun ? ' selected="selected"' : '';
                        echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                    }
                    ?>
                </select>
                <button class="btn btn-info ms-2" style="color: white;" name="filter" type="submit"><i class="bi bi-funnel"></i></button>
            </div>
        </form>

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
                <tbody>

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

                    if (isset($_POST['filter'])) {
                        $bulan = $_POST['bulan'];
                        $tahun = $_POST['tahun'];

                        $sql = "select * from kas_keluar WHERE 
                        MONTH(tanggal_keluar) = $bulan AND YEAR(tanggal_keluar) = $tahun AND 
                        (sumber LIKE '%" . @$cari . "%' OR
                        keterangan LIKE '%" . @$cari . "%' OR
                        jumlah LIKE '%" . @$cari . "%' 
                        '%" . @$cari . "%')
                        order by id_keluar desc limit $posisi,$batas";
                    } else {
                        $sql = "select * from kas_keluar WHERE 
                            sumber LIKE '%" . @$cari . "%' OR
                            keterangan LIKE '%" . @$cari . "%' OR
                            jumlah LIKE '%" . @$cari . "%' 
                            '%" . @$cari . "%'
                            order by id_keluar desc limit $posisi,$batas";
                    }

                    $hasil = mysqli_query($conn, $sql);
                    $i = 0;
                    while ($orang = mysqli_fetch_array($hasil)) {
                    ?>
                        <tr>
                            <td align="center"><?= $posisi + $i + 1 ?></td>
                            <td align=""><?= $orang['sumber'] ?></td>
                            <td align=""><?= $orang['keterangan'] ?></td>
                            <td align="center"><?= $orang['tanggal_keluar'] ?></td>
                            <td align="center"> Rp. <?= number_format($orang['jumlah'], 0, ',', '.') ?></td>
                            <td class="button">
                                <div class="d-flex flex-nowrap gap-2 justify-content-center">
                                    <!-- Detail Modal-->
                                    <!-- Modal Start -->
                                    <button type="button" class="btn btn-outline-primary bi bi-info-circle" data-bs-toggle="modal" data-bs-target="#ModalViewData<?php echo $orang['id_keluar'] ?>"></button>
                                    <div class="modal fade" id="ModalViewData<?php echo $orang['id_keluar'] ?>" tabindex="-1" aria-labelledby="ModalViewDataLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h1 class="modal-title fs-5 fw-bold text-white" id="ModalViewDataLabel">
                                                        <i class="bi bi-list-ul"></i> Detail Pengeluaran
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
                                                            : <?php echo $orang['tanggal_keluar'] ?><br>
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
                                    <a class='btn btn-outline-warning' href='update_keluar.php?id_keluar=<?= $orang['id_keluar'] ?>'>
                                        <i class='bi bi-pencil-square'></i>
                                    </a>
                                    <div class="vr mx-2 bg-dark" style="width:1px;"></div>
                                    <a class='btn btn-outline-danger' href='delete_keluar.php?id_keluar=<?= $orang['id_keluar'] ?>' onclick="return confirm('Apakah anda yakin ingin menghapus ini ?')">
                                        <i class='bi bi-trash'></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php //endforeach; 
                        ?>
                    <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
            <hr>
        </div>
        <?php

        $query2     = mysqli_query($conn, "select * from kas_keluar");
        $jmldata    = mysqli_num_rows($query2);
        $jmlhalaman = ceil($jmldata / $batas);
        ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">

                <?php
                for ($i = 1; $i <= $jmlhalaman; $i++) {
                    if ($i != $halaman) {
                        echo "<li class='page-item'><a class='page-link' href='kas_keluar.php?halaman=$i' >$i</a></li>";
                    } else {
                        echo "<li class='page-item active'><a class='page-link' href='kas_keluar.php'>$i</a></li>";
                    }
                }
                ?>
            </ul>
        </nav>
    </main>


    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="./assets/hias/dashboard.js"></script>
    <script>
        setInterval(() => {
            const waktu = new Date();
            const jam = waktu.getHours();
            const menit = waktu.getMinutes();
            const detik = waktu.getSeconds();
            document.getElementById("jam").innerHTML = jam + " : " + menit + " : " + detik;
        }, 1000);
    </script>
</body>

</html>