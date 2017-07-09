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
    <link rel="stylesheet" href="room2.css" />
  </head>
  <body>

    <!-- CURSOR FEEDBACK -->
    <script type="text/javascript">
      AFRAME.registerComponent('cursor-feedback', {
        schema: {
          property: { default: 'scale' },
          dur: { default: '1200' },
          to: { default: '0.1 0.1 0.1' },
        },

        multiple: false,

        init: function() {
          this.mouseenter = this.mouseenter.bind(this);
          this.mouseleave = this.mouseleave.bind(this);

          this.el.addEventListener('mouseenter', this.mouseenter);
          this.el.addEventListener('mouseleave', this.mouseleave);
        },

        mouseenter: function(evt) {
          const data = this.data;

          const states = evt.target.states;
          const index = states.indexOf('interactive');
          const target = evt.detail.intersectedEl;
          const isInteractive = !!target.dataset.interactive;

          if (index === -1 && isInteractive) {
            states.push('interactive');
            evt.target.removeAttribute('animation');
            evt.target.setAttribute('scale', '1.5 1.5 1.5');

            const animation = {
              property: data.property,
              dur: data.dur,
              to: data.to,
            };
            evt.target.setAttribute('animation', AFRAME.utils.styleParser.stringify(animation));
          } 

          else if (index >= 0 && !isInteractive) {
            states.splice(index, 1);
            evt.target.removeAttribute('animation');

            const animation = {
              property: data.property,
              dur: '1',
              to: '1.5 1.5 1.5',
            };
            evt.target.setAttribute('animation', AFRAME.utils.styleParser.stringify(animation));
          }
        },

        mouseleave: function(evt) {
          const data = this.data;

          const states = evt.target.states;
          const index = states.indexOf('interactive');

          if (index >= 0) {
            states.splice(index, 1);
            evt.target.removeAttribute('animation');
            const animation = {
              property: data.property,
              dur: '1',
              to: '1.5 1.5 1.5',
            };
            evt.target.setAttribute('animation', AFRAME.utils.styleParser.stringify(animation));
          }
        },

        remove: function() {
          this.el.removeAttribute('animation');
          this.el.removeEventListener('mouseenter', this.mouseenter);
          this.el.removeEventListener('mouseleave', this.mouseleave);
        },
      });
    </script>

  <!-- TO PUT IN ANOTHER FILE -->
    <script>


      
      /* VARIABLES */
      var insulationSwitch = ['glass', 'poly', 'rock'];
      var soundTypeSwitch = ['steps', 'music', 'voices'];
      var floorTypeSwitch = ['normal-floor', 'active-floor'];
      var ventilationTypeSwitch = ['VOC', 'CO2'];
      var ventilationVentilationSwitch = ['no-ventilation', 'natural-ventilation', 'air-conditioner'];

      var thermalToUse = "thermal-glass-glass-glass-glass";
      var thermalRoof = "glass";
      var thermalRoofIndex = 0;
      var thermalFloor = "glass";
      var thermalFloorIndex = 0;
      var thermalWall = "glass";
      var thermalWallIndex = 0;
      var thermalJunctions = "glass";
      var thermalJunctionsIndex = 0;

      var soundToPlay = "sound-steps-glass-glass";
      var soundType = "steps";
      var soundTypeIndex = 0;
      var soundWall = "glass";
      var soundWallIndex = 0;
      var soundFloor = "glass";
      var soundFloorIndex = 0;

      var ventilationToShow = "ventilation-no-ventilation-normal-floor-VOC";
      var ventilation = "no-ventilation";
      var ventilationIndex = 0; 
      var floor = "normal-floor";
      var floorIndex = 0;
      var type = "VOC";
      var typeIndex = 0;

      /* VALIDATE BUTTON (onClick simulate by the cursor) */
      AFRAME.registerComponent('validate-button', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#validate-button',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
                
                $('.menu').attr('visible', 'true');
                window.location = 'results.php?warmth-roof='+insulationSwitch[thermalRoofIndex]+'&warmth-floor='+insulationSwitch[thermalFloorIndex]+'&warmth-wall='+insulationSwitch[thermalWallIndex]+'&warmth-junctions='+insulationSwitch[thermalJunctionsIndex]+'&lux='+parseFloat($('#light-slider').attr("width")) * 200+'&sound-wall='+insulationSwitch[soundWallIndex]+'&sound-floor='+insulationSwitch[soundFloorIndex]+'&sound-type='+soundTypeSwitch[soundTypeIndex]+'&ventilation-ventilation='+ventilationVentilationSwitch[ventilationIndex]+'&ventilation-floor='+floorTypeSwitch[floorIndex]+'&ventilation-type='+ventilationTypeSwitch[typeIndex]+'&prev=kitchen';
          });
        }
      });

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

                thermalToUse = "thermal-" + $('#warmth-roof').attr('text').value + "-" + $('#warmth-floor').attr('text').value + "-" + $('#warmth-wall').attr('text').value + "-" + $('#warmth-junctions').attr('text').value;
                $("#bottom").attr("material", "src: #" + thermalToUse);
                $("#top").attr("material", "src: #" + thermalToUse);
                $("#left").attr("material", "src: #" + thermalToUse);
                $("#right").attr("material", "src: #" + thermalToUse);
                $("#front").attr("material", "src: #" + thermalToUse);
                $("#back").attr("material", "src: #" + thermalToUse);

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

                soundToPlay = "sound-" + $('#sound-type').attr('text').value + "-" + $('#sound-wall').attr('text').value + "-" + $('#sound-floor').attr('text').value;
                $("#steps").attr("sound", "src: #"+soundToPlay);
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

                ventilationToShow = 'ventilation-' + $('#ventilation-ventilation').attr('text').value + '-' + $('#ventilation-floor').attr('text').value + '-' + $('#ventilation-type').attr('text').value;
                if (ventilationToShow == "ventilation-no-ventilation-normal-floor-VOC") {
                  $("a-scene").attr("fog", 'type: linear; color: red; far: 10; near: 0');
                }
                else if (ventilationToShow == "ventilation-natural-ventilation-normal-floor-VOC") {
                  $("a-scene").attr("fog", 'type: linear; color: red; far: 12; near: 0');
                }
                else if (ventilationToShow == "ventilation-air-conditioner-normal-floor-VOC") {
                  $("a-scene").attr("fog", 'type: linear; color: red; far: 15; near: 0');
                }
                else if (ventilationToShow == "ventilation-no-ventilation-active-floor-VOC") {
                  $("a-scene").attr("fog", 'type: linear; color: red; far: 11; near: 0');
                }
                else if (ventilationToShow == "ventilation-natural-ventilation-active-floor-VOC") {
                  $("a-scene").attr("fog", 'type: linear; color: red; far: 13; near: 0');
                }
                else if (ventilationToShow == "ventilation-air-conditioner-active-floor-VOC") {
                  $("a-scene").attr("fog", 'type: linear; color: red; far: 11; near: 11');
                }
                else if (ventilationToShow == "ventilation-no-ventilation-normal-floor-CO2") {
                  $("a-scene").attr("fog", 'type: linear; color: white; far: 9; near: 0');
                }
                else if (ventilationToShow == "ventilation-natural-ventilation-normal-floor-CO2") {
                  $("a-scene").attr("fog", 'type: linear; color: white; far: 12; near: 0');
                }
                else if (ventilationToShow == "ventilation-air-conditioner-normal-floor-CO2") {
                  $("a-scene").attr("fog", 'type: linear; color: white; far: 11; near: 11');
                }
                else if (ventilationToShow == "ventilation-no-ventilation-active-floor-CO2") {
                  $("a-scene").attr("fog", 'type: linear; color: white; far: 9; near: 0');
                }
                else if (ventilationToShow == "ventilation-natural-ventilation-active-floor-CO2") {
                  $("a-scene").attr("fog", 'type: linear; color: white; far: 12; near: 0');
                }
                else if (ventilationToShow == "ventilation-air-conditioner-active-floor-CO2") {
                  $("a-scene").attr("fog", 'type: linear; color: white; far: 11; near: 11');
                }
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

      /* BACK BUTTON WARMTH (onClick simulate by the cursor) */
      AFRAME.registerComponent('warmth-back', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#warmth-back',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
              $('#submenu-warmth').attr('visible', 'false');
              $('.menu').attr('visible', 'false');

              $("#bottom").attr("material", "src: #parquet");
              $("#top").attr("material", "src: #mur");
              $("#left").attr("material", "src: #mur");
              $("#right").attr("material", "src: #mur");
              $("#front").attr("material", "src: #mur");
              $("#back").attr("material", "src: #mur-poster");

          });
        }
      });

      /* WARMTH ROOF LEFT ARROW (onClick simulate by the cursor) */
      AFRAME.registerComponent('warmth-roof-left', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#warmth-roof-left',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
            if (thermalRoofIndex > 0)
              thermalRoofIndex --;
            else
              thermalRoofIndex = 2;

            $('#warmth-roof').attr('text', 'value: ' + insulationSwitch[thermalRoofIndex] + '; align: center');
            thermalToUse = "thermal-" + $('#warmth-roof').attr('text').value + "-" + $('#warmth-floor').attr('text').value + "-" + $('#warmth-wall').attr('text').value + "-" + $('#warmth-junctions').attr('text').value;
            $("#bottom").attr("material", "src: #" + thermalToUse);
            $("#top").attr("material", "src: #" + thermalToUse);
            $("#left").attr("material", "src: #" + thermalToUse);
            $("#right").attr("material", "src: #" + thermalToUse);
            $("#front").attr("material", "src: #" + thermalToUse);
            $("#back").attr("material", "src: #" + thermalToUse);
          });
        }
      });

      /* WARMTH ROOF RIGHT ARROW (onClick simulate by the cursor) */
      AFRAME.registerComponent('warmth-roof-right', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#warmth-roof-right',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
            if (thermalRoofIndex < 2)
              thermalRoofIndex ++;
            else
              thermalRoofIndex = 0;

            $('#warmth-roof').attr('text', 'value: ' + insulationSwitch[thermalRoofIndex] + '; align: center');
            thermalToUse = "thermal-" + $('#warmth-roof').attr('text').value + "-" + $('#warmth-floor').attr('text').value + "-" + $('#warmth-wall').attr('text').value + "-" + $('#warmth-junctions').attr('text').value;
            $("#bottom").attr("material", "src: #" + thermalToUse);
            $("#top").attr("material", "src: #" + thermalToUse);
            $("#left").attr("material", "src: #" + thermalToUse);
            $("#right").attr("material", "src: #" + thermalToUse);
            $("#front").attr("material", "src: #" + thermalToUse);
            $("#back").attr("material", "src: #" + thermalToUse);
          });
        }
      });

      /* WARMTH WALL LEFT ARROW (onClick simulate by the cursor) */
      AFRAME.registerComponent('warmth-wall-left', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#warmth-wall-left',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
            if (thermalWallIndex > 0)
              thermalWallIndex --;
            else
              thermalWallIndex = 2;

            $('#warmth-wall').attr('text', 'value: ' + insulationSwitch[thermalWallIndex] + '; align: center');
            thermalToUse = "thermal-" + $('#warmth-roof').attr('text').value + "-" + $('#warmth-floor').attr('text').value + "-" + $('#warmth-wall').attr('text').value + "-" + $('#warmth-junctions').attr('text').value;
            $("#bottom").attr("material", "src: #" + thermalToUse);
            $("#top").attr("material", "src: #" + thermalToUse);
            $("#left").attr("material", "src: #" + thermalToUse);
            $("#right").attr("material", "src: #" + thermalToUse);
            $("#front").attr("material", "src: #" + thermalToUse);
            $("#back").attr("material", "src: #" + thermalToUse);
          });
        }
      });

      /* WARMTH WALL RIGHT ARROW (onClick simulate by the cursor) */
      AFRAME.registerComponent('warmth-wall-right', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#warmth-wall-right',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
            if (thermalWallIndex < 2)
              thermalWallIndex ++;
            else
              thermalWallIndex = 0;

            $('#warmth-wall').attr('text', 'value: ' + insulationSwitch[thermalWallIndex] + '; align: center');
            thermalToUse = "thermal-" + $('#warmth-roof').attr('text').value + "-" + $('#warmth-floor').attr('text').value + "-" + $('#warmth-wall').attr('text').value + "-" + $('#warmth-junctions').attr('text').value;
            $("#bottom").attr("material", "src: #" + thermalToUse);
            $("#top").attr("material", "src: #" + thermalToUse);
            $("#left").attr("material", "src: #" + thermalToUse);
            $("#right").attr("material", "src: #" + thermalToUse);
            $("#front").attr("material", "src: #" + thermalToUse);
            $("#back").attr("material", "src: #" + thermalToUse);
          });
        }
      });

      /* WARMTH FLOOR LEFT ARROW (onClick simulate by the cursor) */
      AFRAME.registerComponent('warmth-floor-left', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#warmth-floor-left',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
            if (thermalFloorIndex > 0)
              thermalFloorIndex --;
            else
              thermalFloorIndex = 2;

            $('#warmth-floor').attr('text', 'value: ' + insulationSwitch[thermalFloorIndex] + '; align: center');
            thermalToUse = "thermal-" + $('#warmth-roof').attr('text').value + "-" + $('#warmth-floor').attr('text').value + "-" + $('#warmth-wall').attr('text').value + "-" + $('#warmth-junctions').attr('text').value;
            $("#bottom").attr("material", "src: #" + thermalToUse);
            $("#top").attr("material", "src: #" + thermalToUse);
            $("#left").attr("material", "src: #" + thermalToUse);
            $("#right").attr("material", "src: #" + thermalToUse);
            $("#front").attr("material", "src: #" + thermalToUse);
            $("#back").attr("material", "src: #" + thermalToUse);
          });
        }
      });

      /* WARMTH FLOOR RIGHT ARROW (onClick simulate by the cursor) */
      AFRAME.registerComponent('warmth-floor-right', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#warmth-floor-right',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
            if (thermalFloorIndex < 2)
              thermalFloorIndex ++;
            else
              thermalFloorIndex = 0;

            $('#warmth-floor').attr('text', 'value: ' + insulationSwitch[thermalFloorIndex] + '; align: center');
            thermalToUse = "thermal-" + $('#warmth-roof').attr('text').value + "-" + $('#warmth-floor').attr('text').value + "-" + $('#warmth-wall').attr('text').value + "-" + $('#warmth-junctions').attr('text').value;
            $("#bottom").attr("material", "src: #" + thermalToUse);
            $("#top").attr("material", "src: #" + thermalToUse);
            $("#left").attr("material", "src: #" + thermalToUse);
            $("#right").attr("material", "src: #" + thermalToUse);
            $("#front").attr("material", "src: #" + thermalToUse);
            $("#back").attr("material", "src: #" + thermalToUse);
          });
        }
      });

      /* WARMTH JUNCTIONS LEFT ARROW (onClick simulate by the cursor) */
      AFRAME.registerComponent('warmth-junctions-left', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#warmth-junctions-left',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
            if (thermalJunctionsIndex > 0)
              thermalJunctionsIndex --;
            else
              thermalJunctionsIndex = 2;

            $('#warmth-junctions').attr('text', 'value: ' + insulationSwitch[thermalJunctionsIndex] + '; align: center');
            thermalToUse = "thermal-" + $('#warmth-roof').attr('text').value + "-" + $('#warmth-floor').attr('text').value + "-" + $('#warmth-wall').attr('text').value + "-" + $('#warmth-junctions').attr('text').value;
            $("#bottom").attr("material", "src: #" + thermalToUse);
            $("#top").attr("material", "src: #" + thermalToUse);
            $("#left").attr("material", "src: #" + thermalToUse);
            $("#right").attr("material", "src: #" + thermalToUse);
            $("#front").attr("material", "src: #" + thermalToUse);
            $("#back").attr("material", "src: #" + thermalToUse);
          });
        }
      });

      /* WARMTH JUNCTIONS RIGHT ARROW (onClick simulate by the cursor) */
      AFRAME.registerComponent('warmth-junctions-right', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#warmth-junctions-right',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
            if (thermalJunctionsIndex < 2)
              thermalJunctionsIndex ++;
            else
              thermalJunctionsIndex = 0;

            $('#warmth-junctions').attr('text', 'value: ' + insulationSwitch[thermalJunctionsIndex] + '; align: center');
            thermalToUse = "thermal-" + $('#warmth-roof').attr('text').value + "-" + $('#warmth-floor').attr('text').value + "-" + $('#warmth-wall').attr('text').value + "-" + $('#warmth-junctions').attr('text').value;
            $("#bottom").attr("material", "src: #" + thermalToUse);
            $("#top").attr("material", "src: #" + thermalToUse);
            $("#left").attr("material", "src: #" + thermalToUse);
            $("#right").attr("material", "src: #" + thermalToUse);
            $("#front").attr("material", "src: #" + thermalToUse);
            $("#back").attr("material", "src: #" + thermalToUse);
          });
        }
      });


      /* BACK BUTTON SOUND (onClick simulate by the cursor) */
      AFRAME.registerComponent('sound-back', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#sound-back',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
              $('#submenu-sound').attr('visible', 'false');
              $('.menu').attr('visible', 'false');

              $("#steps").removeAttr("sound");
          });
        }
      });

      /* SOUND FLOOR LEFT ARROW (onClick simulate by the cursor) */
      AFRAME.registerComponent('sound-floor-left', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#sound-floor-left',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
            if (soundFloorIndex > 0)
              soundFloorIndex --;
            else
              soundFloorIndex = 2;

            $('#sound-floor').attr('text', 'value: ' + insulationSwitch[soundFloorIndex] + '; align: center');
            soundToPlay = "sound-" + $('#sound-type').attr('text').value + "-" + $('#sound-wall').attr('text').value + "-" + $('#sound-floor').attr('text').value;
            $("#steps").attr("sound", "src: #"+soundToPlay);
          });
        }
      });

      /* SOUND FLOOR RIGHT ARROW (onClick simulate by the cursor) */
      AFRAME.registerComponent('sound-floor-right', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#sound-floor-right',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
            if (soundFloorIndex < 2)
              soundFloorIndex ++;
            else
              soundFloorIndex = 0;

            $('#sound-floor').attr('text', 'value: ' + insulationSwitch[soundFloorIndex] + '; align: center');
            soundToPlay = "sound-" + $('#sound-type').attr('text').value + "-" + $('#sound-wall').attr('text').value + "-" + $('#sound-floor').attr('text').value;
            $("#steps").attr("sound", "src: #"+soundToPlay);
          });
        }
      });

      /* SOUND WALL LEFT ARROW (onClick simulate by the cursor) */
      AFRAME.registerComponent('sound-wall-left', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#sound-wall-left',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
            if (soundWallIndex > 0)
              soundWallIndex --;
            else
              soundWallIndex = 2;

            $('#sound-wall').attr('text', 'value: ' + insulationSwitch[soundWallIndex] + '; align: center');
            soundToPlay = "sound-" + $('#sound-type').attr('text').value + "-" + $('#sound-wall').attr('text').value + "-" + $('#sound-floor').attr('text').value;
            $("#steps").attr("sound", "src: #"+soundToPlay);
          });
        }
      });

      /* SOUND WALL RIGHT ARROW (onClick simulate by the cursor) */
      AFRAME.registerComponent('sound-wall-right', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#sound-wall-right',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
            if (soundWallIndex < 2)
              soundWallIndex ++;
            else
              soundWallIndex = 0;

            $('#sound-wall').attr('text', 'value: ' + insulationSwitch[soundWallIndex] + '; align: center');
            soundToPlay = "sound-" + $('#sound-type').attr('text').value + "-" + $('#sound-wall').attr('text').value + "-" + $('#sound-floor').attr('text').value;
            $("#steps").attr("sound", "src: #"+soundToPlay);
          });
        }
      });

      /* SOUND TYPE LEFT ARROW (onClick simulate by the cursor) */
      AFRAME.registerComponent('sound-type-left', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#sound-type-left',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
            if (soundTypeIndex > 0)
              soundTypeIndex --;
            else
              soundTypeIndex = 2;

            $('#sound-type').attr('text', 'value: ' + soundTypeSwitch[soundTypeIndex] + '; align: center');
            soundToPlay = "sound-" + $('#sound-type').attr('text').value + "-" + $('#sound-wall').attr('text').value + "-" + $('#sound-floor').attr('text').value;
            $("#steps").attr("sound", "src: #"+soundToPlay);
          });
        }
      });

      /* SOUND TYPE RIGHT ARROW (onClick simulate by the cursor) */
      AFRAME.registerComponent('sound-type-right', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#sound-type-right',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
            if (soundTypeIndex < 2)
              soundTypeIndex ++;
            else
              soundTypeIndex = 0;

            $('#sound-type').attr('text', 'value: ' + soundTypeSwitch[soundTypeIndex] + '; align: center');
            soundToPlay = "sound-" + $('#sound-type').attr('text').value + "-" + $('#sound-wall').attr('text').value + "-" + $('#sound-floor').attr('text').value;
            $("#steps").attr("sound", "src: #"+soundToPlay);
          });
        }
      });

      /* PLAY SOUND BUTTON (onClick simulate by the cursor) */
      AFRAME.registerComponent('play-sound', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#sound-play',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
              var entity = document.querySelector('[sound]');
              $(entity).attr("sound", "src: #"+soundToPlay+"; autoplay: true");
              console.log(soundToPlay);
              entity.components.sound.playSound();
          });
        }
      });

      /* BACK BUTTON LIGHT (onClick simulate by the cursor) */
      AFRAME.registerComponent('light-back', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#light-back',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
              $('#submenu-light').attr('visible', 'false');
              $('.menu').attr('visible', 'false');
          });
        }
      });

      /* UP ARROW LIGHT (onClick simulate by the cursor) */
      AFRAME.registerComponent('up-arrow-light', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#light-up-arrow',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
              var value = parseFloat($('#light-slider').attr("width")) * 200;
              if (value < 300) 
                var nextValue = value + 50;

              $('#light-slider').attr('width', nextValue/200);
              $('#light-slider').attr('position', -((300-nextValue))/400 + ' -1.6 0.02');
              $('#light-text').attr('text', 'value: ' + nextValue + ' Lux; align: center');

              $("#directional-light").attr("light", "type: directional; color: #FFF; intensity: " + nextValue/300);
          });
        }
      });

      /* DOWN ARROW LIGHT (onClick simulate by the cursor) */
      AFRAME.registerComponent('down-arrow-light', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#light-down-arrow',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
              var value = parseFloat($('#light-slider').attr("width")) * 200;
              if (value > 0) 
                var nextValue = value - 50;

              $('#light-slider').attr('width', nextValue/200);
              $('#light-slider').attr('position', -((300-nextValue))/400 + ' -1.6 0.02');
              $('#light-text').attr('text', 'value: ' + nextValue + ' Lux; align: center');

              $("#directional-light").attr("light", "type: directional; color: #FFF; intensity: " + nextValue/300);
          });
        }
      });

      /* BACK BUTTON VENTILATION (onClick simulate by the cursor) */
      AFRAME.registerComponent('ventilation-back', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#ventilation-back',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
              $('#submenu-ventilation').attr('visible', 'false');
              $('.menu').attr('visible', 'false');

              $("a-scene").attr("fog", 'type: linear; color: white; far: 11; near: 11');
          });
        }
      });

      /* VENTILATION TYPE LEFT ARROW (onClick simulate by the cursor) */
      AFRAME.registerComponent('ventilation-type-left', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#ventilation-type-left',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
            if (typeIndex > 0)
              typeIndex --;
            else
              typeIndex = 1;

            $('#ventilation-type').attr('text', 'value: ' + ventilationTypeSwitch[typeIndex] + '; align: center');
                        ventilationToShow = 'ventilation-' + $('#ventilation-ventilation').attr('text').value + '-' + $('#ventilation-floor').attr('text').value + '-' + $('#ventilation-type').attr('text').value;
            if (ventilationToShow == "ventilation-no-ventilation-normal-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 10; near: 0');
            }
            else if (ventilationToShow == "ventilation-natural-ventilation-normal-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 12; near: 0');
            }
            else if (ventilationToShow == "ventilation-air-conditioner-normal-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 15; near: 0');
            }
            else if (ventilationToShow == "ventilation-no-ventilation-active-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 11; near: 0');
            }
            else if (ventilationToShow == "ventilation-natural-ventilation-active-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 13; near: 0');
            }
            else if (ventilationToShow == "ventilation-air-conditioner-active-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 11; near: 11');
            }
            else if (ventilationToShow == "ventilation-no-ventilation-normal-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 9; near: 0');
            }
            else if (ventilationToShow == "ventilation-natural-ventilation-normal-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 12; near: 0');
            }
            else if (ventilationToShow == "ventilation-air-conditioner-normal-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 11; near: 11');
            }
            else if (ventilationToShow == "ventilation-no-ventilation-active-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 9; near: 0');
            }
            else if (ventilationToShow == "ventilation-natural-ventilation-active-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 12; near: 0');
            }
            else if (ventilationToShow == "ventilation-air-conditioner-active-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 11; near: 11');
            }
          });
        }
      });

      /* SOUND TYPE RIGHT ARROW (onClick simulate by the cursor) */
      AFRAME.registerComponent('ventilation-type-right', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#ventilation-type-right',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
            if (typeIndex < 1)
              typeIndex ++;
            else
              typeIndex = 0;

            $('#ventilation-type').attr('text', 'value: ' + ventilationTypeSwitch[typeIndex] + '; align: center');
            ventilationToShow = 'ventilation-' + $('#ventilation-ventilation').attr('text').value + '-' + $('#ventilation-floor').attr('text').value + '-' + $('#ventilation-type').attr('text').value;
            if (ventilationToShow == "ventilation-no-ventilation-normal-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 10; near: 0');
            }
            else if (ventilationToShow == "ventilation-natural-ventilation-normal-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 12; near: 0');
            }
            else if (ventilationToShow == "ventilation-air-conditioner-normal-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 15; near: 0');
            }
            else if (ventilationToShow == "ventilation-no-ventilation-active-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 11; near: 0');
            }
            else if (ventilationToShow == "ventilation-natural-ventilation-active-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 13; near: 0');
            }
            else if (ventilationToShow == "ventilation-air-conditioner-active-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 11; near: 11');
            }
            else if (ventilationToShow == "ventilation-no-ventilation-normal-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 9; near: 0');
            }
            else if (ventilationToShow == "ventilation-natural-ventilation-normal-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 12; near: 0');
            }
            else if (ventilationToShow == "ventilation-air-conditioner-normal-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 11; near: 11');
            }
            else if (ventilationToShow == "ventilation-no-ventilation-active-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 9; near: 0');
            }
            else if (ventilationToShow == "ventilation-natural-ventilation-active-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 12; near: 0');
            }
            else if (ventilationToShow == "ventilation-air-conditioner-active-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 11; near: 11');
            }
          });
        }
      });

      /* VENTILATION FLOOR LEFT ARROW (onClick simulate by the cursor) */
      AFRAME.registerComponent('ventilation-floor-left', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#ventilation-floor-left',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
            if (floorIndex > 0)
              floorIndex --;
            else
              floorIndex = 1;

            $('#ventilation-floor').attr('text', 'value: ' + floorTypeSwitch[floorIndex] + '; align: center');
            ventilationToShow = 'ventilation-' + $('#ventilation-ventilation').attr('text').value + '-' + $('#ventilation-floor').attr('text').value + '-' + $('#ventilation-type').attr('text').value;
            if (ventilationToShow == "ventilation-no-ventilation-normal-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 10; near: 0');
            }
            else if (ventilationToShow == "ventilation-natural-ventilation-normal-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 12; near: 0');
            }
            else if (ventilationToShow == "ventilation-air-conditioner-normal-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 15; near: 0');
            }
            else if (ventilationToShow == "ventilation-no-ventilation-active-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 11; near: 0');
            }
            else if (ventilationToShow == "ventilation-natural-ventilation-active-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 13; near: 0');
            }
            else if (ventilationToShow == "ventilation-air-conditioner-active-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 11; near: 11');
            }
            else if (ventilationToShow == "ventilation-no-ventilation-normal-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 9; near: 0');
            }
            else if (ventilationToShow == "ventilation-natural-ventilation-normal-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 12; near: 0');
            }
            else if (ventilationToShow == "ventilation-air-conditioner-normal-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 11; near: 11');
            }
            else if (ventilationToShow == "ventilation-no-ventilation-active-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 9; near: 0');
            }
            else if (ventilationToShow == "ventilation-natural-ventilation-active-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 12; near: 0');
            }
            else if (ventilationToShow == "ventilation-air-conditioner-active-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 11; near: 11');
            }
          });
        }
      });

      /* VENTILATION FLOOR RIGHT ARROW (onClick simulate by the cursor) */
      AFRAME.registerComponent('ventilation-floor-right', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#ventilation-floor-right',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
            if (floorIndex < 1)
              floorIndex ++;
            else
              floorIndex = 0;

            $('#ventilation-floor').attr('text', 'value: ' + floorTypeSwitch[floorIndex] + '; align: center');
            ventilationToShow = 'ventilation-' + $('#ventilation-ventilation').attr('text').value + '-' + $('#ventilation-floor').attr('text').value + '-' + $('#ventilation-type').attr('text').value;
            if (ventilationToShow == "ventilation-no-ventilation-normal-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 10; near: 0');
            }
            else if (ventilationToShow == "ventilation-natural-ventilation-normal-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 12; near: 0');
            }
            else if (ventilationToShow == "ventilation-air-conditioner-normal-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 15; near: 0');
            }
            else if (ventilationToShow == "ventilation-no-ventilation-active-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 11; near: 0');
            }
            else if (ventilationToShow == "ventilation-natural-ventilation-active-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 13; near: 0');
            }
            else if (ventilationToShow == "ventilation-air-conditioner-active-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 11; near: 11');
            }
            else if (ventilationToShow == "ventilation-no-ventilation-normal-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 9; near: 0');
            }
            else if (ventilationToShow == "ventilation-natural-ventilation-normal-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 12; near: 0');
            }
            else if (ventilationToShow == "ventilation-air-conditioner-normal-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 11; near: 11');
            }
            else if (ventilationToShow == "ventilation-no-ventilation-active-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 9; near: 0');
            }
            else if (ventilationToShow == "ventilation-natural-ventilation-active-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 12; near: 0');
            }
            else if (ventilationToShow == "ventilation-air-conditioner-active-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 11; near: 11');
            }
          });
        }
      });

      /* VENTILATION VENTILATION LEFT ARROW (onClick simulate by the cursor) */
      AFRAME.registerComponent('ventilation-ventilation-left', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#ventilation-ventilation-left',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
            if (ventilationIndex > 0)
              ventilationIndex --;
            else
              ventilationIndex = 2;

            $('#ventilation-ventilation').attr('text', 'value: ' + ventilationVentilationSwitch[ventilationIndex] + '; align: center');
            ventilationToShow = 'ventilation-' + $('#ventilation-ventilation').attr('text').value + '-' + $('#ventilation-floor').attr('text').value + '-' + $('#ventilation-type').attr('text').value;
            if (ventilationToShow == "ventilation-no-ventilation-normal-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 10; near: 0');
            }
            else if (ventilationToShow == "ventilation-natural-ventilation-normal-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 12; near: 0');
            }
            else if (ventilationToShow == "ventilation-air-conditioner-normal-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 15; near: 0');
            }
            else if (ventilationToShow == "ventilation-no-ventilation-active-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 11; near: 0');
            }
            else if (ventilationToShow == "ventilation-natural-ventilation-active-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 13; near: 0');
            }
            else if (ventilationToShow == "ventilation-air-conditioner-active-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 11; near: 11');
            }
            else if (ventilationToShow == "ventilation-no-ventilation-normal-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 9; near: 0');
            }
            else if (ventilationToShow == "ventilation-natural-ventilation-normal-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 12; near: 0');
            }
            else if (ventilationToShow == "ventilation-air-conditioner-normal-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 11; near: 11');
            }
            else if (ventilationToShow == "ventilation-no-ventilation-active-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 9; near: 0');
            }
            else if (ventilationToShow == "ventilation-natural-ventilation-active-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 12; near: 0');
            }
            else if (ventilationToShow == "ventilation-air-conditioner-active-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 11; near: 11');
            }
          });
        }
      });

      /* VENTILATION VENTILATION RIGHT ARROW (onClick simulate by the cursor) */
      AFRAME.registerComponent('ventilation-ventilation-right', {
        schema: {
            trigger: {
                default: 'click'
            },
            triggerElement: {
              default: '#ventilation-ventilation-right',
            }
        },

        init: function() {
          document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
            if (ventilationIndex < 2)
              ventilationIndex ++;
            else
              ventilationIndex = 0;

            $('#ventilation-ventilation').attr('text', 'value: ' + ventilationVentilationSwitch[ventilationIndex] + '; align: center');
            ventilationToShow = 'ventilation-' + $('#ventilation-ventilation').attr('text').value + '-' + $('#ventilation-floor').attr('text').value + '-' + $('#ventilation-type').attr('text').value;
            if (ventilationToShow == "ventilation-no-ventilation-normal-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 10; near: 0');
            }
            else if (ventilationToShow == "ventilation-natural-ventilation-normal-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 12; near: 0');
            }
            else if (ventilationToShow == "ventilation-air-conditioner-normal-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 15; near: 0');
            }
            else if (ventilationToShow == "ventilation-no-ventilation-active-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 11; near: 0');
            }
            else if (ventilationToShow == "ventilation-natural-ventilation-active-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 13; near: 0');
            }
            else if (ventilationToShow == "ventilation-air-conditioner-active-floor-VOC") {
              $("a-scene").attr("fog", 'type: linear; color: red; far: 11; near: 11');
            }
            else if (ventilationToShow == "ventilation-no-ventilation-normal-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 9; near: 0');
            }
            else if (ventilationToShow == "ventilation-natural-ventilation-normal-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 12; near: 0');
            }
            else if (ventilationToShow == "ventilation-air-conditioner-normal-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 11; near: 11');
            }
            else if (ventilationToShow == "ventilation-no-ventilation-active-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 9; near: 0');
            }
            else if (ventilationToShow == "ventilation-natural-ventilation-active-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 12; near: 0');
            }
            else if (ventilationToShow == "ventilation-air-conditioner-active-floor-CO2") {
              $("a-scene").attr("fog", 'type: linear; color: white; far: 11; near: 11');
            }
          });
        }
      });
    </script>

    <!-- 3D SCENE -->
    <div id="scene">
      <a-scene embedded fog='type: linear; color: white; far: 11; near: 11'>
        <a-assets>
          <!-- DEFINITION OF THE ASSETS -->

          <!-- BACKGROUND IMAGE OF THE SCENE -->
          <!--<img id="sky" src="sphere.jpg">-->

          <!-- TEXTURES -->
          <img id="parquet" src="images/parquet.jpg">
          <img id="mur" src="images/mur.jpg">
          <img id="mur-poster" src="images/mur-poster.jpg">
          <img id="left-arrow" src="images/left-arrow.png">
          <img id="right-arrow" src="images/right-arrow.png">
          <img id="up-arrow" src="images/up-arrow.png">
          <img id="down-arrow" src="images/down-arrow.png">

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
        <a-entity light="type: ambient; color: #BBBBBB"></a-entity>
        <a-entity id="directional-light" light="type: directional; color: #FFF; intensity: 0.6" position="-0.5 1 1"></a-entity>

        <!-- ADD A CURSOR (timeout in ms) -->
        <a-camera><a-cursor scale="1.5 1.5 1.5" color="#4CC3D9" fuse="true" timeout="1000" cursor-feedback></a-cursor></a-camera>

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
        <!--<a-entity id="particles" position="0 3.5 0" scale="0.1 0.1 0.1"></a-entity>-->

        <a-plane id="welcomeText" width="3.5" height="1.5" color="#6d6d6d" position="0 2 -3"><a-entity scale="3.5 3.5 3.5" text="value: Welcome to the Multi-Comfort Experience! To show the main menu you have to click, after that you can select the different options just by hover it!; align: center"></a-entity></a-plane>  

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