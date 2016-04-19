<?php
/*
 Template Name: Video Galleries Template
*/
?>

<?php get_header('video-gallery'); ?>

<?php 

if (isset($_GET["category"])){
	$catParam = htmlspecialchars(strtolower($_GET["category"]));
	$referrer = wp_get_referer();
}
?>

<?php if($post->post_parent || isset($catParam)){ ?>		
	<?php include( locate_template( 'partials/content/video-gallery.php' ) ); ?>
<?php } else { ?>
	<?php include( locate_template( 'partials/content/video-galleries.php' ) ); ?>
<?php } ?>

<?php get_footer('video-gallery'); ?>
