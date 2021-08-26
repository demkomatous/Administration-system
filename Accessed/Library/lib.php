<?php
//Procedures

	/*
	Functions:
		- Generating table with informations
			- ID
			- Name
			- Surname
			- Time
		- Generating links for edit and delete

	Parameters:
		- $data -- including array with informations
	*/
	function vypis($data){
		echo "<table class='mb-4'>";
		echo "<tr class='border-bottom'>";
		
		echo "<td class='w-100px'>";
		echo "ID";
		echo "</td>";
		
		echo "<td class='w-100px'>";
		echo "Jméno";
		echo "</td>";

		echo "<td class='w-100px'>";
		echo "Příjmení";
		echo "</td>";

		echo "<td class='w-200px'>";
		echo "Čas zadání";
		echo "</td>";

		echo "</tr>";
		foreach ($data as $key => $value) {
			echo "<tr>";
			echo "<td>".$value["ID"]."</td>";
			echo "<td>".$value["name"]."</td>";
			echo "<td>".$value["surname"]."</td>";
			echo "<td>".$value["time"]."</td>";
			echo "<td><a href='Action/deleter.php?ID=".$value["ID"]."' title='smazat' class='me-4 text-white-50'>Smazat</a></td>";
			echo "<td><a href='edit.php?ID=".$value["ID"]."' title='smazat' class='text-white-50'>Upravit</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	}

	/*
	Functions:
		- Generating style for current page
	*/
	function style(){
		if (isset($_GET["page"]) && is_numeric($_GET["page"])) {
			$getPage = $_GET["page"];
		}
		else {
			$getPage = 0;
		}
		echo "<style>";
		echo "#li".$getPage."nk{color: #0DCAF0 !important;}";
		echo "</style>";
	}

	/*
	Functions: 
		- Making refill or pre-fill input

	Parameters:
		- $input -- including name of SESSION
			- session name is same as input
	*/
	function inputControl($input){
		if (!empty($_SESSION[$input])) {
			echo "value='".$_SESSION[$input]."'";
		} else {
			echo "placeholder=".$input;
		}
	}

//Functions

	/*
	Functions:
		- Verifying if user was logged
	*/
	function verifyAccess() {
		if (empty($_SESSION["Access"]) || !is_numeric($_SESSION["Access"])) {
			$_SESSION["info"] = "<p>Access denied</p>";
			header("location: /index.php");
			exit();
		}
	}
?>