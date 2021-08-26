<?php
	function fillForm($type){
		if (!empty($_SESSION[$type])) {
			echo $_SESSION[$type];
		} else {
			echo $type;
		}
	}
?>