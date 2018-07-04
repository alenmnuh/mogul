(function($) {

	$(document).ready(function(){

		$(".portfolio__tab-title").click( function () {
			// console.log(this.hash.substr(1));

			var num = $('.portfolio__tab-title').index($(this))+1;
			var href = $('.portfolio__tab-title').attr("href")+ num;
			var url = href.substr(1);
			
			$.get(url, function(gotHtml) {
					$("#portfolio__content").html(gotHtml);
					return false;
				})


		})

	});

}(jQuery));