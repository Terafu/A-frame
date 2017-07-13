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

          $('.menu').attr('visible', 'false');

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

          $('.menu').attr('visible', 'false');

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

          $('.menu').attr('visible', 'false');

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

          $('.menu').attr('visible', 'false');

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
        default: '#showMenu',
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

          $('#welcomeText').attr('visible', 'false');
          $('#showMenu').attr('visible', 'false');

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

        $('#welcomeText').attr('visible', 'true');

          this.el.setAttribute('visible', false);
      }

  },

  update: function (oldData) {},

  remove: function() {}
});

/* CLOSE BUTTON MAIN MENU (onClick simulate by the cursor) */
AFRAME.registerComponent('menu-close', {
  schema: {
      trigger: {
          default: 'click'
      },
      triggerElement: {
        default: '#menu-close',
      }
  },

  init: function() {
    document.querySelector(this.data.triggerElement).addEventListener(this.data.trigger, () => {
        $('.menu').attr('visible', 'false');

        $('#showMenu').attr('visible', 'true');

    });
  }
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
        $('.menu').attr('visible', 'true');

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
        $('.menu').attr('visible', 'true');

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
        $('.menu').attr('visible', 'true');
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
        $('.menu').attr('visible', 'true');

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