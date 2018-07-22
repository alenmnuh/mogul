(function($) {

	$(document).ready(function(){

		$(".services__tab-title").click( function () {

			var num = $('.services__tab-title').index($(this))+1;
			var href = $('.services__tab-title').attr("href")+ num;
			var url = href.substr(1);

			$("#services__content").animate({opacity: 0.5}, 300);
			
			$.get(url, function(gotHtml) {
				$("#services__content")
					.html(gotHtml)
					.animate({opacity:1}, 300);
				return false;
			})
		})

	});

}(jQuery));