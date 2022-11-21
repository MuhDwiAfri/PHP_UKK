<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/1.css" class="css">
    <title>Register Form | Kartar</title>
</head>

<body>
    <div class="container">
        <div class="register">
            <form action="">
                <h1>Register</h1>
                <hr>
                <p>Karang Taruna RT 13</p>
                <label for="">Nama</label>
                <input type="text" placeholder="Masukkan Nama Lengkap">
                <label for="">Username</label>
                <input type="text" placeholder="Masukkan Nama Inisial Anda">
                <label for="">E-mail</label>
                <input type="Email" placeholder="Masukkan Email Anda">
                <label for="">Password</label>
                <input type="password" placeholder="Password">
                <label for="">Role</label>
                <select name="role">
                    <option value="admin">Admin</option>
                    <option value="user">Anggota</option>
                    <option value="warga">Warga</option>
                </select>
                <button>Login</button>
                <p>
                    <a href="index.php">Back Login</a>
                </p>
            </form>
        </div>
        <div class="right">
            <!-- <img src="css/revisi.png" alt=""> -->
        </div>
    </div>
</body>

</html>