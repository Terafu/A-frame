<?php

?>

<script>
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
			window.location.replace(
				<?php 
					if (isset($_SESSION["email"])) {
						echo '"survey.php?room=kitchen"'; 
					}

					else {
						echo '"menu.php?room=kitchen"';
					}
				?>);
		});

		$(".bedroom").click(function () {
			window.location.replace(<?php 
					if (isset($_SESSION["email"])) {
						echo '"survey.php?room=bedroom"'; 
					}

					else {
						echo '"menu.php?room=bedroom"';
					}
				?>);
		});

		$(".livingroom").click(function () {
			window.location.replace(<?php 
					if (isset($_SESSION["email"])) {
						echo '"survey.php?room=livingroom"'; 
					}

					else {
						echo '"menu.php?room=livingroom"';
					}
				?>);
		});

		$('.pop-up').hide();

		<?php
			if(isset($_GET["email"]) && empty($_GET["email"])) {

				echo "$('.pop-up').fadeIn(1000);";
			}
		?>

		$('.close-button').click(function (e) {
			$('.pop-up').fadeOut(700);
			$('#overlay').removeClass('blur-in');
			$('#overlay').addClass('blur-out');
			e.stopPropagation();
		});
	});

	var $form = $('.email');
	var $validate = $('.validate');

	function validateEmail(email) {
		var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return regex.test(email);
	};

	$form.on('keyup', function(e) {
		var $this = $(this),
			$input = $this.val();
		if ($input.length > 0) {
			if (validateEmail($input)) {
				console.log("YEAH");
				$validate.addClass('active');
			} 
			else {
				$validate.removeClass('active');
			}
		} 

		else {
			$validate.removeClass('active');
		}
	});
</script>