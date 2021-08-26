<?php 
	include_once "../Library/db.php";
	include_once "../Library/lib.php";

	session_start();
	verifyAccess();

//Variable for button
	if (isset($_GET["ID"]) && is_numeric($_GET["ID"])) {
		$getID = $_GET["ID"];
	} else {
		$getID = null;
	}

//Verify data from form
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

	if (isset($_POST["ID"]) && is_numeric($_POST["ID"])) {
		$ID = $_POST["ID"];
	} else {
		$ID = null;
	}

//Search, delete, verify
	if (!empty($name) || !empty($surname) || !empty($ID) || !empty($getID)) {
	//First data count
		$sql_count_before = "SELECT COUNT(*) FROM users";

		$sql_cmd_count_before = $db->prepare($sql_count_before);
		$sql_cmd_count_before->execute();
		$countBefore = $sql_cmd_count_before->fetchColumn();

	//Deleting
		$delete = array(
			':name' => $name,
			':surname' => $surname, 
			':ID' => $ID, 
			':getID' => $getID, 
		);

		$sql_delete = "DELETE FROM users WHERE ID = :getID || ID = :ID || name = :name || surname = :surname";

		$sql_cmd_delete = $db->prepare($sql_delete);
		$stav = $sql_cmd_delete->execute($delete);

	//Second data count
		$sql_count_after = "SELECT COUNT(*) FROM users";

		$sql_cmd_count_after = $db->prepare($sql_count_after);
		$sql_cmd_count_after->execute();
		$countafter = $sql_cmd_count_after->fetchColumn();

	//Verify if deleted
		if ($countBefore == $countafter) {
			$stav = 0;
		} else{
			$stav = 1;
		}
	} else {
		$stav = 0;
	}

	if ($stav) {
		$_SESSION["info"] = "<p class='alert alert-success' role='alert'>Smazáno</p>";
	} else {
		$_SESSION["info"] = "<p class='alert alert-danger' role='alert'>Daný záznam nenalezen.</p>";
	}

//Redirect
	$href = $_SESSION["page"];
	header("location: ../index.php?page=$href");
?>