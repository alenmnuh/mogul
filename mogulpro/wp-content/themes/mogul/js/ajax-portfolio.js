(function($) {

	$(document).ready(function(){

		$(".portfolio__tab-title").click( function () {

			var num = $('.portfolio__tab-title').index($(this))+1;
			var href = $('.portfolio__tab-title').attr("href")+ num;
			var url = href.substr(1);
			
			$("#portfolio__content").animate({opacity: 0.5}, 300);

			$.get(url, function(gotHtml) {
				$("#portfolio__content")
					.html(gotHtml)
					.animate({opacity:1}, 300);
				return false;
			})
		})

	});

}(jQuery));