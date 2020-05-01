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
get_header(); ?>
					
				<article <?php post_class('page-content') ?>>
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
				
				<div class="page-sidebar">
					<?php get_sidebar(); ?>
				</div>	
									
<?php get_footer(); ?>