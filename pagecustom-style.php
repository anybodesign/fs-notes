<?php if ( !defined('ABSPATH') ) die();
/**
 * Template Name: Style Guide
 *
 * @package WordPress
 * @subpackage FS_Notes
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>

				
				<?php 
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/page', 'banner' );
					endwhile;					
				?>
				<div class="page-content<?php if ( get_theme_mod('white_text') == true ) { echo ' white-text'; } ?>">
					<?php 
						get_template_part('template-parts/temp','styleguide'); 
					?>
				</div>
						
<?php get_footer(); ?>