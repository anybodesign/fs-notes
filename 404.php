<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage FS_Notes
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>
					

					<div class="page-content<?php if ( get_theme_mod('white_text') == true ) { echo ' white-text'; } ?>">
						
						<h1 class="page-title">
							<?php esc_html_e( 'Oops! That page can&rsquo;t be found', 'fs-notes' ); ?>
						</h1>
							
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'fs-notes' ); ?></p>
						<?php get_search_form(); ?>		
																			
					</div>	
									

<?php get_footer(); ?>