<?php
include '../config.php';

$id = $_GET['id'];
$sqlDelete = "DELETE FROM  warga WHERE id='$id'";
mysqli_query($conn, $sqlDelete);

header("location: index.php");
