<?php if ( !defined('ABSPATH') ) die();
/**
 * Template part for displaying the post meta.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FS_Notes
 * @since 1.0
 * @version 1.0
 */
?>

							<div class="post-meta">
								<p class="meta-infos">
									<?php _e( 'Posted on&nbsp;', 'fs-notes' ); ?><?php echo the_time( get_option('date_format') ); ?>
									<?php _e( 'by&nbsp;', 'fs-notes' ); the_author(); ?>
									<?php _e( 'in&nbsp;', 'fs-notes' ); the_category(', '); ?>
								</p>
								<?php get_template_part('template-parts/post', 'meta-comments'); ?>
							</div>