<?php

include "../config.php";
$id = $_GET['id_admin'];
$nama = $_POST['nama_admin'];
$telp = $_POST['telp_admin'];
$email = $_POST['email'];

mysqli_query($mysqli, "update identitas set nama_admin='$nama',  telp_admin='$telp',  email='$email', where id_admin='$id' ");
