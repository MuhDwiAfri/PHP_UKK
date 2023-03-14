<?php

include "../config.php";
$id = $_GET['id'];
$nama = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];
$role = $_POST['role'];

mysqli_query($mysqli, "update identitas set name='$nama',  username='$username',  email='$email', password='$pass', role='$role' where id='$id' ");
