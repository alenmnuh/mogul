<?php

get_header(); ?>
	
<section class="blog">

	<?php
		$args = array(
		'posts_per_page' => 2,
		'order' => 'ASC'
	);
	$query = new WP_Query( $args ); ?>

	<div class="blog__content">	
		<?php if ( $query->have_posts() ) : ?>
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<a href="<?php the_permalink() ?>">
					<h2 class="post__title"><?php the_title() ?></h2>
					<hr class="post__hr"/>
					<div class="post__content">
						<?php the_content(); ?>
					</div>
				</a>
			<?php endwhile; ?>

			<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	        <script>
		        var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
		        var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
		        var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
		        var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
	        </script>
	         <div id="true_loadmore" class="button_loadmore">View More</div>
			<?php endif; ?>

		<?php endif; ?>
	</div>
	
	<?php wp_reset_postdata(); ?>

</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>