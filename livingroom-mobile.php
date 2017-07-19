<?php
  session_start();

  $livingroom = true;

  if(isset($_SESSION["livingroom"])) {
    $livingroom = false;  
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
    <link rel="stylesheet" href="css/room-mobile.css" />
  </head>
  <body>

    <!-- CURSOR FEEDBACK -->
    <script src="js/livingroom-mobile.js"></script>

    <!-- 3D SCENE -->
    <div id="scene">
      <a-scene embedded>
        <a-assets>
          <!-- DEFINITION OF THE ASSETS -->

          <!-- BACKGROUND IMAGE OF THE SCENE -->
          <!--<img id="sky" src="sphere.jpg">-->

          <!-- TEXTURES -->
          <img id="parquet" src="images/parquet.jpg">
          <img id="mur" src="images/mur.jpg">
          <img id="mur-poster" src="images/mur-poster.jpg">
          <img id="mur-normalMap" src="images/mur-normalMap.jpg">
          <img id="mur-poster-normalMap" src="images/mur-poster-normalMap.jpg">
          <img id="left-arrow" src="images/left-arrow.png">
          <img id="right-arrow" src="images/right-arrow.png">
          <img id="up-arrow" src="images/up-arrow.png">
          <img id="down-arrow" src="images/down-arrow.png">
          <imd id="menu-button" src="images/menu-button.png">

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
        <a-camera><a-cursor scale="1.5 1.5 1.5" color="#4CC3D9" fuse="true" timeout="1500" cursor-feedback></a-cursor></a-camera>

        <!-- Bottom -->
        <a-plane id="bottom" height="8" width="8" position="0 0 0" rotation="-90 0 0" material="src: #parquet; normal-map: #parquet-normalMap; roughness: 0.2"></a-plane>
        <a-plane id="fog-bottom" height="8" width="8" position="0 0.01 0" rotation="-90 0 0" material="opacity: 0"></a-plane>
        <!-- Front-->
        <a-plane id="front" height="6" width="8" position="0 3 -4" rotation="0 0 0" material="src: #mur; normal-map: #mur-normalMap"></a-plane>
        <a-plane id="fog-front" height="6" width="8" position="0 3 -3.99" rotation="0 0 0" material="opacity: 0"></a-plane>
        <!--Back -->
        <a-plane id="back" height="6" width="8" position="0 3 4" rotation="180 0 0" material="src: #mur-poster; normal-map: #mur-poster-normalMap"></a-plane>
        <a-plane id="fog-back" height="6" width="8" position="0 3 3.99" rotation="180 0 0" material="opacity: 0"></a-plane>
        <!-- Left-->
        <a-plane id="left" height="6" width="8" position="-4 3 0" rotation="0 90 0" material="src: #mur; normal-map: #mur-normalMap"></a-plane>
        <a-plane id="fog-left" height="6" width="8" position="-3.99 3 0" rotation="0 90 0" material="opacity: 0"></a-plane>
        <!-- Right-->
        <a-plane id="right" height="6" width="8" position="3.99 3 0" rotation="0 -90 0" material="src: #mur; normal-map: #mur-normalMap"></a-plane>
        <a-plane id="fog-right" height="6" width="8" position="3.99 3 0" rotation="0 -90 0" material="opacity: 0"></a-plane>
        <!-- Top -->
        <a-plane id="top" height="8" width="8" position="0 5.99 0" rotation="90 0 0" material="src: #mur; normal-map: #mur-normalMap"></a-plane>
        <a-plane id="fog-top" height="8" width="8" position="0 5.99 0" rotation="90 0 0" material="opacity: 0"></a-plane>

        <!-- SOUND -->
        <a-entity id="steps"></a-entity>

        <!-- PARTICLES -->
        <!--<a-entity id="particles" scale="0.08 0.05 0.08" position="0 3.5 0" particle-system="preset: dust; color: #EF0000; particleCount: 200; size: 0.2; opacity: 1; maxAge: 3"></a-entity>-->


        <a-plane id="welcomeText" width="2.5" height="2" color="#6d6d6d" position="0 1.1 -2.5" visible="true" rotation="0 0 0"><a-entity scale="2.5 2.5 2.5" position="0 0.7 0" text="value: To show the main menu you have to click on the menu logo.; align: center; baseline: top"></a-entity></a-plane>
        <a-image id="showMenu" data-interactive="true" visible="true" src="#menu-button" position="0 0.8 -2.49"></a-image>


        <!-- VR MENU -->
          <!-- MAIN MENU (bottom to top) -->
        <a-entity class="menu" ui-modal visible="false"> 
          <a-plane id="validate-button" validate-button width="2" height="0.5" color="#6d6d6d" position="0 -2.7 0" data-interactive="true"><a-entity scale="3 3 3" text="value: Validate; align: center"></a-entity></a-plane>          
          <a-box width="2" height="0.05" depth="0.01" color="#FFFFFF" position="0 -2.45 0"></a-box>
          <a-plane id="ventilation" width="2" height="0.5" color="#6d6d6d" position="0 -2.2 0" data-interactive="true"><a-entity scale="3 3 3" text="value: Ventilation; align: center"></a-entity></a-plane>
          <a-box width="2" height="0.05" depth="0.01" color="#FFFFFF" position="0 -1.95 0"></a-box>
          <a-plane id="sound" width="2" height="0.5" color="#6d6d6d" position="0 -1.7 0" data-interactive="true"><a-entity scale="3 3 3" text="value: Sound; align: center"></a-entity></a-plane>
          <a-box width="2" height="0.05" depth="0.01" color="#FFFFFF" position="0 -1.45 0"></a-box>
          <a-plane id="light" width="2" height="0.5" color="#6d6d6d" position="0 -1.2 0" data-interactive="true"><a-entity scale="3 3 3" text="value: Light; align: center"></a-entity></a-plane>
          <a-box width="2" height="0.05" depth="0.01" color="#FFFFFF" position="0 -0.95 0"></a-box>
          <a-plane id="warmth" width="2" height="0.5" color="#6d6d6d" position="0 -0.7 0" data-interactive="true"><a-entity scale="3 3 3" text="value: Warmth; align: center"></a-entity></a-plane>                   
          <a-box width="2" height="0.05" depth="0.01" color="#FFFFFF" position="0 -0.45 0"></a-box>                   
          <a-plane id="menu-close" menu-close width="2" height="0.5" color="#6d6d6d" position="0 -0.2 0" data-interactive="true"><a-entity scale="3 3 3" text="value: Close; align: center"></a-entity></a-plane>
        </a-entity>

          <!-- WARMTH SUB MENU (bottom to top) -->
        <a-entity id="submenu-warmth" submenu-warmth visible="false" position="0 0 0">
          <a-plane id="warmth-back" warmth-back width="2" height="0.5" color="#6d6d6d" position="0 -2.7 0" data-interactive="true"><a-entity scale="3 3 3" text="value: Back; align: center"></a-entity></a-plane>          
          <a-box width="2" height="0.05" depth="0.01" color="#FFFFFF" position="0 -2.45 0"></a-box>
          <a-plane width="2" height="0.5" color="#6d6d6d" position="0 -2.2 0"><a-entity id="warmth-roof" scale="3 3 3" text="value: glass; align: center"></a-entity></a-plane>
          <a-plane id="warmth-roof-left" warmth-roof-left width="0.3" height="0.3" material="transparent: true; src: #left-arrow" position="-0.7 -2.2 0.01" data-interactive="true"></a-plane>
          <a-plane id="warmth-roof-right" warmth-roof-right width="0.3" height="0.3" material="transparent: true; src: #right-arrow" position="0.7 -2.2 0.01" data-interactive="true"></a-plane>
          <a-box width="2" height="0.05" depth="0.01" color="#FFFFFF" position="0 -1.95 0"></a-box>
          <a-plane width="2" height="0.5" color="#6d6d6d" position="0 -1.7 0"><a-entity id="warmth-floor" scale="3 3 3" text="value: glass; align: center"></a-entity></a-plane>
          <a-plane id="warmth-floor-left" warmth-floor-left width="0.3" height="0.3" material="transparent: true; src: #left-arrow" position="-0.7 -1.7 0.01" data-interactive="true"></a-plane>
          <a-plane id="warmth-floor-right" warmth-floor-right width="0.3" height="0.3" material="transparent: true; src: #right-arrow" position="0.7 -1.7 0.01" data-interactive="true"></a-plane>
          <a-box width="2" height="0.05" depth="0.01" color="#FFFFFF" position="0 -1.45 0"></a-box>
          <a-plane width="2" height="0.5" color="#6d6d6d" position="0 -1.2 0"><a-entity id="warmth-wall" scale="3 3 3" text="value: glass; align: center"></a-entity></a-plane>
          <a-plane id="warmth-wall-left" warmth-wall-left width="0.3" height="0.3" material="transparent: true; src: #left-arrow" position="-0.7 -1.2 0.01" data-interactive="true"></a-plane>
          <a-plane id="warmth-wall-right" warmth-wall-right width="0.3" height="0.3" material="transparent: true; src: #right-arrow" position="0.7 -1.2 0.01" data-interactive="true"></a-plane>
          <a-box width="2" height="0.05" depth="0.01" color="#FFFFFF" position="0 -0.95 0"></a-box>
          <a-plane width="2" height="0.5" color="#6d6d6d" position="0 -0.7 0"><a-entity id="warmth-junctions" scale="3 3 3" text="value: glass; align: center"></a-entity></a-plane>
          <a-plane id="warmth-junctions-left" warmth-junctions-left width="0.3" height="0.3" material="transparent: true; src: #left-arrow" position="-0.7 -0.7 0.01" data-interactive="true"></a-plane>
          <a-plane id="warmth-junctions-right" warmth-junctions-right width="0.3" height="0.3" material="transparent: true; src: #right-arrow" position="0.7 -0.7 0.01" data-interactive="true"></a-plane>
        </a-entity>

          <!-- SOUND SUB MENU (bottom to top) -->
        <a-entity id="submenu-sound" submenu-sound visible="false" position="0 0 0">
          <a-plane id="sound-back" sound-back width="2" height="0.5" color="#6d6d6d" position="0 -2.7 0" data-interactive="true"><a-entity scale="3 3 3" text="value: Back; align: center"></a-entity></a-plane>          
          <a-box width="2" height="0.05" depth="0.01" color="#FFFFFF" position="0 -2.45 0"></a-box>
          <a-plane id="sound-play" play-sound width="2" height="0.5" color="#6d6d6d" position="0 -2.2 0" data-interactive="true"><a-entity id="play" scale="3 3 3" text="value: Play Sound; align: center"></a-entity></a-plane>
          <a-box width="2" height="0.05" depth="0.01" color="#FFFFFF" position="0 -1.95 0"></a-box>
          <a-plane width="2" height="0.5" color="#6d6d6d" position="0 -1.7 0"><a-entity id="sound-type" scale="3 3 3" text="value: steps; align: center"></a-entity></a-plane>
          <a-plane id="sound-type-left" sound-type-left width="0.3" height="0.3" material="transparent: true; src: #left-arrow" position="-0.7 -1.7 0.01" data-interactive="true"></a-plane>
          <a-plane id="sound-type-right" sound-type-right width="0.3" height="0.3" material="transparent: true; src: #right-arrow" position="0.7 -1.7 0.01" data-interactive="true"></a-plane>
          <a-box width="2" height="0.05" depth="0.01" color="#FFFFFF" position="0 -1.45 0"></a-box>
          <a-plane width="2" height="0.5" color="#6d6d6d" position="0 -1.2 0"><a-entity id="sound-floor" scale="3 3 3" text="value: glass; align: center"></a-entity></a-plane>
          <a-plane id="sound-floor-left" sound-floor-left width="0.3" height="0.3" material="transparent: true; src: #left-arrow" position="-0.7 -1.2 0.01" data-interactive="true"></a-plane>
          <a-plane id="sound-floor-right" sound-floor-right width="0.3" height="0.3" material="transparent: true; src: #right-arrow" position="0.7 -1.2 0.01" data-interactive="true"></a-plane>
          <a-box width="2" height="0.05" depth="0.01" color="#FFFFFF" position="0 -0.95 0"></a-box>
          <a-plane width="2" height="0.5" color="#6d6d6d" position="0 -0.7 0"><a-entity id="sound-wall" scale="3 3 3" text="value: glass; align: center"></a-entity></a-plane>
          <a-plane id="sound-wall-left" sound-wall-left width="0.3" height="0.3" material="transparent: true; src: #left-arrow" position="-0.7 -0.7 0.01" data-interactive="true"></a-plane>
          <a-plane id="sound-wall-right" sound-wall-right width="0.3" height="0.3" material="transparent: true; src: #right-arrow" position="0.7 -0.7 0.01" data-interactive="true"></a-plane>
        </a-entity>

          <!-- LIGHT SUB MENU (bottom to top) -->
        <a-entity id="submenu-light" submenu-light visible="false" position="0 0 0">
          <a-plane id="light-back" light-back width="2" height="0.5" color="#6d6d6d" position="0 -2.7 0" data-interactive="true"><a-entity scale="3 3 3" text="value: Back; align: center"></a-entity></a-plane>
          <a-box width="2" height="0.05" depth="0.01" color="#FFFFFF" position="0 -2.45 0"></a-box>
          <a-plane width="2" height="2" color="#6d6d6d" position="0 -1.6 0"></a-plane>          
          <a-plane id="light-down-arrow" width="0.3" down-arrow-light height="0.3" material="transparent: true; src: #down-arrow" position="0 -2.2 0.01" data-interactive="true"></a-plane>          
          <a-plane width="1.5" height="0.2" color="#FFFFFF" position="0 -1.6 0.01"></a-plane>
          <a-plane id="light-slider" width="0.75" height="0.2" color="#3DC6FF" position="-0.37 -1.6 0.02"></a-plane>
          <a-entity id="light-text" scale="3 3 3" text="value: 150 Lux; align: center" position="0 -1.3 0"></a-entity>
          <a-plane id="light-up-arrow" up-arrow-light width="0.3" height="0.3" material="transparent: true; src: #up-arrow" position="0 -0.8 0.01" data-interactive="true"></a-plane>
        </a-entity>

          <!-- VENTILATION SUB MENU (bottom to top) -->
        <a-entity id="submenu-ventilation" submenu-ventilation visible="false" position="0 0 0">
          <a-plane id="ventilation-back" ventilation-back width="2" height="0.5" color="#6d6d6d" position="0 -2.7 0" data-interactive="true"><a-entity scale="3 3 3" text="value: Back; align: center"></a-entity></a-plane>          
          <a-box width="2" height="0.05" depth="0.01" color="#FFFFFF" position="0 -2.45 0"></a-box>
          <a-plane width="2" height="0.5" color="#6d6d6d" position="0 -2.2 0"><a-entity id="ventilation-type" scale="3 3 3" text="value: VOC; align: center"></a-entity></a-plane>
          <a-plane id="ventilation-type-left" ventilation-type-left width="0.3" height="0.3" material="transparent: true; src: #left-arrow" position="-0.7 -2.2 0.01" data-interactive="true"></a-plane>
          <a-plane id="ventilation-type-right" ventilation-type-right width="0.3" height="0.3" material="transparent: true; src: #right-arrow" position="0.7 -2.2 0.01" data-interactive="true"></a-plane>
          <a-box width="2" height="0.05" depth="0.01" color="#FFFFFF" position="0 -1.95 0"></a-box>
          <a-plane width="2" height="0.5" color="#6d6d6d" position="0 -1.7 0"><a-entity id="ventilation-floor" scale="3 3 3" text="value: normal-floor; align: center"></a-entity></a-plane>
          <a-plane id="ventilation-floor-left" ventilation-floor-left width="0.3" height="0.3" material="transparent: true; src: #left-arrow" position="-0.7 -1.7 0.01" data-interactive="true"></a-plane>
          <a-plane id="ventilation-floor-right" ventilation-floor-right width="0.3" height="0.3" material="transparent: true; src: #right-arrow" position="0.7 -1.7 0.01" data-interactive="true"></a-plane>
          <a-box width="2" height="0.05" depth="0.01" color="#FFFFFF" position="0 -1.45 0"></a-box>
          <a-plane width="2" height="0.5" color="#6d6d6d" position="0 -1.2 0"><a-entity id="ventilation-ventilation" scale="3 3 3" text="value: no-ventilation; align: center"></a-entity></a-plane>
          <a-plane id="ventilation-ventilation-left" ventilation-ventilation-left width="0.3" height="0.3" material="transparent: true; src: #left-arrow" position="-0.7 -1.2 0.01" data-interactive="true"></a-plane>
          <a-plane id="ventilation-ventilation-right" ventilation-ventilation-right width="0.3" height="0.3" material="transparent: true; src: #right-arrow" position="0.7 -1.2 0.01" data-interactive="true"></a-plane>
        </a-entity>



        <!-- TELEPORT RINGS -->
        <!--<a-circle id = "teleport1" set-position="0 1 2.5" color="blue" radius="0.15" position="0 0.050 2.5" rotation="-90 0 0" data-interactive="true"></a-circle>
        <a-circle id = "teleport2" set-position="0 1 0" color="blue" radius="0.15" position="0 0.050 0" rotation="-90 0 0" data-interactive="true"></a-circle>-->

        <!-- IMPORT AN OBJ -->
        <!--<a-obj-model scale="1.2 1.2 1.2" id="test_model" obj-model="obj:bed/bed.obj"></a-obj-model>-->

        <!-- DEFINE THE BACKGROUND IMAGE OF THE SCENE -->
        <!--<a-sky src="#sky"></a-sky>-->

        <!-- DEFINE THE BACKGROUND COLOR OF THE SCENE -->
        <!--<a-sky color="#c5c5c5"></a-sky>-->
      </a-scene>
    </div>
  </body>
</html>