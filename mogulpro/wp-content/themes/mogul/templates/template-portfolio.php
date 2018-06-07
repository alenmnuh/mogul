<?php
/*
* Template Name: Portfolio Page
*/
get_header();?>

<section class="portfolio">

	<?php if ($portfolio_title = get_field('portfolio_title')): ?>
	   <h1><?php echo $portfolio_title;?></h1>
	<?php endif ?>

	<!-- categories name -->
	<?php if( have_rows('portfolio_categories_names') ): ?>

	   <div class="row categories">
		
	   <?php while( have_rows('portfolio_categories_names') ): the_row(); ?>

	      <div class="column tab-content">
	         
	         <?php if ($portfolio_category_name = get_sub_field('portfolio_category_name')): ?>
	            <h3 class="tab"><?php echo $portfolio_category_name;?></h3>
	         <?php endif ?>

	      </div>

	   <?php endwhile; ?>

	   </div>

	<?php endif; ?> 

	<hr />
	
	<!-- ACF REPEATER SERVICES -->
	<?php if( have_rows('portfolio') ): ?>

	   <div class="row gallery">
		
	   <?php while( have_rows('portfolio') ): the_row(); ?>

	      <div class="column medium-12">

	         <div class="main">

	         <?php if( have_rows('gallery') ): ?>

	            <div class="row">
	         	
	            <?php while( have_rows('gallery') ): the_row(); ?>

	               <div class="column">

      		         <a data-width="500" data-height="700" data-fancybox="images" href="<?php if ($gallery_image = get_sub_field('gallery_image')):
                     						echo $gallery_image['url'];
                  						endif?>">
      		            <img src="<?php if ($gallery_image = get_sub_field('gallery_image')):
                     						echo $gallery_image['url'];
                  						endif?>">
      		         </a>

	               </div>

	            <?php endwhile; ?>

	            </div>

	         <?php endif; ?>

				</div>

	      </div>

	   <?php endwhile; ?>
	   
	   </div>

	<?php endif; ?> 

</section>

<?php get_footer();?>