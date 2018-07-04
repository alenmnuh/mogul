<?php
/*
* Template Name: Field
*/
get_header();?>

<?php
	$pageid = empty($_GET['pageid']) ? 'not found' : esc_attr($_GET['pageid']);
	$field = empty($_GET['field']) ? 'not found' : esc_attr($_GET['field']);
	if (!empty($_GET['pageid']) && !empty($_GET['field'])) {
		echo "Field $field of page $pageid is ";
	}
	the_field($field, $pageid);
?>
 
<?php get_footer();?>