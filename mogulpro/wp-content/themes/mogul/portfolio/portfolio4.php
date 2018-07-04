<?php
/*
* Template Name: Portfolio Candid
*/
?>

<div class="portfolio__main">

   <?php if( have_rows('gallery') ): ?>

      <div class="row">
      
      <?php while( have_rows('gallery') ): the_row(); ?>

         <div class="column">

         <a data-width="500" data-height="700" data-fancybox="images" href="<?php if ($gallery_image = get_sub_field('gallery_image')):
                           echo $gallery_image['url'];
                        endif?>">
            <img src="<?php if ($gallery_image = get_sub_field('gallery_image')):
                           echo $gallery_image['url'];
                        endif?>" class="portfolio__image">
         </a>

         </div>

      <?php endwhile; ?>

      </div>

   <?php endif; ?>

</div>