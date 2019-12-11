<!DOCTYPE html>
<html>
<head>
	<title>Add question</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php
	function insertQuestion($question, $answer, $a, $b, $c, $d) {		
		require_once 'db.php';

		$question = $mysqli->escape_string($question);
		$answer = $mysqli->escape_string($answer);
		$a = $mysqli->escape_string($a);
		$b = $mysqli->escape_string($b);
		$c = $mysqli->escape_string($c);
		$d = $mysqli->escape_string($d);

		$query = "CREATE TABLE IF NOT EXISTS `questions` (
  			`ID` INT(11) NOT NULL auto_increment,   
  			`QUESTION` CHAR(255) NOT NULL,       
  			`ANSWER` INT(1)  NOT NULL,     
  			`A`  CHAR(255) NULL,
  			`B`  CHAR(255) NULL,
  			`C`  CHAR(255) NULL,
  			`D`  CHAR(255) NULL,
   			PRIMARY KEY  (`ID`)
		);";

		if ( $mysqli->query($query) ) {
			$query = "INSERT INTO `questions` (`QUESTION`, `ANSWER`, `A`, `B`, `C`, `D`) VALUES ('$question','$answer','$a', '$b','$c', '$d');";			
			if ( $mysqli->query($query) )
				return true;
			else 
				return false;
		}
	}
	
	if (!empty($_POST['question']) && !empty($_POST['answer']) && !empty($_POST['a']) && !empty($_POST['b']) && !empty($_POST['c']) && !empty($_POST['d'])) {
		$res = insertQuestion($_POST['question'],$_POST['answer'],$_POST['a'],$_POST['b'],$_POST['c'],$_POST['d']);
		if ($res)
			echo "<script>alert('Question was added!')</script>";
		else
			echo "<script>alert('Question wasn't added!')</script>";		
	}

	?>

	<form method="post" action="#" class="skinform">
	<p> Question </p>
	<input type="text" name="question"><br>
	<p> A </p>
	<input type="text" name="a"><input type="radio" name="answer" value="1" checked="checked"><br>
	<p> B </p>
	<input type="text" name="b"><input type="radio" name="answer" value="2"><br>
	<p> C </p>
	<input type="text" name="c"><input type="radio" name="answer" value="3"><br>
	<p> D </p>
	<input type="text" name="d"><input type="radio" name="answer" value="4"><br>
	<input type="submit" value="add" class="butn">
	<form>
</body>
</html>