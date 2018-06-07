<?php
/*
* Template Name: Booking Page
*/
get_header();?>

<section class="leave-review">
	
	<div class="row expanded">
		<h1><?php the_title() ?></h1>
		<?php echo do_shortcode( '[contact-form-7 id="60" title="Booking Form"]' ); ?>
	</div>

</section>

<?php get_footer();?>