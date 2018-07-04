<?php
/*
* Template Name: Contact Page
*/
get_header();?>

<section class="contact">

	<div class="tabbed">

		<div class="row expanded t1 tabbed__tab-content">
			<?php if ($contact_title = get_field('contact_title')): ?>
			   <h2 class="contact__h2"><?php echo $contact_title; ?></h2>
			<?php endif ?>
			<?php echo do_shortcode( '[contact-form-7 id="61" title="Contact Form"]' ); ?>
		</div>

		<div class="row expanded t2 tabbed__tab-content">
			<?php if ($booking_title = get_field('booking_title')): ?>
			   <h2 class="contact__h2"><?php echo $booking_title; ?></h2>
			<?php endif ?>
			<?php echo do_shortcode( '[contact-form-7 id="60" title="Booking Form"]' ); ?>
		</div>

		<div class="row expanded  t3 tabbed__tab-content">
			<?php if ($review_title = get_field('review_title')): ?>
			   <h2 class="contact__h2"><?php echo $review_title; ?></h2>
			<?php endif ?>
			<?php echo do_shortcode( '[contact-form-7 id="62" title="Review Form"]' ); ?>
		</div>

		<ul class="tabbed__tabs">
			<li class="tabbed__li">
				<a class="t1 tabbed__tab"></a>	
			</li>

			<li class="tabbed__li li2"><a class="t2 tabbed__tab">

				<button class="button-form">
					<img class="button-form__image" src="<?php
				      if ($booking_button = get_field('booking_button')):
				         echo $booking_button['url'];
				      endif?>"
				   >
				</button>

			</a></li>

			<li class="li3 tabbed__li"><a class="t3 tabbed__tab">

				<button class="button-form">
				   <img class="button-form__image" src="<?php
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