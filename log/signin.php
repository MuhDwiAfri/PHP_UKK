<?php

?>

<!DOCTYPE html>
<html lang="en">

<!-- <?php
      if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
          echo "<div class='alert'>Username dan Password Kurang Tepat</div>";
        } else {
          header('Refresh: 1; url=signin.php');
        }
      }

      ?> -->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kartar Page | Login</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <div class="layer"></div>
  <main class="page-center">
    <article class="sign-up">
      <form class="sign-up-form form" action="cek.php" method="post">
        <h1 class="sign-up__title">Login</h1>
        <hr style="width: 280px;">
        <label class="form-label-wrapper">
          <p class="form-label">Email</p>
          <input class="form-input" type="email" placeholder="Enter your email" required>
        </label>
        <label class="form-label-wrapper">
          <p class="form-label">Password</p>
          <input class="form-input" type="password" placeholder="Enter your password" required>
        </label>
        <span class="akun">Don't have account?</span><a class="link-info forget-link" href="./signup.php"> Register</a>
        <!-- <button class="form-btn primary-default-btn transparent-btn">Sign in</button> -->
        <input type="submit" class="form-btn primary-default-btn transparent-btn" value="Login">
      </form>
    </article>
  </main>
  <?php include '../footer.php' ?>

  <!-- Chart library -->
  <script src="./plugins/chart.min.js"></script>
  <!-- Icons library -->
  <script src="plugins/feather.min.js"></script>
  <!-- Custom scripts -->
  <script src="js/script.js"></script>
</body>

</html>