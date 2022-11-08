<?php

include "../config.php";
$id = $_GET['id_anggota'];
$nama = $_POST['nama_anggota'];
$email = $_POST['email'];
$telp = $_POST['telp_anggota'];

mysqli_query($mysqli, "update identitas set nama_anggota='$nama', email='$email', telp_anggota='$telp' where id_anggota='$id' ");
