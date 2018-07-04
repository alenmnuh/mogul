<?php
/*
* Template Name: Services Candid
*/
?>

<div class="services__main">

	<!-- START REPEATER MAIN SERVICES -->

	<?php if( have_rows('main_services') ): ?>

		<div class="row main-services">
		
		<?php while( have_rows('main_services') ): the_row(); ?>

		   <div class="column">
			  
				<?php if ($service_name = get_sub_field('service_name')): ?>
					<h3 class="services__h3"><?php echo $service_name;?></h3>
				<?php endif ?>

				<?php if ($service_price = get_sub_field('service_price')): ?>
					<span class="services__span"><?php echo $service_price;?></span>
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

	<?php if ($additional_services_title = get_field('additional_services_title')): ?>
		<h2 class="services__h2"><?php echo $additional_services_title;?></h2>
	<?php endif ?>

	<!-- START REPEATER ADDITIONAL SERVICES -->

	<?php if( have_rows('additional_services') ): ?>

		<div class="row">
		
		<?php while( have_rows('additional_services') ): the_row(); ?>

		   <div class="column medium-3 large-2">
			  
			  	<?php if ($additional_option = get_sub_field('additional_option')): ?>
					<h3 class="services__h3"><?php echo $additional_option;?></h3>
			  	<?php endif ?>

			  	<?php if ($option_price = get_sub_field('option_price')): ?>
				 	<span class="services__span"><?php echo $option_price;?></span>
			  	<?php endif ?>

		   </div>

		<?php endwhile; ?>

		</div>

	<?php endif; ?>

	<!-- END REPEATER ADDITIONAL SERVICES -->

	<hr style="margin-top: 0;"/>

	<?php if ($travel_services_title = get_field('travel_services_title')): ?>
	   <h2 class="services__h2"><?php echo $travel_services_title;?></h2>
	<?php endif ?>

	<!-- START REPEATER TRAVEL SERVICES -->

	<?php if( have_rows('travel_services') ): ?>

	   <div class="row">
		
	   <?php while( have_rows('travel_services') ): the_row(); ?>

		  <div class="column medium-3 large-2">
			 
				<?php if ($travel_option = get_sub_field('travel_option')): ?>
					<h3 class="services__h3"><?php echo $travel_option;?></h3>
				<?php endif ?>

				<?php if ($travel_price = get_sub_field('travel_price')): ?>
					<span class="services__span"><?php echo $travel_price;?></span>
				<?php endif ?>

		  	</div>

	   <?php endwhile; ?>

	   </div>

	<?php endif; ?>

	<hr style="margin: 0 auto;"/>

	<!-- END REPEATER TRAVEL SERVICES -->

</div>