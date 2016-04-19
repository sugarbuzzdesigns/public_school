		<?php
			$index = 0;

			if(isset($catParam)){
				$query = new WP_Query( array(
			        'post_type' => 'video',
			        'posts_per_page' => -1,
			        'order' => 'ASC',
			        'orderby' => 'title',
			        'category_name' => $catParam
			    ));				
			} else {
				$videoIds = get_post_meta( get_the_ID(), 'publicschool_video_ids', true ); 

				$query = new WP_Query( array(
			        'post_type' => 'video',
			        'posts_per_page' => -1,
			        'order' => 'ASC',
			        'orderby' => 'title',
			        'post__in' => explode(',', $videoIds)
			    ));
			} 	

		    $columnSizeClass = $query->post_count >= 3 ? 'col-1-3' : 'col-1-2';

		    if($query->post_count === 1){ ?>
		    	
		    	<script>
		    		var oneGalleryVideo = true;
		    	</script>

		    <?php }

		    if ( $query->have_posts() ) { ?>
		        <?php while ( $query->have_posts() ) : $query->the_post(); 
		        	
		        	$index++;

		        	$deepLinktitle = seoUrl(get_the_title());

					$cats = get_the_category(); 
					$cat = $cats[0]->name;
					$catLower = strtolower($cat);
					$desktopURL = get_post_meta( get_the_ID(), 'publicschool_desktop_url', true );
					$mobileURL = get_post_meta( get_the_ID(), 'publicschool_mobile_url', true );
					$poster = get_post_meta( get_the_ID(), 'publicschool_video_poster', true );
				?>

				<div class="gallery-item <?php echo $columnSizeClass; ?> mobile-col-1-1 tablet-col-1-2 mix <?php echo friendlyString($cats[0]->name); ?>" id="<?php echo $deepLinktitle; ?>" data-deep-link="<?php echo $deepLinktitle; ?>" data-item-index="<?php echo $index ?>" data-desktop-url="<?php echo $desktopURL; ?>" data-mobile-url="<?php echo $mobileURL; ?>" data-poster-url="<?php echo $poster; ?>">
					<div class="gallery-video">
						<div class="video-wrap">
							<div class="video-placeholder" data-video-id="gallery_video_<?php echo get_the_ID(); ?>" class="video-js vjs-default-skin" width="auto" height="auto" controls style="background-image:url(<?php echo $poster; ?>);"></div>
						</div>
						<p class="title" style="display: none;"><?php the_title(); ?></p>
						<p class="category" style="display: none;"><a href="<?php echo get_site_url() ?><?php echo add_query_arg( array('category' => $catLower), '/video-galleries' ); ?>"><?php echo $cats[0]->name; ?></a></p>
						<p class="description hide"><?php echo get_the_content(); ?></p>
						<!-- <p class="share-link hide"></p> -->
					</div>
				</div>	

		        <?php endwhile; wp_reset_postdata(); 
			}
		?>        