<?php  
	include_once "../Accessed/Library/db.php";
	include_once "../Library/hash.php";

	session_start();
//Setting and verifying variables
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
		$password = customHash($password);
	} else {
		$password = null;
	}

//If is all right find user and save his ID into session
	if (!empty($name) && !empty($surname) && !empty($password) && !empty($email)) {
		$select = array(
			':name' => $name, 
			':surname' => $surname,
			':email' => $email,
			':password' => $password,
		);
		$sql_access = "SELECT * FROM User_access WHERE name = :name AND surname = :surname AND email = :email AND password = :password LIMIT 0,1";

		$sql_cmd_access = $db->prepare($sql_access);
		$sql_cmd_access->execute($select);
		$data = $sql_cmd_access->fetchAll(PDO::FETCH_ASSOC);

		foreach ($data as $key => $value) {
			$_SESSION["Access"] = $value["ID"];
		}
		if (!empty($_SESSION["Access"]) && is_numeric($_SESSION["Access"])) {
		//Redirect
			header("location: ../Accessed/index.php");
		} else {
			$_SESSION["info"] = "<p class='alert alert-danger' role='alert'>Access denied</p>";
		//Redirect
			header("location: ../index.php");
		}
	} else {
		$_SESSION["info"] = "<p class='alert alert-danger' role='alert'>Access denied</p>";
	//Redirect
		header("location: ../index.php");
	}
?>