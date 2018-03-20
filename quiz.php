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
    ["content of q1 aaaaa aaaaaa aaaaaa aaaaa aaaaa aaa aaaa aaaaa aaaa aaa aaa aaaaa aaaaaa aaaaa aaa aaa aaaa aaa", [
        ["option1 (1)", 1],
        ["option2 (2)", 2],
        ["option3 (3)", 3],
    ]],
    ["content of q2", [
        ["option1 (4)", 4],
        ["option2 (5)", 5],
        ["option3 (6)", 6],
    ]],
    ["content of q3", [
        ["option1 (7)", 7],
        ["option2 (8)", 8],
        ["option3 (9)", 9],
    ]],

];

$gradings = [
	[0, 10, "grade A"],
	[11, 30, "You are not cellfish"]
];




?>


<!doctype html>
<html>
	<head>
		<title>The cellfish quiz</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/index.css">
		<style>
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
	<body
		<div class="fh5co-main-nav fh5co-shadow" style="position: fixed; top: 0px; width: 100%; z-index: 99999;">
				<div class="container-fluid">
					<div class="fh5co-menu-1">
						<a href="index.php" data-nav-section="home">Home</a>
						<a href="about.php" data-nav-section="about">About</a>
					</div>
					<div class="fh5co-logo">
						<a href="index.php">Cellfish</a>
					</div>
					<div class="fh5co-menu-2">
						<a href="news.php" data-nav-section="features">News</a>
						<a href="games.php" data-nav-section="menu" class="active">Game</a>
					</div>
				</div>
				
		</div>
		<main class="quiz-container">
		
		<?
		list($status, $score) = calculate_score($questions, $_GET);
		if ($status === "ok") {
			?>
			<h1>Cellfish Quiz Result</h1>
			<p><?php echo calculate_grade($score, $gradings, "ERROR NOT FOUND"); ?></p>
			<form>
				<input type="submit" value="back" class="btn btn-primary btn-outline">
			</form>
			<?php
		} else {
			?>
			<h1>Cellfish Quiz</h1>
			<p>blah blah blah blah blah blah blah blah blah blah
			blah blah blah blah blah blah blah blah blah blah blah</p>
			<?php
			render($questions, $_GET);
		}
		?>
		</main>
	</body>
</html>