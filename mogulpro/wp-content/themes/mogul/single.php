<?php

get_header(); ?>

<section class="single-post">
	<div class="single-post__content blog__content">

		<div class="row" style="text-align: center;">

			<?php while ( have_posts() ) : the_post(); ?>

				<h1 class="post__title"><?php the_title(); ?></h1>
				<div class="small-11 large-12 small-centered post__content"><?php the_content(); ?></div>

				<?php 
					the_post_navigation( array(
						'prev_text' => '<span aria-hidden="true" class="post-nav__subtitle">' . __( 'Previous' ) . '</span> <span class="post-nav__title">%title<span class="post-nav__icon"><i class="fa fa-arrow-left fa-lg"></i></span></span>',

						'next_text' => '<span aria-hidden="true" class="post-nav__subtitle">' . __( 'Next' ) . '</span> <span class="post-nav__title">%title<span class="post-nav__icon"><i class="fa fa-arrow-right fa-lg"></i></span></span>'
					) );
				?>
				
			<?php endwhile; ?>

		</div>
	</div>
</section>

<?php get_sidebar(); ?>
<?php get_footer();