<?php

include "../config.php";
$id = $_GET['id'];
$nama = $_POST['nama'];
$ktp = $_POST['ktp'];
$email = $_POST['email'];
$telp = $_POST['telp'];
$rt = $_POST['rt'];

mysqli_query($mysqli, "update identitas set nama='$nama', ktp='$ktp', email='$email', telp='$telp', rt='$rt' where id='$id' ");
