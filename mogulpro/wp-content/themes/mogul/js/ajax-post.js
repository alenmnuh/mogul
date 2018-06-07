(function($) {

	$(document).ready(function(){

		var $mainBox = $('.blog-content');
		
		$('.widget_categories a').click(function(e) {

			e.preventDefault();
			$mainBox.html('');

			var linkCat = $(this).attr('href');
			var titleCat = $(this).text();

			document.title = titleCat;

			history.pushState({page_title: titleCat}, titleCat, linkCat);

			ajaxCat(linkCat);
		});

		window.addEventListener("popstate", function (event) {
			document.title = event.state.page_title;
			ajaxCat(location.href);
		}, false);

		function ajaxCat(linkCat) {

			$mainBox.animate({opacity: 0.5}, 300);

			$.post ( {
				url: myajaxurl.ajaxurl,
				data: { action: 'get_cat', link: linkCat },
				success: function(response) {
					$mainBox
						.html(response)
						.animate({opacity:1}, 300);
				}
			});
		};

	});

}(jQuery));