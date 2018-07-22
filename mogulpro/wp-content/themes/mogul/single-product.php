<?php get_header(); ?>

	<div class="row" style="text-align: center;">

		<?php update_post_meta( '195', 'product_price', '12$', false ); ?>
		<?php update_post_meta( '195', 'product_avaliable', 'avaliable', false ); ?>


		<?php update_post_meta( '193', 'product_price', '15$', false ); ?>
		<?php update_post_meta( '193', 'product_avaliable', 'not avaliable', false ); ?>

		<?php update_post_meta( '191', 'product_price', '23$', false ); ?>
		<?php update_post_meta( '191', 'product_avaliable', 'avaliable', false ); ?>

		<?php update_post_meta( '189', 'product_price', '32$', false ); ?>
		<?php update_post_meta( '189', 'product_avaliable', 'avaliable', false ); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<h1 class="product__name" style="margin: 1em 0;"><?php the_title(); ?></h1>
			<?php the_post_thumbnail(); ?>
			<div class="small-11 large-9 small-centered" style="text-align: left; margin: 2em auto;"><?php the_content(); ?></div>

		<?php endwhile; ?>
<?php $product = new CPT_Generator('product'); ?>
		<?php $product->getPrice(get_the_ID()); ?>
	      	<?php $product->isInStock($post->ID); ?>

	</div>

 <?php get_footer(); ?>