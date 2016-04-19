	</div>

	<?php
	   /* Always have wp_footer() just before the closing </body>
	    * tag of your theme, or you will break many plugins, which
	    * generally use this hook to reference JavaScript files.
	    */
	    wp_footer();
	?>
	<script type="text/javascript" async src="<?php bloginfo('template_directory'); ?>/library/js/libs/videojs.min.js"></script>
	<script type="text/javascript" async src="<?php bloginfo('template_directory'); ?>/library/js/libs/$.address.min.js"></script>		
	<script type="text/javascript" async src="<?php bloginfo('template_directory'); ?>/library/js/video-gallery.js"></script>
	<script type="text/javascript" async src="<?php bloginfo('template_directory'); ?>/library/js/mobile-menu.js"></script>	
	<script src="http://cdn.jsdelivr.net/jquery.mixitup/latest/jquery.mixitup.min.js"></script>
</body>