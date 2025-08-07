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

				<div class="page-content<?php if ( get_theme_mod('white_text') == true ) { echo ' white-text'; } ?>">
				
					<?php if ( is_home() && ! is_front_page() ) { ?>
					<h1 class="page-title"><?php single_post_title(); ?></h1>
					<?php } else if ( is_archive() ) { ?>
					<h1 class="page-title"><?php the_archive_title(); ?></h1>
					<?php } else if ( is_search() ) { ?>
					<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'fs-notes' ), '<span class="search-term">' . get_search_query() . '</span>' ); ?></h1>
					<?php } ?> 
					
					<?php if ( is_archive() ) {
						the_archive_description( '<div class="archive-desc">', '</div>' );
					} ?>
					
					<?php if ( have_posts() ) : ?>		
					<div id="posts_list">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'template-parts/post', 'block' ); ?>
						<?php endwhile; ?>
					</div>
						
					<?php get_template_part( 'template-parts/post', 'pagination' ); ?>
						
					<?php
					else:
						get_template_part( 'template-parts/nothing' );
					endif; 
					?>
						
				</div>
				
				<?php get_sidebar(); ?>
				
<?php get_footer(); ?>