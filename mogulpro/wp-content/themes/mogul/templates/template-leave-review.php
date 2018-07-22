<?php
/*
* Template Name: Leave a Review Page
*/
get_header();?>

<section class="leave-review">
	
	<div class="row expanded">
		<h1 class="leave-review__title"><?php the_title() ?></h1>

		<?php if ( is_user_logged_in() ) :
			$shortcode = get_post_meta($post->ID,'form_shortcode_review',true);
			echo do_shortcode($shortcode);
		else : ?>
			<h2 style="text-align: center">Please log in</h2>
		<?php endif ?>
	</div>

</section>

<?php get_footer();?>