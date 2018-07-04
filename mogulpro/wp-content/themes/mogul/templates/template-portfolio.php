<?php
/*
* Template Name: Portfolio Page
*/
get_header();?>

<section class="portfolio">

	<?php if ($portfolio_title = get_field('portfolio_title')): ?>
	   <h1 class="portfolio__title"><?php echo $portfolio_title;?></h1>
	<?php endif ?>

	<!-- categories name -->
	<?php if( have_rows('portfolio_categories_names') ): ?>

	   <div class="row portfolio__categories">
		
	   <?php while( have_rows('portfolio_categories_names') ): the_row(); ?>

	      <div class="column portfolio__tab">
	         
	         <?php if ($portfolio_category_name = get_sub_field('portfolio_category_name')): ?>
	            <a href="#portfolio" class="portfolio__tab-title"><?php echo $portfolio_category_name;?></a>
	         <?php endif ?>

	      </div>

	   <?php endwhile; ?>

	   </div>

	<?php endif; ?> 

	<hr class="portfolio__hr"/>
	
	<!-- GALLERY -->


   <div class="row gallery">
      <div class="column medium-12" id="portfolio__content"> 
      	<?php get_template_part( 'portfolio/portfolio1' );?>
      </div>
   </div>

</section>

<?php get_footer();?>