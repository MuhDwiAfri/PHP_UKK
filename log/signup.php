<?php
session_start();
include '../config.php';


// if (isset($_POST['email'])) {

//   $email = $_POST['email'];
//   $username = $_POST['username'];
//   $name = $_POST['name'];
//   $password = $_POST['password'];
//   $role = $_POST['role'];

//   // cek apakah email sudah tersedia didatabase
//   $result = mysqli_query($conn, "SELECT * FROM login WHERE email = 'email'");

//   // jika ada maka kirimkan error
//   if (mysqli_fetch_assoc($result)) {
//     echo "<script>
// 				    alert('email sudah terdaftar!')
// 		      </script>";
//     return false;
//   }

//   // jika tidak ada hash password 
//   $password = password_hash($password, PASSWORD_DEFAULT);

//   // simpan ke database
//   mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password', '$role', '$email')");

//   // redirect ke halaman home

//   if (mysqli_affected_rows($conn) > 0) {
//     echo "<script>
// 				alert('user baru berhasil ditambahkan!');
// 			  </script>";

//     header("location:signin.php");
//   } else {
//     echo "<script>
// 				alert('user gagal ditambahkan!');
// 			  </script>";
//   }
// };

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kartar Page | Register</title>
  <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <div class="layer"></div>
  <main class="page-center">
    <article class="sign-up" style="margin: auto;">

      <form class="sign-up-form form font-weight-bold" action="" method="POST">
        <h1 class="sign-up__title">Register</h1>
        <hr style="width: 280px;">
        <label class="form-label-wrapper">
          <p class="form-label">Name</p>
          <input class="form-input" type="text" placeholder="Enter your name" required name="name">
        </label>
        <label class="form-label-wrapper">
          <p class="form-label">Username</p>
          <input class="form-input" type="username" placeholder="Enter your username name" required name="username">
        </label>
        <label class="form-label-wrapper">
          <p class="form-label">Email</p>
          <input class="form-input" type="email" placeholder="Enter your email" required name="email">
        </label>
        <label class="form-label-wrapper">
          <p class="form-label">Password</p>
          <input class="form-input" type="password" placeholder="Enter your password" required name="password">
        </label>

        <label class="form-label-wrapper">
          <p class="form-label">Role</p>
          <select name="role" class="form-input">
            <option selected value="Admin">Admin</option>
            <option value="Anggota">Anggota</option>
            <option value="Warga">Warga</option>
          </select>
        </label>

        <div>
          <span class="akun">Do you have account?</span><a class="link-info forget-link" href="./signin.php"> Login</a>
        </div>

        <!-- <label class="form-checkbox-wrapper">
          <input class="form-checkbox" type="checkbox" required>
          <span class="form-checkbox-label">Remember me next time</span>
        </label> -->
        <button type="submit" class="form-btn primary-default-btn transparent-btn">Sign in</button>
      </form>
    </article>
  </main>
  <!-- Chart library -->
  <script src="./plugins/chart.min.js"></script>
  <!-- Icons library -->
  <script src="plugins/feather.min.js"></script>
  <!-- Custom scripts -->
  <script src="js/script.js"></script>
</body>

</html>