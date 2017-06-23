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
    <script src="https://rawgit.com/gmarty/aframe-ui-components/master/dist/aframe-ui-components.min.js"></script>

    <!-- PARTICLES -->
    <script src="https://unpkg.com/aframe-particle-system-component@1.0.x/dist/aframe-particle-system-component.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="room2.css" />
  </head>
  <body>

  <!-- TO PUT IN ANOTHER FILE -->
    <script>
      /* SUBMENU WARMTH (onClick simulate by the cursor) */
      AFRAME.registerComponent('submenu-warmth', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#warmth',
            },
            zpos: {
                default: -3
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, this.eventHandler.bind(this));

          this.cameraEl = document.querySelector('a-camera');

          this.yaxis = new THREE.Vector3(0, 1, 0);
          this.zaxis = new THREE.Vector3(0, 0, 1);

          this.pivot = new THREE.Object3D();
          this.el.object3D.position.set(0, this.cameraEl.object3D.getWorldPosition().y, this.data.zpos);

          this.el.sceneEl.object3D.add(this.pivot);
          this.pivot.add(this.el.object3D);
        },

        eventHandler: function(evt) {

            if (this.el.getAttribute('visible') === false) {

                $('.menu').attr('visible', 'true');

                var direction = this.zaxis.clone();
                direction.applyQuaternion(this.cameraEl.object3D.quaternion);
                var ycomponent = this.yaxis.clone().multiplyScalar(direction.dot(this.yaxis));
                direction.sub(ycomponent);
                direction.normalize();

                this.pivot.quaternion.setFromUnitVectors(this.zaxis, direction);
                this.pivot.position.copy(this.cameraEl.object3D.getWorldPosition());

                this.el.setAttribute('visible', true);

            } 

            else if (this.el.getAttribute('visible') === true) {

                this.el.setAttribute('visible', false);
            }

        },

        update: function (oldData) {},

        remove: function() {}
      });

      /* SUBMENU SOUND (onClick simulate by the cursor) */
      AFRAME.registerComponent('submenu-sound', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#sound',
            },
            zpos: {
                default: -3
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, this.eventHandler.bind(this));

          this.cameraEl = document.querySelector('a-camera');

          this.yaxis = new THREE.Vector3(0, 1, 0);
          this.zaxis = new THREE.Vector3(0, 0, 1);

          this.pivot = new THREE.Object3D();
          this.el.object3D.position.set(0, this.cameraEl.object3D.getWorldPosition().y, this.data.zpos);

          this.el.sceneEl.object3D.add(this.pivot);
          this.pivot.add(this.el.object3D);
        },

        eventHandler: function(evt) {

            if (this.el.getAttribute('visible') === false) {

                $('.menu').attr('visible', 'true');

                var direction = this.zaxis.clone();
                direction.applyQuaternion(this.cameraEl.object3D.quaternion);
                var ycomponent = this.yaxis.clone().multiplyScalar(direction.dot(this.yaxis));
                direction.sub(ycomponent);
                direction.normalize();

                this.pivot.quaternion.setFromUnitVectors(this.zaxis, direction);
                this.pivot.position.copy(this.cameraEl.object3D.getWorldPosition());

                this.el.setAttribute('visible', true);

            } 

            else if (this.el.getAttribute('visible') === true) {

                this.el.setAttribute('visible', false);
            }

        },

        update: function (oldData) {},

        remove: function() {}
      });

      /* SUBMENU LIGHT (onClick simulate by the cursor) */
      AFRAME.registerComponent('submenu-light', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#light',
            },
            zpos: {
                default: -3
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, this.eventHandler.bind(this));

          this.cameraEl = document.querySelector('a-camera');

          this.yaxis = new THREE.Vector3(0, 1, 0);
          this.zaxis = new THREE.Vector3(0, 0, 1);

          this.pivot = new THREE.Object3D();
          this.el.object3D.position.set(0, this.cameraEl.object3D.getWorldPosition().y, this.data.zpos);

          this.el.sceneEl.object3D.add(this.pivot);
          this.pivot.add(this.el.object3D);
        },

        eventHandler: function(evt) {

            if (this.el.getAttribute('visible') === false) {

                $('.menu').attr('visible', 'true');

                var direction = this.zaxis.clone();
                direction.applyQuaternion(this.cameraEl.object3D.quaternion);
                var ycomponent = this.yaxis.clone().multiplyScalar(direction.dot(this.yaxis));
                direction.sub(ycomponent);
                direction.normalize();

                this.pivot.quaternion.setFromUnitVectors(this.zaxis, direction);
                this.pivot.position.copy(this.cameraEl.object3D.getWorldPosition());

                this.el.setAttribute('visible', true);

            } 

            else if (this.el.getAttribute('visible') === true) {

                this.el.setAttribute('visible', false);
            }

        },

        update: function (oldData) {},

        remove: function() {}
      });

      /* SUBMENU VENTILATION (onClick simulate by the cursor) */
      AFRAME.registerComponent('submenu-ventilation', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#ventilation',
            },
            zpos: {
                default: -3
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, this.eventHandler.bind(this));

          this.cameraEl = document.querySelector('a-camera');

          this.yaxis = new THREE.Vector3(0, 1, 0);
          this.zaxis = new THREE.Vector3(0, 0, 1);

          this.pivot = new THREE.Object3D();
          this.el.object3D.position.set(0, this.cameraEl.object3D.getWorldPosition().y, this.data.zpos);

          this.el.sceneEl.object3D.add(this.pivot);
          this.pivot.add(this.el.object3D);
        },

        eventHandler: function(evt) {

            if (this.el.getAttribute('visible') === false) {

                $('.menu').attr('visible', 'true');

                var direction = this.zaxis.clone();
                direction.applyQuaternion(this.cameraEl.object3D.quaternion);
                var ycomponent = this.yaxis.clone().multiplyScalar(direction.dot(this.yaxis));
                direction.sub(ycomponent);
                direction.normalize();

                this.pivot.quaternion.setFromUnitVectors(this.zaxis, direction);
                this.pivot.position.copy(this.cameraEl.object3D.getWorldPosition());

                this.el.setAttribute('visible', true);

            } 

            else if (this.el.getAttribute('visible') === true) {

                this.el.setAttribute('visible', false);
            }

        },

        update: function (oldData) {},

        remove: function() {}
      });

      /* MENU (onClick) */
      AFRAME.registerComponent('ui-modal', {

        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: 'a-scene',
            },
            zpos: {
                default: -3
            }
        },

        init: function() { 

            document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, this.eventHandler.bind(this));

            this.cameraEl = document.querySelector('a-camera');

            this.yaxis = new THREE.Vector3(0, 1, 0);
            this.zaxis = new THREE.Vector3(0, 0, 1);

            this.pivot = new THREE.Object3D();
            this.el.object3D.position.set(0, this.cameraEl.object3D.getWorldPosition().y, this.data.zpos);

            this.el.sceneEl.object3D.add(this.pivot);
            this.pivot.add(this.el.object3D);
            

        },

        eventHandler: function(evt) {

            if (this.el.getAttribute('visible') === false) {

                var direction = this.zaxis.clone();
                direction.applyQuaternion(this.cameraEl.object3D.quaternion);
                var ycomponent = this.yaxis.clone().multiplyScalar(direction.dot(this.yaxis));
                direction.sub(ycomponent);
                direction.normalize();

                this.pivot.quaternion.setFromUnitVectors(this.zaxis, direction);
                this.pivot.position.copy(this.cameraEl.object3D.getWorldPosition());

                this.el.setAttribute('visible', true);

            } 

            else if (this.el.getAttribute('visible') === true) {

                this.el.setAttribute('visible', false);
            }

        },

        update: function (oldData) {},

        remove: function() {}
      });
    </script>

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
          <audio id="sound-steps-glass-glass" src="steps.mp3" preload="true"></audio>
          <audio id="sound-steps-poly-glass" src="steps2.mp3" preload="true"></audio>
          <audio id="sound-steps-rock-glass" src="steps3.mp3" preload="true"></audio>
          <audio id="sound-steps-glass-poly" src="steps.mp3" preload="true"></audio>
          <audio id="sound-steps-poly-poly" src="steps2.mp3" preload="true"></audio>
          <audio id="sound-steps-rock-poly" src="steps3.mp3" preload="true"></audio>
          <audio id="sound-steps-glass-rock" src="steps.mp3" preload="true"></audio>
          <audio id="sound-steps-poly-rock" src="steps2.mp3" preload="true"></audio>
          <audio id="sound-steps-rock-rock" src="steps3.mp3" preload="true"></audio>
          <audio id="sound-music-glass-glass" src="music.mp3" preload="true"></audio>
          <audio id="sound-music-poly-glass" src="music2.mp3" preload="true"></audio>
          <audio id="sound-music-rock-glass" src="music3.mp3" preload="true"></audio>
          <audio id="sound-music-glass-poly" src="music.mp3" preload="true"></audio>
          <audio id="sound-music-poly-poly" src="music2.mp3" preload="true"></audio>
          <audio id="sound-music-rock-poly" src="music3.mp3" preload="true"></audio>
          <audio id="sound-music-glass-rock" src="music.mp3" preload="true"></audio>
          <audio id="sound-music-poly-rock" src="music2.mp3" preload="true"></audio>
          <audio id="sound-music-rock-rock" src="music3.mp3" preload="true"></audio>
          <audio id="sound-voices-glass-glass" src="voices.mp3" preload="true"></audio>
          <audio id="sound-voices-poly-glass" src="voices2.mp3" preload="true"></audio>
          <audio id="sound-voices-rock-glass" src="voices3.mp3" preload="true"></audio>
          <audio id="sound-voices-glass-poly" src="voices.mp3" preload="true"></audio>
          <audio id="sound-voices-poly-poly" src="voices2.mp3" preload="true"></audio>
          <audio id="sound-voices-rock-poly" src="voices3.mp3" preload="true"></audio>
          <audio id="sound-voices-glass-rock" src="voices.mp3" preload="true"></audio>
          <audio id="sound-voices-poly-rock" src="voices2.mp3" preload="true"></audio>
          <audio id="sound-voices-rock-rock" src="voices3.mp3" preload="true"></audio>

        </a-assets>

        <!-- DISABLE MOVEMENTS IN THE SCENE -->
        <!--<a-camera wasd-controls-enabled="false"></a-camera>-->

        <!-- LIGHTS -->
        <a-entity light="type: ambient; color: #BBB"></a-entity>
        <a-entity id="directional-light" light="type: directional; color: #FFF; intensity: 0.6" position="-0.5 1 1"></a-entity>

        <!-- ADD A CURSOR (timeout in ms) -->
        <a-camera><a-cursor color="#4CC3D9" fuse="true" timeout="1000" cursor-feedback></a-cursor></a-camera>

        <!-- Bottom -->
        <a-plane id="bottom" height="8" width="8" position="0 0 0" rotation="-90 0 0" material="src: #parquet"></a-plane>
        <!-- Front-->
        <a-plane id="front" height="6" width="8" position="0 3 -4" rotation="0 0 0" material="src: #mur"></a-plane>
        <!--Back -->
        <a-plane id="back" height="6" width="8" position="0 3 4" rotation="180 0 0" material="src: #mur-poster"></a-plane>
        <!-- Left-->
        <a-plane id="left" height="6" width="8" position="-4 3 0" rotation="0 90 0" material="src: #mur"></a-plane>
        <!-- Right-->
        <a-plane id="right" height="6" width="8" position="4 3 0" rotation="0 -90 0" material="src: #mur"></a-plane>
        <!-- Top -->
        <a-plane id="top" height="8" width="8" position="0 6 0" rotation="90 0 0" material="src: #mur"></a-plane>

        <!-- SOUND -->
        <a-entity id="steps"></a-entity>

        <!-- PARTICLES -->
        <a-entity id="particles" position="0 3.5 0" scale="0.1 0.1 0.1"></a-entity>

        <a-entity class="menu" ui-modal visible="false">
          <a-plane id="ventilation" width="2" height="0.5" color="yellow" position="0 -2.2 0" data-interactive="true"><a-entity scale="5 5 5" text="value: Ventilation; align: center"></a-entity></a-plane>
          <a-plane id="sound" width="2" height="0.5" color="red" position="0 -1.7 0" data-interactive="true"><a-entity scale="5 5 5" text="value: Sound; align: center"></a-entity></a-plane>
          <a-plane id="light" width="2" height="0.5" color="green" position="0 -1.2 0" data-interactive="true"><a-entity scale="5 5 5" text="value: Light; align: center"></a-entity></a-plane>
          <a-plane id="warmth" width="2" height="0.5" color="blue" position="0 -0.7 0" data-interactive="true"><a-entity scale="5 5 5" text="value: Warmth; align: center"></a-entity></a-plane>
        </a-entity>

        <a-entity submenu-warmth visible="false" position="0 0 0">
          <a-plane id="warm1" width="2" height="0.5" color="yellow" position="0 -2.2 0" data-interactive="true"><a-entity scale="5 5 5" text="value: Warmth; align: center"></a-entity></a-plane>
          <a-plane id="warm2" width="2" height="0.5" color="red" position="0 -1.7 0" data-interactive="true"><a-entity scale="5 5 5" text="value: Warmth; align: center"></a-entity></a-plane>
          <a-plane id="warm3" width="2" height="0.5" color="green" position="0 -1.2 0" data-interactive="true"><a-entity scale="5 5 5" text="value: Warmth; align: center"></a-entity></a-plane>
          <a-plane id="warm4" width="2" height="0.5" color="blue" position="0 -0.7 0" data-interactive="true"><a-entity scale="5 5 5" text="value: Warmth; align: center"></a-entity></a-plane>
          </a-animation>
        </a-entity>

        <a-entity submenu-sound visible="false" position="0 0 0">
          <a-plane id="sound1" width="2" height="0.5" color="yellow" position="0 -2.2 0" data-interactive="true"><a-entity scale="5 5 5" text="value: Sound; align: center"></a-entity></a-plane>
          <a-plane id="sound2" width="2" height="0.5" color="red" position="0 -1.7 0" data-interactive="true"><a-entity scale="5 5 5" text="value: Sound; align: center"></a-entity></a-plane>
          <a-plane id="sound3" width="2" height="0.5" color="green" position="0 -1.2 0" data-interactive="true"><a-entity scale="5 5 5" text="value: Sound; align: center"></a-entity></a-plane>
          <a-plane id="sound4" width="2" height="0.5" color="blue" position="0 -0.7 0" data-interactive="true"><a-entity scale="5 5 5" text="value: Sound; align: center"></a-entity></a-plane>
          </a-animation>
        </a-entity>

        <a-entity submenu-light visible="false" position="0 0 0">
          <a-plane id="light1" width="2" height="0.5" color="yellow" position="0 -2.2 0" data-interactive="true"><a-entity scale="5 5 5" text="value: Light; align: center"></a-entity></a-plane>
          <a-plane id="light2" width="2" height="0.5" color="red" position="0 -1.7 0" data-interactive="true"><a-entity scale="5 5 5" text="value: Light; align: center"></a-entity></a-plane>
          <a-plane id="light3" width="2" height="0.5" color="green" position="0 -1.2 0" data-interactive="true"><a-entity scale="5 5 5" text="value: Light; align: center"></a-entity></a-plane>
          <a-plane id="light4" width="2" height="0.5" color="blue" position="0 -0.7 0" data-interactive="true"><a-entity scale="5 5 5" text="value: Light; align: center"></a-entity></a-plane>
          </a-animation>
        </a-entity>

        <a-entity submenu-ventilation visible="false" position="0 0 0">
          <a-plane id="ventilation1" width="2" height="0.5" color="yellow" position="0 -2.2 0" data-interactive="true"><a-entity scale="5 5 5" text="value: Ventilation; align: center"></a-entity></a-plane>
          <a-plane id="ventilation2" width="2" height="0.5" color="red" position="0 -1.7 0" data-interactive="true"><a-entity scale="5 5 5" text="value: Ventilation; align: center"></a-entity></a-plane>
          <a-plane id="ventilation3" width="2" height="0.5" color="green" position="0 -1.2 0" data-interactive="true"><a-entity scale="5 5 5" text="value: Ventilation; align: center"></a-entity></a-plane>
          <a-plane id="ventilation4" width="2" height="0.5" color="blue" position="0 -0.7 0" data-interactive="true"><a-entity scale="5 5 5" text="value: Ventilation; align: center"></a-entity></a-plane>
          </a-animation>
        </a-entity>

        <!-- TELEPORT RINGS -->
        <!--<a-circle id = "teleport1" set-position="0 1 2.5" color="blue" radius="0.15" position="0 0.050 2.5" rotation="-90 0 0" data-interactive="true"></a-circle>
        <a-circle id = "teleport2" set-position="0 1 0" color="blue" radius="0.15" position="0 0.050 0" rotation="-90 0 0" data-interactive="true"></a-circle>-->

        <!-- IMPORT AN OBJ -->
        <!--<a-obj-model id="test_model" obj-model="obj:test2.obj;mtl:test2.mtl"></a-obj-model>-->

        <!-- DEFINE THE BACKGROUND IMAGE OF THE SCENE -->
        <!--<a-sky src="#sky"></a-sky>-->

        <!-- DEFINE THE BACKGROUND COLOR OF THE SCENE -->
        <!--<a-sky color="#c5c5c5"></a-sky>-->
      </a-scene>
    </div>
  </body>
</html>