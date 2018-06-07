<?php
/*
* Template Name: Contact Page
*/
get_header();?>

<section class="contact">

	<div class="tabbed">

		<div class="row expanded t1 tab-content">
			<?php if ($contact_title = get_field('contact_title')): ?>
			   <h2><?php echo $contact_title; ?></h2>
			<?php endif ?>
			<?php echo do_shortcode( '[contact-form-7 id="61" title="Contact Form"]' ); ?>
		</div>

		<div class="row expanded t2 tab-content">
			<?php if ($booking_title = get_field('booking_title')): ?>
			   <h2><?php echo $booking_title; ?></h2>
			<?php endif ?>
			<?php echo do_shortcode( '[contact-form-7 id="60" title="Booking Form"]' ); ?>
		</div>

		<div class="row expanded  t3 tab-content">
			<?php if ($review_title = get_field('review_title')): ?>
			   <h2><?php echo $review_title; ?></h2>
			<?php endif ?>
			<?php echo do_shortcode( '[contact-form-7 id="62" title="Review Form"]' ); ?>
		</div>

		<ul class="tabs">
			<li class="">
				<a class="t1 tab"></a>	
			</li>

			<li class="li2"><a class="t2 tab">

				<button class="button-form">
					<img class="button-image" src="<?php
				      if ($booking_button = get_field('booking_button')):
				         echo $booking_button['url'];
				      endif?>"
				   >
				</button>

			</a></li>

			<li class="li3"><a class="t3 tab">

				<button class="button-form">
				   <img class="button-image" src="<?php
				      if ($review_button = get_field('review_button')):
				         echo $review_button['url'];
				      endif?>"
				   >
				</button>
				
			</a></li>
		</ul>

	</div>

</section>

<?php get_footer();?>