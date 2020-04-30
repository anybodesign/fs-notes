<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage FS_Notes
 * @since 1.0
 * @version 1.0
 */
?>
						<div class="author-info">
							
							<div class="author-avatar">
								<?php
									if (get_theme_mod('author_avatar')) {
										function echo_author_avatar() {
										    $id = get_theme_mod('author_avatar');
										
										    if ($id != 0) {
										        $url = wp_get_attachment_url($id);
										
										        echo '<img class="avatar" src="' . $url . '" alt="">';
										    }
										}
										echo echo_author_avatar();										
										
									} else {
										echo get_avatar( get_the_author_meta( 'user_email' ) ); 
									}
								?>
							</div>
						
							<div class="author-description">
								<p class="footer-title">
								<?php
									if (get_theme_mod('author_name')) {
										echo get_theme_mod('author_name', '');
									} else {
										echo get_the_author(); 
									}
								?>
								</p>
						
								<p class="author-bio">
								<?php
									if (get_theme_mod('author_desc')) {
										echo get_theme_mod('author_desc', '');
									} else {
										the_author_meta( 'description' ); 
									}
								?>
								</p>
							</div>
							
						</div>