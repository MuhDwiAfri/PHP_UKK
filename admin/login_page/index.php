<!DOCTYPE html>
<html>

<head>
	<title>Kartar Page | Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
		<form class="border shadow p-3 rounded" action="cek_login.php" method="post" style="width: 450px;">
			<h1 class="text_login">LOGIN</h1>

			<div class="mb-3">
				<label for="username" class="form-label">User name</label>
				<input type="text" class="form-control" name="username" id="username" required>
			</div>
			<div class="mb-3">
				<label for="password" class="form-label">Password</label>
				<input type="password" name="password" class="form-control" id="password" required>
			</div>

			<span class="tombol">Tidak punya akun? <a href="register.php" style="text-decoration: none;">Register</a></span>
			<div>
				<input type="submit" class="tombol_login" value="LOGIN">
			</div>
		</form>
	</div>
</body>

</html>