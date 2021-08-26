<?php 
	include_once "../Library/db.php";
	include_once "../Library/lib.php";

	session_start();
	verifyAccess();

//Get data from form
	if (isset($_POST["name"]) && is_string($_POST["name"]) && !preg_match( '/(users|DELETE|DROP|TABLE)/', $_POST["name"])) {
		$name = $_POST["name"];
	} else {
		$name = null;
	}

	if (isset($_POST["surname"]) && is_string($_POST["surname"]) && !preg_match( '/(users|DELETE|DROP|TABLE)/', $_POST["surname"])) {
		$surname = $_POST["surname"];
	} else {
		$surname = null;
	}

//Insert data
	if (!empty($name) && !empty($surname)) {
		$insert = array(
			':name' => $name,
			':surname' => $surname, 
		);

		$sql_insert = "INSERT INTO users (`name`, `surname`) VALUES (:name, :surname)";

		$sql_cmd_insert = $db->prepare($sql_insert);
		$sql_cmd_insert->execute($insert);

		$_SESSION["info"] = "<p class='alert alert-success' role='alert'>vloženo</p>";
	} else {
		$_SESSION["info"] = "<p class='alert alert-danger' role='alert'>Nebyly správně zadané hodnoty.</p>";
		$_SESSION["name"] = $name;
		$_SESSION["surname"] = $surname;
	}

//Redirect
	$href = $_SESSION["page"];
	header("location: ../index.php?page=$href");
?> 