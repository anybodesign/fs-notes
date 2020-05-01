<?php if ( !defined('ABSPATH') ) die();
/**
 * The main template file.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Notes
 * @since 1.0
 * @version 1.0
 */ 
get_header(); ?>

				<div class="page-content">

					<?php // The Loop
					if ( have_posts() ) :		
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/post', 'block' );
						endwhile;
			
						if ( function_exists('wp_pagenavi') ) {
							wp_pagenavi();
						} else {
							the_posts_pagination(array(
								'prev_text'          => __( 'Previous page', 'fs-notes' ),
								'next_text'          => __( 'Next page', 'fs-notes' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'fs-notes' ) . ' </span>',
							));
						}
			
					else:
						get_template_part( 'template-parts/nothing' );
					endif; 
					?>
						
				</div>
				
				<?php get_sidebar(); ?>

<?php get_footer(); ?>