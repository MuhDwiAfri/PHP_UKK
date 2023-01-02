<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:600,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

</head>

<body style="background-image: linear-gradient(#03045e, #0077b6);min-height: 100vh;">

    <div id="login-card">
        <!-- class="card" style="background-color: #01a2ff;" -->
        <div class="card-body">
            <h2 class="text-center" id="judul">Register form</h2>
            <form action="/action_page.php">
                <div class="form-group">
                    <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                </div>
                <div class="form-group">
                    <select name="option" class="form-control">
                        <option value="Admin">Admin</option>
                        <option value="Angggota">Anggota</option>
                        <option value="Warga">Warga</option>
                    </select>
                </div>
                <button type="submit" id="button" class="btn btn-primary deep-purple btn-block ">Submit</button>
                <br>
                <div class="text-center">
                    <span>Sudah Ada Akun?<a class="text" href="index.php"> Kembali Disini!</a></span>
                </div>

                <!-- <div id="btn" class="text-center">
                    <button type="button" class="btn btn-primary btn-circle btn-sm"><i class="fa fa-facebook"></i></button>
                    <button type="button" class="btn btn-danger btn-circle btn-sm"><i class="bi bi-google"></i></button>
                    <button type="button" class="btn btn-info btn-circle btn-sm"><i class="fa fa-twitter"></i></button>
                </div> -->

            </form>
        </div>
        <div>

</body>

</html>