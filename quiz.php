<?php

function render($qs, $params) {
	?>
	<form class="quiz-form">
		<?php foreach ($qs as $qi => $q) { ?>
			<div class="quiz-question">
				<div class="quiz-question-text">
					<?php echo $qi + 1; ?>.
					<?php echo $q[0]; ?>
				</div>
				<div class="quiz-options">
					<?php foreach ($q[1] as $oi => $opt) { ?>
						<div class="quiz-option">
							<?php
								$checked = isset($params["submit"]) &&
								           isset($params[$qi]) &&
										   $params[$qi] == $oi;
							?>
							<input
								class="quiz-option-radio"
								type="radio"
								name="<?php echo $qi; ?>"
								value="<?php echo $oi; ?>"
								<?php if ($checked) echo "checked" ?>
								/>
							<span class="quiz-option-text"><?php echo $opt[0]; ?></span>
						</div>
					<?php } ?>
				</div>
				<?php if (isset($params["submit"]) && !isset($params[$qi])) { ?>
					<div class="alert alert-danger quiz-error-text">You have not answered this question.</div>
				<?php } ?>
			</div>
		<?php } ?>
		<input type="hidden" name="submit" value="1"/>
		<input type="submit" value="submit" class="btn btn-primary btn-outline"/>
	</form>
	<?php
}

function calculate_score($questions, $params) {
	if (!isset($params["submit"])) return ["error", 0];

	$sum = 0;
	foreach ($questions as $qi => $q) {
		if (!isset($params[$qi])) return ["error", 0];
		$score = $q[1][$params[$qi]][1];
		$sum = $sum + $score;
	}
	return ["ok", $sum];
}

function calculate_grade($score, $gradings, $default_str) {
	foreach ($gradings as $_ => $grade) {
		list($min_value, $max_value, $grade_str) = $grade;
		if ($min_value <= $score && $score <= $max_value) {
			return $grade_str;
		}
	}
	return $default_str;
}

$questions = [
    ["1. How often do you take photo(s) of food even not all friends of you in this gathering doing so?", [
      ["Never ", 0],
      ["Sometimes ", 5],
      ["Often", 10],
			["Always", 20],
    ]],
    ["How many photo(s) of food do you take when the food is being served?", [
      ["Zero", 0],
      ["1-5 ", 5],
      ["6-10 ", 10],
			["11 - more", 20],
    ]],
    ["How often do you play voice message or games on your phone loudly without using an earphone	in the public area?", [
			["Never ", 0],
			["Sometimes ", 5],
			["Often", 10],
			["Always", 20],
		]],
		["What purpose would you use your phone while watching movie in the cinema?	", [
      ["I don't use it.", 0],
      ["Messagin app(Whatsapp, Telegram, etc)", 5],
      ["Voice service", 10],
			["Messagin app and voice service", 20],
    ]],
		["How often do you use your phone continuously in a gathering or dinning with people?", [
			["Never ", 0],
			["Sometimes ", 5],
			["Often", 10],
			["Always", 20],
		]],
		["How often do you texting people or play games	when you are walking in the street?", [
			["Never ", 0],
			["Sometimes ", 5],
			["Often", 10],
			["Always", 20],
		]],
		["How long do you use your phone daily?", [
      ["0 - 1 hour", 0],
      ["2 - 3 hours", 5],
      ["4 - 5 hours", 10],
			["More than 5 hours", 20],
    ]],
		["How often do your family wait for you to start dining when you are using your phone?", [
			["Never ", 0],
			["Sometimes ", 5],
			["Often", 10],
			["Always", 20],
		]],
		["How often do you use your phone when you are driving?", [
			["Never ", 0],
			["Sometimes ", 50],
			["Often", 101],
			["Always", 151]
		]],
		["Do you think the way that you use your phone affect the relationship with friend/family?", [
      ["No", 0],
      ["Slightly", 5],
      ["Moderate", 10],
			["Seriously", 20],
    ]]

];

$gradings = [
	[0, 49, "You are not cellfish at all."],
	[50, 100, "You are quite cellfish sometimes."],
	[101, 150, "You are annoying when you are being cellfish."],
	[151, 331, "Come on, buddy. You should probably not use your phone again."]
];




?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html>
	<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>The cellfish quiz</title>
		<?php require_once "asset/header.html"; ?>
		<style>
		html{
			position:relative;
		}
h1 {
	font-family: "Playfair Display", serif;
	font-weight: 700;
    // font-style: italic;
}

.quiz-option {
	display: flex;
	align-items: center;
	margin-top: 4px;
	margin-left: 10px;
	line-height: 1.4;
}

.quiz-option-text {
	margin-left: 10px;
}

.quiz-question {
	margin-bottom: 25px;
}

.quiz-question-text {
	font-size: 25px;
	font-weight: bold;
	line-height: 1.0;
}

.quiz-error-text {
	margin-top: 20px;
}

.quiz-container {
	width: 800px;
	margin: 0 auto;
	margin-top: 90px;
	margin-bottom: 90px;

}

		</style>


	</head>
	<body>
	<?php require_once "asset/navbar.html"?>
		<div class="container">
				<div class ="quiz-container">
					<?php
						list($status, $score) = calculate_score($questions, $_GET);
						if ($status === "ok") {
							?>
							<h1>Cellfish Quiz Result</h1>
							<p>
								<?php
									if($score < 50){
								?>
									<img src="result.png" alt="result"/>
								<?php
									}else if($score < 101){
								?>
									<img src="result2.png" alt="result"/>
								<?php
									}else if($score < 151){
								?>
									<img src="result3.png" alt="result"/>
								<?php
									}else{
								?>
									<img src="result4.png" alt="result"/>
							<?php } ?>
							</p>

                           <div class"result" align="center">
                                <p>
                                    <?php echo calculate_grade($score, $gradings, "ERROR NOT FOUND"); ?>
                                </p>
                            </div>
							<form class="quiz-form">
								<div class="back" align="right">
									<input type="submit" value="back" class="btn btn-primary btn-outline">
								</div>
							</form>
							<?php
						} else {
							?>
							<h1>Cellfish Quiz</h1>
							<p>a cellfish uses a mobile phone in a way that disregards the wishes of other people.</p>
							<?php
							render($questions, $_GET);
						}
					?>
			</div>
		<?php require_once "asset/footer.html"?>
	</body>
</html>
