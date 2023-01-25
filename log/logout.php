<?php
include '../config.php';

$logout = $_GET['id'];
$delete = "DELETE * FROM login WHERE id='$logout'";
mysqli_query($conn, $delete);

header("location: signin.php");
