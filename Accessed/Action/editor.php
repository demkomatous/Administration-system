<?php
	include_once "../Library/db.php";
	include_once "../Library/lib.php";
	
	session_start();
	verifyAccess();

//Set variables
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

	if (!empty($_SESSION["ID"])) {
		$ID = $_SESSION["ID"];
	} else {
		$ID = null;
	}

//Edit
	if (!empty($name) && !empty($surname) && !empty($ID)) {
		$edit = array(
			':name' => $name,
			':surname' => $surname,
			':ID' => $ID, 
		);

		$sql_edit = "UPDATE users SET name = :name, surname = :surname WHERE ID = :ID";
		$sql_cmd_edit = $db->prepare($sql_edit);
		$sql_cmd_edit->execute($edit);

		$_SESSION["info"] = "<p class='alert alert-success' role='alert'>Upraveno</p>";
	} else {
		$_SESSION["info"] = "<p class='alert alert-danger' role='alert'>Nebyly správně zadané hodnoty.</p>";
	}

//Redirect
	header('location: ../edit.php?ID='.$ID);
?>