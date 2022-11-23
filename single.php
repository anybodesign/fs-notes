<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
get_header(); ?>
					
				<article <?php post_class($pclass) ?>>
				<?php 
					while (have_posts()) : the_post(); 
						get_template_part( 'template-parts/page', 'banner' ); 
						get_template_part( 'template-parts/post', 'content' );	
					endwhile;
					
					if ( comments_open() || get_comments_number() ) :
					comments_template();
					endif;
				?>
				</article>
				
				<?php get_sidebar(); ?>
									
<?php get_footer(); ?>