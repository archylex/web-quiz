<?php
	function checkData($a, $q) {
		require_once 'db.php';
		$question = $mysqli->escape_string($q);
		$answer = $mysqli->escape_string($a);
		$query = "SELECT 1 FROM `questions` WHERE `ID`='$question' AND `ANSWER`='$answer';";
		$result = $mysqli->query($query);
		if ($result) {
			if ($result->num_rows === 0) 
				return false;			
			else
				return true;
			$result->close();
		}
		return false;
	}

	echo json_encode(checkData($_REQUEST['a'], $_REQUEST['q']));
?>