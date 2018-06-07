<?php
/*
* Template Name: Home Page
*/
get_header();?>

<section class="about">
	
	<?php if ( $home_main_title = get_field ('home_main_title') ): ?>
	   <h1 class="column row home-main-title"><?php echo $home_main_title; ?></h1>
	<?php endif; ?>

	<?php if ($home_first_text = get_field('home_first_text')): ?>
	   <p class="column row medium-8 large-6 about-first-text"><?php echo $home_first_text ?></p>
	<?php endif ?>

	<img src="<?php if ($home_first_image = get_field('home_first_image')):
  							echo $home_first_image['url'];
						endif?>" alt="" class="about-first-img">

	<?php if ($home_second_text = get_field('home_second_text')): ?>
	   <p class="column row medium-8 large-6 about-second-text"><?php echo $home_second_text ?></p>
	<?php endif ?>

	<img src="<?php if ($home_second_image = get_field('home_second_image')):
     						echo $home_second_image['url'];
  						endif?>" alt="" class="about-second-img">

	<?php if ( $position_title = get_field ('position_title') ): ?>
	   <h2 class="about-position"><?php echo $position_title; ?></h2>
	<?php endif; ?>

	<?php if ( $address = get_field ('address') ): ?>
	   <h2 class="" style="margin-bottom: 2.4%"><?php echo $address; ?></h2>
	<?php endif; ?>

	<?php if ( $email_address = get_field ('email_address') ): ?>
	   <h2 class=""><?php echo $email_address; ?></h2>
	<?php endif; ?>

	<?php if ( $phone_number = get_field ('phone_number') ): ?>
	   <h2 class=""><?php echo $phone_number; ?></h2>
	<?php endif; ?>

</section>

<?php get_footer();?>