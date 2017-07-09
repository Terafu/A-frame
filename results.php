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

	    <link rel="stylesheet" href="results.css" />

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

		<div id="resume"></div>
		<div id="container"></div>

		<form action="index.php">
			<input type="submit" value="Configure another room">
		</form>

		<?php include 'results-chart.php'; ?>

		<table>
			<colgroup>
				<col class="warmthColor"/>
				<col class="luxColor"/>
				<col class="soundColor"/>
				<col class="ventilationColor"/>
			</colgroup>
			<tr>
				<td>WARMTH</td>
				<td>LUX</td>
				<td>SOUND</td>
				<td>VENTILATION</td>
			</tr>
			<tr>
				<td><a href="test.pdf " target="_blank">test.pdf</a></td>
				<td><a href="test.pdf " target="_blank">test.pdf</a></td>
				<td><a href="test.pdf " target="_blank">test.pdf</a></td>
				<td><a href="test.pdf " target="_blank">test.pdf</a></td>
			</tr>
			<tr>
				<td><a href="test.pdf " target="_blank">test.pdf</a></td>
				<td></td>
				<td><a href="test.pdf " target="_blank">test.pdf</a></td>
				<td><a href="test.pdf " target="_blank">test.pdf</a></td>
			</tr>
			<tr>
				<td><a href="test.pdf " target="_blank">test.pdf</a></td>
				<td></td>
				<td><a href="test.pdf " target="_blank">test.pdf</a></td>
				<td></td>
			</tr>
			<tr>
				<td><a href="test.pdf " target="_blank">test.pdf</a></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
	</body>
</html>