(function($) {

	function burgerMenu() {
		if ($(window).width() > 1007) {
			$('body').removeClass('mobile-window .main-nav');
			$('.main-nav').show();
		} else {
			$('body').addClass('mobile-window');
		};
	};

	$(document).ready(function(){

		//match height
		$('footer > .column').matchHeight();
		$('.review__text').matchHeight();
		
		//gallery
		$('[data-fancybox]').fancybox({
			toolbar  : false,
			smallBtn : true,
			animationEffect: "zoom-in-out",
			transitionEffect: "circular",
			transitionDuration: 1000,
			closeClick: true
		});

		//burger
		burgerMenu();
		$('.burger-icon').on('click', function() {
			$('.main-nav').toggle(500);
		});

		//slick-slider
		$('.review-slider').slick({
		   dots: true,
		   infinite: true,
		   autoplay: true,
		   autoplaySpeed: 3000,
		   speed: 800,
		   slidesToShow: 1,
		   adaptiveHeight: true,
		   prevArrow: false,
		   nextArrow: false,
		   fade: false
		});

		
		//contact tabs
		$('.tabbed__tab-content').hide();
		$('div.t1').show();
		$('.tabbed .tabbed__tabs li.t1 a').addClass('tab-current');

		$('.tabbed ul li a').click(function(){
			var thisClass = this.className.slice(0,2);
			$('.tabbed__tab-content').hide();
			$('div.' + thisClass).show();
			$('.tabbed .tabbed__tabs li a').removeClass('tab-current');
			$(this).addClass('tab-current');
		});


		//ajax logo
		$('.logo').click(function(){
			$.get(myajaxurl.homeurl, function(data) {
       			$('.logo__title').toggle();
			})	
		})
	});

	$(window).resize( function() {

		//burger
		burgerMenu();

	});

	
}(jQuery));