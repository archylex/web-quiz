var num = "";
var score = 0;
var questions = 3;

$(document).ready(function() {
	$("#quiz_form").hide();
	$("#result_form").hide();

	$("#start_button").click(function() {
		$("#quiz_button").hide();		
		$("#quiz_form").show();
		getQuestion();
	});

	$("#next_question").click(function() {
		checkAnswer();
	});
});

function checkAnswer() {
	var answer = $("input[name='answer']:checked").val();
	var question = $("input[name='question']").val();

	$.post("check_answer.php", {
		a : answer,
		q : question
	},
	function(data) {
		data == true ? score++ : alert("WRONG!");
		questions--;
		questions > 0 ? getQuestion() : getResult();
	}, 'json');
}

function getQuestion() {
	var new_num = num;
	
	if (new_num != "" || new_num != null) {
		new_num = new_num.substring(1, new_num.length);
	}

	$.post("get_question.php", {		
		num : new_num
	}, 
	function(data) {
		$("#theAnswer").html("<b>" + data[1] + "</b>");
		$("#theA").html(data[2]);
		$("#theB").html(data[3]);
		$("#theC").html(data[4]);
		$("#theD").html(data[5]);
		$("input[name='question']").val(data[0]);
		num += "|" + data[0];
	}, 'json');
}

function getResult() {
	$("#result_score").html("<b>" + score + "</b>");
	$("#quiz_form").hide();
	$("#result_form").show();
}