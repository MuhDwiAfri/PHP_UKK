<?php

include "../config.php";
$id = $_GET['id'];
$nama = $_POST['nama'];
$ktp = $_POST['ktp'];
$email = $_POST['email'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];

mysqli_query($mysqli, "update identitas set nama='$nama', ktp='$ktp', email='$email',  telp='$telp', alamat='$alamat',  where id='$id' ");
