<?php
$host = "localhost";
$user = "root";
$pass = "089658902142";
$namadb = "tutorial";

$conn = mysqli_connect($host, $user, $pass, $namadb);
if (!$conn) {
	die("Error".mysqli_connect_error());
}

?>	