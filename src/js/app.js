jQuery(document).ready(function ($) {

	// document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] +
	// ':35729/livereload.js?snipver=1"></' + 'script>')

	// ANIMATE TO ANCHOR
	$(document).on('click', 'a[href^="#"]', function (event) {
		event.preventDefault();
		$('html, body').animate({
			scrollTop: $($.attr(this, 'href')).offset().top
		}, 500);
	});


	// rellax example
	// var rellax = new Rellax('.rellax', {
	//   center: true,
	//   vertical: true,
	// });


	// animejs example
	// var cssSelector = anime({
	// 	targets: '.class',
	// 	translateX: 250
	// });


	// aio example
	// aio({
	// 	offset: 0,
	// 	speed: 500
	// });

	// MENUTOGGLE
	$(".menu__toggle").click(function (event) {
		$(".header").toggleClass('header--toggled');
	});
});