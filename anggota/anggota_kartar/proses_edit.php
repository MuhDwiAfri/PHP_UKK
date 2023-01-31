<?php

include "../config.php";
$id = $_GET['id_anggota'];
$nama = $_POST['nama_anggota'];
$telp = $_POST['telp_anggota'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];

mysqli_query($mysqli, "update identitas set nama_anggota='$nama',  telp_anggota='$telp',  email='$email', alamat='$alamat', where id_anggota='$id' ");
