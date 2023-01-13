<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elegant Dashboard | Sign In</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <div class="layer"></div>
  <main class="page-center">
    <article class="sign-up">
      <!-- <p class="sign-up__subtitle">Sign in to your account to continue</p> -->
      <form class="sign-up-form form" action="" method="">
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
        <button class="form-btn primary-default-btn transparent-btn">Sign in</button>
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