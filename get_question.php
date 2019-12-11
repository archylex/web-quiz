<?php
	require_once 'db.php';

	$ids = explode("|", $_REQUEST['num']);
	$query = "SELECT `ID`,`QUESTION`,`A`,`B`,`C`,`D` FROM `questions` WHERE `ID` <> 0";

	foreach ($ids as &$value) {
		if ($value != "") {			
			$query .= " AND `ID` <> $value";
		}
	}

	$query .= " ORDER BY RAND() LIMIT 1";

	$result = $mysqli->query($query);

	if ($result) {
		while ($row = $result->fetch_row()) {
			echo json_encode($row);
		}
		$result->close();
	}
?>