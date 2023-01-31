<?php
include '../config.php';

$id_keluar = $_GET['id_keluar'];
$sqlDelete = "DELETE FROM  kas_keluar WHERE id_keluar='$id_keluar'";
mysqli_query($conn, $sqlDelete);

header("location: kas_keluar.php");
