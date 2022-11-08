<?php
include "../config.php";

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM anggota where id_anggota=$id");
$data = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Data Anggota</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md12">
                <div class="card" style="box-shadow: 0px 0.5px 6px 0.5px black;">
                    <div class="card-header bg-primary text-white" style="box-shadow: 0px 1px 6px 0.5px black;">
                        <h4>Edit Data Anggota
                            <a href="index.php" class="btn btn-danger float-end">Kembali</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data " action="proses_edit.php?id=$_GET['id']">

                            <!-- <label for="foto">Foto Diri</label>
                            <input type="file" id="foto" name="foto" value="<?php echo $data["foto"]; ?>" class="form-control"> -->

                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama_anggota" value="<?php echo $data["nama_anggota"]; ?>" class="form-control">

                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" value="<?php echo $data["email"]; ?>" class="form-control">

                            <label for="telp">No. Telp</label>
                            <input type="text" id="telp" name="telp_anggota" value="<?php echo $data["telp_anggota"]; ?>" class="form-control">

                            <label for="alamat">Alamat</label>
                            <input class="form-control" type="text" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>">

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
        $nama = $_POST['nama_anggota'];
        $email = $_POST['email'];
        $telp = $_POST['telp_anggota'];
        $alamat = $_POST['alamat'];


        $sqlUPDATE = "UPDATE anggota SET nama_anggota='$nama', email='$email', telp_anggota='$telp', alamat='$alamat' WHERE id_anggota='$id'";

        $queryUPDATE = mysqli_query($conn, $sqlUPDATE);

        header("location: index.php");
    }
    ?>

</body>

</html>