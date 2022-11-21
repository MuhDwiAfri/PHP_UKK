<?php
include "../config.php";
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
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Data
                            <a href="index.php" class="btn btn-danger float-end">Kembali</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="add.php" method="post" enctype="multipart/form-data">

                            <!-- <label for="foto">Foto Diri</label>
                            <input type="file" id="foto" name="foto" class="form-control"> -->

                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control">

                            <label for="ktp">KTP</label>
                            <input type="text" id="ktp" name="ktp" class="form-control">

                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" class="form-control">

                            <label for="telp">No. Telp</label>
                            <input type="text" id="telp" name="telp" class="form-control">

                            <label for="alamat">Alamat</label>
                            <input type="text" id="alamat" name="alamat" class="form-control">

                            <!-- <label for="rt">RT</label>
                            <select class="form-control" name="rt">
                                <option class="text-center" value="">---Pilih RT---</option>
                                <option class="text-center">RT 01</option>
                                <option class="text-center">RT 02</option>
                                <option class="text-center">RT 03</option>
                                <option class="text-center">RT 04</option>
                                <option class="text-center">RT 05</option>
                            </select> -->

                            <input class="btn btn-success mt-3" type="submit" name="tambah" value="Tambah">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

    if (isset($_POST['tambah'])) {
        $nama = $_POST['nama'];
        $ktp = $_POST['ktp'];
        $email = $_POST['email'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];

        // foto
        // $namaFile = $_FILES['foto']['name'];
        // $size = $_FILES['foto']['size'];
        // $type = $_FILES['foto']['type'];
        // $tmpName = $_FILES['foto']['tmp_name'];

        // cek apakah tipe gambar sesuai
        // $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        // $ekstensiGambar = explode('.', $namaFile);
        // $ekstensiGambar = strtolower(end($ekstensiGambar));
        // if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        //     echo "<script>
        // 		alert('yang anda upload bukan gambar!');
        // 	  </script>";
        //     return false;
        // }

        // generate nama baru
        // $namaFileBaru = uniqid();
        // $namaFileBaru .= '.';
        // $namaFileBaru .= $ekstensiGambar;

        // move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

        $sqlInsert = "INSERT INTO warga ( nama, ktp, email, telp, alamat )
                      VALUES ( '$nama', '$ktp', '$email', '$telp', '$alamat')";

        $queryInsert = mysqli_query($conn, $sqlInsert);


        header("location: index.php");
    }
    ?>

</body>

</html>