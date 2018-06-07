<?php 
function mogul_scripts () {
	wp_enqueue_style ( 'foundation-css', get_template_directory_uri() .  '/css/foundation.min.css' );
	wp_enqueue_style ( 'fancy-box-css', get_template_directory_uri() .  '/css/jquery.fancybox.min.css' );
	wp_enqueue_style ( 'font-awesome', get_template_directory_uri() .  '/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_style ( 'slick-css', get_template_directory_uri() .  '/slick/slick.css' );
	wp_enqueue_style ( 'slick-theme', get_template_directory_uri() .  '/slick/slick-theme.css' );
	wp_enqueue_style ( 'normalize', get_template_directory_uri() .  '/css/normalize.css' );
	wp_enqueue_style ( 'stylesheet', get_template_directory_uri() .  '/fonts/stylesheet.css' );
	wp_enqueue_style ( 'style-css', get_template_directory_uri() .  '/css/main.css' );
	wp_enqueue_style ( 'style', get_stylesheet_uri() );


	wp_enqueue_script ( 'jquery');
	wp_enqueue_script( 'true_loadmore',  get_template_directory_uri() . '/js/loadmore.js', array('jquery') );
	wp_enqueue_script ( 'matchHeight', get_template_directory_uri() .  '/js/jquery.matchHeight.js' );
	wp_enqueue_script ( 'foundation-js', get_template_directory_uri() .  '/js/foundation.min.js' );
	wp_enqueue_script ( 'slick-js', get_template_directory_uri() .  '/slick/slick.min.js' );
	wp_enqueue_script ( 'fancy-box-js', get_template_directory_uri() .  '/js/jquery.fancybox.min.js' );
	wp_enqueue_script ( 'main-js', get_template_directory_uri() .  '/js/main.js' );
}
add_action( 'wp_enqueue_scripts', 'mogul_scripts' );

add_theme_support( 'post-thumbnails' );

register_nav_menus(array(
	'top'    => 'Top Menu',
));

// Add theme support for Custom Logo.
add_theme_support( 'custom-logo', array(
	'width'       => 171,
	'height'      => 171,
	'flex-width'  => true
) );

// Add option page
if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page();	
}

//sidebar
function mogul_sidebar() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mogul' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'mogul' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mogul_sidebar' );

//loading posts, button view more
function true_load_posts(){
 
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1; // next page
	$args['post_status'] = 'publish';
 
	query_posts( $args );
	if( have_posts() ) :
		while( have_posts() ): the_post(); ?>
 
			<a href="<?php the_permalink() ?>">
				<h2 class="post-title"><?php the_title() ?></h2>
				<hr class="post-hr"/>
				<div class="post-content">
					<?php the_content(); ?>
				</div>
			</a>
 
		<?php endwhile;
 
	endif;
	die();
} 
 
add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');

//custom logo link
add_filter( 'get_custom_logo', 'custom_link_logo' );
function custom_link_logo() {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $html = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
            esc_url( 'localhost/mogul/booking' ),
            wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                'class'    => 'custom-logo',
            ) )
        );
    return $html;   
}

//post without loading page
add_action( 'wp_ajax_get_cat', 'ajax_show_posts');
add_action( 'wp_ajax_nopriv_get_cat', 'ajax_show_posts');

function ajax_show_posts() {

	$link = ! empty( $_POST['link'] ) ? esc_attr( $_POST['link'] ) : false;
	$slug = $link ? wp_basename( $link ) : false;
	$cat = get_category_by_slug( $slug );

	if( ! $cat ) {
		die( 'Category is not found' );
	}

	query_posts( array(
		'posts_per_page' => get_option( 'posts_per_page' ),
		'post_status' => 'publish',
		'category_name' => $cat->slug
	) ); ?>

	<?php if ( have_posts() ) : 		
		the_archive_title( '<h1 class="archive-title">', '</h1>' );
		the_archive_description( '<div class="taxonomy-description">', '</div>' );
	?>
	
		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<a href="<?php the_permalink() ?>"><h2 class="archive-post-title"><?php the_title() ?></h2></a>
				<hr class="post-hr"/>
				<div class="post-content">
					<?php the_content(); ?>
				</div>

			</article>

		<?php endwhile; ?>

		<?php $pagination = get_the_posts_pagination( array(
			'prev_text'          => __( 'Previous page'),
			'next_text'          => __( 'Next page')
		) );

		echo str_replace( admin_url( 'admin-ajax.php/' ), get_category_link( $cat->term_id ), $pagination ); ?>
		
	<?php else : ?> 
		<h2>No Posts Found</h2>
		
	<?php	endif; ?>
		
<?php wp_die();
}

add_action( 'wp_enqueue_scripts', 'my_assets' );
function my_assets() { 

	wp_enqueue_script( 'ajax-post',  get_template_directory_uri() . '/js/ajax-post.js', array('jquery') );
	wp_localize_script ( 'ajax-post', 'myajaxurl', array (
		'ajaxurl' => admin_url('admin-ajax.php')
	));

}