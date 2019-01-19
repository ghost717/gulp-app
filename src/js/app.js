jQuery(document).ready(function ($) {

	var main__slider = $('.main__slider .owl-carousel');
	main__slider.owlCarousel({
			loop:true,
			margin: 0,
			nav: true,
			dots: false,
			mouseDrag: false,
		//	lazyLoad : true,
		//	animateOut: 'fadeOut',
			navText: ["<", ">"],
			responsive:{
					0:{
							items:1
					},
					768:{
							items:1
					}
			}
	});
	
	// MENUTOGGLE
	$(".menu__toggle").click(function(event) {
		$(this).toggleClass('toggled');
		$(".header").toggleClass('active');
	});

	$(".menu-item").click(function(event) {
		$(".menu__toggle").removeClass('toggled');
		$(".header").removeClass('active');
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

});