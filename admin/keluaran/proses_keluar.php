<?php

include "../config.php";
$id_keluar = $_GET['id_keluar'];
$sumber = $_POST['sumber'];
$jumlah = $_POST['jumlah'];
$tanggal_keluar = $_POST['tanggal_keluar'];
$keterangan = $_POST['keterangan'];


mysqli_query($mysqli, "update identitas set sumber='$sumber', jumlah='$jumlah', tanggal_keluar='$tanggal_keluar',  keterangan='$keterangan',  where id_keluar='$id_keluar' ");
