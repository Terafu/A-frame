<?php
	session_start();

	$kitchen = true;
	$bedroom = true;
	$livingroom = true;

	if(isset($_SESSION["bedroom"])) {
		$bedroom = false;
	}

	if(isset($_SESSION["livingroom"])) {
		$livingroom = false;
	}

	if(isset($_SESSION["kitchen"])) {
		$kitchen = false;
	}
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
    	<link rel="stylesheet" href="css/menu.css" />
	</head>
	<body>

		<img id="logoSG" src="images/logo.png" alt="Logo Saint-Gobain">

		<div class="title">
			<h1>The Multi-Comfort Experience</h1>
		</div>

		<svg
		   xmlns:dc="http://purl.org/dc/elements/1.1/"
		   xmlns:cc="http://creativecommons.org/ns#"
		   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
		   xmlns:svg="http://www.w3.org/2000/svg"
		   xmlns="http://www.w3.org/2000/svg"
		   xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
		   xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
		   width="88.927361mm"
		   height="82.351067mm"
		   viewBox="0 0 88.927361 82.351067"
		   version="1.1"
		   id="svg3697"
		   inkscape:version="0.92.0 r15299"
		   sodipodi:docname="houseMenu2.svg"
		   class="house">
		  <g
		     inkscape:label="Kitchen"
		     inkscape:groupmode="layer"
		     id="layer1"
		     style="display:inline"
		     <?php if ($kitchen) echo 'class="kitchen"';
		     		else echo 'class="kitchen inactive"'; ?>
		     transform="translate(-0.02737844,-0.17495792)">
		    <g
		       id="g3768"
		       transform="translate(-59.795865,-33.866682)">
		      <path
		         sodipodi:nodetypes="ccccccc"
		         inkscape:connector-curvature="0"
		         id="path3719"
		         d="m 72.363225,114.789 20.847022,-0.13362 0.200451,1.60362 11.091692,-0.13363 0.0864,-39.551844 -36.883785,-0.02816 z" />
		      <text
		         id="text3727"
		         y="98.017838"
		         x="72.964577"
		         xml:space="preserve"><tspan
		           style="font-style:normal;font-variant:normal;font-weight:bold;font-stretch:normal;font-size:8.46666667px;font-family:'Indie Flower';-inkscape-font-specification:'Indie Flower Bold';stroke-width:0.26458332"
		           y="98.017838"
		           x="72.964577"
		           id="tspan3725"
		           sodipodi:role="line">KITCHEN</tspan></text>
		    </g>
		  </g>
		  <g
		     inkscape:groupmode="layer"
		     id="layer5"
		     inkscape:label="livingroom"
		     <?php if ($livingroom) echo 'class="livingroom"';
		     		else echo 'class="livingroom inactive"'; ?>
		     transform="translate(-0.02737844,-0.17495792)">
		    <g
		       id="g3763"
		       transform="translate(-59.795865,-33.866682)">
		      <path
		         sodipodi:nodetypes="ccccccc"
		         inkscape:connector-curvature="0"
		         id="path3717"
		         d="m 104.50239,116.12535 h 10.15624 l 0.26726,-1.60362 21.44839,0.20045 4.44335,-38.186134 -36.22886,0.03746 z" />
		      <text
		         id="text3731"
		         y="93.875153"
		         x="121.70404"
		         xml:space="preserve"><tspan
		           style="font-style:normal;font-variant:normal;font-weight:bold;font-stretch:normal;font-size:8.46666622px;font-family:'Indie Flower';-inkscape-font-specification:'Indie Flower Bold';text-align:center;text-anchor:middle;stroke-width:0.26458332"
		           y="93.875153"
		           x="121.70404"
		           id="tspan3729"
		           sodipodi:role="line">LIVING</tspan><tspan
		           id="tspan3733"
		           style="font-style:normal;font-variant:normal;font-weight:bold;font-stretch:normal;font-size:8.46666622px;font-family:'Indie Flower';-inkscape-font-specification:'Indie Flower Bold';text-align:center;text-anchor:middle;stroke-width:0.26458332"
		           y="102.13087"
		           x="121.70404"
		           sodipodi:role="line">ROOM</tspan></text>
		    </g>
		  </g>
		  <g
		     inkscape:groupmode="layer"
		     id="layer2"
		     inkscape:label="bedroom-desktop"
		     <?php if ($bedroom) echo 'class="bedroom"';
		     		else echo 'class="bedroom inactive"'; ?>
		     transform="translate(-0.02737844,-0.17495792)">
		    <g
		       id="g3775"
		       transform="translate(-59.795865,-33.866682)">
		      <path
		         sodipodi:nodetypes="ccccccccccccccccccccc"
		         inkscape:connector-curvature="0"
		         id="path3715"
		         d="m 61.839487,68.384327 -1.837478,-3.274052 c 15.637183,-9.212835 30.07107,-19.92979 44.299921,-30.90304 8.17937,6.01339 18.92474,14.359504 23.61995,17.205476 l 0.70158,-5.746295 h -0.33409 l 0.20045,-1.637025 1.60362,-0.668173 5.84652,1.703842 -0.53454,1.536801 -0.50113,-0.03341 -2.07134,8.38558 c 6.70259,4.516809 12.84044,8.515379 15.7355,10.256469 l -1.87089,3.073599 -1.1693,-0.567947 -3.14042,-0.03341 -1.57021,8.853304 -73.112645,0.0093 -0.992187,-9.638392 -2.504094,0.04725 z" />
		      <text
		         id="text3723"
		         y="65.210503"
		         x="85.408722"
		         xml:space="preserve"><tspan
		           style="font-style:normal;font-variant:normal;font-weight:bold;font-stretch:normal;font-size:8.46666622px;font-family:'Indie Flower';-inkscape-font-specification:'Indie Flower Bold';stroke-width:0.26458332"
		           y="65.210503"
		           x="85.408722"
		           id="tspan3721"
		           sodipodi:role="line">BEDROOM</tspan></text>
		    </g>
		  </g>
		</svg>

    	<!-- LOCAL JQUERY -->
    	<script src="js/menu.js"></script> 	
	</body>
</html>