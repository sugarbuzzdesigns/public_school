<?php 
	global $detect; 
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js <?php if(wp_is_mobile()){ echo 'mobile'; } ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/favicon.png">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/library/css/simple-grid.css">
	<link href="http://vjs.zencdn.net/5.8.8/video-js.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/library/css/clipboard.css">
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/library/css/video-gallery.css">
</head>

<body <?php body_class(); ?>>
	<?php include('partials/gallery-loader.php'); ?>
	<div class="gallery-wrap<?php if(!$post->post_parent && !isset($_GET["category"])){ echo ' toc'; }?>">
		<a id="video-gallery-main-logo" class="video-gallery-logo" target="_blank" href="<?php echo get_site_url(); ?>/">
			<span><img src="<?php bloginfo('template_directory'); ?>/library/images/logos/ps-gallery-logo-mobile.png" alt="Public Shool" /></span>
		</a>