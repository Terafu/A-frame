/* VARIABLES */
var thermalToUse = "thermal-glass-glass-glass-glass";
var thermalRoof = "glass";
var thermalFloor = "glass";
var thermalWall = "glass";
var thermalJunctions = "glass";

var soundToPlay = "sound-steps-glass-glass";
var soundType = "steps";
var soundWall = "glass";
var soundFloor = "glass";

var ventilationToShow = "ventilation-no-ventilation-normal-floor-VOC";
var ventilation = "no-ventilation";	
var floor = "normal-floor";
var type = "VOC";

/* COCHE PAR DEFAUT LES PREMIERS RADIO */
/*$('input[type=radio][name=warmth-roof][value=glass]').prop("checked", true);
$('input[type=radio][name=warmth-floor][value=glass]').prop("checked", true);
$('input[type=radio][name=warmth-wall][value=glass]').prop("checked", true);
$('input[type=radio][name=warmth-junctions][value=glass]').prop("checked", true);
$('input[type=radio][name=sound-wall][value=glass]').prop('checked', true);
$('input[type=radio][name=sound-floor][value=glass]').prop('checked', true);*/


jQuery(document).ready(function(){

	$(".collapsible > form > li > a").on("click", function(e){		  
		if(!$(this).hasClass("active")) {
			
		  // hide any open menus and remove all other classes
			$(".collapsible li ul").slideUp(350);
			$(".collapsible li a").removeClass("active");
		  
			// open our new menu and add the open class
			$(this).next("ul").slideDown(350);
			$(this).addClass("active");
			
		}

		else if($(this).hasClass("active")) {
			
			$(this).removeClass("active");
			$(this).next("ul").slideUp(350);
		}

		/* THERMAL */
		if($("#warmth").hasClass("active")) {
			thermalToUse = "thermal-" + $('input[type=radio][name=warmth-roof]:checked').val() + "-" + $('input[type=radio][name=warmth-floor]:checked').val() + "-" + $('input[type=radio][name=warmth-wall]:checked').val() + "-" + $('input[type=radio][name=warmth-junctions]:checked').val();
			$("#bottom").attr("material", "src: #" + thermalToUse);
			$("#top").attr("material", "src: #" + thermalToUse);
			$("#left").attr("material", "src: #" + thermalToUse);
			$("#right").attr("material", "src: #" + thermalToUse);
			$("#front").attr("material", "src: #" + thermalToUse);
			$("#back").attr("material", "src: #" + thermalToUse);
		}

		else {
			$("#bottom").attr("material", "src: #parquet");
			$("#top").attr("material", "src: #mur");
			$("#left").attr("material", "src: #mur");
			$("#right").attr("material", "src: #mur");
			$("#front").attr("material", "src: #mur");
			$("#back").attr("material", "src: #mur-poster");
		}

		/* SOUND */
		if($("#sound").hasClass("active")) {
			soundToPlay = "sound-" + $('input[type=radio][name=sound-type]:checked').val() + "-" + $('input[type=radio][name=sound-wall]:checked').val() + "-" + $('input[type=radio][name=sound-floor]:checked').val();
			$("#steps").attr("sound", "src: #"+soundToPlay);
		}

		else {
			$("#steps").removeAttr("sound");
		}

		/* VENTILATION */
		if($("#ventilation").hasClass("active")) {
			ventilationToShow = "ventilation-" + $('input[type=radio][name=ventilation-ventilation]:checked').val() + "-" + $('input[type=radio][name=ventilation-floor]:checked').val() + "-" + $('input[type=radio][name=ventilation-type]:checked').val();
			if (ventilationToShow == "ventilation-no-ventilation-normal-floor-VOC") {
				$("#particles").removeAttr("particle-system")
				$("#particles").attr("particle-system", "preset: dust; color: #EF0000; particleCount: 3000; size: 0.2; opacity: 1; maxAge: 3")
			}
			else if (ventilationToShow == "ventilation-natural-ventilation-normal-floor-VOC") {
				$("#particles").removeAttr("particle-system")
				$("#particles").attr("particle-system", "preset: dust; color: #EF0000; particleCount: 1000; size: 0.2; opacity: 1; maxAge: 3")
			}
			else if (ventilationToShow == "ventilation-air-conditioner-normal-floor-VOC") {
				$("#particles").removeAttr("particle-system")
				$("#particles").attr("particle-system", "preset: dust; color: #EF0000; particleCount: 200; size: 0.2; opacity: 1; maxAge: 3")
			}
			else if (ventilationToShow == "ventilation-no-ventilation-active-floor-VOC") {
				$("#particles").removeAttr("particle-system")
				$("#particles").attr("particle-system", "preset: dust; color: #EF0000; particleCount: 2000; size: 0.2; opacity: 1; maxAge: 3")
			}
			else if (ventilationToShow == "ventilation-natural-ventilation-active-floor-VOC") {
				$("#particles").removeAttr("particle-system")
				$("#particles").attr("particle-system", "preset: dust; color: #EF0000; particleCount: 500; size: 0.2; opacity: 1; maxAge: 3")
			}
			else if (ventilationToShow == "ventilation-air-conditioner-active-floor-VOC") {
				$("#particles").removeAttr("particle-system")
			}
			else if (ventilationToShow == "ventilation-no-ventilation-normal-floor-CO2") {
				$("#particles").removeAttr("particle-system")
				$("#particles").attr("particle-system", "preset: dust; color: #FFFFFF; particleCount: 2000; size: 0.2; opacity: 1; maxAge: 3")
			}
			else if (ventilationToShow == "ventilation-natural-ventilation-normal-floor-CO2") {
				$("#particles").removeAttr("particle-system")
				$("#particles").attr("particle-system", "preset: dust; color: #FFFFFF; particleCount: 600; size: 0.2; opacity: 1; maxAge: 3")
			}
			else if (ventilationToShow == "ventilation-air-conditioner-normal-floor-CO2") {
				$("#particles").removeAttr("particle-system")
			}
			else if (ventilationToShow == "ventilation-no-ventilation-active-floor-CO2") {
				$("#particles").removeAttr("particle-system")
				$("#particles").attr("particle-system", "preset: dust; color: #FFFFFF; particleCount: 2000; size: 0.2; opacity: 1; maxAge: 3")
			}
			else if (ventilationToShow == "ventilation-natural-ventilation-active-floor-CO2") {
				$("#particles").removeAttr("particle-system")
				$("#particles").attr("particle-system", "preset: dust; color: #FFFFFF; particleCount: 600; size: 0.2; opacity: 1; maxAge: 3")
			}
			else if (ventilationToShow == "ventilation-air-conditioner-active-floor-CO2") {
				$("#particles").removeAttr("particle-system")
			}
		}

		else {
			$("#particles").removeAttr("particle-system");
		}

	});

	/* WARMTH RADIO CHANGE */
	$('input[type=radio][name=warmth-roof]').change(function() {
			thermalRoof = this.value;
	        thermalToUse = "thermal-" + thermalRoof + "-" + thermalFloor + "-" + thermalWall + "-" + thermalJunctions;
	        $("#bottom").attr("material", "src: #" + thermalToUse);
			$("#top").attr("material", "src: #" + thermalToUse);
			$("#left").attr("material", "src: #" + thermalToUse);
			$("#right").attr("material", "src: #" + thermalToUse);
			$("#front").attr("material", "src: #" + thermalToUse);
			$("#back").attr("material", "src: #" + thermalToUse);
	});

	$('input[type=radio][name=warmth-floor]').change(function() {
	        thermalFloor = this.value;
	        thermalToUse = "thermal-" + thermalRoof + "-" + thermalFloor + "-" + thermalWall + "-" + thermalJunctions;
	        $("#bottom").attr("material", "src: #" + thermalToUse);
			$("#top").attr("material", "src: #" + thermalToUse);
			$("#left").attr("material", "src: #" + thermalToUse);
			$("#right").attr("material", "src: #" + thermalToUse);
			$("#front").attr("material", "src: #" + thermalToUse);
			$("#back").attr("material", "src: #" + thermalToUse);
	});

	$('input[type=radio][name=warmth-wall]').change(function() {
	        thermalWall = this.value;
	        thermalToUse = "thermal-" + thermalRoof + "-" + thermalFloor + "-" + thermalWall + "-" + thermalJunctions;
	        $("#bottom").attr("material", "src: #" + thermalToUse);
			$("#top").attr("material", "src: #" + thermalToUse);
			$("#left").attr("material", "src: #" + thermalToUse);
			$("#right").attr("material", "src: #" + thermalToUse);
			$("#front").attr("material", "src: #" + thermalToUse);
			$("#back").attr("material", "src: #" + thermalToUse);
	});

	$('input[type=radio][name=warmth-junctions]').change(function() {
	        thermalJunctions = this.value;
	        thermalToUse = "thermal-" + thermalRoof + "-" + thermalFloor + "-" + thermalWall + "-" + thermalJunctions;
	        $("#bottom").attr("material", "src: #" + thermalToUse);
			$("#top").attr("material", "src: #" + thermalToUse);
			$("#left").attr("material", "src: #" + thermalToUse);
			$("#right").attr("material", "src: #" + thermalToUse);
			$("#front").attr("material", "src: #" + thermalToUse);
			$("#back").attr("material", "src: #" + thermalToUse);
	});

	/* SOUND RADIO CHANGE */
	$('input[type=radio][name=sound-wall]').change(function() {
	        soundWall = this.value;
	        soundToPlay = "sound-" + soundType + "-" + soundWall + "-" + soundFloor;
	        $("#steps").attr("sound", "src: #"+soundToPlay);
	});

	$('input[type=radio][name=sound-floor]').change(function() {
	        soundFloor = this.value;
	        soundToPlay = "sound-" + soundType + "-" + soundWall + "-" + soundFloor;
	        $("#steps").attr("sound", "src: #"+soundToPlay);
	});

	$('input[type=radio][name=sound-type]').change(function() {
	        soundType = this.value;
	        soundToPlay = "sound-" + soundType + "-" + soundWall + "-" + soundFloor;
	        $("#steps").attr("sound", "src: #"+soundToPlay);
	});

	$('#play-sound').on("click", function() {
		var entity = document.querySelector('[sound]');
		$(entity).attr("sound", "src: #"+soundToPlay+"; autoplay: true");
	    entity.components.sound.playSound();
	});

	/* VENTILATION RADIO CHANGE */
	$('input[type=radio][name=ventilation-ventilation]').change(function() {
		ventilation = this.value;
		ventilationToShow = "ventilation-" + ventilation + "-" + floor + "-" + type;
		if (ventilationToShow == "ventilation-no-ventilation-normal-floor-VOC") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #EF0000; particleCount: 3000; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-natural-ventilation-normal-floor-VOC") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #EF0000; particleCount: 1000; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-air-conditioner-normal-floor-VOC") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #EF0000; particleCount: 200; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-no-ventilation-active-floor-VOC") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #EF0000; particleCount: 2000; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-natural-ventilation-active-floor-VOC") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #EF0000; particleCount: 500; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-air-conditioner-active-floor-VOC") {
			$("#particles").removeAttr("particle-system")
		}
		else if (ventilationToShow == "ventilation-no-ventilation-normal-floor-CO2") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #FFFFFF; particleCount: 2000; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-natural-ventilation-normal-floor-CO2") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #FFFFFF; particleCount: 600; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-air-conditioner-normal-floor-CO2") {
			$("#particles").removeAttr("particle-system")
		}
		else if (ventilationToShow == "ventilation-no-ventilation-active-floor-CO2") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #FFFFFF; particleCount: 2000; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-natural-ventilation-active-floor-CO2") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #FFFFFF; particleCount: 600; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-air-conditioner-active-floor-CO2") {
			$("#particles").removeAttr("particle-system")
		}
	});

	$('input[type=radio][name=ventilation-floor]').change(function() {
		floor = this.value;
		ventilationToShow = "ventilation-" + ventilation + "-" + floor + "-" + type;
		if (ventilationToShow == "ventilation-no-ventilation-normal-floor-VOC") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #EF0000; particleCount: 3000; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-natural-ventilation-normal-floor-VOC") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #EF0000; particleCount: 1000; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-air-conditioner-normal-floor-VOC") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #EF0000; particleCount: 200; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-no-ventilation-active-floor-VOC") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #EF0000; particleCount: 2000; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-natural-ventilation-active-floor-VOC") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #EF0000; particleCount: 500; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-air-conditioner-active-floor-VOC") {
			$("#particles").removeAttr("particle-system")
		}
		else if (ventilationToShow == "ventilation-no-ventilation-normal-floor-CO2") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #FFFFFF; particleCount: 2000; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-natural-ventilation-normal-floor-CO2") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #FFFFFF; particleCount: 600; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-air-conditioner-normal-floor-CO2") {
			$("#particles").removeAttr("particle-system")
		}
		else if (ventilationToShow == "ventilation-no-ventilation-active-floor-CO2") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #FFFFFF; particleCount: 2000; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-natural-ventilation-active-floor-CO2") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #FFFFFF; particleCount: 600; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-air-conditioner-active-floor-CO2") {
			$("#particles").removeAttr("particle-system")
		}
	});

	$('input[type=radio][name=ventilation-type]').change(function() {
		type = this.value;
		ventilationToShow = "ventilation-" + ventilation + "-" + floor + "-" + type;
		if (ventilationToShow == "ventilation-no-ventilation-normal-floor-VOC") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #EF0000; particleCount: 3000; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-natural-ventilation-normal-floor-VOC") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #EF0000; particleCount: 1000; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-air-conditioner-normal-floor-VOC") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #EF0000; particleCount: 200; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-no-ventilation-active-floor-VOC") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #EF0000; particleCount: 2000; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-natural-ventilation-active-floor-VOC") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #EF0000; particleCount: 500; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-air-conditioner-active-floor-VOC") {
			$("#particles").removeAttr("particle-system")
		}
		else if (ventilationToShow == "ventilation-no-ventilation-normal-floor-CO2") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #FFFFFF; particleCount: 2000; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-natural-ventilation-normal-floor-CO2") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #FFFFFF; particleCount: 600; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-air-conditioner-normal-floor-CO2") {
			$("#particles").removeAttr("particle-system")
		}
		else if (ventilationToShow == "ventilation-no-ventilation-active-floor-CO2") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #FFFFFF; particleCount: 2000; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-natural-ventilation-active-floor-CO2") {
			$("#particles").removeAttr("particle-system")
			$("#particles").attr("particle-system", "preset: dust; color: #FFFFFF; particleCount: 600; size: 0.2; opacity: 1; maxAge: 3")
		}
		else if (ventilationToShow == "ventilation-air-conditioner-active-floor-CO2") {
			$("#particles").removeAttr("particle-system")
		}
	});

	/* SLIDER */
	$(function() {
		$("#slider-vertical").slider({
		  orientation: "vertical",
		  range: "min",
		  min: 0,
		  max: 300,
		  step: 50,
		  value: $('input[type=text][name=lux]').val(),
		  slide: function( event, ui ) {
		    $('input[type=text][name=lux]').val(ui.value);
		    $("#point-light").attr("light", "type: point; color: #FFF; intensity: "+ui.value/700);
		  }
		});

		$('input[type=text][name=lux]').val($("#slider-vertical").slider("value"));
	});

	$("#warmth-roof-info").on('click', function(e) {
		$('#overlay').removeClass('blur-out');
		$('#overlay').addClass('blur-in');
		$("#warmth-roof-info-window").fadeIn(1000);
	});

	$("#warmth-floor-info").on('click', function(e) {
		$('#overlay').removeClass('blur-out');
		$('#overlay').addClass('blur-in');
		$("#warmth-floor-info-window").fadeIn(1000);	
	});

	$("#warmth-wall-info").on('click', function(e) {
		$('#overlay').removeClass('blur-out');
		$('#overlay').addClass('blur-in');
		$("#warmth-wall-info-window").fadeIn(1000);
	});

	$("#warmth-junctions-info").on('click', function(e) {
		$('#overlay').removeClass('blur-out');
		$('#overlay').addClass('blur-in');
		$("#warmth-junctions-info-window").fadeIn(1000);
	});

	$("#sound-floor-info").on('click', function(e) {
		$('#overlay').removeClass('blur-out');
		$('#overlay').addClass('blur-in');
		$("#sound-floor-info-window").fadeIn(1000);
	});

	$("#sound-wall-info").on('click', function(e) {
		$('#overlay').removeClass('blur-out');
		$('#overlay').addClass('blur-in');
		$("#sound-wall-info-window").fadeIn(1000);
	});

	$("#sound-type-info").on('click', function(e) {
		$('#overlay').removeClass('blur-out');
		$('#overlay').addClass('blur-in');
		$("#sound-type-info-window").fadeIn(1000);
	});

	$("#light-info").on('click', function(e) {
		$('#overlay').removeClass('blur-out');
		$('#overlay').addClass('blur-in');
		$("#light-info-window").fadeIn(1000);
	});

	$("#ventilation-ventilation-info").on('click', function(e) {
		$('#overlay').removeClass('blur-out');
		$('#overlay').addClass('blur-in');
		$("#ventilation-ventilation-info-window").fadeIn(1000);
	});

	$("#ventilation-floor-info").on('click', function(e) {
		$('#overlay').removeClass('blur-out');
		$('#overlay').addClass('blur-in');
		$("#ventilation-floor-info-window").fadeIn(1000);
	});

	$("#ventilation-type-info").on('click', function(e) {
		$('#overlay').removeClass('blur-out');
		$('#overlay').addClass('blur-in');
		$("#ventilation-type-info-window").fadeIn(1000);
	});

	$('.close-button').click(function (e) {
			$('.pop-up').fadeOut(700);
			$('#overlay').removeClass('blur-in');
			$('#overlay').addClass('blur-out');
			e.stopPropagation();
	});
});