<?php
	session_start();
	$room = $_GET['room'];
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
		<h1>Here are some questions to determine your ideal confort</h1>

		<form id="survey" action="<?php echo $room; ?>-desktop.php" method="get">
		  <ul class="slides">
		    <input type="radio" name="radio-btn" id="slide-1" class="radio-btn" checked />
		    <li class="slide-container">
				<div class="slide">
					<div class="question">
						<h2 class="question-title">Are you sensitive to heat?</h2>
						<input type="radio" class="answer" name="answer-slide-1" id="slide-1-answer-1" value="0" checked /><label for="slide-1-answer-1">Not at all</label><br/>
						<input type="radio" class="answer" name="answer-slide-1" id="slide-1-answer-2" value="1" /><label for="slide-1-answer-2">A little</label><br/>
						<input type="radio" class="answer" name="answer-slide-1" id="slide-1-answer-3" value="2" /><label for="slide-1-answer-3">Reasonably</label><br/>
						<input type="radio" class="answer" name="answer-slide-1" id="slide-1-answer-4" value="3" /><label for="slide-1-answer-4">A lot</label>
						</input>
					</div>
		        </div>
				<div class="nav">
					<label for="slide-6" class="prev"><span class="center-text">&#x2039;</span></label>
					<label for="slide-2" class="next"><span class="center-text">&#x203a;</span></label>
				</div>
		    </li>

		    <input type="radio" name="radio-btn" id="slide-2" class="radio-btn" />
		    <li class="slide-container">
		        <div class="slide">
		        	<div class="question">
		        		<h2 class="question-title">Are you sensitive to cold?</h2>
						<input type="radio" class="answer" name="answer-slide-2" id="slide-2-answer-1" value="0" checked /><label for="slide-2-answer-1">Not at all</label><br/>
						<input type="radio" class="answer" name="answer-slide-2" id="slide-2-answer-2" value="1" /><label for="slide-2-answer-2">A little</label><br/>
						<input type="radio" class="answer" name="answer-slide-2" id="slide-2-answer-3" value="2" /><label for="slide-2-answer-3">Reasonably</label><br/>
						<input type="radio" class="answer" name="answer-slide-2" id="slide-2-answer-4" value="3" /><label for="slide-2-answer-4">A lot</label>
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
		        		<h2 class="question-title">Are you sensitive to temperature difference in your house?</h2>
						<input type="radio" class="answer" name="answer-slide-3" id="slide-3-answer-1" value="0" checked /><label for="slide-3-answer-1">Not at all</label><br/>
						<input type="radio" class="answer" name="answer-slide-3" id="slide-3-answer-2" value="1" /><label for="slide-3-answer-2">A little</label><br/>
						<input type="radio" class="answer" name="answer-slide-3" id="slide-3-answer-3" value="2" /><label for="slide-3-answer-3">Reasonably</label><br/>
						<input type="radio" class="answer" name="answer-slide-3" id="slide-3-answer-4" value="3" /><label for="slide-3-answer-4">A lot</label>
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
		        		<h2 class="question-title">Are you sensitive to the sound?</h2>
						<input type="radio" class="answer" name="answer-slide-4" id="slide-4-answer-1" value="0" checked /><label for="slide-4-answer-1">Not at all</label><br/>
						<input type="radio" class="answer" name="answer-slide-4" id="slide-4-answer-2" value="1" /><label for="slide-4-answer-2">A little</label><br/>
						<input type="radio" class="answer" name="answer-slide-4" id="slide-4-answer-3" value="2" /><label for="slide-4-answer-3">Reasonably</label><br/>
						<input type="radio" class="answer" name="answer-slide-4" id="slide-4-answer-4" value="3" /><label for="slide-4-answer-4">A lot</label>
						</input>
		        	</div>
		        </div>
				<div class="nav">
					<label for="slide-3" class="prev"><span class="center-text">&#x2039;</span></label>
					<label for="slide-5" class="next"><span class="center-text">&#x203a;</span></label>
				</div>
		    </li>

		    <input type="radio" name="radio-btn" id="slide-5" class="radio-btn" />
		    <li class="slide-container">
		        <div class="slide">
		        	<div class="question">
		        		<h2 class="question-title">Do you have some problems to breathe?</h2>
						<input type="radio" class="answer" name="answer-slide-5" id="slide-5-answer-1" value="0" checked /><label for="slide-5-answer-1">Not at all</label><br/>
						<input type="radio" class="answer" name="answer-slide-5" id="slide-5-answer-2" value="1" /><label for="slide-5-answer-2">A little</label><br/>
						<input type="radio" class="answer" name="answer-slide-5" id="slide-5-answer-3" value="2" /><label for="slide-5-answer-3">Reasonably</label><br/>
						<input type="radio" class="answer" name="answer-slide-5" id="slide-5-answer-4" value="3" /><label for="slide-5-answer-4">A lot</label>
		        	</div>
		        </div>
				<div class="nav">
					<label for="slide-4" class="prev"><span class="center-text">&#x2039;</span></label>
					<label for="slide-6" class="next"><span class="center-text">&#x203a;</span></label>
				</div>
		    </li>

		    <input type="radio" name="radio-btn" id="slide-6" class="radio-btn" />
		    <li class="slide-container">
		        <div class="slide">
		        	<div class="question">
		        		<h2 class="question-title">Do you need to do some precision work?</h2>
						<input type="radio" class="answer" name="answer-slide-6" id="slide-6-answer-1" value="0" checked /><label for="slide-6-answer-1">Never</label><br/>
						<input type="radio" class="answer" name="answer-slide-6" id="slide-6-answer-2" value="1" /><label for="slide-6-answer-2">Sometime</label><br/>
						<input type="radio" class="answer" name="answer-slide-6" id="slide-6-answer-3" value="2" /><label for="slide-6-answer-3">Often</label>
		        	</div>
		        </div>
				<div class="nav">
					<label for="slide-5" class="prev"><span class="center-text">&#x2039;</span></label>
					<label class="next" id="validate"><button type="submit" name="validate" value="" class="button-validate"><span class="center-text">&#x203a;</span></button></label>
				</div>
		    </li>

		    <li class="nav-dots">
		      <label for="slide-1" class="nav-dot" id="slide-dot-1"></label>
		      <label for="slide-2" class="nav-dot" id="slide-dot-2"></label>
		      <label for="slide-3" class="nav-dot" id="slide-dot-3"></label>
		      <label for="slide-4" class="nav-dot" id="slide-dot-4"></label>
		      <label for="slide-5" class="nav-dot" id="slide-dot-5"></label>
		      <label for="slide-6" class="nav-dot" id="slide-dot-6"></label>
		    </li>
		</ul>  
		</form>

		<!-- LOCAL JQUERY -->
    	<script src="js/survey.js"></script>
	</body>
</html>