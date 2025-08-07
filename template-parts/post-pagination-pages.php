<?php if ( !defined('ABSPATH') ) die(); ?>

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