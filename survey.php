<?php
	session_start();
	$room = $_GET['room'];
	$_SESSION["room"] = $_GET["room"];
?>

<html>
	<head>
		<meta charset="utf-8" />
		<title>Multi-Comfort Experience</title>
		<link rel="shortcut icon" href="images/favicon.ico" type="image/vnd.microsoft.icon" />
	    <!-- JQUERY -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	    <!-- FONTS -->
	    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet"> 

		<!-- CSS -->
    	<link rel="stylesheet" href="css/survey.css" />
	</head>
	<body>
		<h1>Determine your ideal confort for the <?php echo $room ?></h1>

		<form id="survey" action="room-desktop.php" method="post">
		  <ul class="slides">
		    <input type="radio" name="radio-btn" id="slide-1" class="radio-btn" checked />
		    <li class="slide-container">
				<div class="slide">
					<div class="question">
						<h2 class="question-title">Are you sensitive to warmth?</h2>
						<input type="radio" class="answer" name="warmth" id="slide-1-answer-1" value="0" checked /><label for="slide-1-answer-1">Not at all</label><br/>
						<input type="radio" class="answer" name="warmth" id="slide-1-answer-2" value="1" /><label for="slide-1-answer-2">Reasonably</label><br/>
						<input type="radio" class="answer" name="warmth" id="slide-1-answer-3" value="2" /><label for="slide-1-answer-3">A lot</label>
						</input>
					</div>
		        </div>
				<div class="nav">
					<label for="slide-4" class="prev"><span class="center-text">&#x2039;</span></label>
					<label for="slide-2" class="next"><span class="center-text">&#x203a;</span></label>
				</div>
		    </li>

		    <input type="radio" name="radio-btn" id="slide-2" class="radio-btn" />
		    <li class="slide-container">
		        <div class="slide">
		        	<div class="question">
		        		<h2 class="question-title">Are you sensitive to sound?</h2>
						<input type="radio" class="answer" name="sound" id="slide-2-answer-1" value="0" checked /><label for="slide-2-answer-1">Not at all</label><br/>
						<input type="radio" class="answer" name="sound" id="slide-2-answer-2" value="1" /><label for="slide-2-answer-2">Reasonably</label><br/>
						<input type="radio" class="answer" name="sound" id="slide-2-answer-3" value="2" /><label for="slide-2-answer-3">A lot</label>
						</input>
		        	</div>
		        </div>
				<div class="nav">
					<label for="slide-1" class="prev"><span class="center-text">&#x2039;</span></label>
					<label for="slide-3" class="next"><span class="center-text">&#x203a;</span></label>
				</div>
		    </li>

		    <input type="radio" name="radio-btn" id="slide-3" class="radio-btn" />
		    <li class="slide-container">
		        <div class="slide">
		        	<div class="question">
		        		<h2 class="question-title">Do you have some problems to breathe?</h2>
						<input type="radio" class="answer" name="ventilation" id="slide-3-answer-1" value="0" checked /><label for="slide-3-answer-1">Not at all</label><br/>
						<input type="radio" class="answer" name="ventilation" id="slide-3-answer-2" value="1" /><label for="slide-3-answer-2">A little</label><br/>
						<input type="radio" class="answer" name="ventilation" id="slide-3-answer-3" value="2" /><label for="slide-3-answer-3">Reasonably</label>
		        	</div>
		        </div>
				<div class="nav">
					<label for="slide-2" class="prev"><span class="center-text">&#x2039;</span></label>
					<label for="slide-4" class="next"><span class="center-text">&#x203a;</span></label>
				</div>
		    </li>

		    <input type="radio" name="radio-btn" id="slide-4" class="radio-btn" />
		    <li class="slide-container">
		        <div class="slide">
		        	<div class="question">
		        		<h2 class="question-title">Do you need to do some precision work in this room?</h2>
						<input type="radio" class="answer" name="light" id="slide-4-answer-1" value="0" checked /><label for="slide-4-answer-1">Never</label><br/>
						<input type="radio" class="answer" name="light" id="slide-4-answer-2" value="1" /><label for="slide-4-answer-2">Sometime</label><br/>
						<input type="radio" class="answer" name="light" id="slide-4-answer-3" value="2" /><label for="slide-4-answer-3">Often</label>
		        	</div>
		        </div>
				<div class="nav">
					<label for="slide-3" class="prev"><span class="center-text">&#x2039;</span></label>
					<label class="next" id="validate"><button type="submit" class="button-validate"><span class="center-text">&#x203a;</span></button></label>
				</div>
		    </li>

		    <li class="nav-dots">
		      <label for="slide-1" class="nav-dot" id="slide-dot-1"></label>
		      <label for="slide-2" class="nav-dot" id="slide-dot-2"></label>
		      <label for="slide-3" class="nav-dot" id="slide-dot-3"></label>
		      <label for="slide-4" class="nav-dot" id="slide-dot-4"></label>
		    </li>
		</ul>  
		</form>

		<!-- LOCAL JQUERY -->
    	<script src="js/survey.js"></script>
	</body>
</html>