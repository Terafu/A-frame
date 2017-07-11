<?php
  session_start();

  $kitchen = true;

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
    <link rel="stylesheet" href="css/room.css" />
  </head>
  <body>

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

        <!-- SOUND -->
        <a-entity id="steps"></a-entity>

        <!-- PARTICLES -->
        <a-entity id="particles" position="0 3.5 0" scale="0.1 0.1 0.1"></a-entity>

        <!-- TELEPORT RINGS -->
        <!--<a-circle id = "teleport1" set-position="0 1 2.5" color="blue" radius="0.15" position="0 0.050 2.5" rotation="-90 0 0" data-interactive="true"></a-circle>
        <a-circle id = "teleport2" set-position="0 1 0" color="blue" radius="0.15" position="0 0.050 0" rotation="-90 0 0" data-interactive="true"></a-circle>-->

        <!-- IMPORT AN OBJ -->
        <a-obj-model rotation="0 0 0" position="-14 0 5" scale="1.4 1.4 1.4" id="test_model" obj-model="obj:kitchen/kitchen.obj;mtl:kitchen/kitchen.mtl"></a-obj-model>
        <a-obj-model rotation="0 0 0" position="0.35 0 -0.4" scale="1.4 1.4 1.4" id="test_wall" obj-model="obj:kitchen/test-wall.obj;mtl:kitchen/test-wall.mtl"></a-obj-model>


        <!-- DEFINE THE BACKGROUND IMAGE OF THE SCENE -->
        <!--<a-sky src="#sky"></a-sky>-->

        <!-- DEFINE THE BACKGROUND COLOR OF THE SCENE -->
        <!--<a-sky color="#c5c5c5"></a-sky>-->
      </a-scene>
    </div>

    <!-- LOCAL JQUERY -->
    <script src="js/room.js"></script>
  </body>
</html>