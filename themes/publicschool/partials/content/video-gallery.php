<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php $page_title = get_the_title(); 
	if(isset($catParam)){
		$page_title = $catParam . ' videos';
	}
?>

<?php endwhile; endif; wp_reset_postdata(); ?>
<?php 
$customPostTaxonomies = get_object_taxonomies('video');			

if(count($customPostTaxonomies) > 0)
{
	     $args = array(
         	  'orderby' => 'name',
	          'show_count' => 0,
        	  'pad_counts' => 0,
	          'hierarchical' => 1,
        	  'taxonomy' => 'category',
        	  'exclude' => 1,
        	  'title_li' => ''
        	);

	     $cats = get_categories( $args );
}
?>

<div class="gallery-filter-mobile">
	<header><span>All</span><i class="icon-down-arrow"></i><i class="icon-close-menu"></i></header>
	<button class="filter show-all hidden" data-filter="all">All</button>
	<?php foreach($cats as $cat){ ?>
		<button class="filter" data-filter=".<?php echo $cat->slug; ?>"><?php echo $cat->slug; ?></button>
	<?php } ?>	
</div>

<div class="gallery-filter">
	<button class="filter show-all" data-filter="all">All</button>
	<?php foreach($cats as $cat){ ?>
		<button class="filter" data-filter=".<?php echo $cat->slug; ?>"><?php echo $cat->slug; ?></button>
	<?php } ?>	
</div>

<div class="gallery">
	<div class="gallery-inner grid grid-pad">
		<?php include( locate_template('partials/content/loop-video-gallery.php') ); ?>
	</div>

	<?php if (isset($_GET["category"])){ ?>
		<a class="return-breadcrumb" href="<?php echo $referrer; ?>"><span><</span> <span>Return to gallery</span></a>
	<?php } ?>	
</div>

<div class="gallery-overlay">
	<span class="close-video"><i></i></span>
	<div class="gallery-overlay-item">
		<div class="video-wrap">
			<div class="video-start play-full-screen">
				<div></div>
				<div></div>
				<i></i>
			</div>			
		</div>
		<div class="copy grid grid-pad">
			<div class="col col-5-12 tablet-col-1-1 mobile-col-1-1">
				<div class="content">
					<p class="title">Video Number Four</p>
					<p class="category">staging</p>
					
					<!-- <a href="#" class="share-link copy-to-clipboard" data-clipboard-text="" target="_blank"><i></i>Share Link</a> -->
				</div>
			</div>
			<div class="col col-7-12 tablet-col-1-1 mobile-col-1-1">
				<div class="content">
					<p class="description"></p>			
				</div>
			</div>
		</div>
	</div>
	<img class="minimal-logo" src="<?php bloginfo('template_directory'); ?>/library/images/logos/ps-gallery-logo-mobile-minimal.png" alt="Public Shool" />
	<nav>
		<span class="prev"></span>
		<span class="next"></span>
	</nav>	
</div>

<!-- <div class="gallery-overlay-transition"></div> -->