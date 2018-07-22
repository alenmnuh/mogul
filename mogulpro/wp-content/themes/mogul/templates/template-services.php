<?php
/*
* Template Name: Services Page
*/
get_header();?>

<section class="services">

	<?php if ($services_title = get_field('services_title')): ?>
	   <h1 class="services__title"><?php echo $services_title;?></h1>
	<?php endif ?>

	<hr class="services__hr" />
	
	<!-- 	//categories name -->
	<?php if( have_rows('services_category_name') ): ?>

	   <div class="row services__categories">
		
	   <?php while( have_rows('services_category_name') ): the_row(); ?>

		  <div class="column services__tab">
			 
			 <?php if ($services_category_name = get_sub_field('services_category_name')): ?>
				<a href="#services" class="services__tab-title"><?php echo $services_category_name;?></a>
			 <?php endif ?>

		  </div>

	   <?php endwhile; ?>

	   </div>

	<?php endif; ?>

	<hr class="services__hr" />
	
	<!-- SERVICES -->

	<div class="row services__block">
	   <div id="services__content"> 
	   	<?php get_template_part( 'services/services1' );?>
	   </div>
	</div>

	<?php if ($service_example_title = get_field('service_example_title')): ?>
	   <h2 class="services__h2 service__h2_example"><?php echo $service_example_title;?></h2>
	<?php endif ?>

	<!-- START REPEATER EXAMPLES SERVICE -->

	<?php if( have_rows('service_example') ): ?>

	   <div class="row services__example">
		
	   <?php while( have_rows('service_example') ): the_row(); ?>

		  <div class="column medium-6">
			 
				<?php if ($examples_of_services = get_sub_field('examples_of_services')): ?>
					<h3 class="services__example-title"><?php echo $examples_of_services;?></h3>
				<?php endif ?>

		  	</div>

	   <?php endwhile; ?>

	   </div>

	<?php endif; ?>

	<!-- END REPEATER EXAMPLES SERVICE -->

</section>

<?php get_footer();?>