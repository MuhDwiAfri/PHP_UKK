<?php

include "../config.php";
$id_masuk = $_GET['id_masuk'];
$sumber = $_POST['sumber'];
$jumlah = $_POST['jumlah'];
$tanggal_masuk = $_POST['tanggal_masuk'];
$keterangan = $_POST['keterangan'];


mysqli_query($mysqli, "update identitas set sumber='$sumber', jumlah='$jumlah', tanggal_masuk='$tanggal_masuk',  keterangan='$keterangan',  where id_masuk='$id_masuk' ");
