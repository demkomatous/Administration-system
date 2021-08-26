<?php 
	function strankovani(){
		include_once "db.php";
		include_once "lib.php";

	//Data from sorter
		if (isset($_SESSION["sortBy"])) {
			$sortBy = $_SESSION["sortBy"];
		} 
		else{
			$sortBy = "ID";
		}

		if (isset($_SESSION["sortAs"])) {
			$sortAs = $_SESSION["sortAs"];
		}
		else{
			$sortAs = "ASC";
		}

	//Total of records and distribution on pages
		$onPage = 12;

		$sql_All = "SELECT COUNT(*) FROM users";

		$sql_cmd_count = $db->prepare($sql_All);
		$sql_cmd_count->execute();
		$count = $sql_cmd_count->fetchColumn();
		
		$pages = ceil($count / $onPage);

	//Get from URL
		if (isset($_GET["page"]) && is_numeric($_GET["page"]) && $_GET["page"] <= $pages && $_GET["page"] > 0) {
			$_SESSION["page"] = $_GET["page"];
			$getPage = $_GET["page"] * $onPage;
		} else {
			$getPage = 0;
			$_SESSION["page"] = $getPage;
		}

	//Download informations
		if ($getPage || $getPage == 0) {
			$sql_select = "SELECT * FROM users ORDER BY ".$sortBy." ".$sortAs." LIMIT ".$getPage.",".$onPage;

			$sql_select_cmd = $db->prepare($sql_select);
			$sql_select_cmd->execute();

			$onPageData = $sql_select_cmd->fetchAll(PDO::FETCH_ASSOC);

			vypis($onPageData);
		}

	//Links
		$onRow = 15;

		echo "<table>";
		echo "<tr>";
		for ($i=0; $i < $pages; $i++) { 
			$a = $i + 1;
			if ($i % $onRow == 0) {
				echo "</tr>";
				echo "<tr>";
			}
			echo "<td class='w-30px'>";
			echo "<a href='index.php?page=".$i."' id='li".$i."nk' class='text-white-50'>".$a."</a>";
			echo "</td>";
		}
		echo "</tr>";
		echo "</table>";
	}
?>