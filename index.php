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

					<?php if ( get_theme_mod('ias') == true ) { ?>
					<div class="spinner">
						<svg xmlns="http://www.w3.org/2000/svg" style="margin:auto;background:0 0" width="200" height="200" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" display="block"><g transform="translate(80 50)"><circle r="6" fill="#303030"><animateTransform attributeName="transform" type="scale" begin="-0.875s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"/><animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.875s"/></circle></g><g transform="rotate(45 -50.355 121.569)"><circle r="6" fill="#303030" fill-opacity=".875"><animateTransform attributeName="transform" type="scale" begin="-0.75s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"/><animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.75s"/></circle></g><g transform="rotate(90 -15 65)"><circle r="6" fill="#303030" fill-opacity=".75"><animateTransform attributeName="transform" type="scale" begin="-0.625s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"/><animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.625s"/></circle></g><g transform="rotate(135 -.355 41.569)"><circle r="6" fill="#303030" fill-opacity=".625"><animateTransform attributeName="transform" type="scale" begin="-0.5s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"/><animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.5s"/></circle></g><g transform="rotate(180 10 25)"><circle r="6" fill="#303030" fill-opacity=".5"><animateTransform attributeName="transform" type="scale" begin="-0.375s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"/><animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.375s"/></circle></g><g transform="rotate(-135 20.355 8.431)"><circle r="6" fill="#303030" fill-opacity=".375"><animateTransform attributeName="transform" type="scale" begin="-0.25s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"/><animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.25s"/></circle></g><g transform="rotate(-90 35 -15)"><circle r="6" fill="#303030" fill-opacity=".25"><animateTransform attributeName="transform" type="scale" begin="-0.125s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"/><animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.125s"/></circle></g><g transform="rotate(-45 70.355 -71.569)"><circle r="6" fill="#303030" fill-opacity=".125"><animateTransform attributeName="transform" type="scale" begin="0s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"/><animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="0s"/></circle></g></svg>
					</div>
					<div class="trigger">
						<button id="post_trigger" class="action-btn"><?php _e('Load more', 'fs-notes'); ?></button>
					</div>
					<div class="no-more">
						<p>
							<em><?php _e('No more posts', 'fs-notes'); ?></em>
						</p>
					</div>
					<?php } ?>
					
					<div class="pagination" id="posts_nav">
					<?php
					if ( function_exists('wp_pagenavi') ) {
						wp_pagenavi();
					} else {
						the_posts_pagination(array(
							'prev_text'          => __( 'Previous page', 'fs-notes' ),
							'next_text'          => __( 'Next page', 'fs-notes' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'fs-notes' ) . ' </span>',
						));
					} ?>
					</div>
			
					<?php
					else:
						get_template_part( 'template-parts/nothing' );
					endif; 
					?>
						
				</div>
				
				<?php get_sidebar(); ?>

<?php get_footer(); ?>