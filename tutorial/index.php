<?php
error_reporting(0);
session_start();
if($_SESSION['level']=="admin") {
    header("Location: admin/index.php");
}

elseif ($_SESSION['level']=="petugas") {
    header("Location: petugas/index.php");
}


?>  
<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: Noob Programmer::</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/authentication.css">
    <link rel="stylesheet" href="assets/css/color_skins.css">
</head>

<body class="theme-orange">
<div class="authentication">
    <div class="card">
        <div class="body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header slideDown">
                        <div class="logo"><img src="assets/images/logo.png" alt="Nexa"></div>
                        <h1>Noob Programmer</h1>
                        <ul class="list-unstyled l-social">
                            <li><a href="#"><i class="zmdi zmdi-facebook-box"></i></a></li>
                            <li><a href="#"><i class="zmdi zmdi-linkedin-box"></i></a></li>                            
                            <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                        </ul>
                    </div>                        
                </div>
                <form action="proses.php" method="post" class="col-lg-12">
                    <h5 class="title">Sign in to your Account</h5>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="username" class="form-control" required>
                            <label class="form-label">Username</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" name="password" class="form-control" required>
                            <label class="form-label">Password</label>
                        </div>
                    </div>  
                <div class="col-lg-12">
                    <button type="submit" value="Login" name="login" class="btn btn-raised btn-primary waves-effect">SIGN IN</button>
                    <button href="#" class="btn btn-raised btn-default waves-effect">SIGN UP</button>                        
                </div>
                </form>
                <div class="col-lg-12 m-t-20">
                    <a class="" href="forgot.php">Forgot Password?</a>
                </div>                    
            </div>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="assets/bundles/libscripts.bundle.js"></script>    
<script src="assets/bundles/vendorscripts.bundle.js"></script>
<script src="assets/bundles/mainscripts.bundle.js"></script>
</body>
</html>