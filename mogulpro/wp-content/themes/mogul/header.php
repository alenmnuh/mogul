<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	   <meta name="viewport" content="width=device-width, initial-scale=1.0">
	   <meta http-equiv="X-UA-Compatible" content="ie=edge">
	   <title><?php echo wp_get_document_title(); ?></title>
<?php wp_head(); ?>
</head>

<body>

	<header class="header row expanded">
	   <div class="column header__column">
	   	<div class="row expanded">
	   		<div class="column logo">
	   		   <?php the_custom_logo(); ?>
	   		</div>
	   		
	   		<div class="column header__wrapper">
	   		   <nav class="main-nav">
	   		      
   		         <?php wp_nav_menu( array(
   		          'theme_location'=>'top',
   		          'items_wrap' => '<ul>%3$s</ul>',
   		         ) );?>
	   		      
	   		   </nav>

	   		   <i class="fa fa-bars burger-icon fa-3x"></i>
	   		</div>
	   	</div> 
	   </div>

	   <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id(get_option('page_for_posts')), 'full' );?>

	   <div style="background-image: url(<?php if (is_home()): ?> <?php echo $backgroundImg[0]; ?>
	   											<?php else: ?> <?php the_post_thumbnail_url(); ?>
	   											<?php endif ?>)"
	   						<?php if (is_front_page()): ?> class="header__back-image_home column"
         					<?php else: ?> class="header__back-image column" 
         					<?php endif ?> >
	   		<img src="<?php if ($header_image = get_field('header_image', 'option')):
            	echo $header_image['url'];
         	endif?>" alt="" <?php if (is_front_page()): ?> 
         								class="header__image_center"
         						<?php else: ?> class="header__image_right  medium-6 large-4" 
         						<?php endif ?> >
	   </div>
	</header>
	
