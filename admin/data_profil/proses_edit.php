<?php

include "../config.php";
$id = $_GET['id'];
$nama = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
mysqli_query($mysqli, "update identitas set name ='$nama',  username='$username',  email='$email', where id='$id' ");
