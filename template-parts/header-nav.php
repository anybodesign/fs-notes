<?php if ( !defined('ABSPATH') ) die(); ?>

			<?php // The main menu location ?>
			
			<?php if ( has_nav_menu( 'main_menu' ) ) : ?>
			<nav class="site-nav" role="navigation" aria-label="<?php esc_attr_e('Main Menu', 'fs-notes'); ?>" id="site_nav">
				<?php wp_nav_menu( array(
					'theme_location'	=> 	'main_menu',
					'menu_class'		=>	'main-menu',
					'container'			=>	false,
					));
				?>
			</nav>
			<?php endif; ?>