<?php
	session_start();

	if ($_GET['prev'] == "kitchen") {
		$_SESSION['kitchen'] = $_GET;
	}

	else if ($_GET['prev'] == "livingroom") {
		$_SESSION['livingroom'] = $_GET; 
	}

	else if ($_GET['prev'] == "bedroom") {
		$_SESSION['bedroom'] = $_GET;
	}
?>

<html>
	<head>
		<meta charset="utf-8" />
	    <title>Multi-Comfort Experience</title>
	    <link rel="shortcut icon" href="images/favicon.ico" type="image/vnd.microsoft.icon" />

	    <!-- FONTS -->
    	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	    <!-- JQUERY -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	    <link rel="stylesheet" href="css/results.css" />

	    <!-- CHARTS -->
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="http://code.highcharts.com/modules/exporting.js"></script>
		
	</head>
	<body>
		<div id="menu">
			<ul id="onglets">
				<li id="kitchen" <?php 
									if(isset($_SESSION['kitchen']) && $_GET['prev'] == "kitchen")
										echo 'class="active"';
									elseif(!isset($_SESSION['kitchen']))
										echo 'class="inactive"'; 
								?>><a>Kitchen</a></li>
				<li id="livingroom" <?php 
									if(isset($_SESSION['livingroom']) && $_GET['prev'] == "livingroom")
										echo 'class="active"';
									elseif(!isset($_SESSION['livingroom']))
										echo 'class="inactive"'; 
								?>><a>Living Room</a></li>
				<li id="bedroom" <?php 
									if(isset($_SESSION['bedroom']) && $_GET['prev'] == "bedroom")
										echo 'class="active"';
									elseif(!isset($_SESSION['bedroom']))
										echo 'class="inactive"'; 
								?>><a>Bedroom</a></li>
			</ul>
		</div>

		<div id="chartContainer"></div>

		<div id="pdf"></div>

		<form action="menu.php" method="get">
			<?php 
				if (isset($_SESSION['kitchen']) && isset($_SESSION['bedroom']) && isset($_SESSION['livingroom']) && !isset($_SESSION['email'])) {
					echo '<button name="email" type="submit" value="">Go further (you will need to enter your email address)</button>';
				}

				else {
					echo '<input type="submit" value="Configure another room">';
				}
			?>
		</form>

		<?php if(isset($_SESSION["email"])) include 'results-chart-connectedUser.php'; else include 'results-chart-normalUser.php' ?>
	</body>
</html>