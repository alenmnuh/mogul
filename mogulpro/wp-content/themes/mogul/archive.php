<?php

get_header(); ?>

<div class="archive-page">

	<?php if ( have_posts() ) : 		
		the_archive_description( '<div class="taxonomy-description">', '</div>' );
	?>
	
		<div class="blog__content">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<a href="<?php the_permalink() ?>"><h2 class="post__title"><?php the_title() ?></h2></a>
					<hr class="post__hr"/>
					<div class="post__content">
						<?php the_content(); ?>
					</div>

				</article>

			<?php endwhile; ?>

			<?php the_posts_pagination( array(
				'prev_text'          => __( 'Previous page'),
				'next_text'          => __( 'Next page')
			) ); ?>
	
		</div>

	<?php else : ?> 
		<h2>No Posts Found</h2>
		
	<?php	endif; ?>
	
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
