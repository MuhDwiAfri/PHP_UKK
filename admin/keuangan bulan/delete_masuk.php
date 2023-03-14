<?php
include '../config.php';

$id_masuk = $_GET['id_masuk'];
$sqlDelete = "DELETE FROM  kas_masuk WHERE id_masuk='$id_masuk'";
mysqli_query($conn, $sqlDelete);

header("location: kas_masuk.php");
