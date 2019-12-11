<!DOCTYPE html>
<html>
<head>
	<title>QUIZ</title>
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="http://www.google.com/jsapi"></script>
	<script type="text/javascript">google.load("jquery", "1.4.0")</script>
	<script type="text/javascript" src="quiz.js"></script>
</head>
<body>
	<div class="skinform">
		<div id="quiz_button">
			<input type="submit" value="START" id="start_button" class="butn">		
			<input type="submit" value="ADD" class="butn" onclick="window.location = 'add.php';">	
		</div>

		<div id="quiz_form">
			<p id="theAnswer"><b></b></p>
			<input type="hidden" name="question" value="">
			<input type="radio" name="answer" value="1"> <span id="theA"></span><br>
			<input type="radio" name="answer" value="2"> <span id="theB"></span><br>
			<input type="radio" name="answer" value="3"> <span id="theC"></span><br>
			<input type="radio" name="answer" value="4"> <span id="theD"></span><br>
			<input type="submit" value="NEXT" id="next_question" class="butn">		
		</div>

		<div id="result_form">
			<h2> Your result </h2>
			<h1 id="result_score"></h1>
		</div>
	</div>
</body>
</html>