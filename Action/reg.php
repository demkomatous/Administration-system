<?php 
	include_once "../Accessed/Library/db.php";

	session_start();

//Get informations from form
	if (isset($_POST["name"]) && is_string($_POST["name"]) && !preg_match( '/(User_access|DELETE|DROP|TABLE)/', $_POST["name"])) {
		$name = $_POST["name"];
	} else {
		$name = null;
	}

	if (isset($_POST["surname"]) && is_string($_POST["surname"]) && !preg_match( '/(User_access|DELETE|DROP|TABLE)/', $_POST["surname"])) {
		$surname = $_POST["surname"];
	} else {
		$surname = null;
	}

	if (isset($_POST["email"]) && !preg_match( '/(User_access|DELETE|DROP|TABLE)/', $_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$email = $_POST["email"];
	} else {
		$email = null;
	}

	if (isset($_POST["password"]) && is_string($_POST["password"]) && !preg_match( '/(User_access|DELETE|DROP|TABLE)/', $_POST["password"])) {
		$password = $_POST["password"];
	} else {
		$password = null;
	}

	if (isset($_POST["chckPassword"]) && is_string($_POST["chckPassword"]) && !preg_match( '/(User_access|DELETE|DROP|TABLE)/', $_POST["password"])) {
		$chckPassword = $_POST["chckPassword"];
	} else {
		$chckPassword = null;
	}

//Insert data
	if (!empty($name) && !empty($surname) && !empty($email) && $password == $chckPassword) {
		if (strlen($password) < 7) {
			$_SESSION["info"] = "<p>Heslo musí mít nejméně 7 znaků</p>";
			header('location: ../register.php');
			exit();
		}
//Hash password
		$password = hash("sha512", $password);
//Existence of login
		$select = array(
			':name' => $name,
			':surname' => $surname,
			':email' => $email,
		);

		$sql_select = "SELECT * FROM User_access WHERE name = :name AND surname = :surname AND email = :email";

		$sql_select_cmd = $db->prepare($sql_select);
		$sql_select_cmd->execute($select);

		$data = $sql_select_cmd->fetchAll(PDO::FETCH_ASSOC);

		if (count($data) != 0) {
			$_SESSION["info"] = "<p>Přihlášení již existujue</p>";
			header('location: ../register.php');
			exit();
		}

//Login
		$insert = array(
			':name' => $name,
			':surname' => $surname,
			':email' => $email,
			':password' => $password, 
		);

		$sql_insert = "INSERT INTO User_access (`name`, `surname`, `password`, `email`) VALUES (:name, :surname, :password, :email)";

		$sql_cmd_insert = $db->prepare($sql_insert);
		$sql_cmd_insert->execute($insert);

		$_SESSION["info"] = "<p class='alert alert-success' role='alert'>Registrace proběhla úspěšně.</p>";
	} else {
		$_SESSION["info"] = "<p class='alert alert-danger' role='alert'>Nebyly správně zadané hodnoty.</p>";
	}

//Redirect
	header('location: ../register.php');
?>