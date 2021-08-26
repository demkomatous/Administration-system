<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="cs">
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="Accessed/CSS/Bootstrap.css">
	<link rel="stylesheet" type="text/css" href="Accessed/CSS/login.css">
</head>
<body class="bg-dark bg-gradient">
	<div id="login">
		<h1 class="text-white-50 text-center">Login</h1>
		<form method="POST" action="Action/loginVerify.php">
			<div class="form-floating mb-3">
				<input type="text" name="name" id="name" class="form-control">
				<label for="name">Jméno</label>
			</div>
			<div class="form-floating mb-3">
				<input type="text" name="surname" id="surname" class="form-control">
				<label for="surname">Příjmení</label>
			</div>
			<div class="form-floating mb-3">
				<input type="email" name="email" id="email" class="form-control">
				<label for="email">Email</label>
			</div>
			<div class="form-floating mb-3">
				<input type="password" name="password" id="password" class="form-control">
				<label for="password">Heslo</label>
			</div>
			<div>
				<input type="submit" name="submit" value="Login" class="btn btn-info float-start">
				<p><a title="Register" href="register.php" class="link link-info float-end">Register</a></p>
			</div>
		</form>
		<?php
			if (isset($_SESSION["info"])) {
				echo $_SESSION["info"];
				unset($_SESSION["info"]);
			}
		?>
	</div>
</body>
</html>