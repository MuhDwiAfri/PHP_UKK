<?php

require_once '../config.php';

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $result = mysqli_query($conn, "SELECT * FROM login WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
				    alert('email sudah terdaftar!')
		      </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO login VALUES('', '$name','$username', '$password', '$role', '$email')");

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>
				alert('user baru berhasil ditambahkan!');
                header ('location: register.php');
			  </script>";

        header("location:index.php");
    } else {
        echo "<script>
				alert('user gagal ditambahkan!');
			  </script>";
    }
};

?>

<!DOCTYPE html>
<html>

<head>
    <title>Kartar Page | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
        <form class="border shadow p-3 rounded" action="" method="post" style="width: 450px;">
            <h1 class="text-center p-3">Register</h1>
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Example">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">User name</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Example1000">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Example@gmail.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="123Example">
            </div>
            <div class="mb-1">
                <label class="form-label">Role :</label>
            </div>
            <select class="form-select mb-3" name="role" aria-label="Default select example">
                <option selected value="admin">Admin</option>
                <option value="anggota">Anggota</option>
                <option value="warga">Warga</option>
            </select>

            <span class="tombol">Sudah punya akun? <a href="index.php" style="text-decoration: none;">Login</a></span>
            <div>

                <input type="submit" class="tombol_login" value="Register" name="submit">
            </div>
        </form>
    </div>
</body>