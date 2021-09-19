<?php
	include_once "lib-Hash.php";

	if (isset($_POST["string"])) {
		$string = $_POST["string"];
		$hash = CustomHash($string);
	} else {
		$string = null;
	}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
	<title>Hash FCE</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Hashovací funkce</h1>
	<form method="POST">
		<label for="string">Zadejte řetězec:</label>
		<input id="string" type="text" name="string">
		<input type="submit" name="subit" value="Ukázat hash">
	</form>
	<?php 
		if (!empty($string)) {
			echo "<p>Hash: ".$hash." </p>";
		}
	?>
</body>
</html>