<?php
include '../config.php';

$id = $_GET['id'];
$sqlDelete = "DELETE FROM  anggota WHERE id_anggota='$id'";
mysqli_query($conn, $sqlDelete);

header("location: index.php");
