<?php
/*
* Template Name: Services Page
*/
get_header();?>

<section class="services">

	<?php if ($services_title = get_field('services_title')): ?>
	   <h1><?php echo $services_title;?></h1>
	<?php endif ?>

	<hr />
	
	<!-- 	//categories name -->
	<?php if( have_rows('services_category_name') ): ?>

	   <div class="row categories">
		
	   <?php while( have_rows('services_category_name') ): the_row(); ?>

		  <div class="column tab-content">
			 
			 <?php if ($services_category_name = get_sub_field('services_category_name')): ?>
				<h3 class="tab"><?php echo $services_category_name;?></h3>
			 <?php endif ?>

		  </div>

	   <?php endwhile; ?>

	   </div>

	<?php endif; ?>

	<hr />
	
	<!-- ACF REPEATER SEVICES -->
	<?php if( have_rows('services') ): ?>

	   <div class="row services-block">
		
	   <?php while( have_rows('services') ): the_row(); ?>

			<div class="main">

				<!-- START REPEATER MAIN SERVICES -->

				<?php if( have_rows('main_services') ): ?>

					<div class="row main-services">
					
					<?php while( have_rows('main_services') ): the_row(); ?>

					   <div class="column">
						  
							<?php if ($service_name = get_sub_field('service_name')): ?>
								<h3><?php echo $service_name;?></h3>
							<?php endif ?>

							<?php if ($service_price = get_sub_field('service_price')): ?>
								<span><?php echo $service_price;?></span>
							<?php endif ?>

							<?php if ($service_description = get_sub_field('service_description')): ?>
								<p><?php echo $service_description;?></p>
							<?php endif ?>

					   </div>

					<?php endwhile; ?>

					</div>

				<?php endif; ?>

			 	<!-- END REPEATER MAIN SERVICES --> 

				<hr />

				<?php if ($additional_services_title = get_sub_field('additional_services_title')): ?>
					<h2><?php echo $additional_services_title;?></h2>
				<?php endif ?>

				<!-- START REPEATER ADDITIONAL SERVICES -->

				<?php if( have_rows('additional_services') ): ?>

					<div class="row">
					
					<?php while( have_rows('additional_services') ): the_row(); ?>

					   <div class="column medium-3 large-2">
						  
						  	<?php if ($additional_option = get_sub_field('additional_option')): ?>
								<h3><?php echo $additional_option;?></h3>
						  	<?php endif ?>

						  	<?php if ($option_price = get_sub_field('option_price')): ?>
							 	<span><?php echo $option_price;?></span>
						  	<?php endif ?>

					   </div>

					<?php endwhile; ?>

					</div>

				<?php endif; ?>

				<!-- END REPEATER ADDITIONAL SERVICES -->

				<hr style="margin-top: 0;"/>

				<?php if ($travel_services_title = get_sub_field('travel_services_title')): ?>
				   <h2><?php echo $travel_services_title;?></h2>
				<?php endif ?>

				<!-- START REPEATER TRAVEL SERVICES -->

				<?php if( have_rows('travel_services') ): ?>

				   <div class="row">
					
				   <?php while( have_rows('travel_services') ): the_row(); ?>

					  <div class="column medium-3 large-2">
						 
							<?php if ($travel_option = get_sub_field('travel_option')): ?>
								<h3><?php echo $travel_option;?></h3>
							<?php endif ?>

							<?php if ($travel_price = get_sub_field('travel_price')): ?>
								<span><?php echo $travel_price;?></span>
							<?php endif ?>

					  	</div>

				   <?php endwhile; ?>

				   </div>

				<?php endif; ?>

				<hr style="margin: 0 auto;"/>

				<!-- END REPEATER TRAVEL SERVICES -->

			</div>


	   <?php endwhile; ?>

	 </div>

	<?php endif; ?> 


	<?php if ($service_example_title = get_field('service_example_title')): ?>
	   <h2 class="service-example-title"><?php echo $service_example_title;?></h2>
	<?php endif ?>

	<!-- START REPEATER EXAMPLES SERVICE -->

	<?php if( have_rows('service_example') ): ?>

	   <div class="row service-example">
		
	   <?php while( have_rows('service_example') ): the_row(); ?>

		  <div class="column medium-6">
			 
				<?php if ($examples_of_services = get_sub_field('examples_of_services')): ?>
					<h3><?php echo $examples_of_services;?></h3>
				<?php endif ?>

		  	</div>

	   <?php endwhile; ?>

	   </div>

	<?php endif; ?>

	<!-- END REPEATER EXAMPLES SERVICE -->

</section>

<?php get_footer();?>