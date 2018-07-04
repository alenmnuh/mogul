<?php
/*
* Template Name: Postmeta
*/
get_header();?>

<?php

$pageid = empty($_GET['pageid']) ? 'not found' : esc_attr($_GET['pageid']);
$meta_key = empty($_GET['meta_key']) ? 'not found' : esc_attr($_GET['meta_key']);

if (!empty($_GET['pageid']) && !empty($_GET['meta_key'])) {
	echo "Meta key $meta_key of page $pageid is ";
}

echo $wpdb->get_var("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = '$meta_key' and post_id = $pageid");
?>
 
<?php get_footer();?>