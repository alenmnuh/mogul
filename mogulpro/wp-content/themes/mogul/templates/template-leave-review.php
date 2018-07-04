<?php
/*
* Template Name: Leave a Review Page
*/
get_header();?>

<section class="leave-review">
	
	<div class="row expanded">
		<h1 class="leave-review__title"><?php the_title() ?></h1>
		<?php echo do_shortcode( '[contact-form-7 id="62" title="Review Form"]' ); ?>
	</div>

</section>

<?php get_footer();?>