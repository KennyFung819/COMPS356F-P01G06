<!DOCTYPE html>
<!-- saved from url=(0035)http://192.168.99.100:8000/quiz.php -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
	<body <div="" class="fh5co-main-nav fh5co-shadow" style="position: fixed; top: 0px; width: 100%; z-index: 99999;">
				<div class="container-fluid">
					<div class="fh5co-menu-1">
						<a href="http://192.168.99.100:8000/index.php" data-nav-section="home">Home</a>
						<a href="http://192.168.99.100:8000/about.php" data-nav-section="about">About</a>
					</div>
					<div class="fh5co-logo">
						<a href="http://192.168.99.100:8000/index.php">Cellfish</a>
					</div>
					<div class="fh5co-menu-2">
						<a href="http://192.168.99.100:8000/news.php" data-nav-section="features">News</a>
						<a href="http://192.168.99.100:8000/games.php" data-nav-section="menu" class="active">Game</a>
					</div>
				</div>


		<main class="quiz-container">

					<h1>Cellfish Quiz</h1>
			<p>a cellfish uses a mobile phone in a way that disregards the wishes of other people.</p>
				<form class="quiz-form">
					<div class="quiz-question">
				<div class="quiz-question-text">
					1.
					How often do you take photo(s) of food even not all friends of you in this gathering doing so?			</div>
				<div class="quiz-options">
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="0" value="0">
							<span class="quiz-option-text">Never </span>
						</div>
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="0" value="1">
							<span class="quiz-option-text">Sometimes </span>
						</div>
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="0" value="2">
							<span class="quiz-option-text">Often </span>
						</div>
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="0" value="3">
							<span class="quiz-option-text">Always </span>
						</div>
									</div>
							</div>
					<div class="quiz-question">
				<div class="quiz-question-text">
					2.
						How many photo(s) of food do you take when the food is being served?			</div>
				<div class="quiz-options">
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="1" value="0">
							<span class="quiz-option-text">Zero </span>
						</div>
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="1" value="1">
							<span class="quiz-option-text">1 - 5 </span>
						</div>
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="1" value="2">
							<span class="quiz-option-text">6- 10 </span>
						</div>
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="1" value="3">
							<span class="quiz-option-text">11 - more </span>
						</div>
									</div>
							</div>
					<div class="quiz-question">
				<div class="quiz-question-text">
					3.
					How often do you play voice message or games on your phone loudly without using an earphone	in the public area?			</div>
				<div class="quiz-options">
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="2" value="0">
							<span class="quiz-option-text">Never </span>
						</div>
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="2" value="1">
							<span class="quiz-option-text">Sometimes </span>
						</div>
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="2" value="2">
							<span class="quiz-option-text">often </span>
						</div>
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="2" value="3">
							<span class="quiz-option-text">Always </span>
						</div>
									</div>
							</div>
					<div class="quiz-question">
				<div class="quiz-question-text">
					4.
					What purpose would you use your phone while watching movie in the cinema?				</div>
				<div class="quiz-options">
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="3" value="0">
							<span class="quiz-option-text">I don't use it in this situation </span>
						</div>
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="3" value="1">
							<span class="quiz-option-text">Messaging app (whatsapp, telegram, etc) </span>
						</div>
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="3" value="2">
							<span class="quiz-option-text">Call or answer the call </span>
						</div>
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="3" value="3">
							<span class="quiz-option-text">Messaging app and calling </span>
						</div>
									</div>
							</div>
					<div class="quiz-question">
				<div class="quiz-question-text">
					5.
						How often do you use your phone continuously in a gathering or dinning with people?			</div>
				<div class="quiz-options">
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="4" value="0">
							<span class="quiz-option-text">Never </span>
						</div>
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="4" value="1">
							<span class="quiz-option-text">sometimes </span>
						</div>
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="4" value="2">
							<span class="quiz-option-text">Often </span>
						</div>
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="4" value="3">
							<span class="quiz-option-text">Always </span>
						</div>
									</div>
							</div>
					<div class="quiz-question">
				<div class="quiz-question-text">
					6.
					How often do you texting people or play games	when you are walking in the street?			</div>
				<div class="quiz-options">
					<div class="quiz-option">
								<input class="quiz-option-radio" type="radio" name="4" value="0">
	<span class="quiz-option-text">Never </span>
</div>
					<div class="quiz-option">
								<input class="quiz-option-radio" type="radio" name="4" value="1">
	<span class="quiz-option-text">sometimes </span>
</div>
					<div class="quiz-option">
								<input class="quiz-option-radio" type="radio" name="4" value="2">
	<span class="quiz-option-text">Often </span>
</div>
					<div class="quiz-option">
								<input class="quiz-option-radio" type="radio" name="4" value="3">
	<span class="quiz-option-text">Always </span>
</div>
			</div>
	</div>
					<div class="quiz-question">
				<div class="quiz-question-text">
					7.
					How long do you use your phone daily?				</div>
				<div class="quiz-options">
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="6" value="0">
							<span class="quiz-option-text">0 - 1 hour </span>
						</div>
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="6" value="1">
							<span class="quiz-option-text">2 - 3 hours </span>
						</div>
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="6" value="2">
							<span class="quiz-option-text">4 - 5 hours </span>
						</div>
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="6" value="3">
							<span class="quiz-option-text">more than 5 hours </span>
						</div>
									</div>
							</div>
					<div class="quiz-question">
				<div class="quiz-question-text">
					8.
					How often do your family wait for you to start dining when you are using your phone? 			</div>
				<div class="quiz-options">
											<div class="quiz-option">
												<input class="quiz-option-radio" type="radio" name="4" value="0">
					<span class="quiz-option-text">Never </span>
				</div>
									<div class="quiz-option">
												<input class="quiz-option-radio" type="radio" name="4" value="1">
					<span class="quiz-option-text">sometimes </span>
				</div>
									<div class="quiz-option">
												<input class="quiz-option-radio" type="radio" name="4" value="2">
					<span class="quiz-option-text">Often </span>
				</div>
									<div class="quiz-option">
												<input class="quiz-option-radio" type="radio" name="4" value="3">
					<span class="quiz-option-text">Always </span>
				</div>
							</div>
					</div>
					<div class="quiz-question">
				<div class="quiz-question-text">
					9.
					How often do you use your phone when you are driving?				</div>
				<div class="quiz-options">
											<div class="quiz-option">
												<input class="quiz-option-radio" type="radio" name="4" value="0">
					<span class="quiz-option-text">Never </span>
				</div>
									<div class="quiz-option">
												<input class="quiz-option-radio" type="radio" name="4" value="2">
					<span class="quiz-option-text">sometimes </span>
				</div>
									<div class="quiz-option">
												<input class="quiz-option-radio" type="radio" name="4" value="4">
					<span class="quiz-option-text">Often </span>
				</div>
									<div class="quiz-option">
												<input class="quiz-option-radio" type="radio" name="4" value="6">
					<span class="quiz-option-text">Always </span>
				</div>
							</div>
					</div>
					<div class="quiz-question">
				<div class="quiz-question-text">
					10.
					Do you think the way that you use your phone affect the relationship with friend/family?				</div>
				<div class="quiz-options">
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="9" value="0">
							<span class="quiz-option-text">No </span>
						</div>
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="9" value="1">
							<span class="quiz-option-text">Slightly </span>
						</div>
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="9" value="2">
							<span class="quiz-option-text">Moderate </span>
						</div>
											<div class="quiz-option">
														<input class="quiz-option-radio" type="radio" name="9" value="3">
							<span class="quiz-option-text">Seriously </span>
						</div>
									</div>
							</div>
				<input type="hidden" name="submit" value="1">
		<input type="submit" value="submit" class="btn btn-primary btn-outline">
	</form>
			</main>
<?php require_once "asset/footer.html"?>
</body>

</html>
