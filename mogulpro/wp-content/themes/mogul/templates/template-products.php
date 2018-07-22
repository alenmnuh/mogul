<?php
/*
* Template Name: Products
*/
get_header();?>

<section class="products">

	<?php update_post_meta( '195', 'product_price', '12$', false ); ?>
	<?php update_post_meta( '195', 'product_avaliable', 'avaliable', false ); ?>


	<?php update_post_meta( '193', 'product_price', '15$', false ); ?>
	<?php update_post_meta( '193', 'product_avaliable', 'not avaliable', false ); ?>

	<?php update_post_meta( '191', 'product_price', '23$', false ); ?>
	<?php update_post_meta( '191', 'product_avaliable', 'avaliable', false ); ?>

	<?php update_post_meta( '189', 'product_price', '32$', false ); ?>
	<?php update_post_meta( '189', 'product_avaliable', 'avaliable', false ); ?>

	<?php 
	   $args = array(
	      'post_type' => 'product',
	      'order' => 'ASC',
	      'posts_per_page' => '-1'
	   );
	?>
	<?php query_posts( $args ); ?>

	<?php $the_query = new WP_Query( $args );?>

	<?php if ($the_query->have_posts() ) : ?>

			<div class="row">
				
	      <?php while ( $the_query->have_posts() ) :  $the_query->the_post();?>
	      	<div class="column small-12 medium-4 product">
	      		<a href="<?php the_permalink() ?>">
		      		<?php the_post_thumbnail('product'); ?>
		      		<div><?php $product->getPrice($post->ID); ?>
	      			<?php $product->isInStock($post->ID); ?></div>
			      	<h2 class="product__name"><?php the_title(); ?></h2>
			      </a>
				</div>
	      <?php endwhile; ?>
	   </div>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
</section>
 
<?php get_footer();?>