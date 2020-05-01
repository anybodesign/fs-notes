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

					<?php if ( is_home() && ! is_front_page() ) { ?>
						<h1 class="page-title"><?php single_post_title(); ?></h1>
					<?php } else if ( is_archive() ) { ?>
						<h1 class="page-title"><?php the_archive_title(); ?></h1>
					<?php } else if ( is_search() ) { ?>
						<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'fs-notes' ), '<span class="search-term">' . get_search_query() . '</span>' ); ?></h1>
					<?php } else { ?> 
						<?php // No title ^^ ?>
					<?php } ?>

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