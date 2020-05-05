<?php if ( !defined('ABSPATH') ) die();
/**
 * @package WordPress
 * @subpackage FS_Notes
 * @since 1.0
 * @version 1.0
 */
?>

								<?php $comment = get_comments_number(); if ( $comment > 0 ) : ?>
								<p class="meta-comments">
									<?php get_template_part('template-parts/post', 'meta-svg'); ?>
									<a href="<?php the_permalink() ?>#comments">
										<?php printf( _n( '%s comment', '%s comments', $comment, 'fs-notes' ), $comment ); ?>
									</a>
								</p>
								<?php endif; ?>