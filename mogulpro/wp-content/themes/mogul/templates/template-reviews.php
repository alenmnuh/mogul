<?php
/*
* Template Name: Reviews Page
*/
get_header();?>

<section class="reviews">

	<?php if ( $reviews_title = get_field ('reviews_title') ): ?>
	   <h1 class="column reviews-title"><?php echo $reviews_title; ?></h1>
	<?php endif; ?>

	<?php if( have_rows('reviews') ): ?>

	   <div class="row">

	   <?php while( have_rows('reviews') ): the_row(); ?>
	      <div class="column review small-12 medium-5">

	      	<hr />
	         
	         <?php if ($review_text = get_sub_field('review_text')): ?>
	            <p><?php echo $review_text;?></p>
	         <?php endif ?>

	         <div class="review-author">	

					<?php if ($review_author = get_sub_field('review_author')): ?>
					   <span><?php echo $review_author;?></span>
					<?php endif ?>


					<?php if ($location_of_review_author = get_sub_field('location_of_review_author')): ?>
					   <span><?php echo $location_of_review_author;?></span>
					<?php endif ?>

	         </div>

	         <hr />

	      </div>

	   <?php endwhile; ?>

	   </div>

	<?php endif; ?> 


	<a class="review-button"  href="<?php if ($page_link_of_this_button = get_field('page_link_of_this_button')):
	        echo $page_link_of_this_button;
	      endif?>"">

	   <img class="review-button-image" src="<?php
	      if ($leave_a_review_button_image = get_field('leave_a_review_button_image')):
	         echo $leave_a_review_button_image['url'];
	      endif?>"
	   >
		
	</a>

	<?php if ( $visit_the_sites_title = get_field ('visit_the_sites_title') ): ?>
	   <h2 class="column visit-the-sites small-centered"><?php echo $visit_the_sites_title; ?></h2>
	<?php endif; ?>


	<?php if (have_rows('additional_sites')): ?>

      <div class="reviews-social-icons row expanded">

         <?php while (have_rows('additional_sites')): the_row();
            $site_logo = get_sub_field('site_logo');
            $site_link = get_sub_field('site_link');
         ?>

            <?php if ($site_link): ?>
              <div class="column additional-sites small-6"><a class="" href="<?php echo $site_link ?>">
              		<img class="" src="<?php
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