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
								<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
							</div>
						
							<div class="author-description">
								<p class="footer-title"><?php echo get_the_author(); ?></p>
						
								<p class="author-bio">
									<?php the_author_meta( 'description' ); ?>
								</p>
							</div>
						</div>						