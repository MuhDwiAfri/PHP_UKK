<?php
include '../config.php';

$id = $_GET['id'];
$sqlDelete = "DELETE FROM  admin_kartar WHERE id_admin='$id'";
mysqli_query($conn, $sqlDelete);

header("location: index.php");
