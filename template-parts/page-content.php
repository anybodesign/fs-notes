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
if ( get_theme_mod('white_text') == true ) { 
	$pclass = 'page-content white-text'; 
} else { 
	$pclass = 'page-content'; 
}
?>
					<div <?php post_class($pclass) ?>>
					<?php 
						get_template_part( 'template-parts/page', 'banner' );
						
						while (have_posts()) : the_post(); ?>
							
							<header class="page-header">
								<h1 class="page-title"><?php the_title(); ?></h1>
							</header>
							
							<?php 
								the_content(); 

								if ( comments_open() || get_comments_number() ) :
					  				comments_template();
								endif;
							?>	
						
						<?php endwhile;
					?>
					</div>
