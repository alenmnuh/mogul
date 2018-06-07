<?php

get_header(); ?>

<section class="blog-single">
	<div class="blog-single-content blog-content">

		<div class="row" style="text-align: center;">

			<?php while ( have_posts() ) : the_post(); ?>

				<h1 class="post-title"><?php the_title(); ?></h1>
				<div class="small-11 large-12 small-centered post-single-content"><?php the_content(); ?></div>

				<?php 
					the_post_navigation( array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper"><i class="fa fa-arrow-left fa-lg"></i></span></span>',

						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper"><i class="fa fa-arrow-right fa-lg"></i></span></span>'
					) );
				?>
				
			<?php endwhile; ?>

		</div>
	</div>
</section>

<?php get_sidebar(); ?>
<?php get_footer();