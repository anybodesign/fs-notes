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
									<?php esc_html_e( 'Posted on&nbsp;', 'from-scratch' ); ?><?php echo the_time( get_option('date_format') ); ?>
									<?php if ( get_theme_mod('meta_author') != false ) {
										esc_html_e( 'by&nbsp;', 'from-scratch' ); the_author(); 
									} ?>
									<?php if ( get_theme_mod('meta_category') != false ) {
										esc_html_e( 'in&nbsp;', 'from-scratch' ); the_category(', '); 
									} ?>
								</p>
								<?php get_template_part('template-parts/post', 'meta-comments'); ?>
							</div>