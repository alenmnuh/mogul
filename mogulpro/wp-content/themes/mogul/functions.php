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
	wp_enqueue_script ( 'matchHeight', get_template_directory_uri() .  '/js/jquery.matchHeight.js' );
	wp_enqueue_script ( 'foundation-js', get_template_directory_uri() .  '/js/foundation.min.js' );
	wp_enqueue_script ( 'slick-js', get_template_directory_uri() .  '/slick/slick.min.js' );
	wp_enqueue_script ( 'fancy-box-js', get_template_directory_uri() .  '/js/jquery.fancybox.min.js' );
	wp_enqueue_script ( 'ajax-portfolio', get_template_directory_uri() .  '/js/ajax-portfolio.js', array('jquery') );
	wp_enqueue_script ( 'ajax-services', get_template_directory_uri() .  '/js/ajax-services.js', array('jquery') );
	wp_enqueue_script( 'true_loadmore_posts',  get_template_directory_uri() . '/js/loadmore.js', array('jquery') );
	wp_enqueue_script( 'true_loadmore_reviews',  get_template_directory_uri() . '/js/loadmoreReviews.js', array('jquery') );
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
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' )
) );

// Add image size
add_image_size( 'product', 273, 273, true );

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


//loading posts 'reviews' , button view more
function true_load_reviews(){
 
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1; // next page
	$args['post_status'] = 'publish';
	$args['post_type'] = 'review';

	$the_query = new WP_Query( $args );
	if ($the_query->have_posts() ) : ?>
			
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
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>

	<?php die();
} 
 
add_action('wp_ajax_loadmore_reviews', 'true_load_reviews');
add_action('wp_ajax_nopriv_loadmore_reviews', 'true_load_reviews');

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
		'ajaxurl' => admin_url('admin-ajax.php'),
		 'homeurl' => esc_url( get_home_url())
	));
}

//Add custom post type review
function review_post_type(){
	$labels = array (
		'name' => 'Reviews',
		'singular_name' => 'review',
		'add_new' => 'Add review',
		'all_items' => 'All reviews',
		'add_new_item' => 'Add New review',
		'edit_item' => 'Edit review',
		'new_item' => 'New review',
		'view_item' => 'View reviews',
		'search_item' => 'Search review',
		'not_found' => 'No reviews found',
		'not_found_in_trash' => 'No reviews found In Trash',
		'parent_item_colon' => 'Parent review'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => false,
		'publicly_queryable' => true,
		'rewrite' => true,
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'revisions'
		),
		'menu_position' => 5,
		'exclude_from_search' => false
	);

	register_post_type('review', $args);
}

add_action('init', 'review_post_type');


////data from a 'leave a review' page send to a draft custom post 'review'

add_action('wpcf7_before_send_mail', function ($posted_data) {

    $submission = WPCF7_Submission::get_instance();

    if ( $submission ) {
        $posted_data = $submission->get_posted_data();
    }

    $new_post = array(
        'post_type' => 'review',
        'post_title' => $posted_data["contact_name"],
        'post_status' => 'draft',
        'contact_email' =>  $posted_data["contact_email"],
        'phone_number' => $posted_data["phone_number"],
        'contact_message' => $posted_data["contact_message"],
        'location' => $posted_data["location"],
        'select' => $posted_data["select"]
    );

    $post_id = wp_insert_post($new_post);

    update_field('field_5b49bfd068ab0', $posted_data["contact_email"], $post_id);
    update_field('field_5b49bff268ab1',  $posted_data["phone_number"], $post_id);
    update_field('field_5b49c06268ab2',  $posted_data["contact_message"], $post_id);
    update_field('field_5b4b4c8e3d19b',  $posted_data["location"], $post_id);
    update_field('field_5b4b5bb17be85',  $posted_data["select"], $post_id);
});


//cf7 select
function dynamic_field_values ( $tag, $unused ) {

    if ( $tag['name'] != 'select' )
        return $tag;

    $args = array (
        'numberposts'   => -1,
        'post_type'     => 'page',
        'post__not_in' => array(21, 138, 25, 180, 2, 116, 19, 175, 197, 73, 16),
        'orderby'       => 'title',
        'order'         => 'ASC',
    );

    $custom_posts = get_posts($args);

    if ( ! $custom_posts )
        return $tag;

    foreach ( $custom_posts as $custom_post ) {

        $tag['raw_values'][] = $custom_post->post_title;
        $tag['values'][] = $custom_post->post_title;
        $tag['labels'][] = $custom_post->post_title;

    }

    return $tag;

}
add_filter( 'wpcf7_form_tag', 'dynamic_field_values', 10, 2);



/**
 * Custom Post Type Generator Class
 */
class CPT_Generator {
  /**
   * Post type Singular Name & array of labels/supports
   * @var mixed
   */

  public $cpt_name;
  public $cpt_args;
  /**
   * Constructor for the CPT_Generator class
   *
   * @param var     $cpt_name   [post type singular name]
   * @param array   $cpt_args   [array of lables and post type options]
   */
  function __construct( $cpt_name, $cpt_args = array() ) {
    /**
     * convert " " into "_" and make the CPT name lowercase
     */
    $this->cpt_name = str_replace( ' ', '_', strtolower($cpt_name));
    $this->cpt_args = (array)$cpt_args;
    /**
     * Add the CPT_Register hook to the init add_action
     */
    add_action( 'init', array( $this, 'CPT_Register' ) );
  }
  /**
   * Function to register the Post Type on the init add action.
   */
  function CPT_Register() {
    /**
     * singluar post type label
     * @var var
     */
    $label_single = ucwords($this->cpt_name);
    /**
     * plular post type label
     * @var var
     */
    $label_plular = $label_single.'s';
    $args = array(
      'labels'              => array(
        'name'                => __( "$label_plular", 'oth-framework' ),
        'singular_name'       => __( "$label_single", 'oth-framework' ),
        'add_new'             => _x( "Add New $label_single", 'oth-framework' ),
        'add_new_item'        => __( "Add New $label_single", 'oth-framework' ),
        'edit_item'           => __( "Edit $label_single", 'oth-framework' ),
        'new_item'            => __( "New $label_single", 'oth-framework' ),
        'view_item'           => __( "View $label_single", 'oth-framework' ),
        'search_items'        => __( "Search $label_plular", 'oth-framework' ),
        'not_found'           => __( "No $label_plular found", 'oth-framework' ),
        'not_found_in_trash'  => __( "No $label_plular found in Trash", 'oth-framework' ),
        'parent_item_colon'   => __( "Parent $label_single :", 'oth-framework' ),
        'menu_name'           => __( "$label_plular", 'oth-framework' ),
        ),
      'hierarchical'        => false,
      'public'              => true,
      'supports'            => array('title', 'editor', 'thumbnail'),
      'taxonomies'          => array( 'category', 'post_tag' ),
    );
    $args = array_merge( $args, $this->cpt_args );
    register_post_type( $this->cpt_name, $args );
 	}

 	public function getPrice($postid) {
 		$product_price = get_post_meta($postid, 'product_price', false );
 		print_r($product_price[0]);
 	}

 	public function isInStock($postid) {
		$product_avaliable = get_post_meta($postid, 'product_avaliable', false );
 		print_r($product_avaliable[0]);
 	}

 	public function hello() {
 		echo 'hello';
 	}
 }

$product = new CPT_Generator('product');