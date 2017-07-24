var kitchenClass;
var bedroomClass;
var livingroomClass;

jQuery(document).ready(function(){

	$(".kitchen").hover(function () {
		kitchenClass = $(this).attr('class');
		$(this).attr('class', kitchenClass + ' roomHover');
	}, function () {
		$(this).attr('class', kitchenClass);
	});

	$(".bedroom").hover(function () {
		bedroomClass = $(this).attr('class');
		$(this).attr('class', bedroomClass + ' roomHover');
	}, function () {
		$(this).attr('class', bedroomClass);
	});

	$(".livingroom").hover(function () {
		livingroomClass = $(this).attr('class');
		$(this).attr('class', livingroomClass + ' roomHover');
	}, function () {
		$(this).attr('class', livingroomClass);
	});

	$(".kitchen").click(function () {
		window.location.replace("menu.php?room=kitchen");
	});

	$(".bedroom").click(function () {
		window.location.replace("menu.php?room=bedroom");
	});

	$(".livingroom").click(function () {
		window.location.replace("menu.php?room=livingroom");
	});
});