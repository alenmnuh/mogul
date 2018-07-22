<?php
/*
* Template Name: Reviews Page
*/
get_header();?>

<section class="reviews">

	<?php if ( $reviews_title = get_field ('reviews_title') ): ?>
	   <h1 class="column reviews__title"><?php echo $reviews_title; ?></h1>
	<?php endif; ?>


	<?php 
	   $args = array(
	      'post_type' => 'review',
	      'order' => 'ASC',
	      'posts_per_page' => '2'
	   );
	?>


	<?php $the_query = new WP_Query( $args );?>

	<?php if ($the_query->have_posts() ) : ?>
			
			<div class="row">
				
	      <?php while ( $the_query->have_posts() ) :  $the_query->the_post();?>
	      	<div class="column review small-12 medium-5">

	      	
	    			<?php if ($review_post = get_field('review_post')): ?>
						   <span class="review__span"><?php echo $review_post;?></span>
						<?php endif ?>

		      		<hr class="reviews__hr" />
		      		<?php if ($inquiry = get_field('inquiry')): ?>
		            	<div class="review__text"><?php echo $inquiry;?></div>
		         	<?php endif ?>

		         	<div class="review__author">	

						<span class="review__span"><?php the_title() ?></span>

						<?php if ($user_location = get_field('user_location')): ?>
						   <span class="review__span"><?php echo $user_location;?></span>
						<?php endif ?>

		         	</div>

	         		<hr />	         	
	      	</div>
	      <?php endwhile; ?>
	   </div>
	   <?php if (  $the_query->max_num_pages > 1 ) : ?>
				<script>
				var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
				var true_posts = '<?php echo serialize($the_query->query_vars); ?>';
				var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
				var max_pages = '<?php echo $the_query->max_num_pages; ?>';
				</script>
				<button id="true_loadmore1" class="button_loadmore">View More</button>
			<?php endif; ?>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>


	<a class="button_review"  href="<?php if ($page_link_of_this_button = get_field('page_link_of_this_button')):
	        echo $page_link_of_this_button;
	      endif?>"">

	   <img class="button__image_review" src="<?php
	      if ($leave_a_review_button_image = get_field('leave_a_review_button_image')):
	         echo $leave_a_review_button_image['url'];
	      endif?>"
	   >
		
	</a>

	<?php if ( $visit_the_sites_title = get_field ('visit_the_sites_title') ): ?>
	   <h2 class="column visit__title small-centered"><?php echo $visit_the_sites_title; ?></h2>
	<?php endif; ?>


	<?php if (have_rows('additional_sites')): ?>

      <div class="visit__social-icons row expanded">

         <?php while (have_rows('additional_sites')): the_row();
            $site_logo = get_sub_field('site_logo');
            $site_link = get_sub_field('site_link');
         ?>

            <?php if ($site_link): ?>
              <div class="column visit__sites small-6"><a class="" href="<?php echo $site_link ?>">
              		<img class="visit__sites-img" src="<?php
              		   if ($site_logo):
              		      echo $site_logo['url'];
              		   endif?>"
              		>

              </a></div>

            <?php endif ?>

         <?php endwhile ?>

      </div>
      
	 <?php endif ?>

</section>

<?php get_footer();?>