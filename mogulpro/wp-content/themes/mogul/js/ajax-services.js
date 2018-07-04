(function($) {

	$(document).ready(function(){

		$(".services__tab-title").click( function () {

			var num = $('.services__tab-title').index($(this))+1;
			var href = $('.services__tab-title').attr("href")+ num;
			var url = href.substr(1);
			console.log(url);
			
			$.get(url, function(gotHtml) {
					$("#services__content").html(gotHtml);
					return false;
				})


		})

	});

}(jQuery));