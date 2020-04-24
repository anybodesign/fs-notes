<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Notes
 * @since 1.0
 * @version 1.0
 */
?>
					<div class="page-content">
					<?php 
						get_template_part( 'template-parts/page', 'banner' );
						
						while (have_posts()) : the_post(); ?>
							
							<header class="page-header">
								<h1 class="page-title"><?php the_title(); ?></h1>
							</header>
							
							<?php the_content(); ?>	
						
						<?php endwhile;
					?>
					</div>
