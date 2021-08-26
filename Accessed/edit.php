<?php
	include_once "Library/db.php";
	include_once "Library/lib.php";

	session_start();
	verifyAccess();

	if (is_numeric($_GET["ID"])) {
		$select = array(':ID' => $_GET["ID"], );

		$sql_select = "SELECT * FROM users WHERE ID = :ID";

		$sql_select_cmd = $db->prepare($sql_select);
		$sql_select_cmd->execute($select);

		$data = $sql_select_cmd->fetchAll(PDO::FETCH_ASSOC);
		foreach ($data as $key => $value) {
			$ID = $value["ID"];
			$name = $value["name"];
			$surname = $value["surname"];
			$time = $value["time"];
		}
	} else{
		header("location: index.php");
		exit();
	}

	if (empty($ID)) {
		header("location: index.php");
		exit();
	} else{
		$_SESSION["ID"] = $ID;
	}
?>

<!DOCTYPE html>
<html>
<head lang="cs">
	<title>Edit záznamu</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="CSS/Bootstrap.css">
	<link rel="stylesheet" type="text/css" href="CSS/login.css">
</head>
<body class="bg-dark bg-gradient text-white-50">
	<div id="upload">
		<h1 class="text-white-50 text-center">Editování záznamu</h1>
		<form method="POST" action="Action/editor.php">
			<div class="mb-3 hidden">
				<input type="hidden" name="id" id="id" value="<?php echo $ID; ?>">
				<label for="id">ID: <?php echo $ID; ?></label>
			</div>
			<div class="form-floating mb-3">
				<input type="text" id="name" class="form-control ml-4" name="name" value="<?php echo $name; ?>">
				<label for="name">Jméno: <?php echo $name; ?></label>
			</div>
			<div class="form-floating mb-3">
				<input type="text" name="surname" value="<?php echo $surname; ?>" class="form-control ml-4" id="surname" >
				<label for="surname">Příjmení: <?php echo $surname; ?></label>
			</div>
			<div>
				<input type="submit" name="submit" value="submit" class="btn btn-info float-start">
				<p><a href="index.php" title="domů" class="link link-info float-end">Domů</a></p>
			</div>
			<div class="clear"></div>
		</form>
		<?php 
			if (!empty($_SESSION["info"])) {
				echo $_SESSION["info"];
				unset($_SESSION["info"]);
			}
		?>
	</div>
</body>
</html>