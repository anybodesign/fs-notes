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
			</div> <?php // END page wrap ?>
		</main> <?php // END content ?>
		
	<?php if ( ! is_page_template( 'pagecustom-maintenance.php' ) ) { ?>

		<footer role="contentinfo" id="site_foot" class="site-footer<?php if ( get_theme_mod('white_footer_text') == true ) { echo ' white-text'; } ?>">
			
			<div class="inner">
				
				<div class="footer-content<?php if (get_theme_mod('display_author')) { echo ' has-author'; } ?>">				
					
					<?php if (get_theme_mod('display_author') || has_nav_menu( 'social_menu' )) { ?> 
					<div class="footer-section footer-author">

						<?php if ( get_theme_mod('display_author') && !is_search() && !is_404() || get_theme_mod('author_avatar') && get_theme_mod('author_name') && get_theme_mod('author_desc') ) {
							get_template_part('template-parts/footer', 'author'); 
						} ?>

						<?php if ( has_nav_menu( 'social_menu' ) ) : 
						 	if ( get_theme_mod('dark_icons') == true ) {
								$darkicons = ' dark-icons';
							} else {
								$darkicons = null;
							}
						?>
						<nav class="footer-social<?php echo $darkicons; ?>" role="navigation" aria-label="<?php esc_attr_e('Social Networks', 'fs-notes'); ?>">
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
					<div class="footer-section footer-nav">
						<p class="footer-title">
							<?php echo wp_get_nav_menu_name('footer_menu'); ?>
						</p>
						<nav role="navigation" aria-label="<?php esc_attr_e('Footer Menu', 'fs-notes'); ?>">
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
				
				<div class="footer-copyright<?php if ( has_nav_menu( 'copyright_menu' ) ) { echo ' has-copyright-menu';} ?>">
					<p>
						<?php if(get_theme_mod('footer_text')) {
							echo get_theme_mod('footer_text', ''); 
						} else {
							echo '&copy;'; echo date(' Y '); echo esc_url(bloginfo('name')).'.'; 	
						} ?>
						
						<a class="wp-love<?php if ( get_theme_mod('display_wp' ) == false ) { echo ' out-of-reach'; } ?>" href="//wordpress.org"><?php esc_html_e('Powered by WordPress!', 'good-time'); ?></a>
					</p>
					<?php if ( has_nav_menu( 'copyright_menu' ) ) : ?>
					<nav class="copyright-nav" role="navigation" aria-label="<?php esc_attr_e('Copyright Menu', 'fs-notes'); ?>">
						<?php wp_nav_menu( array(
								'theme_location'	=> 	'copyright_menu',
								'menu_class'		=>	'copyright-menu',
								'container'			=>	false
								));
						?>
						</nav>
					<?php endif; ?>
				</div>
				
			</div>
			
		</footer>

		<?php if ( get_theme_mod('back2top') == true ) {
			get_template_part('template-parts/footer', 'back2top');
		} ?>

	<?php } ?>	
		
</div> <?php // END wrapper ?>

<?php wp_footer(); ?>

</body>
</html>
