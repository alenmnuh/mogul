jQuery(function($){

	$('#true_loadmore1').click(function(){

		$(this).text('Downloading...');
		var data = {
			'action': 'loadmore_reviews',
			'query': true_posts,
			'page' : current_page
		};

		$.ajax({

			url:ajaxurl,
			data:data,
			type:'POST',
			success:function(data){
				if( data ) { 
					$('#true_loadmore1').text('View More').before(data);
					current_page++;
					if (current_page == max_pages) $("#true_loadmore1").remove();
				} else {
					$('#true_loadmore1').remove();
				}
			}
		});

	});
	
});