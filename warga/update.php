<?php
include "../config.php";

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM warga where id=$id");
$data = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Data Warga</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md12">
                <div class="card" style="box-shadow: 0px 0.5px 6px 0.5px black;">
                    <div class="card-header bg-primary text-white" style="box-shadow: 0px 1px 6px 0.5px black;">
                        <h4>Edit Data
                            <a href="index.php" class="btn btn-danger float-end">Kembali</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data " action="proses_edit.php?id=$_GET['id']">

                            <!-- <label for="foto">Foto Diri</label>
                            <input type="file" id="foto" name="foto" value="<?php echo $data["foto"]; ?>" class="form-control"> -->

                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" value="<?php echo $data["nama"]; ?>" class="form-control">

                            <label for="ktp">KTP</label>
                            <input type="text" id="ktp" name="ktp" value="<?php echo $data["ktp"]; ?>" class="form-control">

                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" value="<?php echo $data["email"]; ?>" class="form-control">

                            <label for="telp">No. Telp</label>
                            <input type="text" id="telp" name="telp" value="<?php echo $data["telp"]; ?>" class="form-control">

                            <label for="alamat">Alamat</label>
                            <!-- <textarea type="text" id="alamat" name="alamat" value="<?php echo $data["alamat"]; ?>" class="form-control"></textarea> -->
                            <input class="form-control" type="text" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>">

                            <!-- <label for="rt">RT</label>
                            <input type="text" id="rt" name="rt" value="<?php echo $data["rt"]; ?>" class="form-control"> -->

                            <input class="btn btn-primary mt-3" type="submit" name="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

    if (isset($_POST['submit'])) {
        // $foto = $_POST['foto'];
        $nama = $_POST['nama'];
        $ktp = $_POST['ktp'];
        $email = $_POST['email'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];


        $sqlUPDATE = "UPDATE warga SET nama='$nama', ktp='$ktp', email='$email', telp='$telp', alamat='$alamat' WHERE id='$id'";

        $queryUPDATE = mysqli_query($conn, $sqlUPDATE);

        header("location: index.php");
    }
    ?>

</body>

</html>