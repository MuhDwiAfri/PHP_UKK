<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Kartar </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <style>
        body {
            background: url(css/wayang.jpeg);
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

</head>

<body class="min-vh-100">

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="card rounded rounded-3" style="max-width: 800px;">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6 px-3">
                        <h1 class="mt-3 text-center"><b>LOGIN</b></h1>
                        <b>
                            <hr style="border-top: solid yellow;">
                        </b>
                        <p class="mb-3 text-center">Karang Taruna Jaya</p>

                        <form class="mb-3" action="cek_login.php" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label"><b>Email</b></label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label"><b>Password</b></label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" class="btn btn-warning w-100" name="submit">Submit</button>
                        </form>

                        <div class="text-center">
                            <p>Belum punya akun? <a href="register.php">Daftar!</a></p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-none d-md-block">
                        <img src="css/revisi.png" alt="Login Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>