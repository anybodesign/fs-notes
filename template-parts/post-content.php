<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Notes
 * @since 1.0
 * @version 1.0
 */
?>

					<header class="post-header">
						<h1 class="post-title"><?php the_title(); ?></h1>
						<?php get_template_part('template-parts/post', 'meta'); ?>
					</header>
					
					<?php 
						the_content(); 
							
						if ( get_theme_mod('share_box') == true ) {
							get_template_part( 'template-parts/post', 'share' );
						}													
					?>