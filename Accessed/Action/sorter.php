<?php
	include_once "../Library/db.php";
	include_once "../Library/lib.php";
	
	session_start();
	verifyAccess();

//Get data from POST
	if (isset($_POST["radit"])) {
		if ($_POST["radit"] == "ID") {
			$sortBy = "ID";
		}
		elseif ($_POST["radit"] == "name") {
			$sortBy = "name";
		}
		elseif ($_POST["radit"] == "surname") {
			$sortBy = "surname";
		}
		elseif ($_POST["radit"] == "time") {
			$sortBy = "time";
		}
	}
	else{
		$sortBy = "ID";
	}
	if (isset($_POST["Reset"])) {
		unset($_SESSION["sortAs"]);
		unset($_SESSION["sortBy"]);
	}

	if (isset($_POST["jak"])) {
		if ($_POST["jak"] == "ASC") {
			$sortAs = "ASC";
		}
		elseif ($_POST["jak"] == "DESC") {
			$sortAs = "DESC";
		}
	}
	else{
		$sortAs = "ASC";
	}

//Link for redirect
	if (isset($_GET["page"]) && is_numeric($_GET["page"]) && $_GET["page"] <= $count && $_GET["page"] >= 0) {
		$getPage = $_GET["page"];
	}
	else{
		$getPage = 0;
	}

	$_SESSION["sortBy"] = $sortBy;
	$_SESSION["sortAs"] = $sortAs;

//Redirect
	$href = $_SESSION["page"];
	header("location: ../index.php?page=$href");
?>