<?php
include "../config.php";

$query = "SELECT * FROM warga ORDER BY id DESC";

if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];

    $query = "SELECT * FROM warga WHERE 
                nama LIKE '%$cari%' OR
                ktp LIKE '%$cari%' OR
                email LIKE '%$cari%' OR
                telp LIKE '%$cari%'
            ";
}


$result = mysqli_query($conn, $query);
$rows = [];

while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Data Warga</title>
</head>

<body>
    <div class="container" style="margin-top: 56px;">
        <h1 class="text-center mt-3"><b> Data Warga</b></h1>
        <hr />
        <p class="text-center">Warga RT 13</p>
        <div class="bd-highlight mb-3 row">
            <div class="col-12 col-md-auto p-2 bd-highlight">
                <a href="add.php" class="btn btn-primary btn-md "><i class="bi bi-plus"></i> Tambah <i class="bi bi-plus"></i></a>
            </div>
            <div class="col-12 col-md-7 col-xl-5 ms-auto p-2 bd-highlight">
                <form method="GET" action="index.php" class="d-flex">
                    <!-- <input type="text" name="cari" id="cari" value="<?php if (isset($_GET['cari'])) {
                                                                                echo $_GET['cari'];
                                                                            } ?>" class="form-control"> -->
                    <input type="text" name="cari" id="cari" value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>" class="form-control">
                    <button type="submit" class="btn btn-primary btn-sm ms-3"><i class="bi bi-search px-2"></i></button>
                </form>
            </div>
        </div>
        <p class="text-center"><b>Total Data : </b><?php echo mysqli_num_rows($result) ?></p>

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered " style="box-shadow: 0px 1px 6px 0.5px black;">
                <thead class="table-dark">
                    <th class="text-center">No.</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">KTP</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Telp</th>
                    <th class="text-center">Alamat</th>
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
                $sql = "select * from warga order by id desc limit $posisi,$batas";
                $hasil = mysqli_query($conn, $sql);
                $i = 0;
                while ($orang = mysqli_fetch_array($hasil)) {
                ?>
                    <tbody>
                        <?php // foreach ($rows as $i => $orang) : 
                        ?>
                        <tr>
                            <td align="center"><?= $posisi + $i + 1 ?></td>
                            <td align="center"><?= $orang['nama'] ?></td>
                            <td align="center"><?= $orang['ktp'] ?></td>
                            <td align="center"><?= $orang['email'] ?></td>
                            <td align="center"><?= $orang['telp'] ?></td>
                            <td align="center"><?= $orang['alamat'] ?></td>
                            <td align="center">
                                <div class="d-flex flex-nowrap gap-2">
                                    <!-- Modal Start -->
                                    <button type="button" class="btn btn-primary bi bi-info-circle" data-bs-toggle="modal" data-bs-target="#ModalViewData<?php echo $orang['id'] ?>"></button>
                                    <div class="modal fade" id="ModalViewData<?php echo $orang['id'] ?>" tabindex="-1" aria-labelledby="ModalViewDataLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success">
                                                    <h1 class="modal-title fs-5 fw-bold text-white" id="ModalViewDataLabel">
                                                        <i class="bi bi-list-ul"></i> Detail Info
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row text-start justify-content-center">
                                                        <div class="col-3">
                                                            Nama <br>
                                                            No. KTP <br>
                                                            E-mail <br>
                                                            No. Telp<br>
                                                            Alamat
                                                        </div>
                                                        <div class="col-7">
                                                            : <?php echo $orang['nama'] ?><br>
                                                            : <?php echo $orang['ktp'] ?><br>
                                                            : <?php echo $orang['email'] ?><br>
                                                            : <?php echo $orang['telp'] ?><br>
                                                            : <?php echo $orang['alamat'] ?>
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
                                    <a class='btn btn-warning' href='update.php?id=<?= $orang['id'] ?>'>
                                        <i class='bi bi-pencil-square'></i>
                                    </a>
                                    <div class="vr mx-2 bg-dark" style="width:1px;"></div>
                                    <a class='btn btn-danger' href='delete.php?id=<?= $orang['id'] ?>'>
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

            $query2     = mysqli_query($conn, "select * from warga");
            $jmldata    = mysqli_num_rows($query2);
            $jmlhalaman = ceil($jmldata / $batas);
            ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">

                    <?php
                    for ($i = 1; $i <= $jmlhalaman; $i++) {
                        if ($i != $halaman) {
                            echo "<li class='page-item'><a class='page-link' href='index.php?halaman=$i'>$i</a></li>";
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>