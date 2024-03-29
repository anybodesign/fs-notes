<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage FS_Notes
 * @since 1.0
 * @version 1.4
 */
?>
				<?php if ( get_theme_mod('ias') == true ) {
				 
					$pages = get_the_posts_pagination();
					if (! empty( $pages) ) {
				?>
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
					<?php }
					} ?>
					
					<div class="pagination" id="posts_nav">
					<?php
					if ( function_exists('wp_pagenavi') && get_theme_mod('ias') != true ) {
						wp_pagenavi();
					} else {
						the_posts_pagination(array(
							'prev_text'          => __( 'Previous page', 'fs-notes' ),
							'next_text'          => __( 'Next page', 'fs-notes' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'fs-notes' ) . ' </span>',
						));
					} ?>
					</div>