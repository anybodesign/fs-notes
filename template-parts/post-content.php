<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Notes
 * @since 1.0
 * @version 1.0
 */
?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
						<?php if ( '' != get_the_post_thumbnail() ) { ?>
						<figure class="post-figure">
							<?php the_post_thumbnail('large-hd'); ?>
						</figure>
						<?php } ?>
						
						<div class="post-content">
							<?php the_content(); ?>
						</div>

					</article>