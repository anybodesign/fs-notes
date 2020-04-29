<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage FS_Notes
 * @since 1.0
 * @version 1.0
 */
?>
		</main> <?php // END content ?>
		
	<?php if ( ! is_page_template( 'pagecustom-maintenance.php' ) ) { ?>

		<footer role="contentinfo" id="site_foot">
			
			<div class="inner">
				
				<div class="footer-content<?php if (get_theme_mod('author')) { echo ' has-author'; } ?>">				
					
					<?php if (get_theme_mod('author') || has_nav_menu( 'social_menu' )) { ?> 
					<div class="footer-section">
						<?php if (get_theme_mod('author')) {
							get_template_part('template-parts/footer', 'author'); 
						} ?>

						<?php if ( has_nav_menu( 'social_menu' ) ) : ?>
						<nav class="footer-nav" role="navigation" aria-label="<?php _e('Social Networks', 'fs-notes'); ?>">
						<?php wp_nav_menu( array(
								'theme_location'	=> 	'social_menu',
								'menu_class'		=>	'social-menu',
								'container'			=>	false
								));
						?>
						</nav>
						<?php endif; ?>
					</div>
					<?php } ?>

					<?php // The footer menu location ?>
					
					<?php if ( has_nav_menu( 'footer_menu' ) ) : ?>
					<div class="footer-section">
						<nav class="footer-nav" role="navigation" aria-label="<?php _e('Footer Menu', 'fs-notes'); ?>">
						<?php wp_nav_menu( array(
								'theme_location'	=> 	'footer_menu',
								'menu_class'		=>	'footer-menu',
								'container'			=>	false
								));
						?>
						</nav>
					</div>
					<?php endif; ?>
				</div>

				<?php // The credit/copyright line, settings in the Customizer ?>
				
				<p class="footer-copyright">
					<?php if(get_theme_mod('footer_text')) {
						echo get_theme_mod('footer_text', ''); 
					} else {
						echo '&copy;'; echo date(' Y '); echo esc_url(bloginfo('name')).'.'; 	
					} ?>
					
					<a class="wp-love<?php if ( get_theme_mod('display_wp' ) == false ) { echo ' out-of-reach'; } ?>" href="//wordpress.org"><?php _e('Powered by WordPress!', 'good-time'); ?></a>
				</p>

			</div>
			
		</footer>

		<?php if ( get_theme_mod('back2top') == true ) { ?>
			<button id="back2top" title="<?php _e('Back to top','fs-notes'); ?>">
				<img src="<?php bloginfo( 'template_directory' ); ?>/img/ui/back-to-top.svg" alt="">
			</button>
		<?php } ?>

	<?php } ?>	
		
</div> <?php // END wrapper ?>

<?php wp_footer(); ?>

</body>
</html>
