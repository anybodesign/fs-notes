<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage FS_Notes
 * @since 1.0
 * @version 1.4
 */
?>
			<?php 
				
				if ( get_theme_mod('ias') == true ) {
				 
					$pages = get_the_posts_pagination();
					
					if (! empty( $pages) ) {
						
						get_template_part( 'template-parts/post', 'pagination-spinner' ); 
						get_template_part( 'template-parts/post', 'pagination-trigger' ); 
						get_template_part( 'template-parts/post', 'pagination-nomore' ); 
						
					}
					
				}
					
					
				get_template_part( 'template-parts/post', 'pagination-pages' );
				
			?>