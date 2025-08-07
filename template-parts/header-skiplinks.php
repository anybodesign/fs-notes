<?php if ( !defined('ABSPATH') ) die(); ?>

	<?php // The Skiplinks ?>
	
	<div class="skiplinks">
		<a href="#site_main"><?php esc_html_e('Go to main content', 'fs-notes'); ?></a>
		<?php if ( has_nav_menu( 'main_menu' ) ) : ?>
		<a href="#site_nav"><?php esc_html_e('Go to main menu', 'fs-notes'); ?></a>
		<?php endif; ?>
		<?php if ( is_home() || is_archive() || is_search() || is_single() ) : ?>
		<a href="#site_sidebar"><?php esc_html_e('Go to sidebar', 'fs-notes'); ?></a>
		<?php endif; ?>
	</div>