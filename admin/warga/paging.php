<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Data Warga</title>
</head>

<body>
    <div class="container">
        <br>
        <h4>Pagination di PHP dengan Bootstrap</h4>

        <table class="table table-bordered table-hover">
            <br>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>KTP</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Telp</th>
                </tr>
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
            $sql = "select * from warga order by id desc limit $posisi,$batas";
            $hasil = mysqli_query($conn, $sql);
            while ($data = mysqli_fetch_array($hasil)) {
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data["nama"]; ?></td>
                        <td><?php echo $data["ktp"];   ?></td>
                        <td><?php echo $data["email"];   ?></td>
                        <td><?php echo $data["alamat"];   ?></td>
                        <td><?php echo $data["telp"];   ?></td>

                    </tr>
                </tbody>
            <?php
                $no++;
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
                        echo "<li class='page-item'><a class='page-link' href='paging.php?halaman=$i'>$i</a></li>";
                    } else {
                        echo "<li class='page-item active'><a class='page-link' href='paging.php'>$i</a></li>";
                    }
                }
                ?>
            </ul>
        </nav>
        </ul>
    </div>
    </div>
</body>

</html>