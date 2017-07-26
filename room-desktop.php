<?php
  session_start();

  $room = $_SESSION["room"];
  $notConfigure = true;

  if (isset($_POST["warmth"])) {
    $_SESSION[$room] = array();
    switch ($_POST["warmth"]) {
      case "0":
          $_SESSION[$room]['warmth-roof'] = 'glass';
          $_SESSION[$room]['warmth-floor'] = 'glass';
          $_SESSION[$room]['warmth-wall'] = 'glass';
          $_SESSION[$room]['warmth-junctions'] = 'glass';
          break;
      case "1":
          $_SESSION[$room]['warmth-roof'] = 'poly';
          $_SESSION[$room]['warmth-floor'] = 'poly';
          $_SESSION[$room]['warmth-wall'] = 'poly';
          $_SESSION[$room]['warmth-junctions'] = 'poly';
          break;
      case "2":
          $_SESSION[$room]['warmth-roof'] = 'rock';
          $_SESSION[$room]['warmth-floor'] = 'rock';
          $_SESSION[$room]['warmth-wall'] = 'rock';
          $_SESSION[$room]['warmth-junctions'] = 'rock';
          break;
    }
  }

  if (isset($_POST["sound"])) {
    switch ($_POST["sound"]) {
      case "0":
          $_SESSION[$room]['sound-wall'] = 'glass';
          $_SESSION[$room]['sound-floor'] = 'glass';
          $_SESSION[$room]['sound-type'] = 'steps';
          break;
      case "1":
          $_SESSION[$room]['sound-wall'] = 'poly';
          $_SESSION[$room]['sound-floor'] = 'poly';
          $_SESSION[$room]['sound-type'] = 'steps';
          break;
      case "2":
          $_SESSION[$room]['sound-wall'] = 'rock';
          $_SESSION[$room]['sound-floor'] = 'rock';
          $_SESSION[$room]['sound-type'] = 'steps';
          break;
    }
  }

  if (isset($_POST["ventilation"])) {
    switch ($_POST["ventilation"]) {
      case "0":
          $_SESSION[$room]['ventilation-ventilation'] = 'no-ventilation';
          $_SESSION[$room]['ventilation-floor'] = 'normal-floor';
          $_SESSION[$room]['ventilation-type'] = 'VOC';
          break;
      case "1":
          $_SESSION[$room]['ventilation-ventilation'] = 'natural-ventilation';
          $_SESSION[$room]['ventilation-floor'] = 'active-floor';
          $_SESSION[$room]['ventilation-type'] = 'VOC';
          break;
      case "2":
          $_SESSION[$room]['ventilation-ventilation'] = 'air-conditioner';
          $_SESSION[$room]['ventilation-floor'] = 'active-floor';
          $_SESSION[$room]['ventilation-type'] = 'VOC';
          break;
    }
  }

  if (isset($_POST["light"])) {
    switch ($_POST["light"]) {
      case "0":
          $_SESSION[$room]['lux'] = '100';
          break;
      case "1":
          $_SESSION[$room]['lux'] = '150';
          break;
      case "2":
          $_SESSION[$room]['lux'] = '200';
          break;
    }
  }

  if(isset($_SESSION[$room])) {
    $notConfigure = false; 
  }

  if(isset($_SESSION[$room]) && isset($_SESSION['email'])) {
    $_SESSION["advice-".$room] = $_SESSION[$room]; 
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
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">     

    <!-- AFRAME -->
    <script src="https://aframe.io/releases/0.5.0/aframe.min.js"></script>

    <!-- JQUERY UI -->
    <link rel='stylesheet prefetch' href='http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css'>
    <script src='http://code.jquery.com/ui/1.11.1/jquery-ui.js'></script>

    <!-- CURSOR FEEDBACK -->
    <script src="https://rawgit.com/ngokevin/aframe-animation-component/master/dist/aframe-animation-component.min.js"></script>
    <!--<script src="https://rawgit.com/gmarty/aframe-ui-components/master/dist/aframe-ui-components.min.js"></script>-->

    <!-- PARTICLES -->
    <script src="https://unpkg.com/aframe-particle-system-component@1.0.x/dist/aframe-particle-system-component.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/room-desktop.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css">
  </head>
  <body>

  <!-- TO PUT IN ANOTHER FILE -->
    <script>
      if (screen.width < 1000)
          window.location.replace("room-mobile.php");
    </script>

    <div id="overlay" class="cover">

      <!-- MENU -->
      <div class="collapsible">
        <form action="results.php" method="get">
          <li class="dropdown"><a id="warmth">Warmth</a>
            <ul>
              <li><a>Roof insulation <i id="warmth-roof-info" class="fa fa-info-circle" aria-hidden="true"></i></a>
                <input id="warmth-roof-glass" type="radio" name="warmth-roof" value="glass" 
                <?php 
                    if ($notConfigure) 
                      echo 'checked="checked"';
                    else {
                      if (isset($_SESSION[$room]['warmth-roof']) && $_SESSION[$room]['warmth-roof'] == "glass")
                        echo 'checked="checked"';                
                }?>>
                <label for="warmth-roof-glass">Glass</label><br>
                <input id="warmth-roof-poly" type="radio" name="warmth-roof" value="poly"
                <?php 
                  if (isset($_SESSION[$room]['warmth-roof']) && $_SESSION[$room]['warmth-roof'] == "poly")
                    echo 'checked="checked"';                
                ?>>
                <label for="warmth-roof-poly">Polystyrene</label><br>
                <input id="warmth-roof-rock" type="radio" name="warmth-roof" value="rock"
                <?php 
                  if (isset($_SESSION[$room]['warmth-roof']) && $_SESSION[$room]['warmth-roof'] == "rock")
                    echo 'checked="checked"';                
                ?>>
                <label for="warmth-roof-rock">Rock</label><br>
              </li>
              <hr>
              <li><a>Floor insulation <i id="warmth-floor-info" class="fa fa-info-circle" aria-hidden="true"></i></a>
                <input id="warmth-floor-glass" type="radio" name="warmth-floor" value="glass"
                <?php 
                    if ($notConfigure) 
                      echo 'checked="checked"';
                    else {
                      if (isset($_SESSION[$room]['warmth-floor']) && $_SESSION[$room]['warmth-floor'] == "glass")
                        echo 'checked="checked"';                
                }?>>
                <label for="warmth-floor-glass">Glass</label><br>
                <input id="warmth-floor-poly" type="radio" name="warmth-floor" value="poly"
                <?php 
                  if (isset($_SESSION[$room]['warmth-floor']) && $_SESSION[$room]['warmth-floor'] == "poly")
                    echo 'checked="checked"';                
                ?>>
                <label for="warmth-floor-poly">Polystyrene</label><br>
                <input id="warmth-floor-rock" type="radio" name="warmth-floor" value="rock"
                <?php 
                  if (isset($_SESSION[$room]['warmth-floor']) && $_SESSION[$room]['warmth-floor'] == "rock")
                    echo 'checked="checked"';                
                ?>>
                <label for="warmth-floor-rock">Rock</label><br>
              </li>
              <hr>
              <li><a>Wall insulation <i id="warmth-wall-info" class="fa fa-info-circle" aria-hidden="true"></i></a>
                <input id="warmth-wall-glass" type="radio" name="warmth-wall" value="glass"
                <?php 
                    if ($notConfigure) 
                      echo 'checked="checked"';
                    else {
                      if (isset($_SESSION[$room]['warmth-wall']) && $_SESSION[$room]['warmth-wall'] == "glass")
                        echo 'checked="checked"';                
                }?>>
                <label for="warmth-wall-glass">Glass</label><br>
                <input id="warmth-wall-poly" type="radio" name="warmth-wall" value="poly"
                <?php 
                  if (isset($_SESSION[$room]['warmth-wall']) && $_SESSION[$room]['warmth-wall'] == "poly")
                    echo 'checked="checked"';                
                ?>>
                <label for="warmth-wall-poly">Polystyrene</label><br>
                <input id="warmth-wall-rock" type="radio" name="warmth-wall" value="rock"
                <?php 
                  if (isset($_SESSION[$room]['warmth-wall']) && $_SESSION[$room]['warmth-wall'] == "rock")
                    echo 'checked="checked"';                
                ?>>
                <label for="warmth-wall-rock">Rock</label><br>
              </li>
              <hr>
              <li><a>Junctions <i id="warmth-junctions-info" class="fa fa-info-circle" aria-hidden="true"></i></a>
                <input id="warmth-junctions-glass" type="radio" name="warmth-junctions" value="glass"
                <?php 
                    if ($notConfigure) 
                      echo 'checked="checked"';
                    else {
                      if (isset($_SESSION[$room]['warmth-junctions']) && $_SESSION[$room]['warmth-junctions'] == "glass")
                        echo 'checked="checked"';                
                }?>>
                <label for="warmth-junctions-glass">Glass</label><br>
                <input id="warmth-junctions-poly" type="radio" name="warmth-junctions" value="poly"
                <?php 
                  if (isset($_SESSION[$room]['warmth-junctions']) && $_SESSION[$room]['warmth-junctions'] == "poly")
                    echo 'checked="checked"';                
                ?>>
                <label for="warmth-junctions-poly">Polystyrene</label><br>
                <input id="warmth-junctions-rock" type="radio" name="warmth-junctions" value="rock"
                <?php 
                  if (isset($_SESSION[$room]['warmth-junctions']) && $_SESSION[$room]['warmth-junctions'] == "rock")
                    echo 'checked="checked"';                
                ?>>
                <label for="warmth-junctions-rock">Rock</label><br>
              </li>
            </ul>
          </li>
          <li class="dropdown"><a id="light">Light</a>
            <ul>
              <li><a>Lux <i id="light-info" class="fa fa-info-circle" aria-hidden="true"></i></a>
                <input id="lux" type="text" name="lux" value=
                <?php 
                  if (isset($_SESSION[$room]))
                    echo $_SESSION[$room]['lux'];
                  else 
                    echo "150";                
                ?>>
                <div id="slider-vertical"></div>
              </li>
            </ul>
          </li>
          <li class="dropdown"><a id="sound">Sound</a>
            <ul>
              <li><a>Wall insulation <i id="sound-wall-info" class="fa fa-info-circle" aria-hidden="true"></i></a>
                <input id="sound-wall-glass" type="radio" name="sound-wall" value="glass"
                <?php 
                    if ($notConfigure) 
                      echo 'checked="checked"';
                    else {
                      if (isset($_SESSION[$room]['sound-wall']) && $_SESSION[$room]['sound-wall'] == "glass")
                        echo 'checked="checked"';                
                }?>>
                <label for="sound-wall-glass">Glass</label><br>
                <input id="sound-wall-poly" type="radio" name="sound-wall" value="poly"
                <?php 
                  if (isset($_SESSION[$room]['sound-wall']) && $_SESSION[$room]['sound-wall'] == "poly")
                    echo 'checked="checked"';                
                ?>>
                <label for="sound-wall-poly">Polystyrene</label><br>
                <input id="sound-wall-rock" type="radio" name="sound-wall" value="rock"
                <?php 
                  if (isset($_SESSION[$room]['sound-wall']) && $_SESSION[$room]['sound-wall'] == "rock")
                    echo 'checked="checked"';                
                ?>>
                <label for="sound-wall-rock">Rock</label><br>
              </li>
              <hr>
              <li><a>Floor insulation <i id="sound-floor-info" class="fa fa-info-circle" aria-hidden="true"></i></a>
                <input id="sound-floor-glass" type="radio" name="sound-floor" value="glass"
                <?php 
                    if ($notConfigure) 
                      echo 'checked="checked"';
                    else {
                      if (isset($_SESSION[$room]['sound-floor']) && $_SESSION[$room]['sound-floor'] == "glass")
                        echo 'checked="checked"';                
                }?>>
                <label for="sound-floor-glass">Glass</label><br>
                <input id="sound-floor-poly" type="radio" name="sound-floor" value="poly"
                <?php 
                  if (isset($_SESSION[$room]['sound-floor']) && $_SESSION[$room]['sound-floor'] == "poly")
                    echo 'checked="checked"';                
                ?>>
                <label for="sound-floor-poly">Polystyrene</label><br>
                <input id="sound-floor-rock" type="radio" name="sound-floor" value="rock"
                <?php 
                  if (isset($_SESSION[$room]['sound-floor']) && $_SESSION[$room]['sound-floor'] == "rock")
                    echo 'checked="checked"';                
                ?>>
                <label for="sound-floor-rock">Rock</label><br>
              </li>
              <hr>
              <li><a>Type of sound <i id="sound-type-info" class="fa fa-info-circle" aria-hidden="true"></i></a>
                <input id="sound-steps" type="radio" name="sound-type" value="steps" checked="checked">
                <label for="sound-steps">Steps</label><br>
                <input id="sound-music" type="radio" name="sound-type" value="music">
                <label for="sound-music">Music</label><br>
                <input id="sound-voices" type="radio" name="sound-type" value="voices">
                <label for="sound-voices">Voices</label><br>
              </li>
              <hr>
              <button id="play-sound" type="button">Play Sound</button> 
            </ul>
          </li>
          <li class="dropdown"><a id="ventilation">Ventilation</a>
            <ul>
              <li><a>Ventilation System <i id="ventilation-ventilation-info" class="fa fa-info-circle" aria-hidden="true"></i></a>
                <input id="ventilation-ventilation-no-ventilation" type="radio" name="ventilation-ventilation" value="no-ventilation"
                <?php 
                    if ($notConfigure) 
                      echo 'checked="checked"';
                    else {
                      if (isset($_SESSION[$room]['ventilation-ventilation']) && $_SESSION[$room]['ventilation-ventilation'] == "no-ventilation")
                        echo 'checked="checked"';                
                }?>>
                <label for="ventilation-ventilation-no-ventilation">No Ventilation</label><br>
                <input id="ventilation-ventilation-natural-ventilation" type="radio" name="ventilation-ventilation" value="natural-ventilation"
                <?php 
                  if (isset($_SESSION[$room]['ventilation-ventilation']) && $_SESSION[$room]['ventilation-ventilation'] == "natural-ventilation")
                    echo 'checked="checked"';                
                ?>>
                <label for="ventilation-ventilation-natural-ventilation">Natural Ventilation</label><br>
                <input id="ventilation-ventilation-air-conditioner" type="radio" name="ventilation-ventilation" value="air-conditioner"
                <?php 
                  if (isset($_SESSION[$room]['ventilation-ventilation']) && $_SESSION[$room]['ventilation-ventilation'] == "air-conditioner")
                    echo 'checked="checked"';                
                ?>>
                <label for="ventilation-ventilation-air-conditioner">Air Conditioner</label><br>
              </li>
              <hr>
              <li><a>Floor <i id="ventilation-floor-info" class="fa fa-info-circle" aria-hidden="true"></i></a>
              <input id="ventilation-floor-normal-floor" type="radio" name="ventilation-floor" value="normal-floor"
                <?php 
                    if ($notConfigure) 
                      echo 'checked="checked"';
                    else {
                      if (isset($_SESSION[$room]['ventilation-floor']) && $_SESSION[$room]['ventilation-floor'] == "normal-floor")
                        echo 'checked="checked"';                
                }?>>
                <label for="ventilation-floor-normal-floor">Normal Floor</label><br>
                <input id="ventilation-floor-active-floor" type="radio" name="ventilation-floor" value="active-floor"
                <?php 
                  if (isset($_SESSION[$room]['ventilation-floor']) && $_SESSION[$room]['ventilation-floor'] == "active-floor")
                    echo 'checked="checked"';                
                ?>>
                <label for="ventilation-floor-active-floor">Active Floor</label><br>
              </li>
              <hr>
              <li><a>Type <i id="ventilation-type-info" class="fa fa-info-circle" aria-hidden="true"></i></a>
              <input id="ventilation-type-VOC" type="radio" name="ventilation-type" value="VOC"
                <?php 
                    if ($notConfigure) 
                      echo 'checked="checked"';
                    else {
                      if (isset($_SESSION[$room]['ventilation-type']) && $_SESSION[$room]['ventilation-type'] == "VOC")
                        echo 'checked="checked"';                
                }?>>
                <label for="ventilation-type-VOC">VOC</label><br>
                <input id="ventilation-type-CO2" type="radio" name="ventilation-type" value="CO2"
                <?php 
                  if (isset($_SESSION[$room]['ventilation-type']) && $_SESSION[$room]['ventilation-type'] == "CO2")
                    echo 'checked="checked"';                
                ?>>
                <label for="ventilation-type-CO2">CO2</label><br>
              </li>
            </ul>
          </li>
          <li><input type="submit" value="Validate"></li>
          <input name="prev" type="hidden" value="<?php echo $room ?>">
        </form>
      </div>

      <!-- 3D SCENE -->
      <div id="scene">
        <!-- A-SCENE WITH FOG -->
        <a-scene embedded>
          <a-assets>
            <!-- DEFINITION OF THE ASSETS -->

            <!-- BACKGROUND IMAGE OF THE SCENE -->
            <!--<img id="sky" src="sphere.jpg">-->

            <!-- TEXTURES -->
            <img id="parquet" src="images/parquet.jpg">
            <img id="parquet-normalMap" src="images/parquet-normalMap.jpg">
            <img id="mur" src="images/mur.jpg">
            <img id="mur-poster" src="images/mur-poster.jpg">
            <img id="mur-normalMap" src="images/mur-normalMap.jpg">
            <img id="mur-poster-normalMap" src="images/mur-poster-normalMap.jpg">

            <!-- THERMAL TEXTURES -->
            <img id="thermal-glass-glass-glass-glass" src="images/thermal.jpg">
            <img id="thermal-glass-glass-glass-poly" src="images/thermal2.jpg">
            <img id="thermal-glass-glass-glass-rock" src="images/thermal2.jpg">
            <img id="thermal-glass-glass-poly-glass" src="images/thermal.jpg">
            <img id="thermal-glass-glass-poly-poly" src="images/thermal2.jpg">
            <img id="thermal-glass-glass-poly-rock" src="images/thermal2.jpg">
            <img id="thermal-glass-glass-rock-glass" src="images/thermal.jpg">
            <img id="thermal-glass-glass-rock-poly" src="images/thermal2.jpg">
            <img id="thermal-glass-glass-rock-rock" src="images/thermal2.jpg">
            <img id="thermal-glass-poly-glass-glass" src="images/thermal.jpg">
            <img id="thermal-glass-poly-glass-poly" src="images/thermal2.jpg">
            <img id="thermal-glass-poly-glass-rock" src="images/thermal2.jpg">
            <img id="thermal-glass-poly-poly-glass" src="images/thermal.jpg">
            <img id="thermal-glass-poly-poly-poly" src="images/thermal2.jpg">
            <img id="thermal-glass-poly-poly-rock" src="images/thermal2.jpg">
            <img id="thermal-glass-poly-rock-glass" src="images/thermal.jpg">
            <img id="thermal-glass-poly-rock-poly" src="images/thermal2.jpg">
            <img id="thermal-glass-poly-rock-rock" src="images/thermal2.jpg">
            <img id="thermal-glass-rock-glass-glass" src="images/thermal.jpg">
            <img id="thermal-glass-rock-glass-poly" src="images/thermal2.jpg">
            <img id="thermal-glass-rock-glass-rock" src="images/thermal2.jpg">
            <img id="thermal-glass-rock-poly-glass" src="images/thermal.jpg">
            <img id="thermal-glass-rock-poly-poly" src="images/thermal2.jpg">
            <img id="thermal-glass-rock-poly-rock" src="images/thermal2.jpg">
            <img id="thermal-glass-rock-rock-glass" src="images/thermal.jpg">
            <img id="thermal-glass-rock-rock-poly" src="images/thermal2.jpg">
            <img id="thermal-glass-rock-rock-rock" src="images/thermal2.jpg">
            <img id="thermal-poly-glass-glass-glass" src="images/thermal.jpg">
            <img id="thermal-poly-glass-glass-poly" src="images/thermal2.jpg">
            <img id="thermal-poly-glass-glass-rock" src="images/thermal2.jpg">
            <img id="thermal-poly-glass-poly-glass" src="images/thermal.jpg">
            <img id="thermal-poly-glass-poly-poly" src="images/thermal2.jpg">
            <img id="thermal-poly-glass-poly-rock" src="images/thermal2.jpg">
            <img id="thermal-poly-glass-rock-glass" src="images/thermal.jpg">
            <img id="thermal-poly-glass-rock-poly" src="images/thermal2.jpg">
            <img id="thermal-poly-glass-rock-rock" src="images/thermal2.jpg">
            <img id="thermal-poly-poly-glass-glass" src="images/thermal.jpg">
            <img id="thermal-poly-poly-glass-poly" src="images/thermal2.jpg">
            <img id="thermal-poly-poly-glass-rock" src="images/thermal2.jpg">
            <img id="thermal-poly-poly-poly-glass" src="images/thermal.jpg">
            <img id="thermal-poly-poly-poly-poly" src="images/thermal2.jpg">
            <img id="thermal-poly-poly-poly-rock" src="images/thermal2.jpg">
            <img id="thermal-poly-poly-rock-glass" src="images/thermal.jpg">
            <img id="thermal-poly-poly-rock-poly" src="images/thermal2.jpg">
            <img id="thermal-poly-poly-rock-rock" src="images/thermal2.jpg">
            <img id="thermal-poly-rock-glass-glass" src="images/thermal.jpg">
            <img id="thermal-poly-rock-glass-poly" src="images/thermal2.jpg">
            <img id="thermal-poly-rock-glass-rock" src="images/thermal2.jpg">
            <img id="thermal-poly-rock-poly-glass" src="images/thermal.jpg">
            <img id="thermal-poly-rock-poly-poly" src="images/thermal2.jpg">
            <img id="thermal-poly-rock-poly-rock" src="images/thermal2.jpg">
            <img id="thermal-poly-rock-rock-glass" src="images/thermal.jpg">
            <img id="thermal-poly-rock-rock-poly" src="images/thermal2.jpg">
            <img id="thermal-poly-rock-rock-rock" src="images/thermal2.jpg">
            <img id="thermal-rock-glass-glass-glass" src="images/thermal.jpg">
            <img id="thermal-rock-glass-glass-poly" src="images/thermal2.jpg">
            <img id="thermal-rock-glass-glass-rock" src="images/thermal2.jpg">
            <img id="thermal-rock-glass-poly-glass" src="images/thermal.jpg">
            <img id="thermal-rock-glass-poly-poly" src="images/thermal2.jpg">
            <img id="thermal-rock-glass-poly-rock" src="images/thermal2.jpg">
            <img id="thermal-rock-glass-rock-glass" src="images/thermal.jpg">
            <img id="thermal-rock-glass-rock-poly" src="images/thermal2.jpg">
            <img id="thermal-rock-glass-rock-rock" src="images/thermal2.jpg">
            <img id="thermal-rock-poly-glass-glass" src="images/thermal.jpg">
            <img id="thermal-rock-poly-glass-poly" src="images/thermal2.jpg">
            <img id="thermal-rock-poly-glass-rock" src="images/thermal2.jpg">
            <img id="thermal-rock-poly-poly-glass" src="images/thermal.jpg">
            <img id="thermal-rock-poly-poly-poly" src="images/thermal2.jpg">
            <img id="thermal-rock-poly-poly-rock" src="images/thermal2.jpg">
            <img id="thermal-rock-poly-rock-glass" src="images/thermal.jpg">
            <img id="thermal-rock-poly-rock-poly" src="images/thermal2.jpg">
            <img id="thermal-rock-poly-rock-rock" src="images/thermal2.jpg">
            <img id="thermal-rock-rock-glass-glass" src="images/thermal.jpg">
            <img id="thermal-rock-rock-glass-poly" src="images/thermal2.jpg">
            <img id="thermal-rock-rock-glass-rock" src="images/thermal2.jpg">
            <img id="thermal-rock-rock-poly-glass" src="images/thermal.jpg">
            <img id="thermal-rock-rock-poly-poly" src="images/thermal2.jpg">
            <img id="thermal-rock-rock-poly-rock" src="images/thermal2.jpg">
            <img id="thermal-rock-rock-rock-glass" src="images/thermal.jpg">
            <img id="thermal-rock-rock-rock-poly" src="images/thermal2.jpg">
            <img id="thermal-rock-rock-rock-rock" src="images/thermal2.jpg">

            <!-- SOUNDS -->
            <audio id="sound-steps-glass-glass" src="sounds/steps.mp3" preload="true"></audio>
            <audio id="sound-steps-poly-glass" src="sounds/steps2.mp3" preload="true"></audio>
            <audio id="sound-steps-rock-glass" src="sounds/steps3.mp3" preload="true"></audio>
            <audio id="sound-steps-glass-poly" src="sounds/steps.mp3" preload="true"></audio>
            <audio id="sound-steps-poly-poly" src="sounds/steps2.mp3" preload="true"></audio>
            <audio id="sound-steps-rock-poly" src="sounds/steps3.mp3" preload="true"></audio>
            <audio id="sound-steps-glass-rock" src="sounds/steps.mp3" preload="true"></audio>
            <audio id="sound-steps-poly-rock" src="sounds/steps2.mp3" preload="true"></audio>
            <audio id="sound-steps-rock-rock" src="sounds/steps3.mp3" preload="true"></audio>
            <audio id="sound-music-glass-glass" src="sounds/music.mp3" preload="true"></audio>
            <audio id="sound-music-poly-glass" src="sounds/music2.mp3" preload="true"></audio>
            <audio id="sound-music-rock-glass" src="sounds/music3.mp3" preload="true"></audio>
            <audio id="sound-music-glass-poly" src="sounds/music.mp3" preload="true"></audio>
            <audio id="sound-music-poly-poly" src="sounds/music2.mp3" preload="true"></audio>
            <audio id="sound-music-rock-poly" src="sounds/music3.mp3" preload="true"></audio>
            <audio id="sound-music-glass-rock" src="sounds/music.mp3" preload="true"></audio>
            <audio id="sound-music-poly-rock" src="sounds/music2.mp3" preload="true"></audio>
            <audio id="sound-music-rock-rock" src="sounds/music3.mp3" preload="true"></audio>
            <audio id="sound-voices-glass-glass" src="sounds/voices.mp3" preload="true"></audio>
            <audio id="sound-voices-poly-glass" src="sounds/voices2.mp3" preload="true"></audio>
            <audio id="sound-voices-rock-glass" src="sounds/voices3.mp3" preload="true"></audio>
            <audio id="sound-voices-glass-poly" src="sounds/voices.mp3" preload="true"></audio>
            <audio id="sound-voices-poly-poly" src="sounds/voices2.mp3" preload="true"></audio>
            <audio id="sound-voices-rock-poly" src="sounds/voices3.mp3" preload="true"></audio>
            <audio id="sound-voices-glass-rock" src="sounds/voices.mp3" preload="true"></audio>
            <audio id="sound-voices-poly-rock" src="sounds/voices2.mp3" preload="true"></audio>
            <audio id="sound-voices-rock-rock" src="sounds/voices3.mp3" preload="true"></audio>

          </a-assets>

          <!-- DISABLE MOVEMENTS IN THE SCENE -->
          <!--<a-camera wasd-controls-enabled="false"></a-camera>-->

          <!-- LIGHTS -->
          <a-entity light="type: ambient; color: #BBBBBB"></a-entity>
          <a-entity id="directional-light" light="type: directional; color: #FFF; intensity: 0.6" position="0 6 0"></a-entity>

          <!-- ADD A CURSOR (timeout in ms) -->
          <a-camera rotation="0 180 0"><a-cursor color="#4CC3D9" fuse="true" timeout="1000" cursor-feedback></a-cursor></a-camera>

          <!-- Bottom -->
          <a-plane id="bottom" height="8" width="8" position="0 0 0" rotation="-90 0 0" material="src: #parquet; normal-map: #parquet-normalMap; roughness: 0.2"></a-plane>
          <!-- Front-->
          <a-plane id="front" height="6" width="8" position="0 3 -4" rotation="0 0 0" material="src: #mur; normal-map: #mur-normalMap"></a-plane>
          <!--Back -->
          <a-plane id="back" height="6" width="8" position="0 3 4" rotation="180 0 0" material="src: #mur-poster; normal-map: #mur-poster-normalMap"></a-plane>
          <!-- Left-->
          <a-plane id="left" height="6" width="8" position="-4 3 0" rotation="0 90 0" material="src: #mur; normal-map: #mur-normalMap"></a-plane>
          <!-- Right-->
          <a-plane id="right" height="6" width="8" position="4 3 0" rotation="0 -90 0" material="src: #mur; normal-map: #mur-normalMap"></a-plane>
          <!-- Top -->
          <a-plane id="top" height="8" width="8" position="0 6 0" rotation="90 0 0" material="src: #mur; normal-map: #mur-normalMap"></a-plane>

          <!-- SOUND -->
          <a-entity id="steps"></a-entity>

          <!-- PARTICLES -->
          <a-entity id="particles" position="0 3.5 0" scale="0.1 0.1 0.1"></a-entity>

          <!-- TELEPORT RINGS -->
          <!--<a-circle id = "teleport1" set-position="0 1 2.5" color="blue" radius="0.15" position="0 0.050 2.5" rotation="-90 0 0" data-interactive="true"></a-circle>
          <a-circle id = "teleport2" set-position="0 1 0" color="blue" radius="0.15" position="0 0.050 0" rotation="-90 0 0" data-interactive="true"></a-circle>-->

          <!-- IMPORT AN OBJ -->
          <?php 
            if ($_SESSION["room"] == "bedroom") {
              echo '<a-obj-model rotation="0 -90 0" position="2.7 0.5 -2.4" scale="1.4 1.4 1.4" id="test_model" obj-model="obj:bed/bed.obj;mtl:bed/bed.mtl"></a-obj-model>';
            }
          ?>

          <!-- DEFINE THE BACKGROUND IMAGE OF THE SCENE -->
          <!--<a-sky src="#sky"></a-sky>-->

          <!-- DEFINE THE BACKGROUND COLOR OF THE SCENE -->
          <!--<a-sky color="#c5c5c5"></a-sky>-->
        </a-scene>
      </div>
    </div>

    <div id="warmth-roof-info-window" class="row pop-up hidden">
      <div class="box small-6 large-centered">
        <a class="close-button">&#10006;</a>
        <h3>Roof insulation</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sollicitudin neque vel libero consequat interdum. Phasellus laoreet dui enim, ut fermentum quam consequat eu. Donec sollicitudin, nisl sit amet feugiat pharetra, urna nisl ullamcorper leo, sit amet faucibus augue neque nec erat. Donec dolor nulla, interdum ut iaculis vitae, placerat eu tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam ullamcorper velit sed fermentum vehicula. Sed cursus, purus quis faucibus ornare, elit eros iaculis nunc, at commodo mauris sapien eget enim. Maecenas eget metus mauris. Donec ullamcorper lorem ultrices enim venenatis laoreet. Aenean ut placerat lorem, eu ultricies ex. Nullam eget aliquet mi, a aliquam erat. Ut vel nulla at eros fermentum efficitur et nec augue. Pellentesque at scelerisque nisl, at condimentum orci.
        </p>
      </div>
    </div>

    <div id="warmth-floor-info-window" class="row pop-up hidden">
      <div class="box small-6 large-centered">
        <a class="close-button">&#10006;</a>
        <h3>Floor insulation</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sollicitudin neque vel libero consequat interdum. Phasellus laoreet dui enim, ut fermentum quam consequat eu. Donec sollicitudin, nisl sit amet feugiat pharetra, urna nisl ullamcorper leo, sit amet faucibus augue neque nec erat. Donec dolor nulla, interdum ut iaculis vitae, placerat eu tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam ullamcorper velit sed fermentum vehicula. Sed cursus, purus quis faucibus ornare, elit eros iaculis nunc, at commodo mauris sapien eget enim. Maecenas eget metus mauris. Donec ullamcorper lorem ultrices enim venenatis laoreet. Aenean ut placerat lorem, eu ultricies ex. Nullam eget aliquet mi, a aliquam erat. Ut vel nulla at eros fermentum efficitur et nec augue. Pellentesque at scelerisque nisl, at condimentum orci.
        </p>
      </div>
    </div>

    <div id="warmth-wall-info-window" class="row pop-up hidden">
      <div class="box small-6 large-centered">
        <a class="close-button">&#10006;</a>
        <h3>Wall insulation</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sollicitudin neque vel libero consequat interdum. Phasellus laoreet dui enim, ut fermentum quam consequat eu. Donec sollicitudin, nisl sit amet feugiat pharetra, urna nisl ullamcorper leo, sit amet faucibus augue neque nec erat. Donec dolor nulla, interdum ut iaculis vitae, placerat eu tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam ullamcorper velit sed fermentum vehicula. Sed cursus, purus quis faucibus ornare, elit eros iaculis nunc, at commodo mauris sapien eget enim. Maecenas eget metus mauris. Donec ullamcorper lorem ultrices enim venenatis laoreet. Aenean ut placerat lorem, eu ultricies ex. Nullam eget aliquet mi, a aliquam erat. Ut vel nulla at eros fermentum efficitur et nec augue. Pellentesque at scelerisque nisl, at condimentum orci.
        </p>
      </div>
    </div>

    <div id="warmth-junctions-info-window" class="row pop-up hidden">
      <div class="box small-6 large-centered">
        <a class="close-button">&#10006;</a>
        <h3>Junctions</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sollicitudin neque vel libero consequat interdum. Phasellus laoreet dui enim, ut fermentum quam consequat eu. Donec sollicitudin, nisl sit amet feugiat pharetra, urna nisl ullamcorper leo, sit amet faucibus augue neque nec erat. Donec dolor nulla, interdum ut iaculis vitae, placerat eu tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam ullamcorper velit sed fermentum vehicula. Sed cursus, purus quis faucibus ornare, elit eros iaculis nunc, at commodo mauris sapien eget enim. Maecenas eget metus mauris. Donec ullamcorper lorem ultrices enim venenatis laoreet. Aenean ut placerat lorem, eu ultricies ex. Nullam eget aliquet mi, a aliquam erat. Ut vel nulla at eros fermentum efficitur et nec augue. Pellentesque at scelerisque nisl, at condimentum orci.
        </p>
      </div>
    </div>

    <div id="light-info-window" class="row pop-up hidden">
      <div class="box small-6 large-centered">
        <a class="close-button">&#10006;</a>
        <h3>Light</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sollicitudin neque vel libero consequat interdum. Phasellus laoreet dui enim, ut fermentum quam consequat eu. Donec sollicitudin, nisl sit amet feugiat pharetra, urna nisl ullamcorper leo, sit amet faucibus augue neque nec erat. Donec dolor nulla, interdum ut iaculis vitae, placerat eu tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam ullamcorper velit sed fermentum vehicula. Sed cursus, purus quis faucibus ornare, elit eros iaculis nunc, at commodo mauris sapien eget enim. Maecenas eget metus mauris. Donec ullamcorper lorem ultrices enim venenatis laoreet. Aenean ut placerat lorem, eu ultricies ex. Nullam eget aliquet mi, a aliquam erat. Ut vel nulla at eros fermentum efficitur et nec augue. Pellentesque at scelerisque nisl, at condimentum orci.
        </p>
      </div>
    </div>

    <div id="sound-wall-info-window" class="row pop-up hidden">
      <div class="box small-6 large-centered">
        <a class="close-button">&#10006;</a>
        <h3>Wall insulation</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sollicitudin neque vel libero consequat interdum. Phasellus laoreet dui enim, ut fermentum quam consequat eu. Donec sollicitudin, nisl sit amet feugiat pharetra, urna nisl ullamcorper leo, sit amet faucibus augue neque nec erat. Donec dolor nulla, interdum ut iaculis vitae, placerat eu tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam ullamcorper velit sed fermentum vehicula. Sed cursus, purus quis faucibus ornare, elit eros iaculis nunc, at commodo mauris sapien eget enim. Maecenas eget metus mauris. Donec ullamcorper lorem ultrices enim venenatis laoreet. Aenean ut placerat lorem, eu ultricies ex. Nullam eget aliquet mi, a aliquam erat. Ut vel nulla at eros fermentum efficitur et nec augue. Pellentesque at scelerisque nisl, at condimentum orci.
        </p>
      </div>
    </div>

    <div id="sound-floor-info-window" class="row pop-up hidden">
      <div class="box small-6 large-centered">
        <a class="close-button">&#10006;</a>
        <h3>Floor insulation</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sollicitudin neque vel libero consequat interdum. Phasellus laoreet dui enim, ut fermentum quam consequat eu. Donec sollicitudin, nisl sit amet feugiat pharetra, urna nisl ullamcorper leo, sit amet faucibus augue neque nec erat. Donec dolor nulla, interdum ut iaculis vitae, placerat eu tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam ullamcorper velit sed fermentum vehicula. Sed cursus, purus quis faucibus ornare, elit eros iaculis nunc, at commodo mauris sapien eget enim. Maecenas eget metus mauris. Donec ullamcorper lorem ultrices enim venenatis laoreet. Aenean ut placerat lorem, eu ultricies ex. Nullam eget aliquet mi, a aliquam erat. Ut vel nulla at eros fermentum efficitur et nec augue. Pellentesque at scelerisque nisl, at condimentum orci.
        </p>
      </div>
    </div>

    <div id="sound-type-info-window" class="row pop-up hidden">
      <div class="box small-6 large-centered">
        <a class="close-button">&#10006;</a>
        <h3>Type of sound</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sollicitudin neque vel libero consequat interdum. Phasellus laoreet dui enim, ut fermentum quam consequat eu. Donec sollicitudin, nisl sit amet feugiat pharetra, urna nisl ullamcorper leo, sit amet faucibus augue neque nec erat. Donec dolor nulla, interdum ut iaculis vitae, placerat eu tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam ullamcorper velit sed fermentum vehicula. Sed cursus, purus quis faucibus ornare, elit eros iaculis nunc, at commodo mauris sapien eget enim. Maecenas eget metus mauris. Donec ullamcorper lorem ultrices enim venenatis laoreet. Aenean ut placerat lorem, eu ultricies ex. Nullam eget aliquet mi, a aliquam erat. Ut vel nulla at eros fermentum efficitur et nec augue. Pellentesque at scelerisque nisl, at condimentum orci.
        </p>
      </div>
    </div>

    <div id="ventilation-ventilation-info-window" class="row pop-up hidden">
      <div class="box small-6 large-centered">
        <a class="close-button">&#10006;</a>
        <h3>Ventilation</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sollicitudin neque vel libero consequat interdum. Phasellus laoreet dui enim, ut fermentum quam consequat eu. Donec sollicitudin, nisl sit amet feugiat pharetra, urna nisl ullamcorper leo, sit amet faucibus augue neque nec erat. Donec dolor nulla, interdum ut iaculis vitae, placerat eu tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam ullamcorper velit sed fermentum vehicula. Sed cursus, purus quis faucibus ornare, elit eros iaculis nunc, at commodo mauris sapien eget enim. Maecenas eget metus mauris. Donec ullamcorper lorem ultrices enim venenatis laoreet. Aenean ut placerat lorem, eu ultricies ex. Nullam eget aliquet mi, a aliquam erat. Ut vel nulla at eros fermentum efficitur et nec augue. Pellentesque at scelerisque nisl, at condimentum orci.
        </p>
      </div>
    </div>

    <div id="ventilation-floor-info-window" class="row pop-up hidden">
      <div class="box small-6 large-centered">
        <a class="close-button">&#10006;</a>
        <h3>Special floor</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sollicitudin neque vel libero consequat interdum. Phasellus laoreet dui enim, ut fermentum quam consequat eu. Donec sollicitudin, nisl sit amet feugiat pharetra, urna nisl ullamcorper leo, sit amet faucibus augue neque nec erat. Donec dolor nulla, interdum ut iaculis vitae, placerat eu tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam ullamcorper velit sed fermentum vehicula. Sed cursus, purus quis faucibus ornare, elit eros iaculis nunc, at commodo mauris sapien eget enim. Maecenas eget metus mauris. Donec ullamcorper lorem ultrices enim venenatis laoreet. Aenean ut placerat lorem, eu ultricies ex. Nullam eget aliquet mi, a aliquam erat. Ut vel nulla at eros fermentum efficitur et nec augue. Pellentesque at scelerisque nisl, at condimentum orci.
        </p>
      </div>
    </div>

    <div id="ventilation-type-info-window" class="row pop-up hidden">
      <div class="box small-6 large-centered">
        <a class="close-button">&#10006;</a>
        <h3>Type of ventilation</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sollicitudin neque vel libero consequat interdum. Phasellus laoreet dui enim, ut fermentum quam consequat eu. Donec sollicitudin, nisl sit amet feugiat pharetra, urna nisl ullamcorper leo, sit amet faucibus augue neque nec erat. Donec dolor nulla, interdum ut iaculis vitae, placerat eu tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam ullamcorper velit sed fermentum vehicula. Sed cursus, purus quis faucibus ornare, elit eros iaculis nunc, at commodo mauris sapien eget enim. Maecenas eget metus mauris. Donec ullamcorper lorem ultrices enim venenatis laoreet. Aenean ut placerat lorem, eu ultricies ex. Nullam eget aliquet mi, a aliquam erat. Ut vel nulla at eros fermentum efficitur et nec augue. Pellentesque at scelerisque nisl, at condimentum orci.
        </p>
      </div>
    </div>

    <!-- LOCAL JQUERY -->
    <script src="js/room-desktop.js"></script>
  </body>
</html>