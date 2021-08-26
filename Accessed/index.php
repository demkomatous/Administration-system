<?php
	include_once "Library/strankovani.php";
	include_once "Library/lib.php";

	session_start();
	verifyAccess();
?>
<!DOCTYPE html>
<html lang="cs">
<head>
	<title>Stránkování a správa tabulky</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="CSS/Bootstrap.css">
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<?php 
		style();
	?>
</head>
<body class="bg-dark bg-gradient text-white-50 m-3">
	<h1>Stránkování a správa tabulky</h1>
	<form method="POST" action="Action/logout.php" class="mb-4">
		<input type="submit" name="submit" value="Odhlásit" class="btn btn-info">
	</form>
	<h2>Řazení záznamů</h2>
	<div>
		<form method="POST" action="Action/sorter.php">
			<div class="input-group mb-1 w-350px">
				<div class="input-group-prepend">
					<label for="radit" class="w-150px input-group-text">Řadit podle</label>
				</div>
				<select name="radit" id="radit" class="form-select">
					<option value="ID">Pořadové číslo</option>
					<option value="name">Jméno</option>
					<option value="surname">Příjmení</option>
					<option value="time">Času zadání</option>
				</select>
			</div>
			<div class="input-group mb-3 w-350px">
				<div class="input-group-prepend">
					<label for="jak" class="w-150px input-group-text">Jak</label>
				</div>
				<select name="jak" id="jak" class="form-select">
					<option value="ASC">Vzestupně</option>
					<option value="DESC">Sestupně</option>
				</select>
			</div>
			<div>
				<input type="submit" name="Hledat" value="Hledat" class="float-start btn btn-info me-3 mt-2 mb-4">
			</div>
		</form>

		<form method="POST" action="Action/sorter.php">
			<input type="submit" name="Reset" value="Reset" class="float-start btn btn-info mt-2 mb-4">
		</form>
	</div>
	<div class="clear"></div>

	<h2>Přidávání záznamů</h2>
	<form method="POST" action="Action/inserter.php">
		<div class="input-group mb-1 w-350px">
			<div class="input-group-prepend">
				<label for="name" class="w-150px input-group-text">Jméno</label>
			</div>
			<input type="text" name="name" <?php inputControl("name");?> class="form-control w-200px">
		</div>
		<div class="input-group mb-3 w-350px">
			<div class="input-group-prepend">
				<label for="surname" class="w-150px input-group-text">Příjmení</label>
			</div>
			<input type="text" name="surname" <?php inputControl("surname");?> class="form-control w-200px">
		</div>
		<div>
			<input type="submit" name="Vložit" value="Vložit" class="btn btn-info mb-4">
		</div>
	</form>

	<h2>Mazání záznamů</h2>
	<form method="POST" action="Action/deleter.php">
		<div class="input-group mb-1 w-350px">
			<div class="input-group-prepend">
				<label for="ID" class="w-150px input-group-text">ID</label>
			</div>
			<input type="number" name="ID" placeholder="ID oběti" class="form-control w-200px">
		</div>

		<div class="input-group mb-1 w-350px">
			<div class="input-group-prepend">
				<label for="name" class="w-150px input-group-text">Jméno</label>
			</div>
			<input type="text" name="name" placeholder="Jméno oběti" class="form-control w-200px">
		</div>
		<div class="input-group mb-3 w-350px">
			<div class="input-group-prepend">
				<label for="surname" class="w-150px input-group-text">Příjmení</label>
			</div>
			<input type="text" name="surname" placeholder="Příjmení oběti"class="form-control w-200px">
		</div>
		<div>
			<input type="submit" name="Smazat" value="Smazat" class="btn btn-info mb-4">
		</div>
	</form>

	<?php
		if (isset($_SESSION["info"])) {
			echo $_SESSION["info"];
		}
		unset($_SESSION["info"]);

		strankovani();
	?>
</body>
</html>