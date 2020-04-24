<?php if ( !defined('ABSPATH') ) die(); ?>

	<?php // The Skiplinks ?>
	
	<div class="skiplinks">
		<a href="#site_main"><?php _e('Go to main content', 'fs-notes'); ?></a>
		<?php if ( has_nav_menu( 'main_menu' ) ) : ?>
		<a href="#site_nav"><?php _e('Go to main menu', 'fs-notes'); ?></a>
		<?php endif; ?>
	</div>